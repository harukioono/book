<?php

namespace App\Http\Controllers;

use App\Book;
use App\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookMarkController extends Controller
{
    public function store(Request $request, Bookmark $bookmark)
    {
        $mark = Bookmark::where('user_id',Auth::id())->where('book_id',$request->book_id)->exists();
        if(!$mark){
             
        $bookmark->book_id = $request->book_id;
        $bookmark->user_id = Auth::user()->id;
        $bookmark->save();
        
        }
       $bookmarks=$bookmark->where('user_id',Auth::user()->id)->get();
       return redirect('/book/{book}');
}
    public function destroy(Request $request, $id) {
        $book=Book::findOrFail($id);
        

        $book->bookmarks()->delete();

        return redirect('/book/{book}');
    }
}
