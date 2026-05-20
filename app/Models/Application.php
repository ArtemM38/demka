<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'user_id',
    'car_marks_id',
    'car_models_id',
    'address',
    'phone',
    'date',
    'license_series',
    'license_date',
    'status',
    'pay_method'
])]

class Application extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;



    public function User(){
        return $this->belongsTo(User::class);
    }
    public function CarMark(){
        return $this->belongsTo(CarMark::class, 'car_marks_id');
    }
    public function CarModel(){
        return $this->belongsTo(CarModel::class, 'car_models_id');
    }
}