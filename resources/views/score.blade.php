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
        <a href="/novel"><p class='headregion padding-r'>ランキング</p></a>
        <a href="/bookmark"><p class='headregion padding-m'>My本棚</p></a>
    </div>
    
    
    <p>{{$book->title}}</p>
    
@if (Auth::check())
    @if ($bookmark)
    <form action="/bookmark/{{$book->id}}" method="POST" class="mb-4" >
    
    @csrf
    @method('DELETE')
        <button type="submit">
          ブックマーク解除
        </button>
    </form>
    @else
    <form action="/bookmark/{{$book->id}}" method="POST" class="mb-4" >
    @csrf
    <input type="hidden" name="book_id" value="{{$book->id}}">
        <button type="submit">
         ブックマーク
        </button>
    </form>

    @endif
@endif
        
      <form action="/books/score" method="POST">
          @csrf
          <input type="hidden" name="book_id" value="{{$book->id}}">
      <p>評価：</p><input id="sbox1" id="s" name="book[score]" type="number" max="10" min="0" placeholder="0~10" />
      <input id="sbox1" id="s" name="book[comment]" type="text" placeholder="感想等をご自由にどうぞ。" />
      <input id="sbtn1" name="score" type="submit" value="送信" />    
      
      
    </body>
</html>