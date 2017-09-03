@extends('theme/head')
@section('content')
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url('albums')}}">Albums</a> </li>
		<li role="presentation"> <a href="{{url('fotos/album/'.$album)}}">Lista de Fotos</a> </li>
		<li role="presentation" class="active"> <a>Nueva Foto</a> </li>
	</ul>
	
	<h2> Lista de Fotos </h2>
	
	{{ Form::open(array('id' => 'create_foto', 'url' => 'fotos/save', 'enctype'=> 'multipart/form-data', 'method' => 'post', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('archivo', 'Archivo', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::file('archivo', array('class' => 'form-control', 'placeholder' => 'Titulo')) }}
			</div>
		</div>
		
		<div class="form-group">
			{{ Form::label('desc', 'Descripcion', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::textarea('desc', null, array('class' => 'form-control', 'placeholder' => 'Descripcion')) }}
			</div>
		</div>
		
		<div class="form-group">
			{{ Form::label('tags', 'Tags', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::textarea('tags', null, array('class' => 'form-control', 'placeholder' => 'Separados por coma')) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::hidden('idAlbum', $album ) }}
				
				{{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}	
@stop
