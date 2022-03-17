<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Score;
use App\Bookmark;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    //クリックした本のタイトルのidを取得 & 同じ作者の本を表示 & ブックマークボタンの実装
    public function search(Book $book,Bookmark $bookmark)
    {
        $id = $book->id;
        
        //クリックした本と同じ作者が書いたもの & クリックした本と同じタイトルではないもの & 作者名が分かっているもの（authorがNULLではないもの）
        $authors = Book::where('author','like','%'.$book->author.'%')->whereNotIn('title',[$book->title])->whereNotNull('author')->get();
        
        //$authorsの条件に該当するデータの個数を数える
        $authors_count = count($authors);
        
        //クリックした本と同じジャンルのもの & クリックした本と同じタイトルではないもの & ジャンル分け出来るもの（booksGenreIdがNULLではないもの）
        $booksGenreIds = Book::where('booksGenreId','like','%'.$book->booksGenreId.'%')->whereNotIn('title',[$book->title])->whereNotNull('booksGenreId')->get();
        
        //$booksGenreIdsの条件に該当するデータの個数を数える
        $booksGenreIds_count = count($booksGenreIds);
        
        
        //クリックした本のbookテーブルのidがbookmarkテーブルに存在するかどうかをexists()で確認
        $bookmark=Bookmark::where('book_id',$id)->exists();
        
        
       
        
        return view('score')->with(['book'=>$book, 'authors'=>$authors, 'authors_count'=>$authors_count, 'booksGenreIds'=>$booksGenreIds, 'booksGenreIds_count'=>$booksGenreIds_count,'bookmark'=>$bookmark]);
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