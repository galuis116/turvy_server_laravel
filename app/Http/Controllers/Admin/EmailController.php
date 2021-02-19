<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceEmail;
use App\Http\Requests\StoreSignupEmail;
use App\InvoiceEmail;
use App\SignupEmail;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:signup', ['only' => ['signup', 'storeSignup']]);
        $this->middleware('permission:invoice', ['only' => ['invoice','storeInvoice']]);
    }
    public function signup()
    {
        $email = SignupEmail::first();
        return view('admin.email.signup')
            ->with('email', $email)
            ->with('page', 'email')
            ->with('subpage', 'signup');
    }
    public function storeSignup(StoreSignupEmail $request)
    {
        $request->validated();
        SignupEmail::truncate();
        $email = new SignupEmail();
        $email->sender_email = $request->sender_email;
        $email->sender_name = $request->sender_name;
        $email->subject = $request->subject;
        $email->title = $request->title;
        $email->body1 = $request->body1;
        $email->body2 = $request->body2;
        $email->footer = $request->footer;
        $email->is_active = $request->is_active;
        $email->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function invoice()
    {
        $email = InvoiceEmail::first();
        return view('admin.email.invoice')
            ->with('email', $email)
            ->with('page', 'email')
            ->with('subpage', 'invoice');
    }
    public function storeInvoice(StoreInvoiceEmail $request)
    {
        $request->validated();
        InvoiceEmail::truncate();
        $email = new InvoiceEmail();
        $email->sender_email = $request->sender_email;
        $email->subject = $request->subject;
        $email->title = $request->title;
        $email->is_active = $request->is_active;
        $email->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
}
