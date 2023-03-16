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
        return view('dashbord.apartments.add');
    }

    public function postApartments(Request $request)
    {
        $Vaildator = $request->validate([
            'link' => 'required|url',
            'price' => 'required|numeric',
            'location' => 'required',
            'num_bedrooms' => 'required|integer',
            'num_living_rooms' => 'required|integer',
            'num_bathrooms' => 'required|integer',
            'num_parking' => 'nullable',
            'num_floors' => 'required|integer',
            'area' => 'required|integer',
            'description' => 'required',
            'ratings' => 'nullable|numeric|min:1',
            'features.*' => 'required',
            'files.*' => 'required',
        ]);
        $user = $request->user();

        if ($user) {
            $features = array_filter($request->features);
            $Apartment = new Apartment();
            $Apartment->fill([
                'user_id' => $user->id,
                'vrlink' => $request->link,
                'location' => $request->location,
                'status' => 'available',
                'dimensions' => $request->area,
                'descrption' => $request->description,
                'features' => $features,
            ]);
            $Apartment->save();

            // another method for save data
            // $Apartment->atributte = $request->attributes
            // $Apartment->featuers = $request->input('features', []);
            // saveing
            
            $ApartmentDetiles = new Apartmentdetails();
            $ApartmentDetiles->apartment_id = $Apartment->id;
            $ApartmentDetiles->monthprice = $request->price;
            $ApartmentDetiles->yearprice = $request->price * 12;
            $ApartmentDetiles->livingroom = $request->num_living_rooms;
            $ApartmentDetiles->bedroom = $request->num_bedrooms;
            $ApartmentDetiles->parking = $request->num_parking;
            $ApartmentDetiles->baths = $request->num_bathrooms;
            $ApartmentDetiles->floors = $request->num_floors;
            $ApartmentDetiles->erea = $request->area;
            $ApartmentDetiles->save();

            // $images = $request->files;
            $images = $request->file('files');

            foreach ($images as $file) {
                $ImageName = rand(100000, 999999) . time() . $file->getClientOriginalName();
                $path = $file->storeAs('gallaryaprtments', $ImageName, 'WEVR');
                $this->gallary[] = $path;
            }

            $ApartmentGallary = new Gallary();
            $ApartmentGallary->apartment_id = $Apartment->id;
            $ApartmentGallary->image = $this->gallary;
            $ApartmentGallary->save();
        }

        if ($ApartmentGallary->save() && $ApartmentDetiles->save() && $Apartment->save()) {
            Session::flash('success', 'Apartment created successfully!');
        }
        return redirect()->back();
    }
}
