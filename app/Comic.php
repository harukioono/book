<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'id',
        'book_id',
        'book_booksGenreId',
        'book_title',
        'book_author',
        'book_largeImageUrl',
        ];
        
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
