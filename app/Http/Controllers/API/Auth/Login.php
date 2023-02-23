<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class Login extends Controller
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



    public function login(Request $request)
    {
        $vaildator = Validator::make($request->all(),
        [
            'email' => 'required',
            'password' => 'required',
        ],);

        if($vaildator->fails())
        {
            return $this->apiResponse(0,'login failed' , $vaildator->errors());
        }
        // data of email that registered
        $client = User::where('email',$request->email)->first();
        // if we don't found the email
        if(!$client) {
            return $this->apiResponse(0,'login failed email not register' , '');
        // if we found the email == then check the password
        }
        if(!Hash::check($request->password,$client->password)){
            return $this->apiResponse(0,'password incorrect' ,'');
        }
        // create token
        // $password = $request->password;
        $devicename = $request->device_name;
        $token = $client->createToken("$devicename")->plainTextToken;

        return $this->apiResponse(1,'login successfully',[$client,"token" => $token]);
    }




}

