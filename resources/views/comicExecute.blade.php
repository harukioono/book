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
        
    <script src="{{ asset('/js/comic.js') }}"></script>
        
        <a href="#comic_test"><p id="comic_return">▼ページ最下部へ</p></a>
        <h2 class='genre'>ジャンル(漫画)</h2>
    <div class='genre-contents'>
    
    
    <form action="/comic/execute" method="POST">
        @csrf
        <p class='float-left-comic'><input class='background-color-comic' type="submit" name="boy" value="少年" onmouseover="over(this)" onmouseleave="leave(this)"></p>
        <p class='float-left-comic'><input class='background-color-comic' type="submit" name="girl" value="少女" onmouseover="over(this)" onmouseleave="leave(this)"></p>
        <p class='float-left-comic'><input class='background-color-comic' type="submit" name="youngman" value="青年" onmouseover="over(this)" onmouseleave="leave(this)"></p>
        <p class='float-left-comic'><input class='background-color-comic' type="submit" name="ladies" value="レディース" onmouseover="over(this)" onmouseleave="leave(this)"></p>
        <p class='float-left-comic'><input class='background-color-comic' type="submit" name="library" value="文庫" onmouseover="over(this)" onmouseleave="leave(this)"></p>
        <p class='float-left-comic'><input class='background-color-comic' type="submit" name="other" value="その他" onmouseover="over(this)" onmouseleave="leave(this)"></p>
        
    </form>
    
    </div>
    <p>earvzvr</p>
    
    @foreach($book->unique('title') as $books)
    <div class='booktitle'>
    
    <a href="/books/{{$books->id}}"><img src="{{$books->largeImageUrl}}" width="250" height="300"></a>
    <a href="/books/{{$books->id}}"><p>{{Str::limit($books->title,30)}}</p></a>
    
    </div>
    @endforeach
    
    <div class='up pagination_color'>{{ $book->links('vendor.pagination.bootstrap-4') }}</div>
    
    <a href="#comicExecute_return"><p id="comicExecute_test" class='up'>▲ページ最上部へ</p></a>
    </body>
</html>