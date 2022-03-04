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
        
    <script src="{{ asset('/js/search.js') }}"></script>
        
       <form class='search' name="searchForm" action="/search/execute" method="POST">
           @csrf
        <input id="sbox1" id="s" name="booklist" type="text" placeholder="作品名・作者名を入力" oninput="SearchButton_Click()"/>
        <input class='searchButton' id="sbtn1" name="search" type="submit" value="検索" />
       </form>
       
       <a href="#searchExecute_test"><p id="searchExecute_return" class='up'>▼ページ最下部へ</p></a>

  
   @foreach($title->unique('title') as $book)
    
   
   <div class='booktitle'>
       @if($book->largeImageUrl == NULL)
       <a href="/books/{{$book->id}}"><img src="{{$book->largeImageUrl =  'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/noimage_01.gif?_ex=200x20'}}"  width="250" height="300"></a>
       <a href="/books/{{$book->id}}"><p>{{Str::limit($book->title,30)}}</p></a>
     
       @else
       <a href="/books/{{$book->id}}"><img src="{{$book->largeImageUrl}}"  width="250" height="300"></a>
       <a href="/books/{{$book->id}}"><p>{{Str::limit($book->title,30)}}</p></a>
       @endif
   </div>
　 
     
   @endforeach
   


 @if($errors->any())
     @foreach ($errors->all() as $error)
	   <li>{{ $error }}</li>
	 @endforeach
 @endif
 
<div>
        <div class='up pagination_color'>{{ $title->links('vendor.pagination.bootstrap-4') }}</div>
    </div>

       <a href="#searchExecute_return"><p id="searchExecute_test" class='up'>▲ページ最上部へ</p></a>
    </body>
    
</html>