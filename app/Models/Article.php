<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function scopeDoctors(Builder $builder)
    {
        //return $builder->where("article","=","hello article 1 paltnium");
    }
    protected static function booted()
    {
        static::addGlobalScope(function (Builder $builder){
            return $builder->where("doctor_id","=",Auth::guard("doctors")->id());
        });
    }
}
