<?php

namespace App\Http\Controllers\Admin;

use App\Fare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFare;
use App\Http\Requests\StoreNighttime;
use App\Http\Requests\StorePeaktime;
use App\Nighttime;
use App\Peaktime;
use App\State;
use App\VehicleType;

class ChargeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:charge-list|charge-create|charge-edit|charge-delete', ['only' => ['fareList']]);
        $this->middleware('permission:charge-create', ['only' => ['addFare','storeFare']]);
        $this->middleware('permission:charge-edit', ['only' => ['editFare','updateFare']]);
        $this->middleware('permission:charge-delete', ['only' => ['deleteFare']]);

        $this->middleware('permission:peaktime-list|peaktime-create|peaktime-edit|peaktime-delete', ['only' => ['peaktimeList']]);
        $this->middleware('permission:peaktime-create', ['only' => ['addPeaktime','storePeaktime']]);
        $this->middleware('permission:peaktime-edit', ['only' => ['editPeaktime','updatePeaktime']]);
        $this->middleware('permission:peaktime-delete', ['only' => ['deletePeaktime']]);

        $this->middleware('permission:nighttime-list|nighttime-create|nighttime-edit|nighttime-delete', ['only' => ['nighttimeList']]);
        $this->middleware('permission:nighttime-create', ['only' => ['addNighttime','storeNighttime']]);
        $this->middleware('permission:nighttime-edit', ['only' => ['editNighttime','updateNighttime']]);
        $this->middleware('permission:nighttime-delete', ['only' => ['deleteNighttime']]);
    }
    public function fareList()
    {
        $fares = Fare::all();
        return view('admin.fare.index')
            ->with('fares', $fares)
            ->with('page', 'charge')
            ->with('subpage', 'fare');
    }
    public function addFare()
    {
        $serviceTypes = VehicleType::where('status', 1)->get();
        $states = State::all();
        return view('admin.fare.add')
            ->with('serviceTypes', $serviceTypes)
            ->with('states', $states)
            ->with('page', 'charge')
            ->with('subpage', 'fare');
    }
    public function storeFare(StoreFare $request)
    {
        $request->validated();
        $fare = new Fare();
        $fare->state_id = $request->state_id;
        $fare->servicetype_id = $request->servicetype_id;
        $fare->company_commission = $request->company_commission;
        $fare->base_ride_distance = $request->base_ride_distance;
        $fare->base_ride_distance_charge = $request->base_ride_distance_charge;
        $fare->price_per_unit = $request->price_per_unit;
        $fare->fee_waiting_time = $request->fee_waiting_time;
        $fare->waiting_price_per_minute = $request->waiting_price_per_minute;
        $fare->gst_charge = $request->gst_charge;
        $fare->fuel_surge_charge = $request->fuel_surge_charge;
        $fare->nsw_gtl_charge = $request->nsw_gtl_charge;
        $fare->nsw_ctp_charge = $request->nsw_ctp_charge;
        $fare->booking_charge = $request->booking_charge;
        $fare->cancel_charge = $request->cancel_charge;
        $fare->free_ride_minute = $request->free_ride_minute;
        $fare->price_per_ride_minute = $request->price_per_ride_minute;
        if($request->has('pet_charge'))
            $fare->pet_charge = $request->pet_charge;
        if($request->has('baby_seat_charge'))
            $fare->baby_seat_charge = $request->baby_seat_charge;
        $fare->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editFare($id)
    {
        $serviceTypes = VehicleType::where('status', 1)->get();
        $states = State::all();
        $fare = Fare::find($id);
        return view('admin.fare.add')
            ->with('serviceTypes', $serviceTypes)
            ->with('states', $states)
            ->with('fare', $fare)
            ->with('page', 'charge')
            ->with('subpage', 'fare');
    }
    public function updateFare(StoreFare $request, $id)
    {
        $request->validated();
        $fare = Fare::find($id);
        $fare->state_id = $request->state_id;
        $fare->servicetype_id = $request->servicetype_id;
        $fare->company_commission = $request->company_commission;
        $fare->base_ride_distance = $request->base_ride_distance;
        $fare->base_ride_distance_charge = $request->base_ride_distance_charge;
        $fare->price_per_unit = $request->price_per_unit;
        $fare->fee_waiting_time = $request->fee_waiting_time;
        $fare->waiting_price_per_minute = $request->waiting_price_per_minute;
        $fare->gst_charge = $request->gst_charge;
        $fare->fuel_surge_charge = $request->fuel_surge_charge;
        $fare->nsw_gtl_charge = $request->nsw_gtl_charge;
        $fare->nsw_ctp_charge = $request->nsw_ctp_charge;
        $fare->booking_charge = $request->booking_charge;
        $fare->cancel_charge = $request->cancel_charge;
        $fare->free_ride_minute = $request->free_ride_minute;
        $fare->price_per_ride_minute = $request->price_per_ride_minute;
        if($request->has('pet_charge'))
            $fare->pet_charge = $request->pet_charge;
        if($request->has('baby_seat_charge'))
            $fare->baby_seat_charge = $request->baby_seat_charge;
        $fare->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deleteFare($id)
    {
        $fare = Fare::find($id);
        $fare->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function peaktimeList()
    {
        $peaktimes = Peaktime::all();
        return view('admin.peaktime.index')
            ->with('peaktimes', $peaktimes)
            ->with('page', 'charge')
            ->with('subpage', 'peaktime');
    }
    public function addPeaktime()
    {
        $states = State::all();
        return view('admin.peaktime.add')
            ->with('states', $states)
            ->with('page', 'charge')
            ->with('subpage', 'peaktime');
    }
    public function storePeaktime(StorePeaktime $request)
    {
        $request->validated();
        $peaktime = new Peaktime();
        $peaktime->state_id = $request->state_id;
        $peaktime->day = $request->day;
        $peaktime->slot_one_starttime = $request->slot_one_starttime;
        $peaktime->slot_one_endtime = $request->slot_one_endtime;
        $peaktime->slot_two_starttime = $request->slot_two_starttime;
        $peaktime->slot_two_endtime = $request->slot_two_endtime;
        $peaktime->charges_type_id = $request->charges_type_id;
        $peaktime->charge = $request->charge;

        $peaktime->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editPeaktime($id)
    {
        $states = State::all();
        $peaktime = Peaktime::find($id);
        return view('admin.peaktime.add')
            ->with('states', $states)
            ->with('peaktime', $peaktime)
            ->with('page', 'charge')
            ->with('subpage', 'peaktime');
    }
    public function updatePeaktime(StorePeaktime $request, $id)
    {
        $request->validated();
        $peaktime = Peaktime::find($id);
        $peaktime->state_id = $request->state_id;
        $peaktime->day = $request->day;
        $peaktime->slot_one_starttime = $request->slot_one_starttime;
        $peaktime->slot_one_endtime = $request->slot_one_endtime;
        $peaktime->slot_two_starttime = $request->slot_two_starttime;
        $peaktime->slot_two_endtime = $request->slot_two_endtime;
        $peaktime->charges_type_id = $request->charges_type_id;
        $peaktime->charge = $request->charge;
        $peaktime->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deletePeaktime($id)
    {
        $peaktime = Peaktime::find($id);
        $peaktime->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    // Night time
    public function nighttimeList()
    {
        $nighttimes = Nighttime::all();
        return view('admin.nighttime.index')
            ->with('nighttimes', $nighttimes)
            ->with('page', 'charge')
            ->with('subpage', 'nighttime');
    }
    public function addNighttime()
    {
        $states = State::all();
        return view('admin.nighttime.add')
            ->with('states', $states)
            ->with('page', 'charge')
            ->with('subpage', 'nighttime');
    }
    public function storeNighttime(StoreNighttime $request)
    {
        $request->validated();
        $nighttime = new Nighttime();
        $nighttime->state_id = $request->state_id;
        $nighttime->starttime = $request->starttime;
        $nighttime->endtime = $request->endtime;
        $nighttime->charges_type_id = $request->charges_type_id;
        $nighttime->charge = $request->charge;
        $nighttime->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editNighttime($id)
    {
        $states = State::all();
        $nighttime = Nighttime::find($id);
        return view('admin.nighttime.add')
            ->with('states', $states)
            ->with('nighttime', $nighttime)
            ->with('page', 'charge')
            ->with('subpage', 'nighttime');
    }
    public function updateNighttime(StoreNighttime $request, $id)
    {
        $request->validated();
        $nighttime = Nighttime::find($id);
        $nighttime->state_id = $request->state_id;
        $nighttime->starttime = $request->starttime;
        $nighttime->endtime = $request->endtime;
        $nighttime->charges_type_id = $request->charges_type_id;
        $nighttime->charge = $request->charge;
        $nighttime->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deleteNighttime($id)
    {
        $nighttime = Nighttime::find($id);
        $nighttime->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
