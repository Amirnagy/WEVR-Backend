<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'provider_id',
        'provider_name',
    ];



    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
