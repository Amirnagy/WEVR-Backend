<?php

namespace App\Models;

use App\Models\Banner;
use App\Models\Gallary;
use App\Models\SavedApartment;
use App\Models\Apartmentdetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'user_id',
        'vrlink',
        'type',
        'location',
        'status',
        'dimensions',
        'descrption',
        'features',
        'rating'

    ];
    protected $casts = [
        'features' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function info()
    {
        return $this->hasOne(Apartmentdetails::class);
    }

    public function gallary()
    {
        return $this->hasOne(Gallary::class);
    }

    public function Banner()
    {
        return $this->hasOne(Banner::class);
    }

    public function SavedUser()
    {
        return $this->belongsTo(SavedApartment::class,'apartment_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'apartment_user_reservation')->withPivot('owner_apartment', 'reservation_date');
    }

}
