<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Currency;
use App\Distance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCity;
use App\Http\Requests\StoreCountry;
use App\Http\Requests\StoreState;
use App\State;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:country-list|country-create|country-edit|country-delete', ['only' => ['countryList']]);
        $this->middleware('permission:country-create', ['only' => ['addCountry','storeCountry']]);
        $this->middleware('permission:country-edit', ['only' => ['editCountry','updateCountry']]);
        $this->middleware('permission:country-delete', ['only' => ['deleteCountry']]);

        $this->middleware('permission:state-list|state-create|state-edit|state-delete', ['only' => ['stateList']]);
        $this->middleware('permission:state-create', ['only' => ['addState','storeState']]);
        $this->middleware('permission:state-edit', ['only' => ['editState','updateState']]);
        $this->middleware('permission:state-delete', ['only' => ['deleteState']]);

        $this->middleware('permission:city-list|city-create|city-edit|city-delete', ['only' => ['cityList']]);
        $this->middleware('permission:city-create', ['only' => ['addCity','storeCity']]);
        $this->middleware('permission:city-edit', ['only' => ['editCity','updateCity']]);
        $this->middleware('permission:city-delete', ['only' => ['deleteCity']]);
    }
    public function countryList()
    {
        $countries = Country::all();
        return view('admin.country.index')->with('countries', $countries)->with('page', 'region')->with('subpage', 'country');
    }
    public function addCountry()
    {
        return view('admin.country.add')->with('page', 'region')->with('subpage', 'country');
    }
    public function storeCountry(StoreCountry $request)
    {
        $request->validated();
        $country = new Country();
        $country->name = $request->name;
        $country->nicename = $request->nicename;
        $country->iso = $request->iso;
        $country->iso3 = $request->iso3;
        $country->numcode = $request->numcode;
        $country->phonecode = $request->phonecode;
        $country->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editCountry($id)
    {
        $country = Country::find($id);
        return view('admin.country.add')->with('country', $country)->with('page', 'region')->with('subpage', 'country');
    }
    public function updateCountry(StoreCountry $request, $id)
    {
        $request->validated();
        $country = Country::find($id);
        $country->name = $request->name;
        $country->nicename = $request->nicename;
        $country->iso = $request->iso;
        $country->iso3 = $request->iso3;
        $country->numcode = $request->numcode;
        $country->phonecode = $request->phonecode;
        $country->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deleteCountry($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function stateList()
    {
        $states = State::all();
        return view('admin.state.index')
            ->with('states', $states)
            ->with('page', 'region')
            ->with('subpage', 'state');
    }
    public function addState()
    {
        $countries = Country::all();
        $currencies = Currency::where('status', 1)->get();
        $distances = Distance::where('status', 1)->get();
        return view('admin.state.add')
            ->with('countries', $countries)
            ->with('currencies', $currencies)
            ->with('distances', $distances)
            ->with('page', 'region')
            ->with('subpage', 'state');
    }
    public function storeState(StoreState $request)
    {
        $request->validated();
        $state = new State();
        $state->name = $request->name;
        $state->fullname = $request->fullname;
        $state->country_id = $request->country_id;
        $state->currency_id = $request->currency_id;
        $state->distance_id = $request->distance_id;
        $state->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editState($id)
    {
        $countries = Country::all();
        $state = State::find($id);
        $currencies = Currency::where('status', 1)->get();
        $distances = Distance::where('status', 1)->get();
        return view('admin.state.add')
            ->with('countries', $countries)
            ->with('currencies', $currencies)
            ->with('distances', $distances)
            ->with('state', $state)
            ->with('page', 'region')
            ->with('subpage', 'state');
    }
    public function updateState(StoreState $request, $id)
    {
        $request->validated();
        $state = State::find($id);
        $state->name = $request->name;
        $state->fullname = $request->fullname;
        $state->country_id = $request->country_id;
        $state->currency_id = $request->currency_id;
        $state->distance_id = $request->distance_id;
        $state->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deleteState($id)
    {
        $state = State::find($id);
        $state->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function cityList()
    {
        $cities = City::all();
        return view('admin.city.index')
            ->with('cities', $cities)
            ->with('page', 'region')
            ->with('subpage', 'city');
    }
    public function addCity()
    {
        $countries = Country::all();
        $states = State::all();
        return view('admin.city.add')
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('page', 'region')
            ->with('subpage', 'city');
    }
    public function storeCity(StoreCity $request)
    {
        $request->validated();
        $city = new City();
        $city->name = $request->name;
        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editCity($id)
    {
        $countries = Country::all();
        $state = State::find($id);
        return view('admin.state.add')
            ->with('countries', $countries)
            ->with('state', $state)
            ->with('page', 'region')
            ->with('subpage', 'state');
    }
    public function updateCity(StoreCity $request, $id)
    {
        $request->validated();
        $city = City::find($id);
        $city->name = $request->name;
        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deleteCity($id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
