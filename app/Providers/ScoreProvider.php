<?php

namespace App\Providers;

use App\Models\Score;
use App\Models\Activity;
use Illuminate\Support\ServiceProvider;

class ScoreProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind("activity",function($type){
            $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
            $typeActivity=Activity::whereIn("id",$activity)->where("type",$type)->count();
            return $typeActivity;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
