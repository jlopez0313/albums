@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url('albums')}}">Albums</a> </li>
		<li role="presentation" class="active"> <a>Editar Album</a> </li>
		<li role="presentation"> <a href="{{url('albums/crear')}}">Nuevo Album</a> </li>
	</ul>
	
	<h2> Editar Album </h2>
	
	{{ Form::open(array('id' => 'create_album', 'url' => 'albums/update/'.$album->id, 'method' => 'post', 'class' => "form-horizontal")) }}
		<div class="form-group">
			{{ Form::label('titulo', 'Titulo', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('titulo', $album->titulo, array('class' => 'form-control', 'placeholder' => 'Titulo')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}	
@stop
