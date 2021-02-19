<?php

namespace App\Http\Controllers\Admin;

use App\Airport;
use App\AirportPrice;
use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAirportPrice;
use App\VehicleType;

class AirportPricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:airportpricing-list|airportpricing-create|airportpricing-edit|airportpricing-delete', ['only' => ['index']]);
        $this->middleware('permission:airportpricing-create', ['only' => ['create','store']]);
        $this->middleware('permission:airportpricing-edit', ['only' => ['edit','update', 'approve']]);
        $this->middleware('permission:airportpricing-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricings = AirportPrice::all();
        return view('admin.airportprice.index')
            ->with('pricings', $pricings)
            ->with('page', 'airportride')
            ->with('subpage', 'pricing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airports = Airport::where('status', 1)->get();
        $destinations = Destination::where('status', 1)->get();
        $servicetypes = VehicleType::where('status', 1)->get();
        return view('admin.airportprice.add')
            ->with('airports', $airports)
            ->with('destinations', $destinations)
            ->with('servicetypes', $servicetypes)
            ->with('page', 'airportride')
            ->with('subpage', 'pricing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAirportPrice $request)
    {
        $request->validated();
        $price = new AirportPrice();
        $price->package_name = $request->package_name;
        $price->airport_id = $request->airport_id;
        $price->destination_id = $request->destination_id;
        $price->servicetype_id = $request->servicetype_id;
        $price->price = $request->price;
        $price->number_tolls = $request->number_tolls;
        $price->save();

        return redirect()->back()->with('message', 'It has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airports = Airport::where('status', 1)->get();
        $destinations = Destination::where('status', 1)->get();
        $servicetypes = VehicleType::where('status', 1)->get();
        $price = AirportPrice::find($id);
        return view('admin.airportprice.add')
            ->with('airports', $airports)
            ->with('destinations', $destinations)
            ->with('servicetypes', $servicetypes)
            ->with('price', $price)
            ->with('page', 'airportride')
            ->with('subpage', 'pricing');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAirportPrice $request, $id)
    {
        $request->validated();
        $price = AirportPrice::find($id);
        $price->package_name = $request->package_name;
        $price->airport_id = $request->airport_id;
        $price->destination_id = $request->destination_id;
        $price->servicetype_id = $request->servicetype_id;
        $price->price = $request->price;
        $price->number_tolls = $request->number_tolls;
        $price->save();

        return redirect()->back()->with('message', 'It has been saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AirportPrice::destroy($id);
        return redirect()->back()->with('message', 'It has been deleted successfully');
    }

    public function approve($id)
    {
        $price = AirportPrice::find($id);
        $price->status = !$price->status;
        $price->save();

        return redirect()->back()->with('message', 'It has been done successfully');
    }
}
