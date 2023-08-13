<?php

namespace App\Http\Controllers\Admin;

use App\DriverRating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RiderRating;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:driverrating-list|driverrating-approve', ['only' => ['driver']]);
        $this->middleware('permission:driverrating-approve', ['only' => ['driverChangeStatus']]);
        $this->middleware('permission:riderrating-list|riderrating-approve', ['only' => ['rider']]);
        $this->middleware('permission:riderrating-approve', ['only' => ['riderChangeStatus']]);
    }
    public function driver()
    {
        $ratings = DriverRating::all();
        return view('admin.rating.index')
            ->with('ratings', $ratings)
            ->with('page', 'rating')
            ->with('subpage', 'driver');
    }
    public function driverChangeStatus($id)
    {
        $rating = DriverRating::find($id);
        $rating->status = !$rating->status;
        $rating->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function driverChangeRating($id)
    {
        $rating = DriverRating::find($id);
        return view('admin.rating.edit')
            ->with('rating', $rating)
            ->with('page', 'rating')
            ->with('subpage', 'driver');
    }
    public function driverUpdateRating(Request $request, $id)
    {
        $rating = DriverRating::find($id);
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;
        $rating->que = $request->que;
        $rating->save();
        
        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function rider()
    {
        $ratings = RiderRating::all();
        return view('admin.rating.index')
            ->with('ratings', $ratings)
            ->with('page', 'rating')
            ->with('subpage', 'rider');
    }
    public function riderChangeStatus($id)
    {
        $rating = RiderRating::find($id);
        $rating->status = !$rating->status;
        $rating->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function riderChangeRating($id)
    {
        $rating = RiderRating::find($id);
        return view('admin.rating.edit')
            ->with('rating', $rating)
            ->with('page', 'rating')
            ->with('subpage', 'rider');

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function riderUpdateRating(Request $request, $id)
    {
        $rating = RiderRating::find($id);
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;
        $rating->que = $request->que;
        $rating->save();
        
        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
}
