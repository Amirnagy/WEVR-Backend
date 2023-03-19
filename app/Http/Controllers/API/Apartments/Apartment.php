<?php

namespace App\Http\Controllers\API\Apartments;

use App\Http\Controllers\Controller;
use App\Models\Apartment as ModelsApartment;
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


    public function Banner()
    {
        $banners = Banner::all();
        $data = [];
        foreach($banners as $record => $banner)
        {
            $id = $banner->apartment_id;
            $images = $banner->image;
            $discount = $banner->discount;
            $priceAfterDiscount = $banner->price_after_discount;

            $image = env('APP_URL').'/'. $images[0];
            $bannerData = [
                'id' => $id,
                'image' => $image,
                'discount' => $discount,
                'price_after_discount' => $priceAfterDiscount
            ];

            array_push($data, $bannerData);
        }
        return $this->apiResponse(1,'null',$data);
    }

    public function Apartment()
    {
        // get all data of Apartment of all user 10 and with every request i
        // will get the next 10

        $Apartment = ModelsApartment::with('info')->with('gallary')->paginate(1);
        return $this->apiResponse(1,'arpartment loaded susseccfully',$Apartment);



    }


}

