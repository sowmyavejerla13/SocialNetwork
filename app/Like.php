<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    public function User()
    {
    	# code...
    	return $this->belongsTo('App\User');
    }
    public function Post()
    {
    	# code...
    	return $this->belongsTo('App\Post');
    }
}
