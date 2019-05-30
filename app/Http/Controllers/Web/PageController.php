<?php

namespace App\Http\Controllers\Web;


use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Country;
use App\Category;
use App\Region;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::pluck('name','id');
        $total_post= Post::where('state','=','PUBLISHED')->count();
        $categories= Category::OrderBy('name')->pluck('name','id');
        return view('Web.index',compact('countries','total_post','categories','regions'));
    }

    public function getRegions($id){

        $regions= Region::where('country_id',$id)->orderBy('name','ASC')->pluck('name','id');
        return $regions;
    }

    public function getSubcategories($id){

        $subcategories= SubCategory::where('category_id',$id)->orderBy('name','ASC')->pluck('name','id');
        return $subcategories;
    }

    public function result(Request $request){

        $product        = $request['product'];
        $countries_id   = $request['countries_id'];
        $region_id      = $request['region_id'];
        $category_id    = $request['categories_id'];

        $countries      = Country::pluck('name','id');
        $regions        = Region::where('country_id',$countries_id)->pluck('name','id');
        $categories     = Category::OrderBy('name')->pluck('name','id');
        $subcategories   = SubCategory::where('category_id',$category_id)->OrderBy('name')->pluck('name','id');

        $country = Country::find($countries_id);
        $country = $country['name'];

        $region  = Region:: find($region_id);
        $region  = $region['name'];

        $category  = $request['categories_id'];
        $minPrice = $request['min_price'];
        $maxPrice = $request['mix_price'];

        $posts = Post::orderBy('dateStart','DESC')->
            title($product)->
            country($country)->
            region($region)->
           // category($category)->
            minPrice($minPrice)->
            maxPrice($maxPrice)->
            paginate(10);


        return view('Web.result',compact('countries_id','product','countries','categories','subcategories','region_id','posts','regions'));
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
        $this->validate($request,[
            'mobile' =>'required|number',
            'image' => 'required|image',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function show($id)
    {
        //
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
        //
    }
}
