@extends('layouts.app')

@section('content')
<div class = "container">

	<div class = "col-md-3">
		<div class="panel-heading  well well-sm">
			<h4>Panel de Control</h4>
				<div>
					<h5>Mis anuncios</h5>
				</div>
				<div>
					<h5>Mensajes</h5>
				</div>
				<div>
					<h5>Perfil</h5>
				</div>
		</div>
		
	</div>

	<div class = "col-md-9">
				<div class="panel-heading  well well-sm">
					<h4>Mis Anuncios</h4>
				</div>	
				<table class ="table table-striped table-hover">
					<thead>
						<tr>
							<td>ID</td>
							<td>Fecha</td>
							<td>Título</td>
							<td>Precio</td>
							<td colspan="3">Opciones</td>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
						
						<tr>
							<td>{{$post->id}}</td>
							<td>{{$post->dateStart}}</td>
							<td>{!! Html::image('images/images.png',null,array('class'=>'img-thumbnail w-25 h-25 img-responsive center-block')) !!}</td>
							<td><a href="{{ url("/dashboardShow/".$post->id) }}">{{$post->title}}</a>
							<td>{{$post->price}}</td>

							<td><a href="{{ url("/dashboardShow/".$post->id) }}" class="btn btn-default">Editar</button></td>

							
							<td><a href="{{ url("/dashboardDestroy/".$post->id) }}"class="btn btn-danger">Eliminar</a></td>
							<td></td>
						</tr>
						@endforeach

					</tbody>
				</table>
				{{$posts->render()}}
					
			</div>


</div>
@endsection