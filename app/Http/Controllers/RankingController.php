<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\Book;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    //scoresテーブルのscoreの値の平均値を出してランキングとして表示する
    public function index()
    {
        //scoresテーブルのbook_idをグループ化して、それぞれのbook_idに該当するscoreの平均値を出す。そして、上から三番目までに絞る。
        $scores = Score::select('book_id')->selectRaw('Avg(score) as avg')->groupBy('book_id')->orderBy('avg','DESC')->limit(3)->get();
           //dd($score);
             
        
        return view('ranking')->with([
            'scores' => $scores
            ]);
    }
}
