<?php

namespace App\Models;

use App\Models\User;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavedApartment extends Model
{
    use HasFactory;

    protected $fillable =[
        'apartment_id',
        'user_id'
    ];

    public function Apartment()
    {
        return $this->belongsTo(Apartment::class,'apartment_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
