@extends('layouts.resulttemp')

@section('contenido')

	<div class = "container">

		@if (session()->has('message'))
			<div class="col-md-9">
				<div class="alert alert-success">
					{{session()->get('message')}}
				</div>
			</div>
		@endif

		<div class= "row">
			<div class = "col-md-9">
				<div class="panel-heading  well well-sm">
					<h4>Resultados de Búsqueda</h4>
				</div>
				<table class ="table table-striped table-hover">
					<thead>
					<tr >
						<td>ID</td>
						<td>Fecha</td>
						<td></td>
						<td>Título/Precio</td>
						<td>Email</td>
						<td>Negociable</td>
						<td colspan="3">Estado Post</td>
					</tr>

					</thead>
					<tbody>
						@foreach($posts as $post)

						<tr>
							<td>{{$post->id}}</td>
							<td>{{$post->dateStart}}</td>
							<td>{!! Html::image('/storage/'.$post->photos()->get()->first()->link,null,array('class'=>'img-thumbnail w-25 h-25 img-responsive center-block','width'=>'120')) !!}</td>

						@if ($region_id == null)
								<?php $region_id = 0 ?>
							@endif

							@if ($countries_id == null)
								<?php $countries_id = 0 ?>
							@endif

							 <td><a href="{{ url("/postShow/$countries_id/$region_id/$post->id") }}">{{$post->title}}</a><br>
							${{$post->price}}</td>
							<td>{{$post->region}}<br>{{$post->country}}</td>
							<td>{{$post->negotiable?'Si':'No'}}</td>
							<td>{{$post->state}}</td>
						</tr>

						@endforeach

					</tbody>
				</table>
				{{$posts->appends(['product'=>$product,'countries_id'=>$countries_id,'region_id'=>$region_id])->render()}}

			</div>
		</div>
	</div>

@endsection
