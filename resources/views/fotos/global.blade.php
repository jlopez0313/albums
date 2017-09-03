@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url("albums/lista")}}">Lista de Albums</a> </li>
		<li role="presentation"> <a href="{{url("fotos/search")}}">Busqueda Global</a> </li>
		<li role="presentation" class="active"> <a>Resultado Global</a> </li>
	</ul>
	
	<h2> Resultado Global </h2>
	
	<div class="photos">
		@foreach($fotos as $foto)
			<a class="fancybox" href="{{Storage::disk('archivos')->url($foto->foto)}}" data-fancybox data-caption="{{'Album: '.$foto->titulo.'<br /> Descripcion: '.$foto->descripcion.'<br /> Tags: '. $tags[$foto->id].'<br /> Publicaci&oacute;n: '.$foto->created_at}}">
				<img src="{{Storage::disk('archivos')->url($foto->foto)}}" class="mini">
			</a>
		@endforeach
	</div>
@stop
