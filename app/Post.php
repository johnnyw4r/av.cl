<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class Post extends Model
{
    protected $fillable = [	'user_id',
                            'subcategory_id','category_id',
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
                            'deleted',
                            'state',
							];
  
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function country($country){
        return Country::where('name',$country);
    }

    public function region($region){
        return Region::where('name',$region);
    }

     
    public function subcategory(){
    	return $this->belongsTo(SubCategory::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function scopeTitle($query, $title){

        if($title)
            return $query->where('title','LIKE',"%$title%");

    }

    public function scopeCountry($query, $country){
        if($country)
            return $query->where('country',$country);
    }

    public function scopeRegion($query, $region){
        if($region)
            return $query->where('region',$region);
    }

    /*public function scopeCategory($query, $category){
        if($category)

            return $query->where('category',$category)->subcategories();
    }*/

    public function scopeMinPrice($query, $minPrice){
        if($minPrice)
            return $query->where('price','>=',$minPrice);
        }

    public function scopeMaxPrice($query, $maxPrice){
        if($maxPrice)
            return $query->where('price','<=',$maxPrice);
    }
}
