<?php

namespace App\Http\Controllers\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class CharityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        return view('rider.charity');
    }
}
