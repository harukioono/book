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
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function novel()
    {
        return view('novel');
    }
    
    public function comic()
    {
        return view('comic');
    }
    
    public function search()
    {
        $user_id = Auth::id();
        
        return view('search')->with([
            'user_id' => $user_id
            ]);
                    
        
                    
    }
    
    public function bookmark(Bookmark $bookmark)
    {
        $bookmarks=$bookmark->where('user_id',Auth::user()->id)->get();
        
        return view('bookmark')->with([
            'bookmarks'=>$bookmarks
            ]);
    }
       
           
       
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
    
    
     public function searchExecute(Request $request )
    {
        
        
        $keyword = $request->input('booklist');
        

       //検索ボタンが押された時の処理
        if(isset($request["booklist"]))
        {
            //入力チェック
            
            if(!empty("booklist"))
            {
                
                
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
