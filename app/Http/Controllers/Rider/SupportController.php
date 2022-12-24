<?php

namespace App\Http\Controllers\Rider;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        return view('rider.support');
    }
    public function store(Request $request){
        $user = Auth::guard('rider')->user();
        $record = new Feedback();
        $record->name = $user->first_name.' '.$user->last_name;
        $record->email = $user->email;
        $record->mobile = $user->mobile;
        $record->rider_id = $user->id;
        $record->content = $request->get('query');
        $record->save();
        return redirect()->back()->with('message', 'Query Successfully Submitted!');
    }
}
