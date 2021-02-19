<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Feedback;
use App\Homepage;
use App\Partner;
use App\VehicleType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $content = Homepage::first();
        $servicetypes = VehicleType::where('status', 1)->get();
        $partners = Partner::where('is_approved', 1)->get();
        $comments = Comment::where('is_publish', 1)->get();
        return view('home')
            ->with('content', $content)
            ->with('partners', $partners)
            ->with('servicetypes', $servicetypes)
            ->with('comments', $comments);
    }
    public function charity()
    {
        $content = Homepage::first();
        $partners = Partner::where('is_approved', 1)->get();
        return view('charity')
            ->with('content', $content)
            ->with('partners', $partners);
    }
    public function contact()
    {
        $content = Homepage::first();
        $partners = Partner::where('is_approved', 1)->get();
        return view('contact')
            ->with('content', $content)
            ->with('partners', $partners);
    }

    public function policy()
    {
        $content = Homepage::first();
        return view('policy')
            ->with('content', $content);
    }

    public function terms()
    {
        $content = Homepage::first();
        return view('terms')
            ->with('content', $content);
    }

    public function about()
    {
        $content = Homepage::first();
        return view('about')
            ->with('content', $content);
    }

    public function feedback(Request $request){
        $record = new Feedback();
        $record->name = $request->name;
        $record->email = $request->email;
        $record->mobile = $request->mobile;
        $record->subject = $request->subject;
        $record->content = $request->get('content');
        $record->save();
        return redirect()->back()->with('message', 'Feedback Successfully Submitted!');
    }

    public function loginGuide(){
        return view('auth.login-navigation');
    }

    public function registerGuide(){
        return view('auth.register-navigation');
    }
}
