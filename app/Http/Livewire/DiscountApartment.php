<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Request;
use App\Models\Banner;
use App\Models\Gallary;
use Livewire\Component;
use App\Models\Apartment;
use Livewire\WithPagination;
use App\Models\Apartmentdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DiscountApartment extends Component
{
    use WithPagination;
    // public $address;
    // public $location;
    // public $dimensions;
    // public $status;
    public $discounts=[];
    public $user;
    // public $apartments;
    public $apartmentImages=[];
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


    public function addDiscount($apartmentID)
    {
        foreach($this->discounts as $key => $discount)
        {
            if($key == $apartmentID)
            {
                // $discount will be the value of this input feild
                // ====== return instance of user Apartment with relation Banner of Apartment =====
                // $ApartmentsUser = $this->user->Apartment()->where('id', $apartmentID)->get();
                $ApartmentUser = $this->user->Apartment()->with('Banner')->where('id', $apartmentID)->first();
                $photos = Gallary::where('apartment_id',$apartmentID)->first();
                $photos = $photos->image;
                $Banner = $ApartmentUser->Banner;
                if($Banner){
                    $priceyear = Apartmentdetails::where('apartment_id',$apartmentID)->first();

                    $Banner->image = $photos;
                    $Banner->discount = $discount;
                    $Banner->price_after_discount = ($priceyear->yearprice * $discount/100) - ($discount/100);
                    $Banner->save();
                    $priceyear->price_after_discount = ($priceyear->yearprice * $discount/100) - ($discount/100);
                    if($priceyear->save()){
                        Session::flash('success', 'Discount created successfully!');
                    }


                    break;
                }else{
                    $priceyear = Apartmentdetails::where('apartment_id',$apartmentID)->first();
                    $Banner = new Banner();
                    $Banner->apartment_id = $apartmentID ;
                    $Banner->image = $photos;
                    $Banner->discount = $discount;
                    $Banner->price_after_discount = ($priceyear->yearprice * $discount/100) - ($discount/100);
                    $Banner->save();

                    $priceyear->price_after_discount = ($priceyear->yearprice * $discount/100) - ($discount/100);
                    $priceyear->save();
                    if($priceyear->save()){
                        Session::flash('success', 'Discount created successfully!');
                    }
                    break;
                }

            }
        }

    }
















    public function render()
    {
        return view('livewire.discount-apartment',[
            'apartments' => $this->user->Apartment()->paginate(10)
        ]);
    }
}
