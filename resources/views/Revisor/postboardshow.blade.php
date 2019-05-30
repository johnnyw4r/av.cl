@extends('layouts.boardly')

@section('contenidoBoard')
    <div class = "col-md-9">
        <div class="panel-heading  well well-sm">
            <h4>Edicion de {{ $post['title'] }} </h4>
        </div>

        <div class="panel panel-heading well well-sm">

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('PostBoardUpdate') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">* Título del aviso</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{$post['title']?:old('title') }}" required autofocus>

                            <input id="id" type="hidden"  name="id" value="{{$post['id'] }}">

                        @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">* Slug</label>

                        <div class="col-md-6">
                            <input id="slug" type="text" class="form-control" name="slug" value="{{ $post['slug']?:old('slug') }}" required >

                            @if ($errors->has('slug'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">* Descripción</label>

                        <div class="col-md-6">
                            {!! Form::textarea('body' , $post['body']?:old('body') , array('placeholder'=>'Escriba una descripción del producto','class'=>'form-control','id'=>'body')) !!}
                            @if ($errors->has('body'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label">* Precio</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" value="{{ $post['price']?:old('price') }}" required autofocus>

                            @if ($errors->has('price'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
                        <label for="categories" class="col-md-4 control-label">* Categoría</label>

                        <div class="col-md-6">

                            {{ Form::select('category',$categories,$category_id?:0,array('placeholder'=>'Seleccione categoría','class'=>'form-control','id'=>'category','name'=>'category','required','autofocus')) }}

                            @if ($errors->has('category'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('subcategory_id') ? ' has-error' : '' }}">
                        <label for="subcategory_id" class="col-md-4 control-label">* Subcategoría</label>

                        <div class="col-md-6">

                            {{ Form::select('subcategory_id',$subcategories?:[],$post['subcategory_id']?:0,array('placeholder'=>'Seleccione subcategoría','class'=>'form-control','id'=>'subcategory_id','name'=>'subcategory_id','required','autofocus')) }}

                            @if ($errors->has('subcategory_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('subcategory_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('datestart') ? ' has-error' : '' }}">
                        <label for="titulo" class="col-md-4 control-label">* Fecha de publicación</label>

                        <div class="col-md-6">
                            <input id="datestart" type="text" class="form-control" name="datestart" value="{{ $post['dateStart']?:old('datestart') }}" required autofocus>

                            @if ($errors->has('datestart'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('datestart') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('dateend') ? ' has-error' : '' }}">
                        <label for="titulo" class="col-md-4 control-label">* Fecha de termino</label>

                        <div class="col-md-6">
                            <input id="dateend" type="text" class="form-control" name="dateend" value="{{ $post['dateEnd']?:old('dateend') }}" required autofocus>

                            @if ($errors->has('dateend'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('dateend') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <br/>
                    <div class="form-group{{ $errors->has('countries') ? ' has-error' : '' }}">
                        <label for="countries" class="col-md-4 control-label">* País</label>

                        <div class="col-md-6">

                            {{ Form::select('country',$countries,4,array('placeholder'=>'Seleccione país','class'=>'form-control','id'=>'country','name'=>'country','required','autofocus')) }}

                            @if ($errors->has('country'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                        <label for="region" class="col-md-4 control-label">* Región/Departamento/Estado</label>

                        <div class="col-md-6">

                            {{ Form::select('region',$regions?:[],$region,array('placeholder'=>'Seleccione región/departamento/estado','class'=>'form-control','id'=>'region','name'=>'region','required','autofocus')) }}

                            @if ($errors->has('region'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    {{--<div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Captcha</label>

                        <div class="col-md-6 pull-center">
                            <div class="g-recaptcha" data-sitekey="6Ld0fkwUAAAAAAsOc3fV49c1OwKfnmJW7zyq40mG"></div>

                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>--}}

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
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

            $('#country').on('load',function(){
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