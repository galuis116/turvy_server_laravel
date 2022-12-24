<?php

namespace App\Http\Controllers\Admin;

use App\Homepage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Footers;
use App\Pages;
use App\Footer2;
use App\Header;
use Illuminate\Support\Str;



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
           if($request->has('banner_cdnimage'))
             $content->banner_cdnimage = $request->banner_cdnimage;
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
            if($request->has('about_cdnimage'))
             $content->about_cdnimage = $request->about_cdnimage;
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
        $footer1 = Footers::where('section_name','footer_1_section_1')->first();
        $footerb2 = Footers::where('section_name','footer_1_section_2')->first();
        $footer2b1 = Footer2::where('section_name','footer_2_section_1')->first();
        $footer2b1list = Footer2::where('section_name','footer_2_section_1')->get();
        $footer2b2list = Footer2::where('section_name','footer_2_section_2')->get();
        $footer2b3list = Footer2::where('section_name','footer_2_section_3')->get();
        return view('admin.cms.footer')
            ->with('content', $content)
            ->with('footer1', $footer1)
            ->with('footerb2', $footerb2)
            ->with('footer2b1', $footer2b1)
            ->with('footer2b1list', $footer2b1list)
            ->with('footer2b2list', $footer2b2list)
            ->with('footer2b3list', $footer2b3list)
            ->with('page', 'footer');
           
    }
    
    
     public function editPage($id)
    {
        $Pages = Pages::find($id);
        return view('admin.cms.pageedit')
        			->with('Pages', $Pages)
        			->with('page', 'page')
            ->with('subpage', 'page');;
    }
    
    public function updatePage(Request $request, $id)
    {
        
        $page = Pages::find($id);
          if($request->has('page_title'))
            $page->page_title = $request->page_title;
         if($request->has('page_slug')){
         	$page->page_slug =  Str::slug($request->page_slug);
         }
            //$page->page_slug = $request->page_slug;
         if($request->has('page_content'))
            $page->page_content = $request->page_content;
        
        $page->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    
    public function pageList()
    {
        $pages = Pages::all();
       
        //$drivers = array();
        return view('admin.cms.pageList')
            ->with('pages', $pages)
            ->with('page', 'user')
            ->with('subpage', 'page');
    }
    
    public function pageDelete($id) {
    	  $Pages = Pages::find($id);
        $Pages->delete();
        return redirect()->back()->with('message', 'page has been deleted successfully.');
    }
    
    public function deletefooterLink($id) {
    	  $Footer2 = Footer2::find($id);
        $Footer2->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
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
    
    
     public function storeApplink(Request $request)
    {
        $content = Homepage::first();
        if($content)
        {
            if($request->has('andriod_app_link'))
                $content->andriod_app_link = $request->andriod_app_link;
            if($request->has('ios_app_link'))
                $content->ios_app_link = $request->ios_app_link;
            if($request->has('cdn_ios_app_image'))
                $content->cdn_ios_app_image = $request->cdn_ios_app_image;
            if($request->has('cdn_andriod_app_image'))
                $content->cdn_andriod_app_image = $request->cdn_andriod_app_image;
            
            $content->save();
        }
        else
        {
            $content = new Homepage();
            if($request->has('andriod_app_link'))
                $content->andriod_app_link = $request->andriod_app_link;
            if($request->has('ios_app_link'))
                $content->ios_app_link = $request->ios_app_link;
            if($request->has('cdn_ios_app_image'))
                $content->cdn_ios_app_image = $request->cdn_ios_app_image;
            if($request->has('cdn_andriod_app_image'))
                $content->cdn_andriod_app_image = $request->cdn_andriod_app_image;
            $content->save();
        }
        return redirect()->back()->with('message', 'App links has been saved successfully.');
    }
    
    
    
    // footer section
    public function storeFooter1(Request $request)
    {
      
        
        if($request->section_name == 'footer_1_section_2'){
        	  $content = Footers::where('section_name','footer_1_section_2')->first();
        }elseif($request->section_name == 'footer_1_section_1') {
				$content = Footers::where('section_name','footer_1_section_1')->first();
        }
        if($content)
        {
            if($request->has('heading_text'))
                $content->heading1 = $request->heading_text;
            if($request->has('subheading'))
                $content->subheading = $request->subheading;
            if($request->has('label_link'))
                $content->label_link = $request->label_link;
             if($request->has('link'))
                $content->link = $request->link;
            $content->save();
        }
        else
        {
            $content = new Footers();
         	 if($request->has('heading_text'))
                $content->heading1 = $request->heading_text;
            if($request->has('subheading'))
                $content->subheading = $request->subheading;
            if($request->has('label_link'))
                $content->label_link = $request->label_link;
             if($request->has('link'))
                $content->link = $request->link;
                
             $content->section_name = $request->section_name;
            $content->save();
        }
        return redirect()->back()->with('message', 'Details Updated successfully.');
    }
    
    
    // footer section
    public function storeFooter2(Request $request)
    {
             
        if($request->section_name == 'footer_2_section_1'){
        	  $content = Footer2::where('section_name','footer_2_section_1')->first();
        }elseif($request->section_name == 'footer_2_section_2') {
				$content = Footer2::where('section_name','footer_2_section_2')->first();
        }elseif($request->section_name == 'footer_2_section_3') {
        		$content = Footer2::where('section_name','footer_2_section_3')->first();
        }
        
       /* if($content)
        {
            if($request->has('label_link'))
                $content->label_link = $request->label_link;
             if($request->has('link'))
                $content->link = $request->link;
            $content->save();
        }
        else
        {
        	*/
            $content = new Footer2();
         	 
            if($request->has('label_link'))
                $content->label_link = $request->label_link;
             if($request->has('link'))
                $content->link = $request->link;
                
             $content->section_name = $request->section_name;
            $content->save();
        //}
        return redirect()->back()->with('message', 'Details Updated successfully.');
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
    
    public function page()
    {
        $content = Pages::first();
        return view('admin.cms.page')
            ->with('content', $content)
            ->with('page', 'terms');
    }
    
     public function storepage(Request $request)
    {
        $content = new Pages();
        
         if($request->has('page_title'))
            $content->page_title = $request->page_title;
          if($request->has('page_slug')){
         	$content->page_slug =  Str::slug($request->page_slug);
         }
         if($request->has('page_content'))
            $content->page_content = $request->page_content;
         $content->save();
       
        return redirect()->back()->with('message', 'page has been saved successfully.');
    }

    /* Header */    
    public function getHeader()
    {
        $content = Homepage::first();
        
        
        $topHeaderLink = Header::where('section_name','header_top')->get();
        $header2Left = Header::where('section_name','header_left')->get();
        $header2Right = Header::where('section_name','header_right')->get();

        return view('admin.cms.header')
            ->with('content', $content)          
            ->with('topHeaderLink', $topHeaderLink)
            ->with('header2Left', $header2Left)
            ->with('header2Right', $header2Right)
            ->with('page', 'header');
           
    }//end of fum
        
    public function storeHeaderTop(Request $request){

        $content = new Header();
        $errors['error'] = '';
        if($request->label_link == '' || $request->link == ''){
            return redirect()->back()->with('error', 'Something went wrong.');
        }
         	 
        if($request->has('label_link'))
            $content->label_link = $request->label_link;

        if($request->has('link'))
            $content->link = $request->link;
                
        $content->section_name = $request->section_name;
        $content->save();
        
        return redirect()->back()->with('message', 'Details Updated successfully.');
    }//end of fum

    public function storeHeaderLeft(Request $request){

        $content = new Header();
        $errors['error'] = '';
        if($request->label_link == '' || $request->link == ''){
            return redirect()->back()->with('error', 'Something went wrong.');
        }
         	 
        if($request->has('label_link'))
            $content->label_link = $request->label_link;

        if($request->has('link'))
            $content->link = $request->link;
        
        if($request->has('icon'))
            $content->iconClass = $request->icon;
                
        $content->section_name = $request->section_name;
        $content->save();
        
        return redirect()->back()->with('message', 'Details Updated successfully.');
    }//end of fum

    public function storeHeaderRight(Request $request){

        $content = new Header();
        $errors['error'] = '';
        if($request->label_link == '' || $request->link == ''){
            return redirect()->back()->with('error', 'Something went wrong.');
        }
         	 
        if($request->has('label_link'))
            $content->label_link = $request->label_link;

        if($request->has('link'))
            $content->link = $request->link;
                
        $content->section_name = $request->section_name;
        $content->save();
        
        return redirect()->back()->with('message', 'Details Updated successfully.');
    }//end of fum

    public function deleteHeaderLink($id) {
        $Header = Header::find($id);
        $Header->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
    
}
