<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
   protected $fillable = [
        'user_id',
        'book_id',
        'score',
        'comment',
        ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
