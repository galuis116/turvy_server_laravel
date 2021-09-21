<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ABNController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver');
    }
    public function index()
    {
        return view('driver.abn');
    }
    public function store(Request $request){
        $abn = $request->get('abn');
        $driver = Auth::guard('driver')->user();
        $driver->abn = $abn;
        $driver->save();
        return redirect()->back()->with('message', 'It has been done successfully');
    }
}
