<?php

namespace App\Http\Controllers\Driver;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        return view('driver.support');
    }
    public function store(Request $request){
        $user = Auth::guard('driver')->user();
        $record = new Feedback();
        $record->name = $user->first_name.' '.$user->last_name;
        $record->email = $user->email;
        $record->mobile = $user->mobile;
        $record->driver_id = $user->id;
        $record->content = $request->get('query');
        $record->save();
        return redirect()->back()->with('message', 'Query Successfully Submitted!');
    }
}
