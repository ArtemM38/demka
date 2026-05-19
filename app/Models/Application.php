<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'user_id',
    'car_mark',
    'car_model',
    'address',
    'phone',
    'date',
    'license_series',
    'license_date',
    'pay_method'
])]

class Application extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;



    public function User(){
        return $this->belongsTo(User::class);
    }
    public function CarMark(){
        return $this->belongsTo(CarMark::class);
    }
    public function CarModel(){
        return $this->belongsTo(CarModel::class);
    }
}