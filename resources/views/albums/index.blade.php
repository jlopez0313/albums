@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"> <a>Albums</a> </li>
		<li role="presentation"> <a href="{{url('albums/crear')}}">Nuevo Album</a> </li>
	</ul>
	
	<h2> Albums </h2>
	
	<table id="tabla" class="table table-hover table-striped table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>Album</th>
				<th>Fotos</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>
		</thead>
		<tbody>
			@php ($i = 1)
			@foreach($albums as $album)
				<tr>
					<td>{{$i}}</td>
					<td>{{$album->titulo}}</td>
					<td><a href="{{url('fotos/album/'.$album->id)}}"> <i class="glyphicon glyphicon-picture"></i> </a></td>
					<td><a href="{{url('albums/editar/'.$album->id)}}"> <i class="glyphicon glyphicon-pencil"></i> </a></td>
					<td><a href="{{url('albums/eliminar/'.$album->id)}}" onclick="return confirm('Desea enviar este item a la papelera?')"> <i class="glyphicon glyphicon-erase"></i> </a></td>					
				</tr>
				@php ($i++)
			@endforeach
		</tbody>
	</table>
	
@stop
