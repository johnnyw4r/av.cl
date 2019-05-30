@extends('layouts.app')

@section('content')
<div class = "container">
	@if(Auth::user())
		<div class = "col-md-2">
			<div class="panel-heading  well well-sm">

				<h4>Panel de Control</h4>
					<div>
						<a href="{{ url("/postboard/".Auth::user()->id) }}"><h5>Mis anuncios</h5></a>

					</div>
					<div>
						<a href="{{ url("/messagesboard/".Auth::user()->id) }}">Mis mensajes</a>

					</div>
					<div>
						<a href="{{ url("/revisorboard") }}"><h5>Revisar anuncios</h5></a>


					</div>
					<div>
						<h5>Perfil</h5>
					</div>
			</div>

		</div>
	@endif
		@if (session()->has('message'))
					<div class="col-md-10">
						<div class="alert alert-success">
							{{session()->get('message')}}
						</div>
					</div>

		@endif
		@if (session()->has('message-discarted'))
			<div class="col-md-10">
				<div class="alert alert-warning">
					{{session()->get('message-discarted')}}
				</div>
			</div>

		@endif

		@if($errors->any())
			<div class="col-md-10">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors ->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif


	@yield('contenidoBoard')


</div>
@endsection