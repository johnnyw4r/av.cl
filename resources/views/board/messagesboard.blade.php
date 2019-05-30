@extends('layouts.boardly')

@section('contenidoBoard')


	<div class = "col-md-9">
				<div class="panel-heading  well well-sm">
					<h4>Mis Mensajes</h4>
				</div>

				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#enviados">Enviados</a></li>
					<li><a data-toggle="tab" href="#recibidos">Recibidos</a></li>

				</ul>

				<div class="tab-content">
					<div id="enviados" class="tab-pane fade in active">

						<table class ="table table-striped table-hover table-bordered">
							<thead>
							<tr >
								<td>PostID</td>
								<td>Fecha</td>
								<td>Usuario</td>
								<td>Email</td>
								<td>Mensaje</td>
								<td colspan="3">Opciones</td>
							</tr>
							</thead>
							<tbody >

							@foreach($messages as $message)
                                <?php
                                if ($message->leidoEnviado==0){
                                    $resalta_inicio='<strong>';
                                    $resalta_fin='</strong>';
                                }
                                else{
                                    $resalta_inicio='';
                                    $resalta_fin='';
                                }

                                ?>

								<tr>

									<td><?php  echo $resalta_inicio ?><a href="{{ url("/postboardShow/".$message->post_id) }}" >{{$message->post_id}}</a><?php $resalta_fin ?></td>
									<td ><?php  echo $resalta_inicio ?>{{$message->created_at}}<?php $resalta_fin ?></td>
									<td><?php  echo $resalta_inicio ?>{{$message->name}}<?php $resalta_fin ?></td>
									<td><?php  echo $resalta_inicio ?>{{$message->email}}<?php $resalta_fin ?></td>
									<td><?php  echo $resalta_inicio ?>{{(strlen($message->comment)>= 50)?substr($message->comment,0,32).'...':substr($message->comment,0,64)}}<?php $resalta_fin ?></td>

									<td><?php  echo $resalta_inicio ?><a href="{{ url("/messagesboardShow/".$message->id.'/enviado') }}" class="btn btn-default" id="editar">Leer</a><?php $resalta_fin ?></td>

									<td><?php  echo $resalta_inicio ?>
										<form id="eliminarForm{{$message->id}}" name="eliminarForm" action="{{route('messageBoardDestroy')}}" method="POST" style="margin-bottom: 0px">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="id" value="{{$message->id}}">
											<button class="btn btn-danger" title="Permite borrar este mensaje de manera permanente">Eliminar</button>
										</form>
                                        <?php $resalta_fin ?>
									</td>

								</tr>

							@endforeach
							{{Form::close()}}
							</tbody>
						</table>
						{{$messages->render()}}


					</div>
					<div id="recibidos" class="tab-pane fade">

						<table class ="table table-striped table-hover table-bordered">
							<thead>
							<tr >
								<td>PostID</td>
								<td>Fecha</td>
								<td>Usuario</td>
								<td>Email</td>
								<td>Mensaje</td>
								<td colspan="3">Opciones</td>
							</tr>
							</thead>
							<tbody >

							@foreach($messageRecibidos as $messageRecibido)
                                <?php
                                if ($messageRecibido->leidoRecibido==0){
                                    $resalta_inicio='<strong>';
                                    $resalta_fin='</strong>';
                                }
                                else{
                                    $resalta_inicio='';
                                    $resalta_fin='';
                                }

                                ?>

								<tr>

									<td><?php  echo $resalta_inicio ?><a href="{{ url("/postboardShow/".$messageRecibido->post_id) }}" >{{$messageRecibido->post_id}}</a><?php $resalta_fin ?></td>
									<td><?php  echo $resalta_inicio ?>{{$messageRecibido->created_at}}<?php $resalta_fin ?></td>
									<td><?php  echo $resalta_inicio ?>{{$messageRecibido->user()->find($messageRecibido->user_id)->name}}<?php $resalta_fin ?></td>
									<td><?php  echo $resalta_inicio ?>{{$messageRecibido->user()->find($messageRecibido->user_id)->email}}<?php $resalta_fin ?></td>
									<td><?php  echo $resalta_inicio ?>{{(strlen($messageRecibido->comment)>= 50)?substr($messageRecibido->comment,0,32).'...':substr($messageRecibido->comment,0,64)}}<?php $resalta_fin ?></td>

									<td><?php  echo $resalta_inicio ?><a href="{{ url("/messagesboardShow/".$messageRecibido->id.'/recibido') }}" class="btn btn-default" id="editar">Leer</a><?php $resalta_fin ?></td>

									<td><?php  echo $resalta_inicio ?>
										<form id="eliminarForm{{$messageRecibido->id}}" name="eliminarForm" action="{{route('messageBoardDestroy')}}" method="POST" style="margin-bottom: 0px">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="id" value="{{$messageRecibido->id}}">
											<button class="btn btn-danger" title="Permite borrar este mensaje de manera permanente">Eliminar</button>
										</form>
                                        <?php $resalta_fin ?>
									</td>

								</tr>

							@endforeach
							{{Form::close()}}
							</tbody>
						</table>
						{{$messageRecibidos->render()}}


					</div>

				</div>

					
			</div>
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