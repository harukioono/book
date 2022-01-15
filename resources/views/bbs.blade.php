<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ひとこと掲示板</title>
</head>
<body>
    <h1>ひとこと掲示板</h1>
 
    <form action = "/bbs" method="post">
        @csrf
        <input type="text" name="post[name]" placeholder="名前"/>
        <input type="text" name="post[body]" placeholder="内容"/>
        <input type="submit" name="submit" value="送信">
    </form>
 
   
    
    @foreach ($posts as $post) 
    <p>名前：{{$post->name}}</p><p>{{$post->body}}</p>
    <p>{{$post->created_at}}</p>
    @endforeach
    
    
</body>
</html>