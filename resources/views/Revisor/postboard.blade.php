@extends('layouts.boardly')

@section('contenidoBoard')
	<div class = "col-md-10">
				<div class="panel-heading  well well-sm">
					<h4>Anuncios pendientes para revisión </h4>
				</div>	
				<table class ="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<td class="col-md-1">ID</td>
							<td class="col-md-1">Título</td>
							<td class="col-md-3">Descripción</td>
							<td class="col-md-1">País</td>
							<td class="col-md-1">Región/Estado</td>
							<td class="col-md-1">Estado</td>
							<td  class="col-md-1" colspan="4">Opciones</td>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)

						<tr>
							<td>{{$post->id}}</td>
							<td>{{$post->title}}</td>
							<td>{{$post->body}}</td>
							<td>{{$post->country}}</td>
							<td>{{$post->region}}</td>
							<td>{{$post->state}}</td>
							<td><a href="{{ url("/postboardShow/".$post->id) }}" class="btn btn-default">Editar</a></td>

							{{--<td><a href="{{ url("/postboardShow/".$post->id) }}" class="btn btn-success">Publicar</a></td>--}}

							<td>
								<form id="publicar{{$post->id}}" name="publicarForm" action="{{route('PostBoardPublicate',null)}}" method="POST" style="margin-bottom: 0px">
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{$post->id}}">
									<button class="btn btn-success" title="Cambia estado anuncio a publicado">Publicar</button>
								</form>
							</td>
							<td>
								<form id="descartar{{$post->id}}" name="descartarForm" action="{{route('PostBoardDiscarted',null)}}" method="POST" style="margin-bottom: 0px">
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{$post->id}}">
									<button class="btn btn-warning" title="Cambia estado de anuncio a rechazado">Descartar</button>
								</form>
							</td>
							<td>
								<form id="eliminarForm{{$post->id}}" name="eliminarForm" action="{{route('postboardDestroy',null)}}" method="POST" style="margin-bottom: 0px">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="id" value="{{$post->id}}">
									<button class="btn btn-danger" title="Permite borrar este post de manera permanente">Eliminar</button>
								</form>
							</td>

						</tr>

						@endforeach

					</tbody>
				</table>
				{{$posts->render()}}
					
	</div>

	<div id="modal-mensaje" class="modal fade" tabindex="-1" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 ><span id="mensaje_respuesta"></span></h4>
				</div> {{-- modalheader --}}
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
				</div> {{--modal-footer--}}
			</div> {{-- modal content --}}
		</div> {{-- modal-dialog --}}
	</div>
@endsection
@section('scripts')

	<script>

		$("[name='eliminarForm']").submit(function(e) {
			console.log("entro a eliminar antes de...");
			var currentForm = this;
			id = currentForm.id.value;
			e.preventDefault();
			bootbox.confirm({
				message: '¿Está seguro que desea borrar el mensaje?',
				buttons: {
					confirm: {
						label: 'Aceptar'
					},
					cancel: {
						label: 'Cancelar'
					}
				},
				callback: function (result) {
					if (result == true) {

						currentForm.submit();
						waitingDialogo();
					}
				}
			});
		});

	</script>
@endsection