<?php

namespace App\Http\Controllers\Doctor;

use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::doctors()->latest()->paginate(10);
        if ($articles->isEmpty())
        {
            return BaseResponse::MakeResponse(null, false, ["errorMessage" => "No articles yet"]);
        }
        return BaseResponse::MakeResponse(["articles"=>$articles], true, ["successMessage" => "Articles retrived"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $validated=$request->validated();
        $doctor=Auth::guard("doctors")->user();
        if ( $doctor->subscription->posts_remaining == 0)
        {
            return BaseResponse::MakeResponse(null, false, ["errorMessage" => "Posts exhausted"]);
        }
        $doctor->articles()->create($validated);
        $doctor->subscription()->decrement("posts_remaining",1);
        return BaseResponse::MakeResponse(null, true, ["successMessage" => "Articles Created successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validate=$request->validated();
        $article->update($validate);
        return BaseResponse::MakeResponse(null, true, ["successMessage" => "Article Updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return BaseResponse::MakeResponse(null, true, ["successMessage" => "Article Deleted successfully"]);
    }
}
