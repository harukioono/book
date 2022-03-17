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
    
    @if($book->largeImageUrl == NULL)
       <img src="{{$book->largeImageUrl =  'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/noimage_01.gif?_ex=200x20'}}"  width="250" height="300">
       <p>{{$book->title}}</p>
       <p>作者：{{$book->author}}</p>
     
       @else
       <img src="{{$book->largeImageUrl}}"  width="250" height="300">
       <p>{{$book->title}}</p>
       <p>作者：{{$book->author}}</p>
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
      <input id="sbtn1" name="score" type="submit" value="送信" /> <br>   
      
      
      
      <p>＜同じ作者の本＞</p>
      
@if($book->author != NULL)      

  @foreach($authors->unique('title') as $author)
  
 <div class='booktitle'>
  
   @if($author->largeImageUrl == NULL)
   <a href="/books/{{$author->id}}"><img src="{{$author->largeImageUrl =  'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/noimage_01.gif?_ex=200x20'}}"  width="250" height="300"></a>
   @else
   <a href="/books/{{$author->id}}"><img src="{{$author->largeImageUrl}}"  width="250" height="300"></a>
   @endif
  <a href="/books/{{$author->id}}"><p>{{Str::limit($author->title,30)}}</p></a>
  <p>筆者：{{Str::limit($author->author,20)}}</p>
  
  </div>
  
  @endforeach

@endif

@if($book->author == NULL || $authors_count == '0' )
<p>存在しません</p>
@endif





<p class='up'>＜同じジャンルの本＞</p>

@if($book->booksGenreId != NULL)      

  @foreach($booksGenreIds->unique('title') as $booksGenreId)
  
     <div class='booktitle'>
  
  <a href="/books/{{$booksGenreId->id}}"><img src="{{$booksGenreId->largeImageUrl}}"  width="250" height="300"></a>
  <a href="/books/{{$booksGenreId->id}}"><p>{{Str::limit($booksGenreId->title,30)}}</p></a>
  <p>筆者：{{Str::limit($booksGenreId->author,20)}}</p>
  
  </div>
  
  @endforeach

@endif

@if($book->booksGenreId == NULL || $booksGenreIds_count == '0' )
<p>存在しません</p>
@endif


    </body>
</html>