<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAd;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:advertise-list|advertise-create|advertise-edit|advertise-delete', ['only' => ['adList']]);
        $this->middleware('permission:advertise-create', ['only' => ['addAd','storeAd']]);
        $this->middleware('permission:advertise-edit', ['only' => ['editAd','updateAd', 'activeAd']]);
        $this->middleware('permission:advertise-delete', ['only' => ['deleteAd']]);
    }
    public function adList()
    {
        $ads = Ad::all();
        return view('admin.ad.index')
            ->with('ads', $ads)
            ->with('page', 'ad');
    }
    public function addAd()
    {
        return view('admin.ad.add')
            ->with('page', 'ad');
    }
    public function storeAd(StoreAd $request)
    {
        $request->validated();
        $ad = new Ad();
        $ad->picture = upload_file($request->file('picture'), 'ad');
        $ad->description = $request->description;
        if($request->has('url'))
            $ad->url = $request->url;
        $ad->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editAd($id)
    {
        $ad = Ad::find($id);
        return view('admin.ad.add')
            ->with('ad', $ad)
            ->with('page', 'ad');
    }
    public function updateAd(StoreAd $request, $id)
    {
        $request->validated();
        $ad = Ad::find($id);
        $ad->picture = upload_file($request->file('picture'), 'ad');
        $ad->description = $request->description;
        if($request->has('url'))
            $ad->url = $request->url;
        $ad->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeAd($id)
    {
        $ad = Ad::find($id);
        $ad->is_publish = !$ad->is_publish;
        $ad->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteAd($id)
    {
        $ad = Ad::find($id);
        remove_file($ad->picture);
        $ad->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
