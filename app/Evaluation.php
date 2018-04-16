<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['average','comment','user_id','user_id2','post_id'];

public function user(){
    	return $this->belongsTo(User::class);
    }
    
    public function post(){
    	return $this->belongsTo(Post::class);
    }
}
