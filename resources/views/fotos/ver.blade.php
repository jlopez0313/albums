@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url('albums')}}">Albums</a> </li>
		<li role="presentation"> <a href="{{url('fotos/album/'.$album)}}">Lista de Fotos</a> </li>
		<li role="presentation" class="active"> <a>Ver Foto</a> </li>
		<li role="presentation"> <a href="{{url('fotos/crear/'.$album)}}">Nueva Foto</a> </li>
	</ul>
	
	<h2> Ver Foto </h2>
	
	<div class="photos">
		<img src="{{Storage::disk('archivos')->url($foto->foto)}}" class="mini">  <br /> 
		<span>Descripcion: </span> {{$foto->descripcion}} <br /> 
		<span>Tags: </span> {{ implode(", ", $tags) }} <br /> 
		<span>Fecha de Publicaci&oacute;n: </span> {{$foto->created_at}}
	</div>
@stop
