<?php

namespace App\Http\Controllers\API\Apartments;

use App\Http\Controllers\Controller;
use App\Models\Apartment as ModelsApartment;
use App\Models\Banner;
use App\Models\SavedApartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $images = env('APP_URL') . '/' .'public'.'/'. $banner->image;
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
    public function SaveApartment(Request $request ,$id)
    {
        $user = $user = $request->user();
        $Apartment = ModelsApartment::find($id);

        if($Apartment)
        {
            // check if Apartment saved or no

            foreach($user->SavedApartmant as $Apart)
            {
                if($Apart->apartment_id == $id)
                {
                    $Apart->delete();
                    return $this->apiResponse(1,'Apartment not saved',0);
                }
            }
                $SavedApartment = SavedApartment::create([
                            'user_id' => $user->id,
                            'apartment_id' => $Apartment->id
                        ]);
                        if($SavedApartment)
                        {
                            return $this->apiResponse(1,'Apartment saved successfully',1);
                        }
        }
        else
        {
            return $this->apiResponse(1,'Apartment Not found',0);
        }
    }

    public function SavedApartment(Request $request)
    {
        $user = $user = $request->user();
        $apartment = $user->SavedApartmant;
        if($apartment)
        {
            // loop on apartment of user and put it in
            // data variable and send it with request of api
            $data = [];
            foreach($apartment as $Apart)
            {
                $data[] = $Apart->apartment_id;
            }
            $SavedApartment = ModelsApartment::whereIn('id', $data)
                ->with('info')
                ->with('gallary')
                ->get();
            return $this->apiResponse(1,'Apartment loaded successfully',$SavedApartment);
        }
        else{
            return $this->apiResponse(1,'NO Saved Apartment',0);
        }
    }
}
