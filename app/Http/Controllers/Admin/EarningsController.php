<?php

namespace App\Http\Controllers\Admin;

use App\DriverTransactions;
use App\Http\Controllers\Controller;
use App\Rewards;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EarningsController extends Controller
{
    public function rewards() {
        $rewards = Rewards::all();
        return view('admin.earnings.rewards')
            ->with('rewards', $rewards)
            ->with('page', 'earnings')
            ->with('subpage', 'rewards');
    }
    public function drivers(Request $request) {
        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();
        if ($request->has('startDate') && $request->has('endDate')) {
            $startDate = $request->get('startDate');
            $endDate = $request->get('endDate');
        }
        $transactions = DriverTransactions::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.earnings.drivers')
            ->with('transactions', $transactions)
            ->with('startDate', $startDate)
            ->with('endDate', $endDate)
            ->with('page', 'earnings')
            ->with('subpage', 'drivers');
    }
    public function government() {
        $transactions = DriverTransactions::where('status', 'active')->orderBy('created_at', 'desc')->get();
        return view('admin.earnings.government')
            ->with('transactions', $transactions)
            ->with('page', 'earnings')
            ->with('subpage', 'government');
    }
    public function turvy() {
        $transactions = DriverTransactions::where('status', 'active')->where('company_amount', '<>', NULL)->orderBy('created_at', 'desc')->get();
        return view('admin.earnings.turvy')
            ->with('transactions', $transactions)
            ->with('page', 'earnings')
            ->with('subpage', 'turvy');
    }
    public function charity() {
        $transactions = DriverTransactions::where('status', 'active')->where('charity_amount', '<>', NULL)->orderBy('created_at', 'desc')->get();
        return view('admin.earnings.charity')
            ->with('transactions', $transactions)
            ->with('page', 'earnings')
            ->with('subpage', 'charity');
    }
}
