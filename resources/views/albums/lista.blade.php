@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"> <a>Lista de Albums</a> </li>
		<li role="presentation"> <a href="{{url('fotos/search')}}">Busqueda Global</a> </li>
	</ul>
	
	<h2> Lista de Albums </h2>
	
	<table id="tabla" class="table table-hover table-striped table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>Album</th>
				<th>Fotos</th>
			</tr>
		</thead>
		<tbody>
			@php ($i = 1)
			@foreach($albums as $album)
				<tr>
					<td>{{$i}}</td>
					<td>{{$album->titulo}}</td>
					<td><a href="{{url('fotos/lista/'.$album->id)}}"> <i class="glyphicon glyphicon-picture"></i> </a></td>					
				</tr>
				@php ($i++)
			@endforeach
		</tbody>
	</table>
	
@stop
