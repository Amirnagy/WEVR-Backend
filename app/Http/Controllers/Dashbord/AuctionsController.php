<?php

namespace App\Http\Controllers\Dashbord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuctionsController extends Controller
{
    public function makeAuction()
    {
        $user = Auth::user();
        return view('dashbord.Auction.auction',compact('user'));
    }
}
