<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bbs extends Model
{
    protected $fillable = [
        'name',
        'body',
];
}
