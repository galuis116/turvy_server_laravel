<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Distance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrency;
use App\Http\Requests\StoreDistance;
use App\Http\Requests\StorePayment;
use App\Payment;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:currency-list|currency-create|currency-edit|currency-delete', ['only' => ['currencyList']]);
        $this->middleware('permission:currency-create', ['only' => ['addCurrency','storeCurrency']]);
        $this->middleware('permission:currency-edit', ['only' => ['editCurrency','updateCurrency', 'activeCurrency']]);
        $this->middleware('permission:currency-delete', ['only' => ['deleteCurrency']]);

        $this->middleware('permission:distance-list|distance-create|distance-edit|distance-delete', ['only' => ['distanceList']]);
        $this->middleware('permission:distance-create', ['only' => ['addDistance','storeDistance']]);
        $this->middleware('permission:distance-edit', ['only' => ['editDistance','updateDistance', 'activeDistance']]);
        $this->middleware('permission:distance-delete', ['only' => ['deleteDistance']]);

        $this->middleware('permission:payment-list|payment-create|payment-edit|payment-delete', ['only' => ['paymentList']]);
        $this->middleware('permission:payment-create', ['only' => ['addPayment','storePayment']]);
        $this->middleware('permission:payment-edit', ['only' => ['editPayment','updatePayment', 'activePayment']]);
        $this->middleware('permission:payment-delete', ['only' => ['deletePayment']]);
    }
    public function currencyList()
    {
        $currencies = Currency::all();
        return view('admin.currency.index')
            ->with('currencies', $currencies)
            ->with('page', 'base')
            ->with('subpage', 'currency');
    }
    public function addCurrency()
    {
        return view('admin.currency.add')
            ->with('page', 'base')
            ->with('subpage', 'currency');
    }
    public function storeCurrency(StoreCurrency $request)
    {
        $request->validated();
        $currency = new Currency();
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->value = $request->value;
        $currency->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editCurrency($id)
    {
        $currency = Currency::find($id);
        return view('admin.currency.add')
            ->with('currency', $currency)
            ->with('page', 'base')
            ->with('subpage', 'currency');
    }
    public function updateCurrency(StoreCurrency $request, $id)
    {
        $request->validated();
        $currency = Currency::find($id);
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->value = $request->value;
        $currency->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeCurrency($id)
    {
        $currency = Currency::find($id);
        $currency->status = !$currency->status;
        $currency->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteCurrency($id)
    {
        $currency = Currency::find($id);
        $currency->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function distanceList()
    {
        $distances = Distance::all();
        return view('admin.distance.index')
            ->with('distances', $distances)
            ->with('page', 'base')
            ->with('subpage', 'distance');
    }
    public function addDistance()
    {
        return view('admin.distance.add')
            ->with('page', 'base')
            ->with('subpage', 'distance');
    }
    public function storeDistance(StoreDistance $request)
    {
        $request->validated();
        $distance = new Distance();
        $distance->name = $request->name;
        $distance->unit = $request->unit;
        $distance->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editDistance($id)
    {
        $distance = Distance::find($id);
        return view('admin.distance.add')
            ->with('distance', $distance)
            ->with('page', 'base')
            ->with('subpage', 'distance');
    }
    public function updateDistance(StoreDistance $request, $id)
    {
        $request->validated();
        $distance = Distance::find($id);
        $distance->name = $request->name;
        $distance->unit = $request->unit;
        $distance->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeDistance($id)
    {
        $distance = Distance::find($id);
        $distance->status = !$distance->status;
        $distance->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteDistance($id)
    {
        $distance = Distance::find($id);
        $distance->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function paymentList()
    {
        $payments = Payment::all();
        return view('admin.payment.index')
            ->with('payments', $payments)
            ->with('page', 'base')
            ->with('subpage', 'payment');
    }
    public function addPayment()
    {
        return view('admin.payment.add')
            ->with('page', 'base')
            ->with('subpage', 'payment');
    }
    public function storePayment(StorePayment $request)
    {
        $request->validated();
        $payment = new Payment();
        $payment->name = $request->name;
        $payment->icon = upload_file($request->file('icon'), 'payment');
        $payment->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editPayment($id)
    {
        $payment = Payment::find($id);
        return view('admin.payment.add')
            ->with('payment', $payment)
            ->with('page', 'base')
            ->with('subpage', 'payment');
    }
    public function updatePayment(StorePayment $request, $id)
    {
        $request->validated();
        $payment = Payment::find($id);
        $payment->name = $request->name;
        
        if($request->hasFile('icon')){
            $payment->icon = upload_file($request->file('icon'), 'payment');
        }
        
        $payment->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activePayment($id)
    {
        $payment = Payment::find($id);
        $payment->status = !$payment->status;
        $payment->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deletePayment($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
