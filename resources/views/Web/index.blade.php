@extends('layouts.app')

@section('content')

	<div class = "container">
		<div class="row"> 
			<div class="row">
			    <div class="col-sm-12 col-md-12 col-ld-12 col-xl-12">
			      	<h1 class="text-center">PUBLICIDAD DE GOOGLE</h1>
			    </div>
			</div>
		</div>

		<div class="well well-sm">
			<div class="row">
				<div class="form-group">
					<div class="col-xl-12 col-ld-12 col-md-12 col-sm-12">
						<h2 class="text-center">ENCUENTRA LO QUE ESTAS BUSCANDO</h2>
					</div>
					<div class="col-xl-4 col-ld-4 col-md-4 col-sm-4">
						<h3><label class="label label-default center-block" >Selecciona País</label></h3>
						{{ Form::select('countries_id',$countries,0,array('class'=>'form-control','id'=>'countries_id')) }}


					</div>
					<div class="col-xl-4 col-ld-4 col-md-4 col-sm-4 ">
						<h3><label class="label label-default center-block" >Selecciona Región</label></h3>
						{{ Form::select('region',['Todo el País','Región Metropolitana','XV Arica & Parinacota','I Tarapacá','II Antofagasta','III Atacama','IV Coquimbo'],0,array('class'=>'form-control','id'=>'region')) }}
					</div>
					<div class="col-xl-4 col-ld-4 col-md-4 col-sm-4 ">
						<h3><label class="label label-default center-block">Selecciona Categoría</label></h3>
						{{ Form::select('categories_id',$categories,0,array('class'=>'form-control','id'=>'categories_id')) }}
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="form-group">
					<div class="col-xl-12 col-ld-12 col-md-12 col-sm-12">
						{{Form::text('producto','',array('placeholder'=>'Escribe lo que buscas','class'=>'form-control','id'=>'producto')) }}
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="form-group">
					<div class="col-xl-12 col-ld-12 col-md-12 col-sm-12">
						<button class="btn btn-primary pull-right">BUSCAR</button>
					</div>
				</div>
			</div>
		</div>

		<div class="row"> 
			<div class="row">
			    <div class="col-sm-12 col-md-12 col-ld-12 col-xl-12">
			      	<h1 class="text-center">PUBLICIDAD DE GOOGLE</h1>
			    </div>
			</div>
		</div>

		<div class="row"> 
			<div class="row">
			    <div class="col-sm-12 col-md-12 col-ld-12 col-xl-12">
			      	<h1 class="text-center">TENEMOS {{$total_post}} AVISOS DISPONIBLES PARA QUE ENCUENTRES LO QUE QUIERAS</h1>
			    </div>
			</div>
		</div>

	</div>

	

@endsection

@section('scripts')



<script >
	$( document ).ready(function() {
    
		$('#countries_id').on('change',function(){
				alert("Selecciona Región");
		});

		


});

</script>	

		

{{Html::script('libs/jquery/jquery-3.2.1.min.js')}}
{{Html::script('libs/jquery/jquery-2.1.3.min.js')}}
{{Html::script('libs/jquery/moment-2.9.0.min.js')}}



@endsection
