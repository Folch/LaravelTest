<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'active', 'title', 'body'
        //,'published_at', 'created_at','updated_at', 'deleted_at'
    ];


}
