<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\DocumentState;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocument;
use App\Http\Requests\StoreDocumentState;
use App\State;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:document-list|document-create|document-edit|document-delete', ['only' => ['documentList']]);
        $this->middleware('permission:document-create', ['only' => ['addDocument','storeDocument']]);
        $this->middleware('permission:document-edit', ['only' => ['editDocument','updateDocument', 'approveDocument']]);
        $this->middleware('permission:document-delete', ['only' => ['deleteComment']]);

        $this->middleware('permission:documentstate-list|documentstate-create|documentstate-edit|documentstate-delete', ['only' => ['documentstateList']]);
        $this->middleware('permission:documentstate-create', ['only' => ['addDocumentstate','storeDocumentstate']]);
        $this->middleware('permission:documentstate-edit', ['only' => ['editDocumentstate','updateDocumentstate']]);
        $this->middleware('permission:documentstate-delete', ['only' => ['deleteDocumentstate']]);
    }
    public function documentList()
    {
        $documents = Document::all();
        return view('admin.document.index')
            ->with('documents', $documents)
            ->with('page', 'document')
            ->with('subpage', 'document');
    }
    public function addDocument()
    {
        return view('admin.document.add')
            ->with('page', 'document')
            ->with('subpage', 'document');
    }
    public function storeDocument(StoreDocument $request)
    {
        $request->validated();
        $document = new Document();
        $document->name = $request->name;
        $document->title = $request->title;
        $document->description = $request->description;
        if($request->hasFile('url')) {
            $file = $request->file('url');
            $document->url = upload_file($file, 'admin/document');;
        }
        $document->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editDocument($id)
    {
        $document = Document::find($id);
        return view('admin.document.add')
            ->with('document', $document)
            ->with('page', 'document')
            ->with('subpage', 'document');
    }
    public function updateDocument(StoreDocument $request, $id)
    {
        $request->validated();
        $document = Document::find($id);
        $document->name = $request->name;
        $document->title = $request->title;
        $document->description = $request->description;
        if($request->hasFile('url')) {
            $file = $request->file('url');
            $document->url = upload_file($file, 'admin/document');;
        }
        $document->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function approveDocument($id)
    {
        $document = Document::find($id);
        $document->status = !$document->status;
        $document->save();
        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteDocument($id)
    {
        $document = Document::find($id);
        $document->delete();

        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function documentstateList()
    {
        $documents = DocumentState::all();
        return view('admin.documentstate.index')
            ->with('documents', $documents)
            ->with('page', 'document')
            ->with('subpage', 'documentstate');
    }
    public function addDocumentstate()
    {
        $states = State::all();
        $documents = Document::where('status', 1)->get();
        return view('admin.documentstate.add')
            ->with('states', $states)
            ->with('documents', $documents)
            ->with('page', 'document')
            ->with('subpage', 'documentstate');
    }
    public function storeDocumentstate(StoreDocumentState $request)
    {
        $request->validated();
        $record = DocumentState::where('state_id', $request->state_id)->first();
        if(!$record)
            $document = new DocumentState();
        else
            $document = DocumentState::find($record->id);
        $document->state_id = $request->state_id;
        $document->document_ids = implode(',', $request->document_ids);
        $document->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editDocumentstate($id)
    {
        $states = State::all();
        $documentstate = DocumentState::find($id);
        $documents = Document::where('status', 1)->get();
        return view('admin.documentstate.add')
            ->with('documentstate', $documentstate)
            ->with('documents', $documents)
            ->with('states', $states)
            ->with('page', 'document')
            ->with('subpage', 'documentstate');
    }
    public function updateDocumentstate(StoreDocument $request, $id)
    {
        $request->validated();
        $document = DocumentState::where('state_id', $request->state_id)->first();
        $document->state_id = $request->state_id;
        $document->document_ids = implode(',', $request->document_ids);
        $document->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deleteDocumentstate($id)
    {
        $document = DocumentState::find($id);
        $document->delete();

        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
