<?php

namespace App\Http\Controllers\Admin;

use App\Homepage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:banner', ['only' => ['banner', 'storeBanner']]);
        $this->middleware('permission:charity', ['only' => ['charity', 'storeCharity']]);
        $this->middleware('permission:about', ['only' => ['about', 'storeAbout']]);
        $this->middleware('permission:home', ['only' => ['home', 'storeHome']]);
        $this->middleware('permission:policy', ['only' => ['policy', 'storePolicy']]);
        $this->middleware('permission:social', ['only' => ['social', 'storeSocial']]);
        $this->middleware('permission:terms', ['only' => ['terms', 'storeTerms']]);
    }
    public function banner()
    {
        $content = Homepage::first();
        return view('admin.cms.banner')
            ->with('content', $content)
            ->with('page', 'banner');
    }
    public function storeBanner(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('banner_title'))
                $content->banner_title = $request->banner_title;
            if($request->has('banner_description'))
                $content->banner_description = $request->banner_description;
            if($request->hasFile('banner_image'))
                $content->banner_image = upload_file($request->file('banner_image'), 'cms/banner');
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('banner_title'))
                $content->banner_title = $request->banner_title;
            if($request->has('banner_description'))
                $content->banner_description = $request->banner_description;
            if($request->hasFile('banner_image'))
                $content->banner_image = upload_file($request->file('banner_image'), 'cms/banner');
            $content->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function charity()
    {
        $content = Homepage::first();
        return view('admin.cms.charity')
            ->with('content', $content)
            ->with('page', 'charity');
    }
    public function storeCharity(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('charity_title'))
                $content->charity_title = $request->charity_title;
            if($request->has('charity_description'))
                $content->charity_description = $request->charity_description;
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('charity_title'))
                $content->charity_title = $request->charity_title;
            if($request->has('charity_description'))
                $content->charity_description = $request->charity_description;
            $content->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }

    //--------- About us -------------//
    public function about()
    {
        $content = Homepage::first();
        return view('admin.cms.about')
            ->with('content', $content)
            ->with('page', 'about');
    }
    public function storeAbout(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('about_title'))
                $content->about_title = $request->about_title;
            if($request->has('about_description'))
                $content->about_description = $request->about_description;
            if($request->hasFile('about_image'))
                $content->about_image = upload_file($request->file('about_image'), 'cms/about');
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('about_title'))
                $content->about_title = $request->about_title;
            if($request->has('about_description'))
                $content->about_description = $request->about_description;
            if($request->hasFile('about_image'))
                $content->about_image = upload_file($request->file('about_image'), 'cms/about');
            $content->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }

    public function home()
    {
        $content = Homepage::first();
        return view('admin.cms.home')
            ->with('content', $content)
            ->with('page', 'home');
    }
    public function storeHome(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('workflow_title1'))
                $content->workflow_title1 = $request->workflow_title1;
            if($request->has('workflow_description1'))
                $content->workflow_description1 = $request->workflow_description1;
            if($request->has('workflow_title2'))
                $content->workflow_title2 = $request->workflow_title2;
            if($request->has('workflow_description2'))
                $content->workflow_description2 = $request->workflow_description2;
            if($request->has('workflow_title3'))
                $content->workflow_title3 = $request->workflow_title3;
            if($request->has('workflow_description3'))
                $content->workflow_description3 = $request->workflow_description3;
            if($request->has('workflow_title4'))
                $content->workflow_title4 = $request->workflow_title4;
            if($request->has('workflow_description4'))
                $content->workflow_description4 = $request->workflow_description4;
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('charity_title'))
                $content->charity_title = $request->charity_title;
            if($request->has('charity_description'))
                $content->charity_description = $request->charity_description;
            $content->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }

    //----------- footer ------------//
    public function footer()
    {
        $content = Homepage::first();
        return view('admin.cms.footer')
            ->with('content', $content)
            ->with('page', 'footer');
    }
    public function storeFooter(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('caption'))
                $content->footer_caption = $request->caption;
            if($request->has('email'))
                $content->footer_email = $request->email;
            if($request->has('address'))
                $content->footer_address = $request->address;
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('caption'))
                $content->footer_title = $request->caption;
            if($request->has('email'))
                $content->footer_email = $request->footer_email;
            if($request->has('address'))
                $content->footer_address = $request->footer_address;
            $content->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }

    //----------- Privacy policy ------------//
    public function policy()
    {
        $content = Homepage::first();
        return view('admin.cms.policy')
            ->with('content', $content)
            ->with('page', 'policy');
    }
    public function storePolicy(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('policy'))
                $content->policy = $request->policy;
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('policy'))
                $content->policy = $request->policy;
            $content->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }

    //----------- Social networking link ------------//
    public function social()
    {
        $content = Homepage::first();
        return view('admin.cms.social')
            ->with('content', $content)
            ->with('page', 'social');
    }
    public function storeSocial(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('facebook'))
                $content->facebook = $request->facebook;
            if($request->has('twitter'))
                $content->twitter = $request->twitter;
            if($request->has('google'))
                $content->google = $request->google;
            if($request->has('instagram'))
                $content->instagram = $request->instagram;
            if($request->has('pinterest'))
                $content->pinterest = $request->pinterest;
            if($request->has('linkedin'))
                $content->linkedin = $request->linkedin;
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('facebook'))
                $content->facebook = $request->facebook;
            if($request->has('twitter'))
                $content->twitter = $request->twitter;
            if($request->has('google'))
                $content->google = $request->google;
            if($request->has('instagram'))
                $content->instagram = $request->instagram;
            if($request->has('pinterest'))
                $content->pinterest = $request->pinterest;
            if($request->has('linkedin'))
                $content->linkedin = $request->linkedin;
            $content->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }

    //----------- Terms of services ------------//
    public function terms()
    {
        $content = Homepage::first();
        return view('admin.cms.terms')
            ->with('content', $content)
            ->with('page', 'terms');
    }
    public function storeTerms(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('terms'))
                $content->terms = $request->terms;
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('terms'))
                $content->terms = $request->terms;
            $content->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
}
