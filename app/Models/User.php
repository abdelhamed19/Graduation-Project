<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class)->withDefault([
            'totalScore' => 0,
            'testScore' => 0,
        ]);
    }
    public function writings()
    {
        return $this->hasMany(Writing::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function role()
    {
        return $this->hasOne(Role::class)->withDefault();
    }
    public function status()
    {
        return $this->hasMany(Status::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function trackings()
    {
        return $this->hasMany(Tracking::class);
    }
}
