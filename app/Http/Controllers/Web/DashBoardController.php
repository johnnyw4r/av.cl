<?php

namespace App\Http\Controllers\Web;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Country;
use App\Category;
use App\Region;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
		$posts = Post::orderBy('dateStart','DESC')
				->where('user_id',$id)
				->paginate(10);
        
        return view('Web.dashboard',compact('posts'));
    }

    public function getRegions($id){

        $regions= Region::where('country_id',$id)->orderBy('name','ASC')->pluck('name','id');

       return $regions;

    }

    public function result(Request $request){

      
        $product        = $request['product'];
        $countries_id   = $request['countries_id'];
        $region_id      = $request['region_id'];

        $countries      = Country::pluck('name','id');
        $regions        = Region::where('country_id',$countries_id)->pluck('name','id');
        $categories     = Category::OrderBy('name')->pluck('name','id');


        $country = Country::find($countries_id);
        $country = $country['name'];

        $region  = Region:: find($region_id);
        $region  = $region['name'];

        $posts = Post::orderBy('dateStart','DESC')
            ->title($product)
            ->country($country)
            ->region($region)
            ->paginate(10);

     
        return view('Web.result',compact('countries_id','product','countries','categories','region_id','posts','regions'));
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

    
    public function show($id)
    {
        echo $id;
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
        $post = Post::find($id);
        $post->delete();

        return back()->with('success','Se ha eliminado el anuncio');
    }
}
