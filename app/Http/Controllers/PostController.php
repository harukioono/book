<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function index(Post $post)
    {
        return view('bbs')->with(['posts' => $post->get()]);
    }
    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
    
        $post->fill($input)->save();
    
        return redirect('/bbs');
    }
}
