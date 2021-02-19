<?php

namespace App\Http\Controllers\Admin;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestination;

class DestinationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:destination-list|destination-create|destination-edit|destination-delete', ['only' => ['index']]);
        $this->middleware('permission:destination-create', ['only' => ['create','store']]);
        $this->middleware('permission:destination-edit', ['only' => ['edit','update', 'approve']]);
        $this->middleware('permission:destination-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('admin.destination.index')
            ->with('destinations', $destinations)
            ->with('page', 'airportride')
            ->with('subpage', 'destination');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.destination.add')
            ->with('page', 'airportride')
            ->with('subpage', 'destination');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDestination $request)
    {
        $request->validated();
        $destination = new Destination();
        $destination->name = $request->name;
        $destination->zipcode = $request->zipcode;
        if($request->has('latitude'))
            $destination->latitude = $request->latitude;
        if($request->has('longitude'))
            $destination->longitude = $request->longitude;
        $destination->save();

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
        $destination = Destination::find($id);
        return view('admin.destination.add')
            ->with('destination', $destination)
            ->with('page', 'airportride')
            ->with('subpage', 'destination');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDestination $request, $id)
    {
        $request->validated();
        $destination = Destination::find($id);
        $destination->name = $request->name;
        $destination->zipcode = $request->zipcode;
        if($request->has('latitude'))
            $destination->latitude = $request->latitude;
        if($request->has('longitude'))
            $destination->longitude = $request->longitude;
        $destination->save();

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
        Destination::destroy($id);
        return redirect()->back()->with('message', 'It has been deleted successfully');
    }

    public function approve($id)
    {
        $destination = Destination::find($id);
        $destination->status = !$destination->status;
        $destination->save();

        return redirect()->back()->with('message', 'It has been done successfully');
    }
}
