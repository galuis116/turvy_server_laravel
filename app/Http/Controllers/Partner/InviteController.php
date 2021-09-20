<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partner');
    }
    public function index()
    {
        return view('partner.invite')
            ->withPage('invite');
    }
    public function store(Request $request)
    {
        $partner = Auth::guard('partner')->user();
        for($i= 1; $i < 10; $i++){
            if($request->has('email'.$i)){
                $email = $request->get('email'.$i);
                send_email('emails.invitation','Friend Invitation',$email,$partner);
            }
        }
        return redirect()->back()->with('message', 'It has been sent successfully.');
    }
}
