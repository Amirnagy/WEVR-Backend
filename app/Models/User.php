<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Apartment;
use App\Models\SavedApartment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'adderss',
        'pin_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Token()
    {
        return $this->hasOne(Token::class);
    }


    public function socila()
    {
        return $this->hasOne(Social::class);
    }

    public function nationals_id()
    {
        return $this->hasOne(national_id::class);
    }

    public function Apartment(){
        return $this->hasMany(Apartment::class);
    }

    public function SavedApartmant()
    {
        return $this->hasMany(SavedApartment::class,'user_id');
    }
}
