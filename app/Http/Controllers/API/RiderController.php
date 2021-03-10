<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

class RiderController extends Controller
{
    //
    public function getProfileInfo($id){
        $rider = User::find($id);
        if(!$rider)
            return response()->json([
                'status' => 0,
                'message' => 'Failed! No such rider in our system.',
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        return response()->json([
            'status' => 1,
            'message' => 'Success.',
            'datetime' => date('Y-m-d H:i'),
            'data' => $rider
        ]);
    }

    public function putProfileInfo(Request $request, $id) {
        $validator = Validator::make($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:14'],
            'partner_id' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors(),
                'datetime' => date('Y-m-d H:i'),
                'data' => null
            ]);
        }

        $rider = User::find($id)->update($request->all());

        return response()->json(['status' => 1, 'message' => 'Rider created.']);
    }
}
