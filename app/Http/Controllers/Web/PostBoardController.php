<?php

namespace App\Http\Controllers\Web;


use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Country;
use App\Category;
use App\Region;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Runner\Exception;

class PostBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $countries      = Country::pluck('id','name');
        $regions        = Region::pluck('id','name');

		$posts = Post::orderBy('dateStart','DESC')
				->where('user_id',$id)
				->paginate(10);
        return view('board.postboard',compact('posts','countries','regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $countries = Country::pluck('name','id');
        $total_post= Post::count();
        $categories= Category::OrderBy('name')->pluck('name','id');

        return view('board.postboardcreate',compact('countries','total_post','categories','regions'));

    }

    public function getSubcategories($id){

        $subcategories= SubCategory::where('category_id',$id)->pluck('name', 'id');

        return ($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'title' => 'required',
            'user_id' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'price'=> 'required|numeric',
            'subcategory_id' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'country'=>'required',
            'region' => 'required|numeric|min:1',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);

        $user_id= User::where('email',$request['email'])->get();

        if($user_id->isEmpty()){

            //Si el usuario no existe, se crea y se recupera el nuevo id de usuario
            try{
                $country= Country::pluck('name','id');
                $region= Region::pluck('name','id');
                $user_id = User::create([
                    'name'   => $request['name'],
                    'email'  => $request['email'],
                    'gender'=> $request['gender'],
                    'mobile' =>$request['mobile'],
                    'password' => bcrypt($request['password']),
                    'country' => $country[$request['country']],
                    'region' => $region[$request['region']],
                ]);

                $request['user_id']= $user_id->id;
            }catch (Exception $exception){
                return back()->with('message','Se produjo un error al crear al usuario');
            }

        }else{
            //Si el usuario ya existe, se obtiene el id del usuario desde la base de datos
            $request['user_id'] = $user_id[0]->id;
        }

        $country= Country::where('id',$request['country'])->pluck('name');
        $request['country']= $country[0];

        $region= Region:: where('id',$request['region'])->pluck('name');
        $request['region']  = $region[0];

        //Cambia formato de la fecha
        $fecha_start = $request['datestart'];
        $fecha_end = $request['dateend'];

        $datestart=substr($fecha_start,6,4).'-'.substr($fecha_start,3,2).'-'.substr($fecha_start,0,2);
        $dateend=substr($fecha_end,6,4).'-'.substr($fecha_end,3,2).'-'.substr($fecha_end,0,2);

        $request['datestart']= $datestart;
        $request['dateend']= $dateend;

        try{
            $postsave = Post::create($request->all());

            if($request->file){
                $imagen=$request->file('file')->store('/public/products'); //Se guarda la imagen en el servidor;
                Photo::create([
                    'post_id'=> $postsave->id,
                    'link' =>$imagen
                ])->save();
            }else{
                Photo::create([
                    'post_id'=> $postsave->id,
                ])->save();
            }

        }catch (\Mockery\Exception $exception){
            return back()->with('message', 'Se ha presentado un error inesperado cuando se guardaba el aviso'. $exception->getCode());
        }

        session()->flash('message','El aviso se ha creado correctamente. Debe esperar a que sea revisado antes de ser publicado.');

        return redirect('postboard/'.$request['user_id']);

    }

    public function storeNewUser(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'price'=> 'required|numeric',
            'subcategory_id' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'country'=>'required',
            'region' => 'required|numeric|min:1',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);

        $user_id= User::where('email',$request['email'])->get();

        if($user_id->isEmpty()){

            //Si el usuario no existe, se crea y se recupera el nuevo id de usuario
            try{
                $country= Country::pluck('name','id');
                $region= Region::pluck('name','id');
                $user_id = User::create([
                    'name'   => $request['name'],
                    'email'  => $request['email'],
                    'gender'=> $request['gender'],
                    'mobile' =>$request['mobile'],
                    'password' => bcrypt($request['password']),
                    'country' => $country[$request['country']],
                    'region' => $region[$request['region']],
                ]);

                $request['user_id']= $user_id->id;
            }catch (Exception $exception){
                return back()->with('message','Se produjo un error al crear al usuario');
            }

        }else{
            //Si el usuario ya existe, se obtiene el id del usuario desde la base de datos
            $request['user_id'] = $user_id[0]->id;

        }

        $country= Country::where('id',$request['country'])->pluck('name');
        $request['country']= $country[0];

        $region= Region:: where('id',$request['region'])->pluck('name');
        $request['region']  = $region[0];

        //Cambia formato de la fecha
        $fecha_start = $request['datestart'];
        $fecha_end = $request['dateend'];

        $datestart=substr($fecha_start,6,4).'-'.substr($fecha_start,3,2).'-'.substr($fecha_start,0,2);
        $dateend=substr($fecha_end,6,4).'-'.substr($fecha_end,3,2).'-'.substr($fecha_end,0,2);

        $request['datestart']= $datestart;
        $request['dateend']= $dateend;

        try{
            $postsave = Post::create($request->all()); //Se guardan los datos principales del post

            if ($request->file){

                $imagen=$request->file('file');
                $imagen->store('/public/products'); //Se guarda la imagen en el servidor
                Photo::create([
                    'post_id'=> $postsave->id,
                    'link' =>$imagen
                ])->save(); //Se actualiza la direccion de la imagen en el regitro del post
            }else{
                Photo::create([
                    'post_id'=> $postsave->id,
                ])->save(); //Se actualiza la direccion de la imagen en el regitro del post
            }

        }catch (\Mockery\Exception $exception){
            return back()->with('message', 'Se ha presentado un error inesperado cuando se guardaba el aviso'. $exception->getCode());
        }

        session()->flash('message','El aviso se ha creado correctamente. Debe esperar a que sea revisado antes de ser publicado.');

        return redirect('result/');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('pass',$post);

        $post['dateStart'] = substr($post->dateStart ,8,2).'/'.substr($post->dateStart ,5,2).'/'.substr($post->dateStart ,0,4);
        $post['dateEnd']   = substr($post->dateEnd ,  8,2).'/'.substr($post->dateEnd ,  5,2).'/'.substr($post->dateEnd ,  0,4);

        $countries = Country::pluck('name','id');

        $categories= Category::OrderBy('name')->pluck('name','id');

        $category_id = SubCategory::where('id',$post['subcategory_id'])->pluck('category_id');

        $subcategories= SubCategory::where('category_id',$category_id)->pluck('name','id');

        $region=Region::where('name',$post['region'])->pluck('id');
        $country=Country::where('name',$post['country'])->pluck('id');

        $regions = Region::where('country_id',$country)->pluck('name','id');

        return view('board.postboardshow', compact('post','categories','countries', 'region','country','category_id','subcategories','regions'));
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
    public function update(Request $request)
    {
       $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'price'=> 'required|numeric',
            'subcategory_id' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'country'=>'required',
            'region' => 'required|numeric',


        ]);
        $postsave = Post::find($request['id']);
        $this->authorize('pass',$postsave);

        //Cambia formato de la fecha
        $fecha_start = $request['datestart'];
        $fecha_end = $request['dateend'];

        $datestart=substr($fecha_start,6,4).'-'.substr($fecha_start,3,2).'-'.substr($fecha_start,0,2);
        $dateend=substr($fecha_end,6,4).'-'.substr($fecha_end,3,2).'-'.substr($fecha_end,0,2);

        $request['datestart']= $datestart;
        $request['dateend']= $dateend;

        $country= Country::where('id',$request['country'])->pluck('name');
        $request['country']= $country[0];

        $region= Region:: where('id',$request['region'])->pluck('name');
        $request['region']  = $region[0];

        $postsave['state']='DRAFT';
        $postsave->update($request->all());

        if($request->file){
            $imagen=$request->file('file')->store('/public/products'); //Se guarda la imagen en el servidor;

            $photo = Photo::where('post_id',$postsave->id)
                ->update(['link' => $imagen]);
        }



        session()->flash('message','El aviso se ha actualizado correctamente. Debe esperar a que sea revisado antes de ser publicado.');

        return redirect('postboard/'.$postsave->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['id'];

        $post = Post::find($id);
        $this->authorize('pass',$post);

        $post->delete();

        return back()->with('success','Se ha eliminado el aviso');
    }
}
