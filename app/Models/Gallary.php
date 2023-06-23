<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallary extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable = [
        "apartment_id",
        "image",
    ];

    protected $hidden = [
        'id',
        'apartment_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts = [
        'image' => 'array',
    ];


    public function Apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
