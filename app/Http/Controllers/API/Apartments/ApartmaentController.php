<?php

namespace App\Http\Controllers\API\Apartments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmaentController extends Controller
{
    /**
     * will return banners with id of it
     * banners is an image with discount every day
     *
     * @param Request $request
     */
    public function getBanners(Request $request)
    {

    }


    public function postBanner()
    {
        return view('dashbord.banners');
    }
}
