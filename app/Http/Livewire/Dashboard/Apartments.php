<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Gallary;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Apartments extends Component
{

    public $user;
    public $apartmentImages;



    public function mount()
    {
        $this->user = Auth::user();
    }


    public function showImage($ApartmentId)
    {
        $ApartmentsUser = $this->user->Apartment;
        // Fetch the item from the database using the $itemId parameter
        foreach ($ApartmentsUser as $Apartment )
        {
            if( $Apartment->id == $ApartmentId ){

                $apartment = Gallary::where('apartment_id',$ApartmentId)->first();
                if($apartment)
                {
                    $apartmentImages = $apartment->image;
                    $apartmentImages = array_map('stripslashes', $apartmentImages);
                    $this->apartmentImages = $apartmentImages;
                    break;
                }
                else{
                    return $this->apartmentImages=[];
                    break;
                }
            }
        }
        // dd($this->apartmentImages);

    }



    public function render()
    {
        $apartments = $this->user->Apartment()->with('info')->get();
        // dd($apartments);

        return view('livewire.dashboard.apartments',compact('apartments'));
    }
}
