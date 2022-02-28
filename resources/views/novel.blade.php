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
       
        <a href="https://e074290610f6499d90412db18c5418c9.vfs.cloud9.ap-northeast-1.amazonaws.com/novel#novel_test"><p id="novel_return" class='up'>▼ページ最下部へ</p></a> 
        <h2 class='genre'>ジャンル(小説)</h2>
    <div class='genre-contents'>
        
    <form action="/novel/execute" method="POST">
        @csrf
        <p class='float-left-novel'><input type="submit" name="mystery-suspense" value="ミステリー・サスペンス"></p>
        <p class='float-left-novel'><input type="submit" name="SF-horror" value="SF・ホラー"></p>
        <p class='float-left-novel'><input type="submit" name="essay" value="エッセイ"></p>
        <p class='float-left-novel'><input type="submit" name="nonfiction" value="ノンフィクション"></p>
        <p class='float-left-novel'><input type="submit" name="Japanesenovel" value="日本の小説"></p>
        <p class='float-left-novel'><input type="submit" name="novel_of_other_countries" value="外国の小説"></p>
        <p class='float-left-novel'><input type="submit" name="romance" value="ロマンス"></p>
        <p class='float-left-novel'><input type="submit" name="other" value="その他"></p>
    </form>
    
    </div>
        
        
    @foreach($book->unique('title') as $books)
    <div class='booktitle'>

    <a href="/books/{{$books->id}}"><img src="{{$books->largeImageUrl}}" width="250" height="300"></a>
    <a href="/books/{{$books->id}}"><p>{{Str::limit($books->title,30)}}</p></a>
    
    </div>
    @endforeach
        
    <div class='up pagination_color'>{{ $book->links('vendor.pagination.bootstrap-4') }}</div>
        
    <a href="https://e074290610f6499d90412db18c5418c9.vfs.cloud9.ap-northeast-1.amazonaws.com/novel#novel_return"><p id="novel_test" class='up'>▲ページ最上部へ</p></a>    
    </body>
</html>