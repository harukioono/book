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
        
       <form id="form1" action="/search/execute" method="POST">
           @csrf
        <input id="sbox1" id="s" name="booklist" type="text" placeholder="作品名・作者名を入力" />
        <input id="sbtn1" name="search" type="submit" value="検索" />
       </form>
 
  @if($user_id==1)
       <form id="form1" action="/search/save" method="POST">
           @csrf
       <input id="sbtn1" name="save" type="submit" value="保存" />
        </form>
       @endif
<div>
        
    </div>

       </p>
    </body>
    
</html>