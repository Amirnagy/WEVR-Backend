<?php

namespace App\Http\Controllers\API\Apartments;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class Apartment extends Controller
{
    private function apiResponse($status,$massage,$data)
    {
        $response = [
            'status' => $status,
            'massage' =>$massage,
            'data' => $data
        ];
        return response()->json(
            $response
        );
    }



}
