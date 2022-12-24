<?php

namespace App\Http\Controllers\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentRequest;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function index()
    {
        //$payments = PaymentRequest::where('rider_id', Auth::guard('rider')->user()->id)->get();
        $rider_id = Auth::guard('rider')->user()->id;
        $notifications = Notification::select('*')->where('user_type', 1)
        ->whereRaw('FIND_IN_SET("'.$rider_id.'",receiver_ids)')
        ->orderBy('id', 'DESC')
        ->get();
 
		/*
		->offset($offset)
        ->limit($items_per_page)
		*/
        foreach($notifications as $k => $item){
          $notifications[$k]['notifyDate'] = date('m/d/Y g:i A',strtotime($item['created_at']));
        }
        return view('rider.messages')->with('notifications', $notifications);
    }
}
