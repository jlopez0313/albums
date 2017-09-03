@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="{{url("albums/lista")}}">Lista de Albums</a> </li>
		<li role="presentation" class="active"> <a>Busqueda Global</a> </li>
	</ul>
	
	<h2> Busqueda Global </h2>
	
	{{ Form::open(array('id' => 'find', 'url' => 'fotos/busqueda', 'enctype'=> 'multipart/form-data', 'method' => 'post', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('search', 'Tags', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('search', null, array('class' => 'form-control', 'placeholder' => 'Tags separados por coma')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Buscar', array('class' => 'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}	
@stop
