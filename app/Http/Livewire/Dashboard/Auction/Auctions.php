<?php

namespace App\Http\Livewire\Dashboard\Auction;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Apartment;
use App\Models\FinalAuction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Auctions extends Component
{
    public $user;
    public $Apart;
    public $Apartid;
    public $addAuction = false;
    public $auction_end_date;
    public $auction_start_date;
    public $base_salary;

    public function addAuction($id)
    {
        if ($this->user)
        {
            $Apartment = Apartment::find($id);
            // vaildate and authorization  user
            if ($Apartment->user_id == $this->user->id) {

                $data = $this->customAtrrbuite($this->auction_start_date,
                                               $this->auction_end_date,
                                               $this->base_salary);
                $Auction = FinalAuction::where('user_id' , '=' ,$this->user->id)->where('apartment_id','=',$Apartment->id)->first();
                if(empty($Auction))
                {
                    $Auction = new FinalAuction();
                    $Auction->user_id = $this->user->id;
                    $Auction->apartment_id = $Apartment->id;
                    $Auction->start_at = $data['auction_start_date'];
                    $Auction->end_at = $data['auction_end_date'];
                    $Auction->starting_price = $data['base_salary'];
                    $Auction->final_price = 0;
                    $Auction->save();
                }else{
                    // $Auction->user_id = $this->user->id;
                    // $Auction->apartment_id = $Apartment->id;
                    $Auction->start_at = $data['auction_start_date'];
                    $Auction->end_at = $data['auction_end_date'];
                    $Auction->starting_price = $data['base_salary'];
                    $Auction->final_price = 0;
                    $Auction->save();
                }

                session()->flash('success',"Auction added Successfully.");
                    $this->dispatchBrowserEvent('hide-Auction');
            }
        }
    }



    public function showAuction($id)
    {
        $this->addAuction = true;
        $this->resetAtrr();
        $this->Apartid = $id;
        $this->dispatchBrowserEvent('show-auction');
    }

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.dashboard.auction.auctions', [
            'apartments' => $this->user->Apartment()->with('info','auction')->paginate(10),
        ]);
    }

    private function customAtrrbuite($start , $end ,$base_salary )
    {
        $start = Carbon::parse($start)->toDateTimeString();
        $end = Carbon::parse($end)->toDateTimeString();
        $data = ["auction_start_date" => $start, "auction_end_date" => $end, "base_salary" => $base_salary];
        $this->vaildateData($data);
        return $data;
    }


    private function vaildateData($data)
    {
        Validator::make($data,[
            'auction_start_date' => 'required|date',
            'auction_end_date' => 'required|date|after:auction_start_date',
            'base_salary' => 'required|numeric',
        ])->validate();
    }

    private function resetAtrr()
    {
        $this->auction_end_date = '';
        $this->auction_start_date = '';
        $this->base_salary = 0;
    }
}
