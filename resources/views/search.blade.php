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
        <input  id="sbox1" name="booklist" type="text" placeholder="作品名・作者名を入力" oninput="SearchButton_Click()"/>
        <input class='searchButton' id="sbtn1" name="search" type="submit" value="検索" />
       </form>
 
 

     
    
  @if($user_id==1)
       <form id="form1" action="/search/save" method="POST">
           @csrf
       <input class='save'  id="sbtn1" name="save" type="submit" value="保存" />
       </form>
  @endif
      
<div onclick="SearchA()"><p class='block'>検索について</p></div>
 
 <div><p id="search" class='search-explanations'>検索ボックスに文字が入力されるまで検索ボタンが表示されない仕様になっています。入力された文字にあいまい検索で該当するタイトルの本があれば、その本の表紙とタイトルを表示します。&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span onclick="SearchB()" class='cross'>×</span></p></div>  
       
  @if($errors->any())
     @foreach ($errors->all() as $error)
	   <li>{{ $error }}</li>
	 @endforeach
 @endif
  
<div>
        
    </div>

    
    </body>
    
</html>