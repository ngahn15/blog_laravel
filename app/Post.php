<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

   	public function user()
    {
    	return $this->belongsto('App\User','user_id','id');
    }

    public function cates()
    {
    	return $this->belongsto('App\Category');
    }
}
