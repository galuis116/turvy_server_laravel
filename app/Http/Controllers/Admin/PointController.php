<?php

namespace App\Http\Controllers\Admin;

use App\DriverLoyalty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoyalty;
use App\Http\Requests\StoreReward;
use App\RiderReward;

class PointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:riderreward-list|riderreward-create|riderreward-edit|riderreward-delete', ['only' => ['rewards']]);
        $this->middleware('permission:riderreward-create', ['only' => ['addReward','storeReward']]);
        $this->middleware('permission:riderreward-edit', ['only' => ['editReward','updateReward']]);
        $this->middleware('permission:riderreward-delete', ['only' => ['deleteReward']]);

        $this->middleware('permission:driverloyalty-list|driverloyalty-create|driverloyalty-edit|driverloyalty-delete', ['only' => ['loyalties']]);
        $this->middleware('permission:driverloyalty-create', ['only' => ['addLoyalty','storeLoyalty']]);
        $this->middleware('permission:driverloyalty-edit', ['only' => ['editLoyalty','updateLoyalty']]);
        $this->middleware('permission:driverloyalty-delete', ['only' => ['deleteLoyalty']]);
    }
    public function rewards()
    {
        $rewards = RiderReward::orderBy('order')->get();
        $max = $this->getNewOrder()-1;
        return view('admin.reward.index')
            ->with('page', 'point')
            ->with('subpage', 'reward')
            ->with('max', $max)
            ->with('rewards', $rewards);
    }
    public function addReward()
    {
        return view('admin.reward.add')
            ->with('page', 'point')
            ->with('subpage', 'reward');
    }
    public function storeReward(StoreReward $request)
    {
        $request->validated();
        $reward = new RiderReward();
        $reward->name = $request->name;
        $reward->start_amount = $request->start_amount;
        $reward->point = $request->point;
        $reward->order = $this->getNewOrder();
        $reward->save();

        return redirect()->back()->with('message', 'It has been added successfuly');
    }
    public function editReward($id)
    {
        $reward = RiderReward::find($id);
        return view('admin.reward.add')
            ->with('page', 'point')
            ->with('reward', $reward)
            ->with('subpage', 'reward');
    }
    public function updateReward(StoreReward $request, $id)
    {
        $request->validated();
        $reward = RiderReward::find($id);
        $reward->name = $request->name;
        $reward->start_amount = $request->start_amount;
        $reward->point = $request->point;
        $reward->save();

        return redirect()->back()->with('message', 'It has been added successfuly');
    }
    public function deleteReward($id)
    {
        $remarkable_order = RiderReward::find($id)->order;
        RiderReward::destroy($id);
        $max = $this->getNewOrder();

        if($max-$remarkable_order > 1){
            for($i=$remarkable_order+1; $i<$max;$i++){
                $reward = RiderReward::where('order', $i)->first();
                $reward->order = $i-1;
                $reward->save();
            }
        }
        return redirect()->back()->with('message', 'It has been deleted successful');
    }
    public function getNewOrder()
    {
        $order = RiderReward::max('order');
        if(!$order)
            return 1;
        return RiderReward::max('order')+1;
    }
    public function upOrder($id)
    {
        $reward = RiderReward::find($id);
        $remarkable_order = $reward->order - 1;
        $changeWillReward = RiderReward::where('order', $remarkable_order)->first();
        $reward->order = $remarkable_order;
        $reward->save();

        $changeWillReward->order = $remarkable_order + 1;
        $changeWillReward->save();

        return redirect()->back()->with('message', 'Changed reward order');
    }
    public function downOrder($id)
    {
        $reward = RiderReward::find($id);
        $remarkable_order = $reward->order + 1;
        $changeWillReward = RiderReward::where('order', $remarkable_order)->first();
        $reward->order = $remarkable_order;
        $reward->save();

        $changeWillReward->order = $remarkable_order - 1;
        $changeWillReward->save();

        return redirect()->back()->with('message', 'Changed category order');
    }
    public function loyalties()
    {
        $loyalties = DriverLoyalty::all();
        return view('admin.loyalty.index')
            ->with('page', 'point')
            ->with('subpage', 'loyalty')
            ->with('loyalties', $loyalties);
    }
    public function addLoyalty()
    {
        return view('admin.loyalty.add')
            ->with('page', 'point')
            ->with('subpage', 'loyalty');
    }
    public function storeLoyalty(StoreLoyalty $request)
    {
        $request->validated();
        $loyalty = new DriverLoyalty();
        $loyalty->name = $request->name;
        $loyalty->trips_per_day = $request->trips_per_day;
        $loyalty->available_days_per_week = $request->available_days_per_week;
        $loyalty->save();

        return redirect()->back()->with('message', 'It has been added successfuly');
    }
    public function editLoyalty($id)
    {
        $loyalty = DriverLoyalty::find($id);
        return view('admin.loyalty.add')
            ->with('page', 'point')
            ->with('loyalty', $loyalty)
            ->with('subpage', 'loyalty');
    }
    public function updateLoyalty(StoreReward $request, $id)
    {
        $request->validated();
        $loyalty = DriverLoyalty::find($id);
        $loyalty->name = $request->name;
        $loyalty->trips_per_day = $request->trips_per_day;
        $loyalty->available_days_per_week = $request->available_days_per_week;
        $loyalty->save();

        return redirect()->back()->with('message', 'It has been added successfuly');
    }
    public function deleteLoyalty($id)
    {
        DriverLoyalty::destroy($id);        
        return redirect()->back()->with('message', 'It has been deleted successful');
    }
}
