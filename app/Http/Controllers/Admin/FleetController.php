<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreVehicleMake;
use App\Http\Requests\StoreVehicleModel;
use App\Http\Requests\StoreVehicleType;
use App\VehicleMake;
use App\VehicleModel;
use App\VehicleType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRideType;
use App\VehicleRideType;

class FleetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:vehiclemake-list|vehiclemake-create|vehiclemake-edit|vehiclemake-delete', ['only' => ['makeList']]);
        $this->middleware('permission:vehiclemake-create', ['only' => ['addMake','storeMake']]);
        $this->middleware('permission:vehiclemake-edit', ['only' => ['editMake','updateMake', 'activeMake']]);
        $this->middleware('permission:vehiclemake-delete', ['only' => ['deleteMake']]);

        $this->middleware('permission:vehiclemodel-list|vehiclemodel-create|vehiclemodel-edit|vehiclemodel-delete', ['only' => ['modelList']]);
        $this->middleware('permission:vehiclemodel-create', ['only' => ['addModel','storeModel']]);
        $this->middleware('permission:vehiclemodel-edit', ['only' => ['editModel','updateModel', 'activeModel']]);
        $this->middleware('permission:vehiclemodel-delete', ['only' => ['deleteModel']]);

        $this->middleware('permission:vehicletype-list|vehicletype-create|vehicletype-edit|vehicletype-delete', ['only' => ['serviceTypeList']]);
        $this->middleware('permission:vehicletype-create', ['only' => ['addServiceType','storeServiceType']]);
        $this->middleware('permission:vehicletype-edit', ['only' => ['editServiceType','updateServiceType', 'activeServiceType']]);
        $this->middleware('permission:vehicletype-delete', ['only' => ['deleteServiceType']]);
        
        $this->middleware('permission:ridetype-list|ridetype-create|ridetype-edit|ridetype-delete', ['only' => ['rideTypeList']]);
        $this->middleware('permission:ridetype-create', ['only' => ['addRideType','storeRideType']]);
        $this->middleware('permission:ridetype-edit', ['only' => ['editRideType','updateRideType', 'activeRideType']]);
        $this->middleware('permission:ridetype-delete', ['only' => ['deleteRideType']]);
    }
    public function makeList()
    {
        $vehicleMakes = VehicleMake::orderBy('name')->get();
        return view('admin.vehicleMake.index')->with('vehicleMakes', $vehicleMakes)->with('page', 'fleet')->with('subpage', 'make');
    }
    public function addMake()
    {
        return view('admin.vehicleMake.add')->with('page', 'fleet')->with('subpage', 'make');
    }
    public function storeMake(StoreVehicleMake $request)
    {
        $request->validated();
        $make = new VehicleMake();
        $make->name = $request->name;
        $make->image = upload_file($request->file('image'), 'vehicle/makes');
        $make->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editMake($id)
    {
        $vehicleMake = VehicleMake::find($id);
        return view('admin.vehicleMake.add')->with('vehicleMake', $vehicleMake)->with('page', 'fleet')->with('subpage', 'make');
    }
    public function updateMake(StoreVehicleMake $request, $id)
    {
        $request->validated();
        $make = VehicleMake::find($id);
        $make->name = $request->name;
        if($request->hasFile('image'))
            $make->image = upload_file($request->file('image'), 'vehicle/makes');
        $make->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeMake($id)
    {
        $make = VehicleMake::find($id);
        $make->status = !$make->status;
        $make->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteMake($id)
    {
        $make = VehicleMake::find($id);
        remove_file($make->image);
        $make->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function modelList()
    {
        $vehicleModels = VehicleModel::orderBy('name')->get();
        return view('admin.vehicleModel.index')
            ->with('vehicleModels', $vehicleModels)
            ->with('page', 'fleet')
            ->with('subpage', 'model');
    }
    public function addModel()
    {
        $servicetypes = VehicleType::where('status', 1)->get();
        $vehicleMakes = VehicleMake::where('status', 1)->orderBy('name')->get();
        return view('admin.vehicleModel.add')
            ->with('vehicleMakes', $vehicleMakes)
            ->with('servicetypes', $servicetypes)
            ->with('page', 'fleet')
            ->with('subpage', 'model');
    }
    public function storeModel(StoreVehicleModel $request)
    {
        $request->validated();
        $model = new VehicleModel();
        $model->name = $request->name;
        $model->servicetype_id = $request->servicetype_id;
        $model->make_id = $request->make_id;
        $model->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editModel($id)
    {
        $vehicleMakes = VehicleMake::where('status', 1)->orderBy('name')->get();
        $servicetypes = VehicleType::where('status', 1)->get();
        $vehicleModel = VehicleModel::find($id);
        return view('admin.vehicleModel.add')
            ->with('servicetypes', $servicetypes)
            ->with('vehicleMakes', $vehicleMakes)
            ->with('vehicleModel', $vehicleModel)
            ->with('page', 'fleet')->with('subpage', 'model');
    }
    public function updateModel(StoreVehicleModel $request, $id)
    {
        $request->validated();
        $model = VehicleModel::find($id);
        $model->name = $request->name;
        $model->make_id = $request->make_id;
        $model->servicetype_id = $request->servicetype_id;
        $model->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeModel($id)
    {
        $model = VehicleModel::find($id);
        $model->status = !$model->status;
        $model->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteModel($id)
    {
        $model = VehicleModel::find($id);
        remove_file($model->image);
        $model->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function serviceTypeList()
    {
        $vehicleTypes = VehicleType::all();
        return view('admin.vehicleType.index')
            ->with('vehicleTypes', $vehicleTypes)
            ->with('page', 'fleet')
            ->with('subpage', 'serviceType');
    }
    public function addServiceType()
    {
        return view('admin.vehicleType.add')->with('page', 'fleet')->with('subpage', 'serviceType');
    }
    public function storeServiceType(StoreVehicleType $request)
    {
        $request->validated();
        $type = new VehicleType();
        $type->name = $request->name;
        if($request->has('description'))
            $type->description = $request->description;
        if($request->hasFile('image'))
            $type->image = upload_file($request->file('image'), 'vehicle/types');
        $type->number_seat = $request->number_seat;
        $type->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editServiceType($id)
    {
        $vehicleType = VehicleType::find($id);
        return view('admin.vehicleType.add')
            ->with('vehicleType', $vehicleType)
            ->with('page', 'fleet')
            ->with('subpage', 'serviceType');
    }
    public function updateServiceType(StoreVehicleType $request, $id)
    {
        $request->validated();
        $type = VehicleType::find($id);
        $type->name = $request->name;
        if($request->has('description'))
            $type->description = $request->description;
        if($request->hasFile('image'))
            $type->image = upload_file($request->file('image'), 'vehicle/types');
        $type->number_seat = $request->number_seat;
        $type->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeServiceType($id)
    {
        $type = VehicleType::find($id);
        $type->status = !$type->status;
        $type->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteServiceType($id)
    {
        $type = VehicleType::find($id);
        $type->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
    public function rideTypeList()
    {
        $vehicleRideTypes = VehicleRideType::all();
        return view('admin.vehicleRideType.index')->with('vehicleRideTypes', $vehicleRideTypes)->with('page', 'fleet')->with('subpage', 'rideType');
    }
    public function addRideType()
    {
        $vehicleServiceTypes = VehicleType::where('status', 1)->get();
        return view('admin.vehicleRideType.add')->with('vehicleServiceTypes', $vehicleServiceTypes)->with('page', 'fleet')->with('subpage', 'rideType');
    }
    public function storeRideType(StoreVehicleRideType $request)
    {
        $request->validated();
        $type = new VehicleRideType();
        $type->name = $request->name;
        $type->serviceType_id = $request->serviceType_id;
        $type->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editRideType($id)
    {
        $vehicleServiceTypes = VehicleType::where('status', 1)->get();
        $vehicleRideType = VehicleRideType::find($id);
        return view('admin.vehicleRideType.add')->with('vehicleServiceTypes', $vehicleServiceTypes)->with('vehicleRideType', $vehicleRideType)->with('page', 'fleet')->with('subpage', 'rideType');
    }
    public function updateRideType(StoreVehicleRIdeType $request, $id)
    {
        $request->validated();
        $type = VehicleRideType::find($id);
        $type->name = $request->name;
        $type->serviceType_id = $request->serviceType_id;
        $type->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeRideType($id)
    {
        $type = VehicleRideType::find($id);
        $type->status = !$type->status;
        $type->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteRideType($id)
    {
        $type = VehicleRideType::find($id);
        $type->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
