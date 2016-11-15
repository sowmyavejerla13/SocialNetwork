<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user()
    {
    	# code...
    	return $this->belongsTo('App\User');
    }

    public function likes()
    {
    	# code...
    	return $this->hasMany('App\Like');
    }
}
