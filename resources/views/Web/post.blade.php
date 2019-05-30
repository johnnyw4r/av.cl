@extends('layouts.resulttemp')

@section('contenido')
	<div class = "container">
		<div class= "row">
			<div class = "col-md-6">
				<div >

				</div>
				<div class="panel-heading  well well-sm	">

					<div class ="img-fluid w-100">

						{!! Html::image('images/banneradsense.png',null,array('class'=>'img-thumbnail w-100 img-responsive center-block')) !!}
					</div>
						<h3>
							{{$post['title']}}
							<span class = "pull-right"> Precio: $ {{$post['price']}}</span>
						</h3>

					<div>&nbsp</div>

					<div class = "panel panel-default">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
					    <!-- Indicators -->
					    <ol class="carousel-indicators">
					        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					        <li data-target="#myCarousel" data-slide-to="1"></li>
					        <li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
					        <div class="item active justify-content-center">
					        	{{ Html::image('images/descarga1.jpeg', "Imagen no encontrada", array('id' => 'principito', 'title' => 'Logo Aquilovendo','class'=>'text-center')) }}

					            <div class="carousel-caption">

					            </div>
					        </div>

					        <div class="item">

					            {{ Html::image('images/descarga2.jpeg', "Imagen no encontrada", array('id' => 'principito', 'title' => 'Logo Aquilovendo')) }}
					            <div class="carousel-caption">

					            </div>
					        </div>

					        <div class="item">
					            {{ Html::image('images/descarga3.jpeg', "Imagen no encontrada", array('id' => 'principito', 'title' => 'Logo Aquilovendo')) }}
					            <div class="carousel-caption">

					            </div>
					        </div>
					    </div>

					    <!-- Controls -->
					    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					        <span class="glyphicon glyphicon-chevron-left"></span>
					        <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" data-slide="next">
					        <span class="glyphicon glyphicon-chevron-right"></span>
					        <span class="sr-only">Next</span>
					    </a>
					</div>
					</div>

					<br>
					<div class="row" >
							<div class="col-md-12">
								<h4><strong>Detalles</strong></h4>
								<div class="row">
									<div class="col-md-6">
										<strong>Información</strong>
										<br><br>
										<div>Precio: ${{$post['price']}}</div>


										<div>Subcategoría: {{$post->subcategory()->find($post->subcategory_id)->name}}</div>
										<div>Código: {{$post['id']}}</div>

									</div>
									<div class="col-md-6">
										<strong>Lo que dice el vendedor:</strong>
										<br><br>
										<div>{{$post['body']}}</div>


									</div>

								</div>

							</div>

					</div>
				</div>

				@if (AUTH::user())
					@if (AUTH::user()->id == $post['user_id'])
						<div class="well">
							<div class ="row">
								<a href=" {{url("/postboardShow/".$post['id']) }}" class="btn btn-default">Editar</a>
								<a href="#" class="btn btn-info">Desactivar</a>
								<a href="#" class="btn btn-danger">Borrar</a>
							</div>

						</div>
					@endif
				@endif
			</div>

			<div class = "col-md-3">
				<div class="panel-heading  well well-sm">
					<div class="text-center">
						<h4>{{$user['name']}}</h4>
					</div>
					<div class="text-center">
						{{--<h5>{{$regionList[$user['region']]}}/{{$countries[$user['country']]}}</h5>--}}
						<h5>{{$user['region']}}/{{$user['country']}}</h5>
					</div>
					<div class="text-center">
						<h3>{{$user['mobile']}}</h3>
					</div>

						<div class="text-center">
							<h4>Contactate con el Vendedor</h4>
						</div>
						{{Form:: open (['url'=> '/messagesboardStore', 'method'=>'post'])}}
							{{ Form::hidden('user_id', $post['user_id']) }}
							{{ Form::hidden('post_id', $post['id']) }}
							<div class="form-group">
								{{Form::text('name','',array('placeholder'=>'Nombre','class'=>'form-control','id'=>'name')) }}
							</div>

							<div class="form-group">
								{{Form::text('email','',array('placeholder'=>'Email','class'=>'form-control','id'=>'email')) }}
							</div>

							<div class="form-group">
								{{Form::text('mobile','',array('placeholder'=>'Teléfono','class'=>'form-control','id'=>'mobile')) }}
							</div>
							<div class="form-group">

								{!! Form::textarea('comment' , null , array('placeholder'=>'Mensaje','class'=>'form-control','id'=>'comment')) !!}
							</div>

							<div class="row">
								<div class="form-group">
									<div class="col-xl-12 col-ld-12 col-md-12 col-sm-12">
										<button class="btn btn-primary pull-right">Enviar</button>
									</div>
								</div>
							</div>
						{{Form:: close()}}
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">


</script>



@endsection
