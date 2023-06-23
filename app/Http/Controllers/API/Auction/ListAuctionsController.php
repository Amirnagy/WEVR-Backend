<?php

namespace App\Http\Controllers\API\Auction;

use Carbon\Carbon;
use App\Models\Apartment;
use App\Models\FinalAuction;
use App\Wrapper\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListAuctionsController extends Controller
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

    public function index()
    {
        // { id - location - type - rating } from Apartment
        // {current price - date and time from transaction Auction and Final Auction }

        $listedAuctionedApartment = FinalAuction::select('starting_price', 'start_at', 'end_at', 'apartment_id')
            ->with(['apartment' => function ($query){
            $query->select('id', 'location', 'type', 'rating');
            $query->with('gallary');
            }])
            ->get();

        $listedAuctionedApartment = $this->customResponse($listedAuctionedApartment);
        // dd($listedAuctionedApartment);
        return $this->apiResponse(200,'success loaded data',$listedAuctionedApartment);

        if(empty($listedAuctionedApartment))
        {
            return $this->apiResponse(204,'success request but no data available',$listedAuctionedApartment);
        }
    }


    public function apartment(Request $request)
    {
        $id = $request->id;
        $AuctionedApartment = FinalAuction::where('apartment_id','=',$id)
            ->select('starting_price', 'start_at', 'end_at', 'apartment_id')
                ->with(['apartment' => function ($query){
                    $query->select('id', 'location', 'type', 'rating','vrlink');
                    $query->with('gallary');
                    $query->with(['info'=> function($query) {
                        $query->select('id','apartment_id','livingroom','bedroom','parking',
                            'baths','floors','erea');
                        }]);
                    // $query->with(['transactionAuction'=> function($query) {
                    //     $query->select('');
                    //     }]);
                    }]);
        $results = $AuctionedApartment->get();
        $results = $this->customResponse($results);
        return $this->apiResponse(204,'success request but no data available',$results);
    }





    private function customResponse($listedAuctionedApartment)
    {
        $data = $listedAuctionedApartment->map(function ($item) {
            // Convert start_at and end_at to Carbon instances for easier manipulation
            $startAt = Carbon::parse($item->start_at);
            $endAt = Carbon::parse($item->end_at);
            // Calculate the duration in days, hours, and minutes

            $duration = $endAt->diff(now());
            $days = $duration->d;
            $hours = $duration->h;
            $minutes = $duration->i;

            $durationToEnd = [
                'day' => $days,
                'hours' => $hours,
                'minutes' => $minutes,
            ];

            $duration = $startAt->diff(now());
            $days = $duration->d;
            $hours = $duration->h;
            $minutes = $duration->i;

            // Update the start_at and end_at values in the item

            $durationToStart= [
                'day' => $days,
                'hours' => $hours,
                'minutes' => $minutes,
            ];


            // Update the gallary values in the item
            $images = $item->apartment->gallary->image;
            $emptyImage = [];
            foreach($images as $img)
            {
                $img = env('APP_URL').'/'.$img;
                $emptyImage[]=$img;
            }
            $item->image = $emptyImage;
            unset($item->apartment->gallary);
            return array_merge($item->toArray(), ['durationToEnd' => $durationToEnd ,'durationToStart'=> $durationToStart]);
        });
        return $data;
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
}
