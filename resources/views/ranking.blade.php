<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
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
        <p>ランキング</p>
       @foreach($score as $scores)
        <p>{{$scores->book->title}}</p>
        <p>{{$scores->avg}}</p>
        @endforeach
    </body>
</html>