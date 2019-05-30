<?php

namespace App\Http\Controllers\Web;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RevisorBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where ('state','DRAFT')
            ->where ('user_id','!=',auth()->id())
            ->paginate(10);

        return view('Revisor.postboard', compact('posts'));
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

    public function publicate(Request $request)
    {
        $post = Post::find($request['id']);

        $post->state= 'PUBLISHED';
        $post->save();
        return back()->with("message","Se ha autorizado la publicación del aviso correctamente");
    }

    public function discarted(Request $request)
    {
        $post = Post::find($request['id']);

        $post->state= 'DISCART';
        $post->save();
        return back()->with("message-discarted","Se ha descartado la publicación del aviso correctamente");
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
