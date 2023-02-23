<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Register extends Controller
{
    private function apiResponse($status,$massage,$data)
    {
        $response = [
            'status' => $status,
            '$massage' =>$massage,
            'data' => $data
        ];
        return response()->json(
            $response
        );
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all()
        ,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|string|confirmed',
            'phone' =>  'required']
        ,[
            // :attribute -> reblace attribute of fields
            'required' => 'The :attribute field is required.',
            'unique' => 'this :attribute is already registered'],
        [
            // custamize the name of the failed attribute such as
            //  email - username - password - phone
        ]);

        if($validator->fails())
        {
            return $this->apiResponse(0,$validator->errors()->all(),0);
            // return response()->json($validator->errors()->all());
        }

        $request->merge(['password' => bcrypt($request->password)]);
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->phone = $request->phone;
        $newUser->pin_code = 0;
        $newUser->save();
        // $devicename = $request->device_name;
        // $token = $newUser->createToken($devicename)->plainTextToken;
        $user = User::where('email',$request->email)->first();

        return $this->apiResponse(1,'register successfully',$user);

    }

}

