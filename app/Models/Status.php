<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    public  $timestamps = false;
    protected $table= 'level_scores';
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
