@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url('albums')}}">Albums</a> </li>
		<li role="presentation" class="active"> <a>Lista de Fotos</a> </li>
		<li role="presentation"> <a href="{{url('fotos/crear/'.$album)}}">Nueva Foto</a> </li>
	</ul>
	
	<h2> Lista de Fotos </h2>
	
	<table id="tabla" class="table table-hover table-striped table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>Album</th>
				<th>Foto</th>
				<th>Publicado</th>
				<th>Ver</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>
		</thead>
		<tbody>
			@php ($i = 1)
			@foreach($fotos as $foto)
				<tr>
					<td>{{$i}}</td>
					<td>{{$foto->titulo}}</td>
					<td>{{$foto->foto}}</td>
					<td>{{$foto->created_at}}</td>
					<td><a href="{{url('fotos/ver/'.$foto->id_album.'/'.$foto->id)}}"> <i class="glyphicon glyphicon-search"></i> </a></td>
					<td><a href="{{url('fotos/editar/'.$foto->id_album.'/'.$foto->id)}}"> <i class="glyphicon glyphicon-pencil"></i> </a></td>
					<td><a href="{{url('fotos/eliminar/'.$foto->id)}}" onclick="return confirm('Desea enviar este item a la papelera?')"> <i class="glyphicon glyphicon-erase"></i> </a></td>					
				</tr>
				@php ($i++)
			@endforeach
		</tbody>
	</table>
	
@stop
