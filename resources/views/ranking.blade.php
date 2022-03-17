<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
        <title>BookLike</title>
        <link rel="stylesheet" href="{{ asset('css/booklike.css') }}">
        
    </head>
    <body>
    <div class='flex'>
        <a href="/"><p class='headregion'>ホーム</p></a>
        <a href="/novel"><p class='headregion'>小説</p></a>
        <a href="/comic"><p class='headregion'>漫画</p></a>
        <a href="/search"><p class='headregion'>検索</p></a>
        <a href="/ranking"><p class='headregion padding-r'>ランキング</p></a>
        <a href="/bookmark"><p class='headregion padding-m'>My本棚</p></a>
    </div>
    
    <script src="{{ asset('/js/ranking.js') }}"></script>
    
        <div onclick="RankingA()"><p class='block'>ランキングとは？</p></div>
        
        
        <div><p id="ranking" class='ranking-explanations'>ランキングは本の評価点数の平均値を高い順に上位三位の表紙・タイトル・評価点数の平均を表示しています&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span onclick="RankingB()" class='cross'>×</span></p></div>
    
        <p class='ranking'>ランキング</p>
        <div class='ranking_placing'>
       @foreach($scores as $index=> $score)
        <p class='rank{{(string)((int)$index+1)}}_background-color'><span class='rank{{(string)((int)$index+1)}}'>{{(string)((int)$index+1)}}</span><span class='ranks{{(string)((int)$index+1)}}'>位</span></p>
        
        @if($score->book->largeImageUrl == NULL)
       <a href="/books/{{$score->book->id}}"><img src="{{$score->book->largeImageUrl =  'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/noimage_01.gif?_ex=200x20'}}"  width="400" height="450"></a>
       <a href="/books/{{$score->book->id}}"><p>{{$score->book->title}}</p></a>
       <p>作者：<a href="/books/{{$score->book->id}}">{{$score->book->author}}</p></a>
       <p>点数：{{$score->avg}}</p>
       
       @else
        <a href="/books/{{$score->book->id}}"><img src="{{$score->book->largeImageUrl}}"  width="400" height="450"></a>
        <a href="/books/{{$score->book->id}}"><p>{{$score->book->title}}</p></a>
        <p>筆者：<a href="/books/{{$score->book->id}}">{{$score->book->author}}</p></a>
        <p>点数：{{$score->avg}}</p>
        @endif
        
        @endforeach
        </div>
    </body>
</html>