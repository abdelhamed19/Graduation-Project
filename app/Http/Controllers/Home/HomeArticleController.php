<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeArticleController extends Controller
{
    public function platinum()
    {
        $articles=Article::with('doctor.subscription')->latest()->get();
        foreach ($articles as $value)
        {
            $subs= $value->doctor->subscription;
        }
        $planId=$subs->plan_id;
        if ($planId == 3)
        {
             return response()->json($articles);
        }
        return response()->noContent();
    }
}
