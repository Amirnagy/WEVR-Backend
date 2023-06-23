<?php

namespace App\Models;

use App\Models\User;
use App\Models\FinalAuction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';

    // Specify the fillable attributes
    protected $fillable = ['user_id','auctions_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function FinalAuction()
    {
        return $this->belongsTo(FinalAuction::class);
    }

}
