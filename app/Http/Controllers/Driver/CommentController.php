<?php

namespace App\Http\Controllers\Driver;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver');
    }
    public function index()
    {
        return view('driver.comment');
    }
    public function store(Request $request){
        $user = Auth::guard('driver')->user();
        $record = new Comment();
        $record->driver_id = $user->id;
        $record->content = $request->comment;
        $record->save();
        return redirect()->back()->with('message', 'Your comment Successfully Submitted!');
    }
}
