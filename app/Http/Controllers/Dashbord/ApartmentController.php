<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Apartmentdetails;
use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApartmentController extends Controller
{
    protected $gallary = [];

    public function showApartments()
    {
        return view('dashbord.apartments.ListApartment');
    }

    
}
