<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
			{!! Html::style('css/app.css')!!}			
			{!! Html::style('bootstrap/css/bootstrap.min.css')!!}			
			{!! Html::style('css/style.css')!!}
			{!! Html::style('js/fancybox/dist/jquery.fancybox.min.css')!!}			
			{!! Html::style('js/datatable/DataTables-1.10.16/media/css/jquery.dataTables.css')!!}
    </head>
    <body>
		<header class="header">			
		</header>
		<aside class="sidebar">
			<ul class="nav">
				<li class="first">MENU PRINCIPAL</li>
				<li> 
					<a href="{{url("albums")}}"><i class="glyphicon glyphicon-link"></i>Albums</a>
				</li>
				
				<li>
					<a href="{{url("albums/lista")}}"><i class="glyphicon glyphicon-link"></i>Listar Albums</a>
				</li>
				
				<li> 
					<a href="{{url("papelera")}}"><i class="glyphicon glyphicon-link"></i>Papelera</a>
				</li>				
			</ul>
		</aside>
		<div class="content">			
			@yield('content')
		</div>
	@include('theme/footer')