<?php

namespace App\Http\Controllers\Admin;

use App\Cancelreason;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCancelreason;
use App\Http\Requests\StoreRiderCancelreason;
use App\RiderCancelreason;

class CancelreasonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:cancelreason-list|cancelreason-create|cancelreason-edit|cancelreason-delete', ['only' => ['index', 'indexDriver']]);
        $this->middleware('permission:cancelreason-create', ['only' => ['add','store', 'addDriver', 'addStore']]);
        $this->middleware('permission:cancelreason-edit', ['only' => ['edit','update', 'editDriver', 'updateDriver']]);
        $this->middleware('permission:cancelreason-delete', ['only' => ['delete', 'deleteDriver']]);
    }
    public function index()
    {
        $reasons = RiderCancelreason::all();
        return view('admin.cancelreason.rider.index')
            ->with('reasons', $reasons)
            ->with('page', 'cancelreason')
            ->with('subpage', 'rider-cancelreason');
    }
    public function add()
    {
        return view('admin.cancelreason.rider.add')
            ->with('page', 'cancelreason')
            ->with('subpage', 'rider-cancelreason');
    }
    public function store(StoreRiderCancelreason $request)
    {
        $request->validated();
        $reason = new RiderCancelreason();
        $reason->reason = $request->reason;
        $reason->fee = $request->fee;
        $reason->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function edit($id)
    {
        $reason = RiderCancelreason::find($id);
        return view('admin.cancelreason.rider.add')
            ->with('reason', $reason)
            ->with('page', 'cancelreason')
            ->with('subpage', 'rider-cancelreason');
    }
    public function update(StoreRiderCancelreason $request, $id)
    {
        $request->validated();
        $reason = RiderCancelreason::find($id);
        $reason->reason = $request->reason;
        $reason->fee = $request->fee;
        $reason->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function delete($id)
    {
        $reason = RiderCancelreason::find($id);
        $reason->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function indexDriver()
    {
        $reasons = Cancelreason::all();
        return view('admin.cancelreason.driver.index')
            ->with('reasons', $reasons)
            ->with('page', 'cancelreason')
            ->with('subpage', 'driver-cancelreason');
    }
    public function addDriver()
    {
        return view('admin.cancelreason.driver.add')
            ->with('page', 'cancelreason')
            ->with('subpage', 'driver-cancelreason');
    }
    public function storeDriver(StoreCancelreason $request)
    {
        $request->validated();
        $reason = new Cancelreason();
        $reason->reason = $request->reason;
        $reason->fee = $request->fee;
        $reason->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editDriver($id)
    {
        $reason = Cancelreason::find($id);
        return view('admin.cancelreason.driver.add')
            ->with('reason', $reason)
            ->with('page', 'cancelreason')
            ->with('subpage', 'driver-cancelreason');
    }
    public function updateDriver(StoreCancelreason $request, $id)
    {
        $request->validated();
        $reason = Cancelreason::find($id);
        $reason->reason = $request->reason;
        $reason->fee = $request->fee;
        $reason->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deleteDriver($id)
    {
        $reason = Cancelreason::find($id);
        $reason->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
