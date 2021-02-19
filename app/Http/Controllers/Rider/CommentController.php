<?php

namespace App\Http\Controllers\Rider;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        return view('rider.comment');
    }
    public function store(Request $request){
        $user = Auth::guard('rider')->user();
        $record = new Comment();
        $record->rider_id = $user->id;
        $record->content = $request->comment;
        $record->save();
        return redirect()->back()->with('message', 'Your comment Successfully Submitted!');
    }
}
