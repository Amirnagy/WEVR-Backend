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


    public function Banner()
    {
        $banners = Banner::all();
        $data = [];
        foreach($banners as $record => $banner)
        {
            $id = $banner->apartment_id;
            $images = $banner->image;

            $image = env('APP_URL').'/'. $images[0];

            // will resault array of links for images
            // $imageCollection =[];
            // foreach($images as $key => $image)
            // {
                // $imageCollection[$key]=env('APP_URL').'/'.$image;
            // }
            $bannerData = [
                'id' => $id,
                'image' => $image,
            ];

            array_push($data, $bannerData);
        }
        return $this->apiResponse(1,'null',$data);
    }



}
