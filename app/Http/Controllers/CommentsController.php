<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        //dd($request->name_user);

        $this->validate($request, ['comment' => 'required']);

        //$post = Post::find($request->post_id);

        $post->comments()->create([
            'comment' => $request->comment,
            'name_user' => $request->name_user
            //'post_id' => $post->id
        ]);

        return redirect()->route('posts.show',$post->slug)->withFlash('Comentario creado con exito');

    }
}
