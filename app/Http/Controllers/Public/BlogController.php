<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private const POSTS_PER_PAGE = 2;


    public function index()
    {
        $posts = Post::where('is_published', true)->paginate(self::POSTS_PER_PAGE);

        return view('public.blog', compact('posts'));
    }

    public function show(mixed $id)
    {
        $post = Post::where('id', $id)->where('is_published', true)->first();

        if ($post == null) {
            abort(404);
        }

        return view('public.post', compact('post'));
    }
}
