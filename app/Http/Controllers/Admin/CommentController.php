<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:comment-list|comment-create|comment-edit|comment-delete', ['only' => ['commentList']]);
        $this->middleware('permission:comment-create', ['only' => ['addComment','storeComment']]);
        $this->middleware('permission:comment-edit', ['only' => ['editComment','updateComment', 'publishComment']]);
        $this->middleware('permission:comment-delete', ['only' => ['deleteComment']]);
    }
    public function commentList()
    {
        $comments = Comment::all();
        return view('admin.comment.index')
            ->with('comments', $comments)
            ->with('page', 'comment');
    }
    public function editComment($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.add')
            ->with('comment', $comment)
            ->with('page', 'comment');
    }
    public function updateComment(Request $request, $id)
    {
        $comment = Comment::find($id);
        if($request->has('content'))
            $comment->content = $request->content;
            $comment->is_publish = 0;
            $comment->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function publishComment($id)
    {
        $comment = Comment::find($id);
        $comment->is_publish = !$comment->is_publish;
        $comment->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
