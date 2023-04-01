
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>


<!-- contenido -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Usuarios</h1>
    </div>

    <?php
        if (isset( $_SESSION['me_asesor'])) {?>
            <script>
                            Swal.fire({
  icon: "<?php echo $_SESSION['m_icon_asesor']; ?>",
  title: "<?php echo $_SESSION['me_asesor']; ?>",
  showConfirmButton: false,
  timer: 1500
}) 

            </script> 
        <?php unset($_SESSION['me_asesor']);  
    } ?>

<?php
        if (isset( $_SESSION['m_asesor_editar'])) {?>
            <script>
                  Swal.fire({
  icon: "<?php echo $_SESSION['m_icon_asesor_e']; ?>",
  title: "<?php echo $_SESSION['m_asesor_editar']; ?>",
  showConfirmButton: false,
  timer: 1500
}) 
            </script> 
        <?php unset($_SESSION['m_asesor_editar']);  
    } ?>

<section class="section">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card" >
                <div class="card-body">
                    <h4 class="text-center fw-bolder text-muted mt-4">Listado de Usuarios</h4>
                <div class="text-right mb-2">
        <a class="bn3637 bn37" href="index.php?c=Usuario&a=Usuario_nuevo">
            <i class="ri-file-add-line"></i>&nbsp;Añadir nuevo</a>
    </div> 
                <div class="table-responsive">
                        
                    <div class="table-responsive">
                        <table id="example" class="nowrap cell-border hover" style="width:100%">
                            <thead class=" text-center" style="background:#256D85;">
                                <tr style="color:white;">
                    
                              <!--       <th>#</th> -->
                                    <th>No.</th>
                                    <th>Apellidos y Nombres</th>
                                    <th>Número de cédula</th>
                                    <th>Correo Electrónico</th>
                                    <th>Rol</th>
                                    <th>Fecha de creación</th>
                                   
                                    
                                    <th>Acciones</th>  
                    
                                </tr>
                            </thead>
                            <tbody>    
                              
                                        
            </tbody>
        </table>  
    </div>
                       
</section>
</main>


<script>

    $(document).ready(function() {
     var dataTable =  $('#example').DataTable({

            "aProcessing": true,//Activamos el procesamiento del datatables
 	    "aServerSide": true,//Paginación y filtrado realizados por el servidor 
	
        "ajax":{
            url: 'index.php?c=Usuario&a=Lista_usuarios',
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
                        return 'Datos de '+data[0];
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
        url: 'index.php?c=Usuario&a=Delete_usuario',
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