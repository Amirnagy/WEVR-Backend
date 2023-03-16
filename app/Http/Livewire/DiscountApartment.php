<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Apartment;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class DiscountApartment extends Component
{
    use WithPagination;
    // public $address;
    // public $location;
    // public $dimensions;
    // public $status;
    // public $discount;
    public $user;
    // public $apartments;
    public $imageUrls;
    public $info;




    /**
     * return data that appear in livewire component for the frist time
     *  apartment - address - location - dimensions - status - discount
     */
    public function mount()
    {
        $this->user = Auth::user(); // ==> get Auth apartment
        // $this->apartments = $this->user->Apartment()->paginate(10); // ==> get all apartment

        // $this->gallary = collect();
        // $this->info = collect();
        // foreach ($this->apartments as $apartment)
        // {
        //     $this->gallary->push($apartment->gallary);
        //     $this->info->push($apartment->info);
        // }
    }

    public function showImages($ApaertmentId)
    {
        // Fetch the item from the database using the $itemId parameter
        if($this->user->Apartment->$ApaertmentId){

            $apartment = Apartment::find($ApaertmentId);
            // $gallary = $apartment->gallary->image;
            dd($apartment);
        }


        // Show the modal
        $this->emit('showModal');
    }
















    public function render()
    {
        return view('livewire.discount-apartment',[
            'apartments' => $this->user->Apartment()->paginate(5)
        ]);
    }
}
