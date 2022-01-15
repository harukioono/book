<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        ];
    
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
