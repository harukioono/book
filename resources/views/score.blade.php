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
    
    @if($book->largeImageUrl == NULL)
       <a href="/books/{{$book->id}}"><img src="{{$book->largeImageUrl =  'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/noimage_01.gif?_ex=200x20'}}"  width="250" height="300"></a>
       <a href="/books/{{$book->id}}"><p>{{Str::limit($book->title,30)}}</p></a>
     
       @else
       <a href="/books/{{$book->id}}"><img src="{{$book->largeImageUrl}}"  width="250" height="300"></a>
       <a href="/books/{{$book->id}}"><p>{{Str::limit($book->title,30)}}</p></a>
    @endif
    
@if (Auth::check())
    @if ($bookmark)
    <form action="/bookmark/{{$book->id}}" method="POST" class="mb-4" >
    
    @csrf
    @method('DELETE')
        <button type="submit" onClick="return confirm('{{$book->title}}のお気に入り登録を解除しました！');">
          お気に入り登録解除
        </button>
    </form>
    @else
    <form action="/bookmark/{{$book->id}}" method="POST" class="mb-4" >
    @csrf
    <input type="hidden" name="book_id" value="{{$book->id}}">
    
        <button type="submit" name="bookmark" onClick="return confirm('{{$book->title}}をお気に入り登録しました！');">
         お気に入り登録
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