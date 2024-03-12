<?php

namespace App\Models;

use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps=false;
    protected $hidden=["receipt"];
    protected $appends=[
        "image_url"
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function scopeDoctors(Builder $builder,$type)
    {
        $builder->where("type","=",$type);
    }
    protected static function booted()
    {
        static::updating(function (Subscription $subscription) {
            $plan = Plan::find(request('planID'));
            if ($plan) {
                $subscription->coupon_remaining = $plan->coupon_num;
                $subscription->posts_remaining = $plan->post_num;
                $subscription->started_at = Carbon::now();
                $subscription->end_at = Subscription::getEndAtDay($plan->day_period);
            }
        });
    }
    protected  static  function getEndAtDay($days)
    {
        $currentDate = Carbon::now();
        $newDate = $currentDate->addDays($days);
        return $newDate;
    }
    public function getImageUrlAttribute()
    {
        return asset('public/receipts/'.$this->profile_image);
    }
}
