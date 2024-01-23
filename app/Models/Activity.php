<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts = [
        'description' => 'array'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }

}
