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
        <p>bookmark</p>
        
        @foreach($bookmarks as $bookmark)
        <div class='booktitle'>
        @if($bookmark->book->largeImageUrl == NULL)
       <a href="/books/{{$bookmark->book->id}}"><img src="{{$bookmark->book->largeImageUrl =  'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/noimage_01.gif?_ex=200x20'}}"  width="250" height="300"></a>
       <a href="/books/{{$bookmark->book->id}}"><p>{{$bookmark->book->title}}</p></a>
       <p>作者：<a href="/books/{{$bookmark->book->id}}">{{$bookmark->book->author}}</p></a>
       
       @else
        <a href="/books/{{$bookmark->book->id}}"><img src="{{$bookmark->book->largeImageUrl}}"  width="250" height="300"></a>
        <a href="/books/{{$bookmark->book->id}}"><p>{{$bookmark->book->title}}</p></a>
        <p>筆者：<a href="/books/{{$bookmark->book->id}}">{{$bookmark->book->author}}</p></a>
        @endif
       </div>
        @endforeach
        
    </body>
</html>