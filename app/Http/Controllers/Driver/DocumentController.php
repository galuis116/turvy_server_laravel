<?php

namespace App\Http\Controllers\Driver;

use App\Document;
use App\DocumentState;
use App\DriverDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver');
    }
    public function index()
    {
        $result = [];
        $driver = Auth::guard('driver')->user();
        $documentstate = DocumentState::where('state_id',$driver->state_id)->first();
        if($documentstate){
            $documents = Document::whereIn('id', explode(',', $documentstate->document_ids))->get();
            foreach($documents as $index => $document){
                $result[$index] = [];
                $result[$index]['document_id'] = $document->id;
                $result[$index]['document_name'] = $document->name;
                $driver_document = DriverDocument::where('driver_id', $driver->id)->where('document_id', $document->id)->first();
                if($driver_document){
                    $result[$index]['document_url'] = $driver_document->document_url;
                    $result[$index]['document_expire_date'] = $driver_document->expiredate;
                }else{
                    $result[$index]['document_url'] = '';
                    $result[$index]['document_expire_date'] = '';
                }
            }
        }
        return view('driver.document')->with('documents', $result);
    }
    public function update(Request $request)
    {
        $driver = Auth::guard('driver')->user();
        $documentstates = DocumentState::where('state_id', $driver->state_id)->first();
        $documentIds = explode(',', $documentstates->document_ids);
        foreach($documentIds as $documentId){
            if(DriverDocument::where('document_id', $documentId)->where('driver_id', $driver->id)->count() > 0){
                $driverdocument = DriverDocument::where('document_id', $documentId)->where('driver_id', $driver->id)->first();
            }else{
                $driverdocument = new DriverDocument();
            }
            if($request->hasFile('document'.$documentId)) {
                $file = $request->file('document'.$documentId);
                $driverdocument->document_url = upload_file($file, 'document');;
            }
            if($request->has('date'.$documentId)){
                $time = strtotime($request->get('date'.$documentId));
                $newformat = date('Y-m-d',$time);
                $driverdocument->expiredate = $newformat;
            }
            $driverdocument->driver_id = $driver->id;
            $driverdocument->document_id = $documentId;
            $driverdocument->save();
        }
        return redirect()->back()->with('flash_success', 'It has done successfully');
    }
}
