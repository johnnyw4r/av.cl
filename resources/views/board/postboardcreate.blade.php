@extends('layouts.boardly')

@section('contenidoBoard')
    <div class = "col-md-9">
        <div class="panel-heading  well well-sm">
            <h4>Crea un nuevo aviso</h4>
        </div>

        <div class="panel panel-heading well well-sm">

            <div class="panel-body">

                @if(AUTH::user())

                    {!! Form::open(['route' =>'PostBoardStore', 'file'=>'true', 'class' => "form-horizontal",'enctype'=>'multipart/form-data']) !!}

                    <input type="hidden" id="user_id" name="user_id" value="{{ AUTH::user()->id }}" required autofocus>

                @else
                    {!! Form::open(['route' =>'PostBoardStoreNewUser', 'file'=>'true', 'class' => "form-horizontal",'enctype'=>'multipart/form-data']) !!}

                @endif

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">* Título del aviso</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label for="slug" class="col-md-4 control-label">* Slug</label>

                        <div class="col-md-6">
                            <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" required readonly>

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
                            {!! Form::textarea('body' , null , array('placeholder'=>'Escriba una descripción del producto','class'=>'form-control','id'=>'body')) !!}
                            @if ($errors->has('body'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-4 control-label">Imagen</label>

                        <div class="col-md-6">
                            <input  type="file" id="price" class="form-control" name="file" multiple="multiple" value="{{ old('file') }}"  autofocus>

                            @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label">* Precio</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

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

                            {{ Form::select('category_id',$categories,0,array('placeholder'=>'Seleccione categoría','class'=>'form-control','id'=>'category_id','name'=>'category_id','required','autofocus')) }}

                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('subcategories') ? ' has-error' : '' }}">
                        <label for="subcategories" class="col-md-4 control-label">* Subcategoría</label>

                        <div class="col-md-6">

                            {{ Form::select('subcategory_id',[],0,array('placeholder'=>'Seleccione subcategoría','class'=>'form-control','id'=>'subcategory_id','name'=>'subcategory_id','required','autofocus')) }}

                            @if ($errors->has('subcategory_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('subcategory_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('datestart') ? ' has-error' : '' }}">
                        <label for="datestart_label" class="col-md-4 control-label">* Fecha de publicación</label>

                        <div class="col-md-6">
                            <input readonly id="datestart" type="text" class="form-control" name="datestart" value="{{ old('datestart') }}" required autofocus>

                            @if ($errors->has('datestart'))
                                <span class="help-block">
                            <strong>{{ $errors->first('datestart') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('dateend') ? ' has-error' : '' }}">
                        <label for="dateend_label" class="col-md-4 control-label">* Fecha de termino</label>

                        <div class="col-md-6">
                            <input readonly id="dateend" type="text" class="form-control" name="dateend" value="{{ old('dateend') }}" required autofocus>

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

                            {{ Form::select('country',$countries,0,array('placeholder'=>'Seleccione país','class'=>'form-control','id'=>'country','name'=>'country','required','autofocus')) }}

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

                            {{ Form::select('region',[],0,array('placeholder'=>'Seleccione región/departamento/estado','class'=>'form-control','id'=>'region','name'=>'region','required','autofocus')) }}

                            @if ($errors->has('region'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    @if(AUTH::user())
                        <input id="mobile" type="hidden" class="form-control" name="mobile" value="{{ Auth::user()->mobile }}" required autofocus>

                    @else
                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                        <label for="mobile" class="col-md-4 control-label">* Teléfono</label>

                        <div class="col-md-6">
                            <input id="mobile" type="text" class="form-control" name="mobile"  required autofocus>

                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if(AUTH::user())
                        <input id="email" type="hidden" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                    @else
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">* Nombre</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="gender" class="col-md-4 control-label">* Género</label>

                        <div class="col-md-6">

                            <label>{{ Form::radio('gender','F')}}Femenino</label>&nbsp;
                            <label>{{ Form::radio('gender','M')}}Masculino</label>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email"  required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    @endif

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
                        <label for="password-confirm" class="col-md-4 control-label"></label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                Registrar Aviso
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
               {{-- </form>--}}
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

            $('#category_id').on('change',function(){
                var ruta= "{{url('/getSubcategories')}}";


                ruta= ruta+'/'+$(this).val()
                $.get(ruta,
                    function(data) {
                        var model = $('#subcategory_id');
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( function() {


            $( "#datestart" ).datepicker({
                monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
                    'Jul','Ago','Sep','Oct','Nov','Dic'],
                dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
                dateFormat: 'dd/mm/yy', firstDay: 1,
                dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado']
            });
            $( "#dateend" ).datepicker({
                monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
                    'Jul','Ago','Sep','Oct','Nov','Dic'],
                dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
                dateFormat: 'dd/mm/yy', firstDay: 1,
                dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado']
            });
        } );

        $(document).ready(function() {
            $("#title").keyup(function() {
                $('#slug').val(getSlug($('#title').val()))
            });
        });

    </script>

@endsection
