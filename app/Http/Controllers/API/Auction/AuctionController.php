<?php

namespace App\Http\Controllers\API\Auction;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{

    function addPrice(Request $request) {
        $request->user()->id;
        // check the amount of bank balance
        // will work on transaction auction table frist
        // we will check the last amount of payment from this table by Auction_id and Apartment_id
        // if the value is more than the current not accepted
        // else add it and return the details
        // .

    }
}
