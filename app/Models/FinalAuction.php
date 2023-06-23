<?php

namespace App\Models;

use App\Models\User;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinalAuction extends Model
{
    use HasFactory;

    protected $table = 'final_auctions';

    // Specify the fillable attributes
    protected $fillable = ['user_id','apartment_id', 'starting_price','final_price','start_at','end_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function apartment()
    {
        return $this->belongsTo(Apartment::class,'apartment_id','id');
    }

    // public function image()
    // {
    //     return $this->hasManyThrough('App\Models\Apartment','App\Models\Gallary','apartment_id','');
    // }


}
