<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->paginate('10');

        return view('post.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function liker(Post $post)
    {
        //TODO
        if ($user = auth()->user()) {
            $user->likedPosts()->toggle($post->id);
        }

        return redirect()->back();
    }
}
