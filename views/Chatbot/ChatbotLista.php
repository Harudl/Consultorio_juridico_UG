
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>


<!-- contenido -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Chatbot Orientativo</h1>
    </div>


    <?php
        if (isset( $_SESSION['m_crear_chatbot'])) {?>
            <script>
  Swal.fire({
  icon: "<?php echo $_SESSION['m_icon_chatbot']; ?>",
  title: "<?php echo $_SESSION['m_crear_chatbot']; ?>",
  showConfirmButton: false,
  timer: 1500
})
            </script> 
        <?php unset($_SESSION['m_crear_chatbot']);  
    } ?>

<?php
        if (isset( $_SESSION['m_editar_chatbot'])) {?>
            <script>
                Swal.fire({
  icon: "<?php echo $_SESSION['m_icon_chatbot_editar']; ?>",
  title: "<?php echo $_SESSION['m_editar_chatbot']; ?>",
  showConfirmButton: false,
  timer: 1500
}) 
            </script> 
        <?php unset($_SESSION['m_editar_chatbot']);  
    } ?>



<section class="section">
 
<div class="row">
      
        <div class="col-lg-12">
            <div class="card" >
                <div class="card-body">
                    <h4 class="text-center fw-bolder text-muted mt-4">Listado de Preguntas y Respuestas</h4>
        <div class="text-right mb-2">
        
    </div> 
                <div class="table-responsive">
                        
                    <div class="table-responsive">

                   
                        <table id="example" class="cell-border table-hover" style="width:100%">
                            <thead class=" text-center" style="background:#256D85;">
                                <tr style="color:white;">

                                    <th>No.</th>
                                    <th>Preguntas</th>
                                    <th>Respuestas</th>               
                                  <!--   <th>Editar</th>
                                    <th>Borrar</th>  -->
                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>    
                              
                                        
            </tbody>
        </table>  

 


    </div>
    </div>                 
</section>
</main>


<script>

    $(document).ready(function() {
     var dataTable =  $('#example').DataTable({

            "aProcessing": true,//Activamos el procesamiento del datatables
 	    "aServerSide": true,//Paginación y filtrado realizados por el servidor 
	
        "ajax":{
            url: 'index.php?c=Chatbot&a=Lista_pregunta',
            type : "get",
        },
        "bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 5,//Por cada 10 registros hace una paginación
    "lengthMenu":  [ 5, 10, 15, 20, 25],
	    "order": [[ 0, "asc" ]],//Ordenar (columna,orden)
	    "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
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
		},
	
            "language":{
                    "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                } ,

        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Registro '+data[0];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
"lengthChange": true , 

        });
        $(document).on('click', '.eliminar', function(e) {
  e.preventDefault();
  var id = $(this).attr('data-id');
  var href = $(this).attr('href');
  swal.fire({
    title: '¿Estás seguro?',
    text: 'Este registro se eliminará permanentemente',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#dc3545',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar',
  }).then(function(result) {
    if (result.isConfirmed) {
      // Enviar la solicitud AJAX para eliminar el registro
      $.ajax({
        url: 'index.php?c=Chatbot&a=Delete',
        method: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
          if (response.exito) {
            // La eliminación fue exitosa
            swal.fire({
              title: 'Registro eliminado',
              text: 'El registro ha sido eliminado correctamente',
              icon: 'success',
              showCancelButton: false,
              confirmButtonColor: '#28a745',
              confirmButtonText: 'Aceptar',
            });
            // Actualizar la lista de registros sin recargar la página
            
            dataTable.ajax.reload();
          } else {
            // La eliminación no fue exitosa
            swal.fire({
              title: 'Error',
              text: 'No se pudo eliminar el registro',
              icon: 'error',
              showCancelButton: false,
              confirmButtonColor: '#dc3545',
              confirmButtonText: 'Aceptar',
            });
          }
        },
        error: function() {
          // Error en la solicitud AJAX
          swal.fire({
            title: 'Error',
            text: 'Ocurrió un error en la solicitud',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Aceptar',
          });
        },
      });
    }
  });
});

      
});

</script>


<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>