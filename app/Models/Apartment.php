<?php

namespace App\Models;

use App\Models\Banner;
use App\Models\Gallary;
use App\Models\Apartmentdetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'vrlink',
        'location',
        'status',
        'dimensions',
        'descrption',
        'features',

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


}
