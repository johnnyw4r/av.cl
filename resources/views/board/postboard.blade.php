@extends('layouts.boardly')

@section('contenidoBoard')
	<div class = "col-md-9">
				<div class="panel-heading  well well-sm">
					<h4>Mis Anuncios </h4>
				</div>	
				<table class ="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<td>ID</td>
							<td>Fecha</td>
							<td></td>
							<td>Título</td>
							<td>Precio</td>
							<td>Negociable</td>
							<td>Estado</td>
							<td colspan="2">Opciones</td>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
						<?php try{
						if (!is_null($post->country($post->country)->first()->id) && !is_null($post->REGION($post->region)->first()->id) )
						{
						?>
							<tr>
								<td>{{$post->id}}</td>

								<td>{{$post->dateStart}}</td>
								<td>{!! Html::image('/storage/'.$post->photos()->get()->first()->link,null,array('class'=>'img-thumbnail w-25 h-25 img-responsive center-block','width'=>'120')) !!}</td>
								<td><a href="{{ url("/postShow/".$post->country($post->country)->first()->id."/".$post->region($post->region)->first()->id."/$post->id") }}">{{$post->title}}</a><br>
								<td>{{$post->price}}</td>
								<td>{{$post->negotiable?'Si':'No'}}</td>
								<td>{{$post->state}}</td>
								<td><a href="{{ url("/postboardShow/".$post->id) }}" class="btn btn-default">Editar</a></td>
								<td>
									<form id="eliminarForm{{$post->id}}" name="eliminarForm" action="{{route('postboardDestroy',null)}}" method="POST" style="margin-bottom: 0px">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="id" value="{{$post->id}}">
										<button class="btn btn-danger" title="Permite borrar este post de manera permanente">Eliminar</button>
									</form>
								</td>

							</tr>
						<?php

                        	}
                        }catch(Exception $exception){

						}
						?>



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