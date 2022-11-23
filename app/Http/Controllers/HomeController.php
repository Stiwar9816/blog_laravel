<?php

namespace App\Http\Controllers;
use App\Models\Post;

class HomeController extends Controller
{
    public function show()
    {
        $posts = Post::get();

        return view('welcome')->with('posts', $posts);
    }
}
