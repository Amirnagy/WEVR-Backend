<?php

namespace App\Models;

use App\Models\User;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionAuction extends Model
{
    use HasFactory;

    protected $table = 'transaction_auctions';


    // Specify the fillable attributes
    protected $fillable = ['user_id','apartment_id', 'added_value','current_price','last_price','start_at','end_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }


}
