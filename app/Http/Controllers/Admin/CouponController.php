<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoupon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:coupon-list|coupon-create|coupon-edit|coupon-delete', ['only' => ['couponList']]);
        $this->middleware('permission:coupon-create', ['only' => ['addCoupon','storeCoupon']]);
        $this->middleware('permission:coupon-edit', ['only' => ['editCoupon','updateCoupon', 'activeCoupon']]);
        $this->middleware('permission:coupon-delete', ['only' => ['deleteCoupon']]);
    }
    public function couponList()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index')
            ->with('coupons', $coupons)
            ->with('page', 'coupon');
    }
    public function addCoupon()
    {
        return view('admin.coupon.add')
            ->with('page', 'coupon');
    }
    public function storeCoupon(StoreCoupon $request)
    {
        $request->validated();
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->started_at = date('Y-m-d', strtotime($request->started_at));
        $coupon->expired_at = date('Y-m-d', strtotime($request->expired_at));
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->usetotal = $request->usetotal;
        $coupon->usecustomer = $request->usecustomer;
        $coupon->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editCoupon($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.add')
            ->with('coupon', $coupon)
            ->with('page', 'coupon');
    }
    public function updateCoupon(StoreCoupon $request, $id)
    {
        $request->validated();
        $coupon = Coupon::find($id);
        $coupon->code = $request->code;
        $coupon->started_at = date('Y-m-d', strtotime($request->started_at));
        $coupon->expired_at = date('Y-m-d', strtotime($request->expired_at));
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->usetotal = $request->usetotal;
        $coupon->usecustomer = $request->usecustomer;
        $coupon->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->status = !$coupon->status;
        $coupon->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
