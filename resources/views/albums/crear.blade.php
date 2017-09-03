@extends('theme/head')
@section('content')

	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url('albums')}}">Albums</a> </li>
		<li role="presentation" class="active"> <a>Nuevo Album</a> </li>
	</ul>
	
	<h2> Crear Album </h2>
	
	{{ Form::open(array('id' => 'create_album', 'url' => 'albums/save', 'method' => 'post', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('titulo', 'Titulo', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('titulo', null, array('class' => 'form-control', 'placeholder' => 'Titulo')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}	
@stop
