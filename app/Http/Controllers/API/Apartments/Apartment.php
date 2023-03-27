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
            $images = env('APP_URL') . '/' . $banner->image;
            $price = $banner->Apartment->info->yearprice;
            $discount = $banner->discount;
            $priceAfterDiscount = $banner->price_after_discount;
            $discount_end_date = $banner->discount_end_date;

            $bannerData = [
                'id' => $id,
                'image' => $images,
                'discount' => $discount,
                'price_before_discount' => $price,
                'price_after_discount' => $priceAfterDiscount,
                'discount_end_date' =>  $discount_end_date,
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

