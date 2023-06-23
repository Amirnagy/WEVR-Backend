<?php

namespace App\Http\Controllers\API\Apartments;

use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\SavedApartment;
use App\Mail\Apartment_reserved;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\invitation_card;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

use App\Models\Apartment as ModelsApartment;

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
    private function handelIamge($apartments)
    {
        $apartments = $apartments->map(function ($apartment) {
            $images = json_decode($apartment->image);
            $apartment->image = collect($images)->map(function ($image) {
                return env('APP_URL') .'/'. $image;
            });
            return $apartment;
        });
        return $apartments;
    }

    public function Banner()
    {
        $banners = Banner::all();
        $data = [];
        foreach($banners as $record => $banner)
        {
            $id = $banner->apartment_id;
            $images = env('APP_URL').'public'.'/'. $banner->image;
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

        $Apartment = ModelsApartment::with('info')->join('gallaries', 'apartments.id', '=', 'gallaries.apartment_id')
                ->get();
        $Apartment = $this->handelIamge($Apartment);
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
    $user = $request->user();
    $savedApartments = $user->SavedApartmant;

    if ($savedApartments) {
        // Get the IDs of the saved apartments
        $apartmentIds = $savedApartments->pluck('apartment_id')->toArray();

        // Retrieve the apartments with their info and images
        $savedApartments = ModelsApartment::whereIn('apartments.id', $apartmentIds)
            ->with('info')
            ->join('gallaries', 'apartments.id', '=', 'gallaries.apartment_id')
            ->get();

        // Format the image URLs
        $savedApartments = $this->handelIamge($savedApartments);

        return $this->apiResponse(1, 'Apartments loaded successfully', $savedApartments);
    } else {
        return $this->apiResponse(1, 'No saved apartments', []);
    }
}

    public function reservation(Request $request,$id)
    {
        $user = $request->user();

        $vaildator = Validator::make($request->all(),[
            'reserve_date' => 'required|date_format:Y-m-d H:i:s|after_or_equal:tomorrow'
        ]);

        if($vaildator->fails())
        {
            return $this->apiResponse(0,'vaildate error' , $vaildator->errors());
        }

        $reserve_date_start = $request->reserve_date;
        $reserve_date_end = Carbon::parse($reserve_date_start)->addDay();

        $apartment = ModelsApartment::find($id);

        if($apartment)
        {
            $owner = $apartment->user->only(['id','name', 'email']);


            if($user->id == $apartment->user_id)
            {
                return $this->apiResponse(0, "Can't reserved your apartment", null);
            }

            try {
                $reservation = $apartment->users()->attach($user, ['owner_apartment_id' => $owner['id'], 'reservation_date' => $reserve_date_start]);
            }catch (QueryException $e) {
                return $this->apiResponse(0, 'Error Apartment already reserved', null);
            }



                // reserve apartment ... and send email to owner of apartment
                Mail::to($owner['email'])->send(new Apartment_reserved($apartment->id,
                $owner['name'],
                $reserve_date_start,
                $reserve_date_end,
                $user->name,
                env('APP_NAME')));
                // register all mails that sended to owner


                Mail::to($user->email)->send(new invitation_card(
                    $user->name,
                    $owner['name'],
                    $apartment->id,
                    $apartment->location,
                    $apartment->dimensions,
                    $apartment->descrption,
                    $reserve_date_start,
                    $reserve_date_end,
                    'WEVR'));
                // register all mails that sended to user

            return $this->apiResponse(1,'reservation successully please check your email to view card invitations',null);

        }else{
            return $this->apiResponse(0,'apartment not found',null);
        }
    }
}
