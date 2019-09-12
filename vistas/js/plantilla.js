

/*=============================================
SideBar Menu
=============================================*/

$('.sidebar-menu').tree()

/*=============================================
Data Table
=============================================*/

$(".tablas").DataTable({

	"language": {

		"order":[[0,"desc"]],

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});


$(".tablasCronograma").DataTable({

	 "order":[[0,"desc"]],
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

//iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    //Initialize Select2 Elements
    $('.select2').select2();
    //Date range picker with time picker
$('#reservation').daterangepicker();


// $(document).ready(function(){
// 	$("[data-toggle=popover]").popover({
// 			html: true,
// 			trigger: 'focus',
// 			content: function() {
// 				var did = $(this).data('id'); 
// 				return $('#confirm_'+did).children(".confirm-delete").html();
// 			}
// 	});
	
// 	$('#pop_1').on('inserted.bs.popover', function () {
//   	// Listen for when confirmation is cancelled
// 		$('.confirm-delete-btn').on('click',function(e){
// 			e.preventDefault();
// 			var parent_id = $(this).data('rel');
// 			$("#img_"+parent_id).html('<div class="done-son">Boom shaka! This actually worked!</div>');
// 		});
// 	})
	
// });

$('.tablasCronograma').on('click', '.popover_parent a',function() {
   $('.popover_parent > a').not(this).parent().removeClass('active');
  $(this).parent().toggleClass('active');
  console.log(this);
});

//Hide the dropdown when clicked off
$(document).on('.tablas click touchstart', function(event) {
  if (!$(event.target).closest('.popover_parent').length) {
    // Hide the menus.
    $('.popover_parent.active').removeClass('active');
     // console.log(this);
  }
});


