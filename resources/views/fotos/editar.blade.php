@extends('theme/head')
@section('content')
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url('albums')}}">Albums</a> </li>
		<li role="presentation"> <a href="{{url('fotos/album/'.$album)}}">Lista de Fotos</a> </li>
		<li role="presentation" class="active"> <a>Editar Foto</a> </li>
		<li role="presentation"> <a href="{{url('fotos/crear/'.$album)}}">Nueva Foto</a> </li>
	</ul>
	
	<h2> Lista de Fotos </h2>
	
	{{ Form::open(array('id' => 'create_foto', 'url' => 'fotos/update/'.$foto->id, 'enctype'=> 'multipart/form-data', 'method' => 'post', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('archivo', 'Archivo', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				<img src="{{Storage::disk('archivos')->url($foto->foto)}}" class="mini">
			</div>
		</div>
		
		<div class="form-group">
			{{ Form::label('desc', 'Descripcion', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::textarea('desc', $foto->descripcion, array('class' => 'form-control', 'placeholder' => 'Descripcion')) }}
			</div>
		</div>
		
		<div class="form-group">
			{{ Form::label('tags', 'Tags', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::textarea('tags', implode(", ", $tags), array('class' => 'form-control', 'placeholder' => 'Separados por coma')) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::hidden('idAlbum', $foto->id_album ) }}
				
				{{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}	
@stop
