<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function doctors()
    {
        return $this->belongsTo(Doctor::class);
    }
    protected static function booted()
    {
        static::creating(function (Coupon $coupon){
            //202400001, 202400002
            $coupon->number = Coupon::setCouponNumber();
        });

        static::addGlobalScope(function ($builder){
            return $builder->where("doctor_id",Auth::guard("doctors")->id());
        });
    }
    protected static function setCouponNumber()
    {
        $year = Carbon::now()->year;
        $number =Coupon::whereYear("created_at", $year)->max("number");
        if($number){
            return $number+1;
        }
        return $year."00001";
    }
}
