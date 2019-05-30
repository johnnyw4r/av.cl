@extends('layouts.app')

@section('content')

	<div class = "container">
		
		<div class= "row">
			<div class = "col-md-3">
				<div class="panel-heading  well well-sm" >
					<h4>Búsqueda Avanzada</h4>
					{{Form:: open (['url'=> '/result', 'method'=>'get'])}}
					<div class="form-group">
						{{Form::text('product','',array('placeholder'=>'Escribe lo que buscas','class'=>'form-control','id'=>'product')) }}
					</div>
					<div class="form-group">	
						{{ Form::select('countries_id',$countries,0,array('placeholder'=>'Filtra por pais','class'=>'form-control','id'=>'countries_id')) }}
					</div>
					<div class="form-group">
						{{ Form::select('region_id',$regions,0,array('placeholder'=>'Filtrar por región','class'=>'form-control','id'=>'region_id')) }}
					</div>
					<div class="form-group">
						{{ Form::select('categories_id',$categories,0,array('placeholder'=>'Filtrar por categoría','class'=>'form-control','id'=>'categories_id')) }}
					</div>
					<div class="form-group">
						{{ Form::select('subcategories_id',$subcategories,0,array('placeholder'=>'Filtrar por subcategoría','class'=>'form-control','id'=>'subcategories_id')) }}
					</div>
					<div class="form-group">
						{{Form::text('min_price','',array('placeholder'=>'Precio mínimo','class'=>'form-control','id'=>'min_price')) }}

					</div>
					<div class="form-group">
						{{Form::text('max_price','',array('placeholder'=>'Precio máximo','class'=>'form-control','id'=>'max_price')) }}

					</div>

					<div class="row">
						<div class="form-group">
							<div class="col-xl-12 col-ld-12 col-md-12 col-sm-12">
								<button class="btn btn-primary pull-right">BUSCAR</button>
							</div>
						</div>
					</div>
					{{Form::close()}}

				</div>

			</div>

			@yield('contenido')
		</div>
	</div>

@endsection

@section('scripts')

<script >
	$( document ).ready(function() {

        $('#countries_id').on('change',function(){
            var ruta= "{{url('/getRegions')}}";
            ruta= ruta+'/'+$(this).val()
            $.get(ruta,
                    function(data) {
                        var model = $('#region_id');
                        model.empty();
                        model.append("<option value='0'>Todas las Regiones</option>");
                        $.each(data, function(index, element) {
                            model.append("<option value='"+ index +"'>" + element + "</option>");
                        });
                    });
        });//$('#listamodulos').on('change',function(){

        $('#categories_id').on('change',function(){
            var ruta= "{{url('/getSubcategories')}}";
            ruta= ruta+'/'+$(this).val()
            $.get(ruta,
                function(data) {
                    var model = $('#subcategories_id');
                    model.empty();
                    model.append("<option value='0'>Subcategorias</option>");
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
