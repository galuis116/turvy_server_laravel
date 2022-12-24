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
            	 $data = array();
            	 $data['title'] = $request->heading;
            	 $data['desc_body'] = $request->content;
            	 $data['url'] = $request->url;
            	 $data['image'] = $noti->image;
            	 
            	 $driverslist = Driver::pluck('device_token')->toArray();
            	 $this->sendpush_notification($data,$driverslist);
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
            	 $data = array();
            	 $data['title'] = $request->heading;
            	 $data['desc_body'] = $request->content;
            	 $data['url'] = $request->url;
            	 $data['image'] = $noti->image;
            	 
            	 $driverslist = Driver::pluck('device_token')->toArray();
            	 $this->sendpush_notification($data,$driverslist);

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
            	  
            	 $data = array();
            	 $data['title'] = $request->heading;
            	 $data['desc_body'] = $request->content;
            	 $data['url'] = $request->url;
            	 $data['image'] = $noti->image;
            	 
            	 $driverslist = Driver::pluck('device_token')->toArray();
            	 $this->sendpush_notification($data,$driverslist);

                return back()->with('flash_success', 'Notification Added Successfuly');
            }else{
                return back()->with('flash_error', 'Error');
            }
        }
    }
    
    public function sendpush_notification($data,$driverslist){
    
	    $notification = array(
	        'priority' => 1,
	        'forceShow' => true, 
	        'title' => $data['title'],
	        'body' => $data['desc_body'],
	        'sound' => 'default',      
	        'badge' => '1',
	        "image" => $data['image'],
	    );

        $data = array(
            'title' => $data['title'],
            'body' => $data['desc_body'],
            'showBadge' => 1,
        );
	    
	    
	    $fields = array(
	        'registration_ids' => $driverslist,
	         'notification' => $notification,
             'data' => $data,
	    );
	
	    $json = json_encode($fields);
	    
	    define('FIREBASE_SERVER_KEY', 'AAAAljjxk68:APA91bG7pN7o12_vzPglObOFi64smER2mm-HTj6LVgBQ149RCCpFAshSW-f24c2Iu8i6FEFDHiF80nzV8FMcIrGNbIEj4_Ngw6C3O48lpzRKlg419yUB1XgJLQuOIPC8V-kkEpmg2et2');

		 $url = 'https://fcm.googleapis.com/fcm/send';

	    //building headers for the request
	    $headers = array(
	        'Authorization: key=' . FIREBASE_SERVER_KEY,
	        'Content-Type: application/json'
	    );
	
	    //Initializing curl to open a connection
	    $ch = curl_init();
	
	    //Setting the curl url
	    curl_setopt($ch, CURLOPT_URL, $url);
	    
	    //setting the method as post
	    curl_setopt($ch, CURLOPT_POST, true);
	
	    //adding headers 
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	    //disabling ssl support
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    
	    //adding the fields in json format 
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	
	    //finally executing the curl request 
	    $result = curl_exec($ch);
	    if ($result === FALSE) {
	        die('Curl failed: ' . curl_error($ch));
	    }
	
	    //Now close the connection
	    curl_close($ch);
	        
    }  // end of function
}
