<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\User;
use App\RiderRating;

class RiderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:rider-list|rider-create|rider-edit|rider-delete', ['only' => ['riderList', 'showRider']]);
        $this->middleware('permission:rider-create', ['only' => ['addRider','storeRider']]);
        $this->middleware('permission:rider-edit', ['only' => ['editRider','updateRider', 'approveRider']]);
        $this->middleware('permission:rider-delete', ['only' => ['deleteRider']]);
    }
    public function riderList()
    {
        $riders = User::all();
        return view('admin.rider.index')
            ->with('riders', $riders)
            ->with('page', 'user')
            ->with('subpage', 'rider');
    }
    public function addRider()
    {
        return view('admin.rider.add')
            ->with('page', 'user')
            ->with('subpage', 'rider');
    }
    public function storeRider(StoreUser $request)
    {
        $request->validated();
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->password = bcrypt('rider123');
        if($request->hasFile('avatar'))
            $user->avatar = upload_file($request->file('avatar'), 'user/rider');
      if($request->has('cdnimage'))
      $user->cdnimage = $request->cdnimage;
        $user->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function showRider($id)
    {
        $rider = User::find($id);
        $rider_ratings = RiderRating::where('rider_id', $id)->get();
        return view('admin.rider.show')
            ->with('rider', $rider)
            ->with('rider_ratings', $rider_ratings)
            ->with('page', 'user')
            ->with('subpage', 'rider');
    }
    public function editRider($id)
    {
        $rider = User::find($id);
        return view('admin.rider.add')
            ->with('rider', $rider)
            ->with('page', 'user')
            ->with('subpage', 'rider');
    }
    public function updateRider(StoreUser $request, $id)
    {
        $request->validated();
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->password = bcrypt('rider123');
        if($request->hasFile('avatar'))
            $user->avatar = upload_file($request->file('avatar'), 'user/rider');
        if($request->has('cdnimage'))
      $user->cdnimage = $request->cdnimage;
        $user->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function approveRider($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function activeRider($id)
    {
        $user = User::find($id);
        $user->is_active = !$user->is_active;
        $user->save();
        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteRider($id)
    {
        $rider = User::find($id);
        remove_file($rider->avatar);
        $rider->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
