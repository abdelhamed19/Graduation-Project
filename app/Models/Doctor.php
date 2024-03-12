<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'doctors';
    protected $guarded=[];

    public $timestamps=false;
    protected $hidden=[
        "password",
        "remember_token",
        "profile_image","card_image","ssn_image"
    ];
    protected $appends=[
        "image_url"
    ];
    protected $casts = [
        'password' => 'hashed',
    ];
    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }
    public function role()
    {
        return $this->hasOne(Role::class);
    }
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    protected static function booted()
    {
        static::created(function (Doctor $doctor){
            Role::create([
                "role"=>'doctor',
                'doctor_id'=>$doctor->id,
                'username'=>$doctor->name
            ]);
            Subscription::create([
                "doctor_id"=>$doctor->id,
            ]);
        });
    }
    public function getImageUrlAttribute()
    {
        $images=["profile_image"=>$this->profile_image,"card_image"=>$this->card_image,"ssn_image"=>$this->ssn_image];
        $imagePath=[];
        foreach ($images as $type => $image)
        {
            $imagePath[$type] = asset('public/assets/'.$image);
        }
        return $imagePath;
    }
}
