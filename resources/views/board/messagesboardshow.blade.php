@extends('layouts.boardly')

@section('contenidoBoard')
    <div class = "col-md-9">
        <div class="panel-heading  well well-sm">
            <h4>Mis Mensajes</h4>
        </div>
        <div class="panel panel-heading well well-sm">

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/messagesboardUpdate">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="titulo" class="col-md-4 control-label">* Remitente</label>

                        <div class="col-md-6">
                            <input id="remitente" type="text" class="form-control" name="remitente" value="{{$message['name'].' <'.$message['email'].'>'?:old('remitente') }}" readonly="readonly" required autofocus>
                            <input id="id" type="hidden"  value="{{$message['id']}}" required autofocus>
                            <input id="messageid" type="hidden" name="messageid" value="{{ $message['id']?:old('id') }}" required >
                            <input id="mensajetipo" type="hidden" name="mensajetipo" value="{{$tipo}}" required >
                            <input id="user_id" type="hidden" name="user_id" value="{{$post->user_id}}" required >

                            @if ($errors->has('remitente'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('remitente') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="titulo" class="col-md-4 control-label">Titulo Post</label>

                        <div class="col-md-6">
                            <input id="remitente" type="text" class="form-control" name="remitente" value="{{$post['title']?:old('remitente')}}" readonly="readonly" required autofocus>

                            @if ($errors->has('remitente'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('remitente') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('oldcomment') ? ' has-error' : '' }}">
                        <label for="oldcomment" class="col-md-4 control-label">Mensaje</label>
                        <input id="oldcomment" type="hidden" name="oldcomment" value="{{ $message['comment']?:old('mobile') }}" required >

                        <div class="col-md-6">
                            {!! Form::textarea('comment' ,$message['comment']?:old('comment'), array('placeholder'=>'Escriba un mensaje','class'=>'form-control','id'=>'comment','readonly'=>'readonly')) !!}
                            @if ($errors->has('comment'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        <label for="comment" class="col-md-4 control-label">Respuesta</label>

                        <div class="col-md-6">
                            {!! Form::textarea('comment' ,null, array('placeholder'=>'Escriba un mensaje','class'=>'form-control','id'=>'comment')) !!}
                            @if ($errors->has('comment'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Captcha</label>

                        <div class="col-md-6 pull-center">
                            <div class="g-recaptcha" data-sitekey="6Ld0fkwUAAAAAAsOc3fV49c1OwKfnmJW7zyq40mG"></div>

                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Responder
                            </button>


                                {{--<button class="btn btn-danger" title="Permite borrar este mensaje de manera permanente">Eliminar</button>--}}


                            {{--<button type="submit" class="btn btn-primary">--}}
                                {{--Marcar No Leido--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection

@section('scripts')

    <script >
        $( document ).ready(function() {

            $('#country').on('change',function(){
                var ruta= "{{url('/getRegions')}}";


                ruta= ruta+'/'+$(this).val()
                $.get(ruta,
                    function(data) {
                        var model = $('#region');
                        model.empty();
                        model.append("<option value='0'>Seleccione región/departamento/estado</option>");
                        $.each(data, function(index, element) {
                            model.append("<option value='"+ index +"'>" + element + "</option>");
                        });
                    });
            });//$('#listamodulos').on('change',function(){

            $('#category').on('change',function(){
                var ruta= "{{url('/getSubcategories')}}";


                ruta= ruta+'/'+$(this).val()
                $.get(ruta,
                    function(data) {
                        var model = $('#subcategory');
                        model.empty();
                        model.append("<option value='0'>Seleccione Subcategoría</option>");
                        $.each(data, function(index, element) {
                            model.append("<option value='"+ index +"'>" + element + "</option>");
                        });
                    });
            });//$('#listamodulos').on('change',function(){
        });
    </script>

    {{Html::script('libs/jquery/jquery-3.2.1.min.js')}}
    {{Html::script('libs/jquery/jquery-2.1.3.min.js')}}
    {{Html::script('libs/jquery/moment-2.9.0.min.js')}}


@endsection