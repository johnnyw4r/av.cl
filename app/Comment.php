<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [	'comment','user_id','post_id'];
   
   /*
    public function user(){
    	return $this->belongsToMany(User::class);
    }
    
    public function post(){
    	return $this->belongsToMany(Post::class);
    }
*/
   
    
}
