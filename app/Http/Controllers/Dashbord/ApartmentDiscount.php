<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApartmentDiscount extends Controller
{
    public function makeDiscount()
    {
        $user = Auth::user();
        return view('dashbord.Discount.discount',compact('user'));
    }
}
