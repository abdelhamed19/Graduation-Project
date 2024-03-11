<?php

namespace App\Http\Controllers\Writings;

use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts= Post::latest()->take(4)->get();
        if($posts->isEmpty())
        {
            return BaseResponse::MakeResponse(null,404,'No posts found');
        }
        return BaseResponse::MakeResponse($posts,200, 'Posts retrieved successfully');
    }
    public function store(Request $request)
    {
        $user=Auth::user();
        $request->validate([
            'body' => ['required','string','max:255','min:3']
        ]);
       $post= $user->posts()->create($request->only('body'));
        return BaseResponse::MakeResponse($post,200, 'Posts Created successfully');
    }
    public function like(Post $post)
    {
        $post->likes_count++;
        $post->save();
        return BaseResponse::MakeResponse(null,200, 'Like Created successfully');
    }
    public function unlike(Post $post)
    {
        $post->likes_count--;
        $post->save();
        return BaseResponse::MakeResponse(null,200, 'Unliked successfully');
    }

}
