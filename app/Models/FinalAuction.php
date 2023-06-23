<?php

namespace App\Models;

use App\Models\User;
use App\Models\Apartment;
use App\Models\Participant;
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

    public function participant()
    {
        return $this->hasMany(Participant::class,'auctions_id','id');
    }
    public function userCount()
    {
        return $this->participant()->count();
    }


}
