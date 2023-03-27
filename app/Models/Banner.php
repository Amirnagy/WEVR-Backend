<?php

namespace App\Models;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable=[
        'apartment_id',
        'image',
        'discount',
        'discount_end_date'
    ];


    public function Apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    protected $casts = [
        'image' => 'array',
    ];
}
