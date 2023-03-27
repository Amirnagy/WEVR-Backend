<?php

namespace App\Http\Livewire\Dashboard\Discount;

use App\Models\Apartment;
use App\Models\Banner;
use App\Models\Gallary;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Discount extends Component
{
    use WithPagination;

    public $user;

    public $addDiscount = false;
    public $Apartid;
    public $discount;
    public $discount_end_date;


    protected $rules =[
            'discount' => 'required|numeric|min:0|max:100',
            'discount_end_date' => 'required|date|after_or_equal:today',
    ];

    public function discount($id)
    {
        $this->Apartid = $id;
        $this->addDiscount = true;
        $this->dispatchBrowserEvent('show-discount');
    }

    /**
     * return data that appear in livewire component for the frist time
     *  apartment - address - location - dimensions - status - discount
     */
    public function mount()
    {
        $this->user = Auth::user();
    }

    public function addDiscount($id)
    {

        $this->validate();

        if ($this->user) {
            $Apartment = Apartment::find($id);
            if ($Apartment->user_id == $this->user->id) {
                $Apartment->info->discount = $this->discount;
                $Apartment->info->discount_end_date = $this->discount_end_date;
                $Apartment->info->price_after_discount = $Apartment->info->yearprice - ($this->discount / 100) * $Apartment->info->yearprice;

                if ($Apartment->info->save()) {
                    $image = $Apartment->gallary->image[0];
                    $Banner = $Apartment->Banner;

                    if ($Apartment->Banner) {
                        $Banner->apartment_id = $Apartment->id;
                        $Banner->image = $image;
                        $Banner->price_after_discount = $Apartment->info->price_after_discount;
                        $Banner->discount_end_date = $Apartment->info->discount_end_date;
                        $Banner->discount = $Apartment->info->discount;
                        $Banner->save();
                    } else {
                        $Banner = new Banner();
                        if ($Banner) {
                            $Banner->apartment_id = $Apartment->id;
                            $Banner->image = $image;
                            $Banner->price_after_discount = $Apartment->info->price_after_discount;
                            $Banner->discount_end_date = $Apartment->info->discount_end_date;
                            $Banner->discount = $Apartment->info->discount;
                            $Banner->save();
                        }
                    }
                    session()->flash('success',"Discount added Successfully.");
                    $this->dispatchBrowserEvent('hide-discount');
                }
            }

        }

    }

    public function render()
    {

        return view('livewire.dashboard.discount.discount', [
            'apartments' => $this->user->Apartment()->with('info')->paginate(10),
        ]);
    }

}
