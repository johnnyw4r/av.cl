<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aquilovendo.cl') }}</title>

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <script src='https://www.google.com/recaptcha/api.js'></script>
    {!!Html::style('libs/bootstrap-3.3.7/css/bootstrap.min.css')!!}
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">--}}

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="{{url('libs/datapicker/bootstrap-datepicker.min.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> {{--para que funcone datepicker--}}
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  {{--para que funcone datepicker--}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      
                        {{ Html::image('images/home.aquilovendo_logo.png', "Imagen no encontrada", array('id' => 'principito', 'title' => 'Logo Aquilovendo')) }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <li><a href="{{url('postboardCreate')}}"><div class ="btn btn-primary btn-lg">Publicar Aviso</div></a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            
                        @else
                            <li><a href="{{url('postboardCreate')}}" ><div class ="btn btn-primary btn-lg">Publicar Aviso</div></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Hola,{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>

                                        <a href="#">Perfil</a>
                                        <a href="{{ url("/postboard/".Auth::user()->id) }}">Mis anuncios</a>
                                        <a href="{{ url("/messagesboard/".Auth::user()->id) }}">Mis mensajes</a>
                                        <a href="{{ url("/revisorboard") }}">Revisar anuncios</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')

    </div>
    <div class="container">
        <div class="well well-sm">
            <div class="row">
                <div class="col-md-2">
                    <a href="#">Quienes Somos</a>
                </div>
                <div class="col-md-2">
                    <a href="#">Reglas</a>
                </div>
                <div class="col-md-2">
                    <a href="#">Consejos de seguridad</a>
                </div>
                <div class="col-md-2">
                    <a href="#">Termino y Condiciones</a>
                </div>
                <div class="col-md-2">
                    <a href="#">Ayuda</a>
                </div>
                <div class="col-md-2">
                    <a href="{{url('/contacto')}}">Contacto</a>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}

    {{Html::script('libs/jquery/jquery-2.1.3.min.js')}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>--}}
    {!!Html::script("https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js")!!}
    {{Html::script('libs/bootstrap-3.3.7/js/bootstrap.min.js')}}
    {{Html::script('libs/bootbox/bootbox.min.js')}}
    {{Html::script('libs/js/funciones.js')}}
    {!!Html::script('libs/waitingDialog/waitingDialog.js')!!}

    @yield('scripts')
</body>
</html>
