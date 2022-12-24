<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Driver;
use App\DriverVehicle;
use App\DriverNote;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDriver;
use App\State;
use App\VehicleMake;
use App\VehicleModel;
use App\VehicleType;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;

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
        return view('admin.driver.show')
            ->with('driver', $driver)
            ->with('driver_vehicle', $driver_vehicle)
            ->with('driver_notes', $driver_notes)
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
}
