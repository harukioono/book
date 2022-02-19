<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
    protected $fillable = [
        'id',
        'title',
        'link',
        'author',
        'category',
        'guid',
        'isbn',
        'booksGenreId',
        'publisherName',
        'largeImageUrl'
        ];
        
    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }
    
    public function scores()
    {
        return $this->hasMany('App\Score');
    }
    
    public function comics()
    {
        return $this->hasOne('App\Comic');
    }
}
