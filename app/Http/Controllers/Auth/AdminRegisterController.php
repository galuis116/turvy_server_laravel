<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
    protected $redirectPath = '/admin';
    //shows registration form to admin
    public function showRegistrationForm()
    {
        return view('auth.register-admin');
    }
    //Handles registration request for admin
    public function register(Request $request)
    {
        //Validates data
        $this->validator($request->all())->validate();
        //Create admin
        $admin = $this->create($request->all());
        //Authenticates admin
        $this->guard()->login($admin);
        //Redirects admin
        return redirect($this->redirectPath);
    }
    //Validates admin's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:191|unique:customers',
            'username' => 'required|max:191|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    //Create a new admin instance after a validation.
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }
    //Get the guard to authenticate admin
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
