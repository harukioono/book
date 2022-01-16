<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use App\Bookmark;


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
    public function novel()
    {
        return view('novel');
    }
    
    //漫画の画面の表示
    public function comic()
    {
        return view('comic');
    }
    
    //検索画面の表示
    public function search()
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

        
        $url = 'https://iss.ndl.go.jp/api/opensearch?dpid=aozora';

        $response = $client->request(
            'GET',
            $url,
        );
        
        $xml=$response->getBody()->getContents();
        
        $obj= simplexml_load_string($xml);
        
        $booklist= json_encode($obj);
        
        $booklist= json_decode($booklist,true);
        
        

        $books=$booklist['channel']['item'];
        
        
        
        
           //これが登録
           foreach($books as $item)
           {
               
               Book::create([
                   'title'=>$item['title'],
                   'link'=>$item['link'],
                   'author'=>$item['author'],
                   'category'=>$item['category'],
                   'guid'=>$item['guid']]);
               
            }
            
            
    
    }
    
    
    //検索結果の表示
     public function searchExecute(Request $request )
    {
        
        
        $keyword = $request->input('booklist');
        

       //検索ボタンが押された時の処理
        if(isset($request["booklist"]))
        {
            //入力チェック
            if(!empty("booklist"))
            {
                
                //本のidとタイトルと筆者名をグループ化
                $groupby = Book::select('id','title','author')->groupBy('title')->groupBy('author')->groupBy('id');
                
                
                
                $title = $groupby->where('title','like', '%' .$keyword. '%')->get();
                
             
               return view('searchExecute')->with([
                    'title' => $title,
                    
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
