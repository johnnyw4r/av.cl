<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Messages;
use App\Post;


class MessagesBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $messageRecibidos = Messages::where('email',auth()->user()->email)->paginate(10);

        $messages= Messages::orderBy('created_at','DESC')->where('user_id',$id)->paginate(10);

        $m=Messages::paginate(3);

      //  dd($m->find(2)->post(), $messageRecibidos);


        return view('board.messagesboard', compact('messages','messageRecibidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



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
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'comment'=>'required'
        ]);
        $request['comment'] = date('d-m-Y h:i:s').': '.$request['comment'];
        Messages::create($request->all());

        $notificacion = array(
            'message' => 'Gracias! Su mensaje se a enviado con exito.',
            'alert-type' => 'success'
        );

        return back()->with($notificacion);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$tipo)
    {
        $update= Messages::find($id);


        if ($tipo=='enviado'){
            $update->leidoEnviado =1;
        }else{
            $update->leidoRecibido =1;
        }

        $update->save();

        $message= Messages::find($id);
        $post = Post::find($message->post_id);



        return view('board.messagesboardshow', compact('message','post','tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

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

            'comment'=>'required'
        ]);

        $message= Messages::find($request['messageid']);

        $newComment = $message['comment'].chr(13).date('d-m-Y h:i:s').' :'.'('.auth()->user()->name.')'.$request['comment'];

        $message->comment= $newComment;
            //Esto es para que la persona que recibe el mensaje se le actualice el estado del mensaje
        if ($request['mensajetipo']=="enviado"){


            $message->leidoRecibido = 0;

        }else{
                //Esto es para la persona que envií el mensaje, se le actualice el estado.
            $message->leidoEnviado = 0;
        }

        $message->save();

        $notificacion = array(
            'message' => 'Gracias! Su mensaje se a enviado con exito.',
            'alert-type' => 'success'
        );

        return redirect(url('messagesboard/'.$request['user_id']))->with($notificacion);
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

        $message = Messages::find($id);
        $message->delete();

        return back()->with('success','Se ha eliminado el mensaje correctamente');
    }
}
