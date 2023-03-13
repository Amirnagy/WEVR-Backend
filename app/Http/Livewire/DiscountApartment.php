<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DiscountApartment extends Component
{
    public $apartment;
    public $address;
    public $location;
    public $dimensions;
    public $status;
    public $discount;
    public $user;




    /**
     * return data that appear in livewire component for the frist time
     *  apartment - address - location - dimensions - status - discount
     */
    // public function mount($userID)
    // {
    //     $this->user = User::findOrFail($userID);
    // }

    public function render()
    {
        // $user = $this->user;
        // dd($user);
        return view('livewire.discount-apartment');
    }
}
