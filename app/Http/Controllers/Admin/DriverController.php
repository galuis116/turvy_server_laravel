<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Driver;
use App\DriverVehicle;
use App\DriverNote;
use App\DriverRating;
use App\DriverDocument;
use App\Document;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDriver;
use App\State;
use App\VehicleMake;
use App\VehicleModel;
use App\VehicleType;
use App\DriverTransactions;
use App\Mail\DriverEmailVerification;
use App\Mail\DriverRenewalDocumentEmail;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:driver-list|driver-create|driver-edit|driver-delete', ['only' => ['driverList', 'showDriver']]);
        $this->middleware('permission:driver-create', ['only' => ['addDriver','storeDriver']]);
        $this->middleware('permission:driver-edit', ['only' => ['editDriver','updateDriver', 'approveDriver']]);
        $this->middleware('permission:driver-delete', ['only' => ['deleteDriver']]);
        $this->middleware('permission:driver-note-delete', ['only' => ['deleteNote']]);
    }
    public function driverList()
    {
        $drivers = Driver::all();
        foreach($drivers as $k => $item){
            $grantAmt = 0;
            $transactions = DriverTransactions::where('driver_id',$item['id'])->where('pay_type', '<>', 'withdraw')->get();
            foreach($transactions as $t){
                $grantAmt += $t->amount;
                if($t->tip_amount)
                    $grantAmt += $t->tip_amount;
            }
            $grantAmt = number_format($grantAmt,2);
            $grantAmt = '$'.$grantAmt;
            $drivers[$k]['grandtotal'] = $grantAmt;
        }

        return view('admin.driver.index')
            ->with('drivers', $drivers)
            ->with('page', 'user')
            ->with('subpage', 'driver');
    }
    public function addDriver()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        $makes = VehicleMake::where('status', 1)->get();
        $models = VehicleModel::where('status', 1)->get();
        $servicetypes = VehicleType::where('status', 1)->get();
        return view('admin.driver.add')
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('makes', $makes)
            ->with('models', $models)
            ->with('servicetypes', $servicetypes)
            ->with('page', 'user')
            ->with('subpage', 'driver');
    }
    public function storeDriver(StoreDriver $request)
    {
        $request->validated();
        $driver = new Driver();
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->email = $request->email;
        $driver->mobile = $request->phonecode.$request->mobile;
        $driver->gender = $request->gender;
        $driver->password = bcrypt('driver123');
        if($request->has('commission'))
            $driver->commission = $request->commission;
        if($request->has('abn'))
            $driver->abn = $request->abn;
        $driver->country_id = $request->country_id;
        $driver->state_id = $request->state_id;
        $driver->city_id = $request->city_id;
        if($request->hasFile('avatar'))
            $driver->avatar = upload_file($request->file('avatar'), 'user/driver');
        if($request->has('cdnimageVehicel'))
         $driver->cdnimageVehicel = $request->cdnimageVehicel;
        if($request->has('cdnimage'))
         $driver->cdnimage = $request->cdnimage;
        $driver->save();

        $vehicle = new DriverVehicle();
        $vehicle->driver_id = $driver->id;
        $vehicle->make_id = $request->make_id;
        $vehicle->model_id = $request->model_id;
        $vehicle->servicetype_id = $request->servicetype_id;
        $vehicle->plate = $request->plate;
        $vehicle->color = $request->color;
        $vehicle->year = $request->year;
        if($request->hasFile('front_photo'))
            $vehicle->front_photo = upload_file($request->file('front_photo'), 'user/driver');
        $vehicle->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function storeNote(Request $request, $id){
        $driver_id = $id;
        $admin_id = Auth::guard('admin')->user()->id;
        if($request->has('note')){
            $note = new DriverNote();
            $note->admin_id = $admin_id;
            $note->driver_id = $driver_id;
            $note->note = $request->note;
            $note->save();
        }
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function deleteNote(Request $request, $id){
        DriverNote::destroy($id);
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
    public function showDriver($id)
    {
        $driver = Driver::find($id);
        $driver_vehicle = DriverVehicle::where('driver_id', $id)->first();
        $driver_notes = DriverNote::where('driver_id', $id)->get();
        $driver_ratings = DriverRating::where('driver_id', $id)->get();
        $driver_documents = DriverDocument::where('driver_id', $id)->get();
        return view('admin.driver.show')
            ->with('driver', $driver)
            ->with('driver_vehicle', $driver_vehicle)
            ->with('driver_notes', $driver_notes)
            ->with('driver_ratings', $driver_ratings)
            ->with('driver_documents', $driver_documents)
            ->with('page', 'user')
            ->with('subpage', 'driver');
    }
    public function editDriver($id)
    {
        $driver = Driver::find($id);
        $driver_vehicle = DriverVehicle::where('driver_id', $id)->first();

        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        $makes = VehicleMake::where('status', 1)->get();
        $models = VehicleModel::where('status', 1)->get();
        $servicetypes = VehicleType::where('status', 1)->get();

        return view('admin.driver.add')
            ->with('driver', $driver)
            ->with('driver_vehicle', $driver_vehicle)
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('makes', $makes)
            ->with('models', $models)
            ->with('servicetypes', $servicetypes)
            ->with('page', 'user')
            ->with('subpage', 'driver');
    }

    public function TransactionDriver($id)
    {
        $driver = Driver::find($id);

        $page = 1;
        $items_per_page = 10;
        $offset = ($page - 1) * $items_per_page;

        $transactions = DriverTransactions::select('driver_transactions.*',
            'users.first_name',
            'users.last_name')->where('driver_id',$id)
            ->leftJoin('users', 'users.id', '=', 'driver_transactions.rider_id')

        ->where('driver_transactions.status','active')
        ->orderBy('driver_transactions.id', 'DESC')
        ->get();
        $grantAmt = 0;
        foreach($transactions as $k => $item){
            $transactions[$k]['isPositive'] = ($item['amount'] > 0) ? 'Yes' : 'No';
            $transactions[$k]['transactionDate'] = date('d/m/Y h:i A',strtotime($item['created_at']));
            $transactions[$k]['amount'] = ($item['amount'] + $item['tip_amount']);
            $transactions[$k]['amount'] = number_format($transactions[$k]['amount'],2);
            $transactions[$k]['amount'] = ($transactions[$k]['amount'] > 0) ? 'A$'.$transactions[$k]['amount'] : str_replace('-', '-A$', $transactions[$k]['amount']);

           $transactions[$k]['pay_type'] = $this->getTransactionText($item['pay_type']);
        }

        return view('admin.driver.transactions')
            ->with('driver', $driver)
            ->with('page', 'user')
            ->with('subpage', 'driver')
            ->with('transactions',$transactions);
    }

    public function getTransactionText($str){
        switch ($str) {
            case 'trip':
                return 'You completed trip';
                break;
            case 'tip':
                return 'Rider give you tip';
                break;
            case 'self_cancel':
                return 'You cancelled trip';
                break;
            case 'rider_cancel':
                return 'Trip cancelled by rider.';
                break;
             case 'withdraw':
                return 'Amount withdraw';
                break;
        }
    }

    public function updateDriver(StoreDriver $request, $id)
    {
        $request->validated();
        $driver = Driver::find($id);
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->email = $request->email;
        $driver->mobile = $request->phonecode.$request->mobile;
        $driver->gender = $request->gender;
        $driver->password = bcrypt('driver123');
        if($request->has('commission'))
            $driver->commission = $request->commission;
        if($request->has('abn'))
            $driver->abn = $request->abn;
        $driver->country_id = $request->country_id;
        $driver->state_id = $request->state_id;
        $driver->city_id = $request->city_id;
        if($request->hasFile('avatar'))
            $driver->avatar = upload_file($request->file('avatar'), 'user/driver');
        $driver->save();

        $vehicle = DriverVehicle::where('driver_id', $id)->first();
        $vehicle->make_id = $request->make_id;
        $vehicle->model_id = $request->model_id;
        $vehicle->servicetype_id = implode(",", $request->servicetypeIDs);
        $vehicle->plate = $request->plate;
        $vehicle->color = $request->color;
        $vehicle->year = $request->year;
        if($request->hasFile('front_photo'))
            $vehicle->front_photo = upload_file($request->file('front_photo'), 'user/driver');
        $vehicle->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function approveDriver($id)
    {
        $driver = Driver::find($id);
        $driver->is_approved = !$driver->is_approved;
        $driver->save();
        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function approveDriverDocument($id)
    {
        $document = DriverDocument::find($id);
        $document->status = !$document->status;
        $document->save();
        return redirect()->back()->with('message', 'It has been changed successfully.')
        ->with('activeTab', 'documents');
    }
    public function updateExpiredateDriverDocument(Request $request, $id)
    {
        $document = DriverDocument::find($id);
        if($request->has('document_expiredate')){
            $time = strtotime($request->get('document_expiredate'));
            $newformat = date('Y-m-d',$time);
            $document->expiredate = $newformat;
        }
        $document->save();
        return redirect()->back()->with('message', 'It has done successfully')->with('activeTab', 'documents');
    } 
    public function editDriverDocument($id)
    {   
        $driver_document = DriverDocument::find($id);
        $document = Document::find($driver_document->document_id);

        $result['document_name'] = $document->name;
        $result['document_id'] =  $driver_document->document_id;
        if($driver_document){
            $result['document_url'] = $driver_document->document_url;
            $result['document_expire_date'] = $driver_document->expiredate;
            $result['document_status'] = $driver_document->status;
        }else{
            $result['document_url'] = '';
            $result['document_expire_date'] = '';
        }
        return view('admin.driver.edit_document')->with('document', $result)->with('page', 'document')->with('subpage', 'document');
    }
    public function sendRenewalEmailDriverDocument(Request $request)
    {
        $documentId = $request->input('document_id');
        $driverId = $request->input('driver_id');
        $driver_document = DriverDocument::find($documentId);
        $document = Document::find($driver_document->document_id);
        $driver = Driver::find($driverId);

        Cache::forget('sec_key');
        try {
            Mail::to($driver->email)->send(new DriverRenewalDocumentEmail($document, $driver_document->expiredate));
        } catch (Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Renewal Driver Document Email has been sent',
        ]); 
    }
    public function activeDriver($id)
    {
        $driver = Driver::find($id);
        $socket = $this->getPusherSocket();
        $data['id'] = $driver->id;
        $data['status'] = $driver->is_active == 1 ? 'blocked' : 'activated';
        $socket->trigger('turvy-channel', 'admin_block_driver', $data);

        $driver->is_active = !$driver->is_active;
        $driver->save();
        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function suspendDriver($id)
    {
        $driver = Driver::find($id);
        $socket = $this->getPusherSocket();
        $data['id'] = $driver->id;
        $data['status'] = $driver->is_suspended == 1 ? 'resume' : 'suspend';
        $socket->trigger('turvy-channel', 'admin_suspend_driver', $data);

        $driver->is_suspended = !$driver->is_suspended;
        $driver->save();
        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteDriver($id)
    {
        $driver = Driver::find($id);
        remove_file($driver->avatar);
        $driver->delete();
        return redirect()->back()->with('message', 'It has been changed successfully.');

        $vehicle = DriverVehicle::where('driver_id', $id)->first();
        remove_file($vehicle->front_photo);
        $vehicle->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function paytoDriver($id)
    {
        $driver = Driver::find($id);
        $transactionsInfo = DriverTransactions::where('driver_id',$id)
        ->where('status','active')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->first();

        //$grantAmt = number_format($grantAmt,2);
        $grantAmt = number_format($transactionsInfo->total_amount,2);

        $grantAmt = ($grantAmt > 0) ? '$'.$grantAmt : str_replace('-', '-$', $grantAmt);

        return view('admin.driver.payToDriver')
            ->with('driver', $driver)
            ->with('grantAmt', $grantAmt)
            ->with('page', 'user')
            ->with('subpage', 'driver');
    }

   public function savePaytoDriver(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if($validated){
            if( isset($data['id']) && $data['id'] > 0){
            $id = $data['id'];
            $transactionsInfo = DriverTransactions::where('driver_id',$id)
            ->where('status','active')
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->first();

            $grantAmt = $transactionsInfo->total_amount;
            $newamount = (float)$grantAmt - (float)$data['amount'];
            $DriverTransactions = new DriverTransactions();
            $DriverTransactions->driver_id = $data['id'];
            $DriverTransactions->total_amount = $newamount;
            $DriverTransactions->amount = $data['amount'];
            $DriverTransactions->pay_type = 'withdraw';
            $DriverTransactions->status = 'active';
            $DriverTransactions->created_at = date('Y-m-d H:i:s');
            $DriverTransactions->updated_at = date('Y-m-d H:i:s');
            $DriverTransactions->save();
        }


        return redirect()->back()->with('message', 'Amount been saved successfully.');
        }
    }

    function getPusherSocket(){
        //require '/home/turvy.net/public_html/public/pusher/vendor/autoload.php';
        require base_path() .'/public/pusher/vendor/autoload.php';

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            '389d667a3d4a50dc91a6', //APP_KEY
            'e1f2e0266903857072be', //APP_SECRET
            '1309578', //APP_ID
            $options
        );

        return $pusher;
    }//end of fun

}
