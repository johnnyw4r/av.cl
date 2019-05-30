<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['link','post_id'];

    
    public function post(){
    	return $this->belongsTo(Post::class);
    }
}
