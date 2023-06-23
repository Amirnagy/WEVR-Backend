<?php

namespace App\Http\Controllers\API\Auction;

use Carbon\Carbon;
use App\Models\Participant;
use App\Models\FinalAuction;
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

        $listedAuctionedApartment = FinalAuction::select(
                'starting_price', 'start_at', 'end_at', 'apartment_id')
                    ->with(['apartment' => function ($query){
                        $query->select('id', 'location', 'type', 'rating');
                        $query->with('gallary');
                    }])->get();

        $listedAuctionedApartment = $this->customResponse($listedAuctionedApartment,0,0);
        // dd($listedAuctionedApartment);
        return $this->apiResponse(200,'success loaded data',$listedAuctionedApartment);

        if(empty($listedAuctionedApartment))
        {
            return $this->apiResponse(204,'success request but no data available',$listedAuctionedApartment);
        }
    }


    public function apartment(Request $request)
    {
        // get all ids
        $user_id = $request->user()->id;
        $apartment_id = $request->id_apartment;
        $auction_id = $request->id_auction;
        // check if it participant
        $check_join = $this->checkJoin($user_id,$auction_id);

        if($check_join)
        {
            // participant so get data and custom response and add togle to view that is participant
            $results = $this->getApartmentDetails($apartment_id);
            $results = $this->customResponse($results,1,1);
            return $this->apiResponse(200,'user is participant success loaded apartment ',$results);

        }else{
            $results = $this->getApartmentDetails($apartment_id);
            $results = $this->customResponse($results,1,2);
            return $this->apiResponse(200,"user isn't participant success loaded apartment",$results);
        }
    }


    public function joinAuction(Request $request) {
        $user_id = $request->user()->id;
        $apartment_id = $request->id_apartment;
        $auction_id = $request->id_auction;
        $check_join = Participant::where('user_id',$user_id)->where('auctions_id',$auction_id)->first();
        if(empty($check_join))
        {
            $joinAuction = new Participant;
            $joinAuction->user_id = $user_id;
            $joinAuction->auctions_id = $auction_id;
            $joinAuction->save();
            $results = $this->getApartmentDetails($apartment_id);
            $results = $this->customResponse($results,1,1);
            return $this->apiResponse(200,'user become participaning. success loaded apartment ',$results);
        }
        else{
            return $this->apiResponse(200,'user already participaning',false);
        }
    }


    private function checkJoin($user_id,$auction_id)
    {

        $check_join = Participant::where('user_id',$user_id)->where('auctions_id',$auction_id)->first();
        if(empty($check_join))
        {
            return false;
        }
        else{
            return true;
        }

    }


    private function getApartmentDetails($apartment_id) {
        $AuctionedApartment = FinalAuction::where('apartment_id','=',$apartment_id)
            ->select('id','starting_price', 'start_at', 'end_at', 'apartment_id')

                ->with(['apartment' => function ($query){
                    $query->select('id', 'location', 'type', 'rating','vrlink');

                    $query->with('gallary');

                    $query->with(['info'=> function($query) {
                        $query->select('id','apartment_id','livingroom','bedroom','parking',
                            'baths','floors','erea');
                        }]);

                    $query->with(['transactionAuction'=> function($query) {
                        $query->select('apartment_id','current_price');
                        $query->orderBy('current_price', 'desc')->first();
                        }]);
                    }]);
                // ->with(['participant'=> function($query) {
                //     $query->select('auctions_id','user_id');
                //     }]);

        $results = $AuctionedApartment->get();

        $results->each(function ($finalAuction)
        {
            $finalAuction->participant_count = $finalAuction->participant()->count();
        });
        return $results;
    }

    private function customResponse($listedAuctionedApartment,$togle,$togle2)
    {
        $data = $listedAuctionedApartment->map(function ($item) use($togle,$togle2) {
            // Convert start_at and end_at to Carbon instances for easier manipulation
            $startAt = Carbon::parse($item->start_at);
            $endAt = Carbon::parse($item->end_at);
            // Calculate the duration in days, hours, and minutes

            $duration = $endAt->diff(now());
            $days = $duration->d;
            $hours = $duration->h;
            $minutes = $duration->i;
            $durationToEnd = [ 'day' => $days, 'hours' => $hours, 'minutes' => $minutes];


            $duration = $startAt->diff(now());
            $days = $duration->d;
            $hours = $duration->h;
            $minutes = $duration->i;
            $durationToStart= [ 'day' => $days, 'hours' => $hours, 'minutes' => $minutes,];

            // Update the gallary values in the item
            if($togle == 0)
            {
                $images = env('APP_URL')."/".'public'."/".$item->apartment->gallary->image[0];
                $item->image = $images;
            }else{
                $emptyImage = [];
                $images = $item->apartment->gallary->image;
                foreach($images as $img)
                {
                    $img = env('APP_URL').'/'.'public'.'/'.$img;
                    $emptyImage[]=$img;
                }
                $item->image = $emptyImage;
            }
            unset($item->apartment->gallary);

            if($togle2 == 1)
            {
                $item->togle = 0;
            }elseif($togle2 == 2)
            {
                $item->togle = 1;
            }
            // Update the start_at and end_at values in the item
            return array_merge($item->toArray(), ['durationToEnd' => $durationToEnd ,'durationToStart'=> $durationToStart]);
        });
        return $data;
    }

}
