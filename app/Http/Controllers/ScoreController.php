<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Score;
use App\Bookmark;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    //クリックした本のタイトルのidを取得&ブックマークボタンの実装
    public function search(Book $book,Bookmark $bookmark)
    {
        $id = $book->id;
        
        
        $bookmark=Bookmark::where('book_id',$id)->exists();
        
       //dd($bookmark);
       
        
        return view('score')->with(['book'=>$book, 'bookmark'=>$bookmark]);
    }
    
    //点数とコメントを表示
    public function index($book)
    {
        
        
        //dd((int)$book);
        $i = (int)$book;
    
        
        
        
        return view('scoreExecute')->with(['scores'=>Book::find($i)->scores()->get()]);
    }
    
    //入力された点数とコメントをscoresテーブルに保存
    public function store(Score $score,Request $request)
    {
        
        
        
        $bookid = (int)$request['book_id'];
        
    
        $score->fill([
         'user_id'=>Auth::user()->id,
         'book_id'=>$bookid,
         'score'=> $request["book.score"],
         'comment'=>$request["book.comment"],
         
        ])->save();
        
        return redirect('/book/'.$bookid);
    }
}