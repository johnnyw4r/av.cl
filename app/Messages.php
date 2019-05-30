<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['user_id', 'post_id', 'name', 'email', 'mobile', 'comment','leidoEmisor','leidoReceptor'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Un mensaje pertenece a un solo post

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
