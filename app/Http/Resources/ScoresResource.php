<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;

class ScoresResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $level =DB::table("level_scores")->where("user_id",auth()->user()->id)->get();
        return [
            "levelId"=>$level->level_id,
            "score"=>$level->score,
            "unlocked"=>boolval($level->unlocked)
        ];
    }
}
