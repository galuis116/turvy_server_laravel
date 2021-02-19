<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\User;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:notification-list|notification-create', ['only' => ['index']]);
        $this->middleware('permission:notification-create', ['only' => ['store']]);
    }
    public function index()
    {
        $cities = City::all();
        return view('admin.notification.index')
            ->with('cities', $cities)
            ->with('page', 'notification');
    }
    public function store(Request $request)
    {
        $noti = new Notification();
        if($request->type ==1){
            $noti->heading = $request->heading;
            $noti->content = $request->content;
            if($request->has('url')){
                $noti->url = $request->url;
            }
            if($request->file('image')) {
                $noti->image = upload_file($request->file('image'), 'notification');
            }
            $noti->type = 1;
            if($request->receiver == 'rider'){
                $noti->user_type = 1;
                $users = User::pluck('id')->toArray();
                $noti->receiver_ids = implode(',', $users);
            }else{
                $noti->user_type = 2;
                $drivers = Driver::pluck('id')->toArray();
                $noti->receiver_ids = implode(',', $drivers);
            }
            if($noti->save()){
                return back()->with('message', 'Notification Added Successfuly');
            }else{
                return back()->withError('Error');
            }
        }elseif($request->type ==2){
            $noti->heading = $request->heading;
            $noti->content = $request->content;
            if($request->has('url')){
                $noti->url = $request->url;
            }
            if($request->file('image')) {
                $noti->image = upload_file($request->file('image'), 'notification');
            }
            $noti->type = 2;
            $noti->user_type = 2;
            $drivers = Driver::where('city_id', $request->city_id)->pluck('id')->toArray();
            $noti->receiver_ids = implode(',', $drivers);
            if($noti->save()){
                return back()->with('flash_success', 'Notification Added Successfuly');
            }else{
                return back()->with('flash_error', 'Error');
            }
        }elseif($request->type ==3){
            $noti->heading = $request->heading;
            $noti->content = $request->content;
            if($request->has('url')){
                $noti->url = $request->url;
            }
            if($request->file('image')) {
                $noti->image = upload_file($request->file('image'), 'notification');
            }
            $noti->type = 3;
            $noti->user_type = $request->user_type;
            $noti->receiver_ids = $request->receiver;
            if($noti->save()){
                return back()->with('flash_success', 'Notification Added Successfuly');
            }else{
                return back()->with('flash_error', 'Error');
            }
        }
    }
}
