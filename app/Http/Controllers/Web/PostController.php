<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Country;
use App\Category;
use App\SubCategory;
use App\Region;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $product        = $request['product'];
        $countries_id   = $request['countries_id'];
        $region_id      = $request['region_id'];

        $countries      = Country::pluck('name','id');
        $regions        = Region::where('country_id',$countries_id)->pluck('name','id');
        $categories     = Category::OrderBy('name')->pluck('name','id');
        $subcategories  = SubCategory::where('category_id',$countries_id)->OrderBy('name')->pluck('name','id');


        $country = Country::find($countries_id);
        $country = $country['name'];

        $region  = Region:: find($region_id);
        $region  = $region['name'];
        $category  = $request['categories_id'];
        $minPrice = $request['min_price'];
        $maxPrice = $request['max_price'];


        $posts = Post::orderBy('dateStart','DESC')
            ->title($product)
            ->country($country)
            ->region($region)
          //  ->category($category)
            ->minPrice($minPrice)
            ->maxPrice($maxPrice)
            ->where('state','PUBLISHED')
            ->paginate(10);

     
        return view('Web.result',compact('countries_id','product','countries','subcategories','categories','region_id','posts','regions'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($countries_id,$region_id,$id)
    {
        $countries      = Country::pluck('name','id');
        $categories     = Category::OrderBy('name')->pluck('name','id');
        $subcategories   = SubCategory::OrderBy('name')->pluck('name','id');

        $country = Country::find($countries_id);
        $country = $country['name'];
        $region  = Region::find($region_id);
        $regions = Region::where('country_id',$countries_id);
        $regionList = Region::OrderBy('name')->pluck('name','id');

        $post = Post::find($id);
        $user = User::find($post['user_id']);


        if(!$post){
            return redirect('/');

        }else{
            return view ('Web.post',compact('country','region','countries','subcategories','categories','post','user','regions','regionList'));

        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
    }
}
