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
use App\Pages;

class PageController extends Controller
{
	
	public function show($slug = 'home')
    {
        $page = Pages::where('page_slug',$slug)->first();
        return view('page')->with('page', $page);
    }
}
