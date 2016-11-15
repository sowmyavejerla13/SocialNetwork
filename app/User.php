<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//add authenticable

use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    //    protected $table="users";  //if u want to use other name for table

    use \Illuminate\Auth\Authenticatable; //add authenticable

    public function posts()
     {
         # code...
        return $this->hasMany('App\Post');
     } 
     public function likes()
     {
         # code...
        return $this->hasMany('App\Like');
     } 
}
