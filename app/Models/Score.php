<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    public function scopeType(Builder $builder,$type)
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $typeActivity=Activity::whereIn("id",$activity)->where("type",$type)->count();
        return $typeActivity;
    }
}
