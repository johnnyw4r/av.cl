<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [	'user_id',
                            'category_id',
                            'subcategory_id',
                            'title',
                            'body' ,
                            'slug' ,
                            'negotiable',
                            'price',
                            'oldprice',
                            'bestPrice',
    						'datestart',
                            'dateend',
                            'country',
                            'region',
                            'province',
                            'commune',
                            'city',
    						'sector',
                            'deleted',
                            'state',
							];
  
    public function user(){
    	return $this->belongsTo(User::class);
    }
     
    public function subcategory(){
    	return $this->belongsTo(SubCategory::class);
    }


}
