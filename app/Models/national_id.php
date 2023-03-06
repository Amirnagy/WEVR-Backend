<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class national_id extends Model
{
    use HasFactory;
    protected $table = 'nationals_id';

    protected $fillable =[
        'user_id',
        'id_national',
        'front_national',
        'back_national'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
