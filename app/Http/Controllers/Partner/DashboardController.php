<?php

namespace App\Http\Controllers\Partner;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    public function index()
    {
        return redirect()->route('partner.profile');
    }
}
