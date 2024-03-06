<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps=false;
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
