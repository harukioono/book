<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    //コミュニティ（掲示板）のページと入力された名前とコメントの表示
     public function index(Post $post)
    {
        return view('bbs')->with(['posts' => $post->get()]);
    }
    
    //名前とコメントが入力されて送信されたら、PostController@indexへ
    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
    
        $post->fill($input)->save();
    
        return redirect('/bbs');
    }
}
