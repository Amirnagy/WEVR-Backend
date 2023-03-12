<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallary extends Model
{
    use HasFactory;

    protected $fillable = [
        "apartment_id",
        "image",
    ];

    protected $casts = [
        'image' => 'array',
    ];


    public function Apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
