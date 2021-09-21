<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:feedback-list|feedback-delete', ['only' => ['feedbackList']]);
        $this->middleware('permission:feedback-delete', ['only' => ['deleteFeedback']]);
    }
    public function feedbackList()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.index')
            ->with('feedbacks', $feedbacks)
            ->with('page', 'feedback');
    }
    public function deleteFeedback($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
