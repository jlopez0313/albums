@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url("albums/lista")}}">Lista de Albums</a> </li>
		<li role="presentation" class="active"> <a>Lista de Fotos</a> </li>
	</ul>
	
	<h2> {{$album->titulo}} </h2>
	
	<div class="search">
		{{ Form::open(array('id' => 'find', 'url' => 'fotos/find/'.$album->id, 'method' => 'post', 'class' => 'form-inline')) }}
			<div class="form-group">				
				<div class="input-group">
					<div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
					{{ Form::text('search', null, array('class' => 'form-control', 'placeholder' => 'Tags')) }}
				</div>	
			</div>
			{{ Form::submit('Buscar', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
	</div>
		
	
	<div class="photos">
		@foreach($fotos as $foto)
			<a class="fancybox" href="{{Storage::disk('archivos')->url($foto->foto)}}" data-fancybox data-caption="{{'Descripcion: '.$foto->descripcion.'<br /> Tags: '. $tags[$foto->id].'<br /> Publicaci&oacute;n: '.$foto->created_at}}">
				<img src="{{Storage::disk('archivos')->url($foto->foto)}}" class="mini">
			</a>
		@endforeach
	</div>
@stop
