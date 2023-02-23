<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
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

    public function logout(Request $request)
    {
        if(auth()->user()->tokens() != null)
        {
            // auth()->user()->tokens()->delete();
            // $user = Auth::user();
            $request->user()->currentAccessToken()->delete();

        }


        return $this->apiResponse(201,'logout successfully',[]);
    }
}
