<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:transaction-list', ['only' => ['index']]);
    }
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transaction.index')
            ->with('transactions', $transactions)
            ->with('page', 'transaction');
    }
}
