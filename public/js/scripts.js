$(function(){
	$("[data-fancybox]").fancybox();
	
	$('#tabla').DataTable({
		"language": {
			"lengthMenu": "Mostrar _MENU_ registros por pagina",
			"zeroRecords": "Sin datos encontrados",
			"info": "Pagina _PAGE_ de _PAGES_",
			"infoEmpty": "Sin registros",
			"search":         "Buscar:",
			"infoFiltered": "(Filtro de _MAX_ registros totales)",
			"paginate": {
					"first":    "Primero",
					"last":     "Último",
					"next":     "Siguiente",
					"previous": "Anterior"
				},
		}
	});
	
	// validar Album
	$("#create_album").validate({
		rules: {
			titulo: {
				required: true,
				maxlength: 100
			},			
		},
		messages: {
			titulo: {
				required: "Este campo es requerido",
				maxlength: "Debe contener maximo 100 caracteres"
			},
		}
	});
	
	
	// validar Fotos
	$("#create_foto").validate({
		rules: {
			archivo: {
				required: true
			},
			desc: {
				required: true,
				maxlength: 255
			},
			tags: {
				required: true
			},			
		},
		messages: {
			archivo: {
				required: "Este campo es requerido",
			},
			desc: {
				required: "Este campo es requerido",
				maxlength: "Debe contener maximo 255 caracteres"
			},
			tags: {
				required: "Este campo es requerido",				
			},
		}
	});
	
	
	// validar Search
	$("#find").validate({
		rules: {
			search: {
				required: true
			},	
		},
		messages: {
			search: {
				required: "Este campo es requerido",
			},
		}
	});
	
})