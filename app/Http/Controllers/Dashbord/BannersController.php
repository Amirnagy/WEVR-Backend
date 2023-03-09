<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannersController extends Controller
{

    public function getBanner()
    {
        return view('dashbord.banners');
    }





    public function postBanner()
    {

    }
}
