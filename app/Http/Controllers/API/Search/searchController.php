<?php

namespace App\Http\Controllers\API\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class searchController extends Controller
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

    public function search(Request $request)
    {

        $typeApartment = $request->type;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $bedroom = $request->bedroom;
        $baths = $request->baths;
        $Livingroom = $request->Livingroom;



        // return $this->apiResponse('','','');

        dd([$type,$min_price,$max_price ,$bedroom ,$baths ,$Livingroom ]);
    }
}
