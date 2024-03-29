<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $hidden=["created_at","updated_at"];
    protected $guarded=[];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    public function status()
    {
        return $this->hasMany(Status::class);
    }

}
