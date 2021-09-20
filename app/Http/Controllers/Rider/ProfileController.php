<?php

namespace App\Http\Controllers\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:rider');
    }
    public function update(Request $request){
        $user = Auth::guard('rider')->user();
        $record = User::find($user->id);
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        if($request->hasFile('avatar'))
            $record->avatar = upload_file($request->file('avatar'), 'user/rider');
        $record->save();
        return redirect()->back()->with('message', 'Your profile has been updated Successfully.');
    }
}
