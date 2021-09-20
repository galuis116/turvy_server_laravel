<?php

namespace App\Http\Controllers\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

class RateCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        $states = State::all();
        return view('rider.ratecard')->with('states', $states);
    }
}
