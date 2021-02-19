<?php

namespace App\Http\Controllers\Driver;

use App\DriverVehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VehicleMake;
use App\VehicleModel;
use Validator;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    
    public function index()
    {
        $makes = VehicleMake::where('status', 1)->get();
        $models = VehicleModel::where('status', 1)->get();
        $vehicle = DriverVehicle::where('driver_id', Auth::guard('driver')->user()->id)->first();
        return view('driver.vehicle', compact('makes', 'models', 'vehicle'));
    }
    public function store(Request $request){
        $driver = Auth::guard('driver')->user();
        if(DriverVehicle::where('driver_id', $driver->id)->count() > 0){
            $vehicle = DriverVehicle::where('driver_id', $driver->id)->first();
        }else{
            $vehicle = new DriverVehicle();
        }

        $vehicle->driver_id = $driver->id;
        $vehicle->make_id = $request->get('make_id');
        $vehicle->model_id = $request->get('model_id');
        $vehicle->year = $request->get('year');
        $vehicle->plate = $request->get('plate');
        if($request->has('color')){
            $vehicle->color = $request->get('color');
        }
        if($request->hasFile('vehicle_image')){
            $vehicle->front_photo = upload_file($request->file('vehicle_image'), 'user/driver');
        }

        $vehicle->save();
        return redirect()->back()->with('message', 'It has been done successfully');
    }
}
