<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {

        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        //Envio por asignación masiva
        Comment::create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'post_id' => $post->id,
        ]);
        return back();
    }
}
