<?php

namespace App\Http\Controllers\Admin;

use App\Airport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAirport;

class AirportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:airport-list|airport-create|airport-edit|airport-delete', ['only' => ['index']]);
        $this->middleware('permission:airport-create', ['only' => ['create','store']]);
        $this->middleware('permission:airport-edit', ['only' => ['edit','update', 'approve']]);
        $this->middleware('permission:airport-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::all();
        return view('admin.airport.index')
            ->with('page', 'airportride')
            ->with('subpage', 'airport')
            ->with('airports', $airports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.airport.add')
            ->with('page', 'airportride')
            ->with('subpage', 'airport');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAirport $request)
    {
        $request->validated();
        $airport = new Airport();
        $airport->name = $request->name;
        $airport->zipcode = $request->zipcode;
        if($request->has('coordinates'))
            $airport->coordinates = $request->coordinates;
        $airport->save();

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
        $airport = Airport::find($id);
        return view('admin.airport.add')
            ->with('page', 'airportride')
            ->with('airport', $airport)
            ->with('subpage', 'airport');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAirport $request, $id)
    {
        $request->validated();
        $airport = Airport::find($id);
        $airport->name = $request->name;
        $airport->zipcode = $request->zipcode;
        if($request->has('coordinates'))
            $airport->coordinates = $request->coordinates;
        $airport->save();

        return redirect()->back()->with('message', 'It has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Airport::destroy($id);
        return redirect()->back()->with('message', 'It has been deleted successfully');
    }

    public function approve($id)
    {
        $airport = Airport::find($id);
        $airport->status = !$airport->status;
        $airport->save();

        return redirect()->back()->with('message', 'It has been done successfully');
    }
}
