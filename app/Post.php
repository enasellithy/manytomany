<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; 

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function comments()
     {
     	return $this->hasMany('App\Comment');
     }

     public function cats()
    {
    	return $this->belongsTo('App\Category');
    }
}
