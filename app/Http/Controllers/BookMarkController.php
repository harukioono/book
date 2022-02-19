<?php

namespace App\Http\Controllers;

use App\Book;
use App\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookMarkController extends Controller
{
    
    //ブックマークボタンを押してお気に入り登録をする
    public function store(Request $request, Bookmark $bookmark)
    {
        
        //bookmarksテーブルのuser_idがAuth(サイトを利用しているユーザーの情報)のidと一致する、かつ、book_idにクリックした本と同じidが入っていることをexists（存在）で確認
        $mark = Bookmark::where('user_id',Auth::id())->where('book_id',$request->book_id)->exists();
        
        
            //$markではなかったら、本のidとユーザーのidをbookmarksテーブルに保存
            if(!$mark){
             
            $bookmark->book_id = $request->book_id;
            $bookmark->user_id = Auth::user()->id;
            $bookmark->save();
        
            }
        
        
        
        
       $bookmarks=$bookmark->where('user_id',Auth::user()->id)->get();
       return view('bookmark')->with([
            'bookmarks' => $bookmarks
            ]);
}


//ブックマーク解除ボタンを押してお気に入り登録を解除する
    public function destroy(Request $request, $id) {
        $book=Book::findOrFail($id);
        

        $book->bookmarks()->delete();

        return redirect('bookmark');
    }
}
