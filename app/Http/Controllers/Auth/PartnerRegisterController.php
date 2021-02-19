<?php

namespace App\Http\Controllers\Auth;

use App\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PartnerRegisterController extends Controller
{
    protected $redirectPath = '/partner';
    //shows registration form to partner
    public function showRegistrationForm()
    {
        return view('auth.register-partner');
    }
    //Handles registration request for partner
    public function register(Request $request)
    {
        //Validates data
        $this->validator($request->all())->validate();
        //Create partner
        $partner = $this->create($request->all());
        //Authenticates partner
        $this->guard()->login($partner);
        //Redirects partner
        return redirect($this->redirectPath);
    }
    //Validates partner's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:191|unique:customers',
            'username' => 'required|max:191|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    //Create a new partner instance after a validation.
    protected function create(array $data)
    {
        return Partner::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }
    //Get the guard to authenticate partner
    protected function guard()
    {
        return Auth::guard('partner');
    }
}
