<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Feedback;
use App\Homepage;
use App\Partner;
use App\User;
use App\VehicleType;
use Illuminate\Http\Request;
use App\Footers;
class HomeController extends Controller
{
    public function index()
    {
        $content = Homepage::first();
        $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        
        $servicetypes = VehicleType::where('status', 1)->get();
        $partners = Partner::where('is_approved', 1)->get();
        $comments = Comment::where('is_publish', 1)->get();


        /*print '<pre>';
        print_r($comments);*/
        $donors = User::all();
        return view('home')
            ->with('content', $content)
            ->with('partners', $partners)
            ->with('servicetypes', $servicetypes)
            ->with('comments', $comments)
            ->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
            ->with('donors', $donors);
    }
    public function charity()
    {
        $content = Homepage::first();
         $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        $partners = Partner::where('is_approved', 1)->get();
        return view('charity')
            ->with('content', $content)
            ->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
            ->with('partners', $partners);
    }
    public function contact()
    {
        $content = Homepage::first();
         $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        $partners = Partner::where('is_approved', 1)->get();
        return view('contact')
            ->with('content', $content)
            ->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
            ->with('partners', $partners);
    }

    public function policy()
    {
        $content = Homepage::first();
         $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        return view('policy')
              ->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
            ->with('content', $content);
    }

    public function terms()
    {
        $content = Homepage::first();
         $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        return view('terms')
        ->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
            ->with('content', $content);
    }

    public function about()
    {
        $content = Homepage::first();
         $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        return view('about')
        ->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
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
    	    $content = Homepage::first();
         $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        return view('auth.login-navigation')->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
            ->with('content', $content);
    }

    public function registerGuide(){
    	    $content = Homepage::first();
         $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        return view('auth.register-navigation')->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
            ->with('content', $content);
    }
}
