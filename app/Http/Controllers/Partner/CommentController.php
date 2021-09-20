<?php

namespace App\Http\Controllers\Partner;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    public function index()
    {
        return view('partner.comment')->withPage('comment');
    }
    public function store(Request $request)
    {
        $user = Auth::guard('partner')->user();
        $record = new Comment();
        $record->partner_id = $user->id;
        $record->content = $request->content;
        $record->save();
        return redirect()->back()->with('message', 'Your comment Successfully Submitted!');
    }
}
