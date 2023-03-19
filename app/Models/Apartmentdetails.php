<?php

namespace App\Models;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartmentdetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'apartment_id',
        'monthprice',
        'yearprice',
        'livingroom',
        'bedroom',
        'parking',
        'baths',
        'floors',
        'erea',

    ];


    protected $hidden = [
        'id',
        'apartment_id',
        'created_at',
        'updated_at',
        'price_after_discount'
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }



}
