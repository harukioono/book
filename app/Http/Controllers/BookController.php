<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use App\Bookmark;
use App\Comic;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
     //ホーム画面の表示
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     //小説の画面の表示
    public function novel(Book $book)
    {
        $book = Book::where('booksGenreId','like','001004%')->paginate(10);
        
        return view('novel')->with([
            'book'=>$book
            ]);
    }
    
    public function novelExecute(Book $book,Request $request)
    {
        $i = '';
        
        //「ミステリー・サスペンス」のボタンが押されたら
            if(isset($request["mystery-suspense"]))
            {
                $i = '001004001';
            }
            
            //「SF・ホラー」のボタンが押されたら
            if(isset($request["SF-horror"]))
            {
                $i = '001004001';
            }
            
            //「エッセイ」のボタンが押されたら
            if(isset($request["essay"]))
            {
                $i = '001004003';
            }
            
            //「ノンフィクション」のボタンが押されたら
            if(isset($request["nonfiction"]))
            {
                $i = '001004004';
            }
            
            //「日本の小説」のボタンが押されたら
            if(isset($request["Japanesenovel"]))
            {
                $i = '001004008';
            }
            
            //「外国の小説」のボタンが押されたら
            if(isset($request["novel_of_other_countries"]))
            {
                $i = '001004009';
            }
            
            //「ロマンス」のボタンが押されたら
            if(isset($request["romance"]))
            {
                $i = '001004016';
            }
            
            //「その他」のボタンが押されたら
            if(isset($request["other"]))
            {
                $i = '001004015';
            }
        
        
        $book = Book::where('booksGenreId','like',$i.'%')->paginate(10)->appends($request->except(['user_id']));
        
        return view('novelExecute')->with([
                    'book'=>$book,
                    ]); 
    }
    
    //漫画の画面の表示
    public function comic(Book $book)
    {
        
       
        
         $book = Book::where('booksGenreId','like','001001%')->paginate(10);
        
        return view('comic')->with([
            'book'=>$book
            ]);
    }
    
    //漫画のジャンル別表示
    public function comicExecute(Book $book,Request $request)
    {
        
        
        $i = '';
        
        
            //「少年」のボタンが押されたら
            if(isset($request["boy"]))
            {
                $i = '001001001';
            }
            
            //「少女」のボタンが押されたら
            if(isset($request["girl"]))
            {
                $i = '001001002';
            }
            
            //「青年」のボタンが押されたら
            if(isset($request["youngman"]))
            {
                $i = '001001003';
            }
            
            //「レディース」のボタンが押されたら
            if(isset($request["ladies"]))
            {
                $i = '001001004';
            }
            
            //「文庫」のボタンが押されたら
            if(isset($request["library"]))
            {
                $i = '001001006';
            }
            
            //「その他」のボタンが押されたら
            if(isset($request["other"]))
            {
                $i = '001001012';
            }
        
        
        $book = Book::where('booksGenreId','like',$i.'%')->paginate(10)->appends($request->except(['user_id']));
        
        return view('comicExecute')->with([
                    'book'=>$book,
                    ]); 
        
        
        
        
    }
    
    //検索画面の表示
    public function search(Request $request)
    {
        $user_id = Auth::id();
        
        return view('search')->with([
            'user_id' => $user_id
            ]);
                    
        
                    
    }
    
    
    //Mｙ本棚の画面の表示
    public function bookmark(Bookmark $bookmark)
    {
        $bookmarks=$bookmark->where('user_id',Auth::user()->id)->get();
        
        return view('bookmark')->with([
            'bookmarks'=>$bookmarks
            ]);
    }
       
           
       //APIの取得と登録
    public function bookapi()
    {
        
        
        $client = new \GuzzleHttp\Client();

        //本のタイトルや筆者名等のAPI
        $url = 'https://iss.ndl.go.jp/api/opensearch?dpid=aozora';

        $response = $client->request(
            'GET',
            $url,
        );
        
       
        
        $xml=$response->getBody()->getContents();
        
         
        
        $obj= simplexml_load_string($xml);
        
        
        
        $booklist= json_encode($obj);
        
        
        $booklist= json_decode($booklist,true);
        
        //dd($booklist);

        $books=$booklist['channel']['item'];
        
        //dd($books);
        
        
        
        //楽天ブックス書籍検索
        $rakutenn_url = 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?applicationId=1070968634966804263&page=92';
       
       
        $rakutenn_response = $client->request(
            'GET',
            $rakutenn_url,
        );
        
        
        $rakutenn_json = $rakutenn_response->getBody()->getContents();
        
       
       
        
        $rakutenn_booklist= json_decode($rakutenn_json,true);
        
         
         
        $rakutenn_books = $rakutenn_booklist['Items'];
            
           
        //dd($rakutenn_booklist);
        
        
        //楽天ブックスジャンル
       $rakutenn_comics_genre_url = 'https://app.rakuten.co.jp/services/api/BooksGenre/Search/20121128?applicationId=1070968634966804263&booksGenreId=001004';
        
        
       $rakutenn_comics_genre_response = $client->request(
           'GET',
           $rakutenn_comics_genre_url,
       );
        
        
        $rakutenn_comics_genre_json = $rakutenn_comics_genre_response->getBody()->getContents();
        
        
        $rakutenn_comics_genre_booklist= json_decode($rakutenn_comics_genre_json,true);
        
        //dd($rakutenn_comics_genre_booklist);
        
        
        
        $bookbook = [];
        
        
        
        
      // for($i=0;$i<count($books);$i++)
      // {
           //$books[$i] += ["isbn" => null];
           //$books[$i] += ["booksGenreId" => null];
           //$books[$i] += ["publisherName" => null];
           //$books[$i] += ["largeImageUrl" => null];
          // array_push($bookbook,$books[$i]);
           
       //}
        
        
        
         for($i=0;$i<count($rakutenn_books);$i++)
        {
            
            $rakutenn_books[$i]['Item'] += ["guid" => null];
            $rakutenn_books[$i]['Item'] += ["link" => null];
            $rakutenn_books[$i]['Item'] += ["category" => null];
            array_push($bookbook,$rakutenn_books[$i]['Item']);
            
            
        }
        
        //dd(($bookbook));
         //var_export($bookbook);
        
        
        //これが登録
        foreach($bookbook as $item)
        {
            Book::create([
                'title'=>$item['title'],
                'link'=>$item['link'],
                'author'=>$item['author'],
                'category'=>$item['category'],
                'guid'=>$item['guid'],
                'isbn'=>$item['isbn'],
                'booksGenreId'=>$item['booksGenreId'],
                'publisherName'=>$item['publisherName'],
                'largeImageUrl'=>$item['largeImageUrl']]);
               
        }
            
     
    
    }
    
    
    
    //検索結果の表示
     public function searchExecute(Request $request )
    {
        
       
        
        $keyword = $request->input('booklist');
        
        $request->validate(['booklist' => 'required'],['booklist.required'=>'入力が空白です']);
        

       //検索ボタンが押された時の処理
        if(isset($request["booklist"]))
        {
            //入力チェック
            if(!empty("booklist"))
            {
                
                //本のidとタイトルと筆者名をグループ化
                $groupby = Book::select('id','title','author','largeImageUrl')->groupBy('title')->groupBy('author')->groupBy('id')->groupBy('largeImageUrl');
                
                
                //本のタイトルであいまい検索
                $title = $groupby->where('title','like', '%' .$keyword. '%')->paginate(10)->appends($request->except(['user_id']));
                
             
               return view('searchExecute')->with([
                    'title' => $title,
                    'groupby' => $groupby
                ]);
                   
            }
               
               
        }
         
         
           
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
