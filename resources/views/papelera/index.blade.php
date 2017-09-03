@extends('theme/head')
@section('content')
	
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"> <a>Papelera</a> </li>
	</ul>
	
	<h2> Papelera </h2>
	
	<table id="tabla" class="table table-hover table-striped table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>Modulo</th>
				<th>Item</th>
				<th>Recuperar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@php ($i = 1)
			@foreach($papelera as $trash)
				<tr>
					<td>{{$i}}</td>
					<td>{{$trash->modulo}}</td>
					<td>{{$trash->item}}</td>
					<td><a href="{{url('papelera/editar/'.$trash->id)}}"> <i class="glyphicon glyphicon-ok"></i> </a></td>
					<td><a href="{{url('papelera/eliminar/'.$trash->id)}}" onclick="return confirm('Desea eliminar este item definitivamente?')"> <i class="glyphicon glyphicon-trash"></i> </a></td>
				</tr>
				@php ($i++)
			@endforeach
		</tbody>
	</table>
	
@stop
