<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts', 3600, function () {
            return PostResource::collection(Post::all());
        });
        return $posts;
    }
    public function fetch()
    {
        $cachedPosts = Cache::get('posts');
        if ($cachedPosts) {
            return $cachedPosts;
        } else {
            $posts = PostResource::collection(Post::all());
            Cache::put('posts', $posts, 3600);
            return $posts;
        }
    }
    public function redis()
    {
        $cachedPosts = Cache::get('posts');
        if ($cachedPosts) {
            return $cachedPosts;
        } else {
            $posts = PostResource::collection(Post::all());
            Cache::put('posts', $posts, 3600);
            return $posts;
        }
    }
    public function clear()
    {
        return Cache::forget('posts');
    }
}
