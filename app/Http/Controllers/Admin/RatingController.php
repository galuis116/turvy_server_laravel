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
        $this->middleware('permission:driverrating-apporve', ['only' => ['driverChangeStatus']]);
        $this->middleware('permission:riderrating-list|riderrating-approve', ['only' => ['rider']]);
        $this->middleware('permission:riderrating-delete', ['only' => ['riderChangeStatus']]);
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
}
