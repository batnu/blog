<?php

namespace App\Http\Controllers;

use App\Events\PostVisit;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function show(Post $post, User $user)
    {
        if ($post->isPublished() || auth()->check()) {
            PostVisit::dispatch($post);
            return view('posts.show', compact('post', 'user'));
        }
        abort(404);
    }
}
