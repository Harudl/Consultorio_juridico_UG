
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>

<!-- contenido -->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Interesado</h1>
    </div>
 

        <?php
        if (isset( $_SESSION['m_crear_usuario'])) {?>
            <script>
                
                Swal.fire({
  icon: "<?php echo $_SESSION['m_icon_interesado']; ?>",
  title: "<?php echo $_SESSION['m_crear_usuario']; ?>",
  text: 'Presione en ok!',
})
            </script> 
        <?php unset($_SESSION['m_crear_usuario']);  
    }?> 


<section class="section">
    <div class="row">
    <div class="col-lg-12">
    <div class="card" >
        <div class="card-body">
            <h4 class="text-center fw-bolder text-muted mt-4" style="color:#012970;">
                        Listado de Usuario Interesado          
            </h4>
                     
<div class="text-right mb-2">
    <a class="bn3637 bn37" href="index.php?c=Interesado&a=mostrar_nuevo">
      <i class="ri-add-circle-fill ri-xl" > </i>&nbsp;Agregar nuevo</a>
</div>



        <table id="example" class="nowrap cell-border hover" style=" width:100%;">
            <thead style="background:#256D85;">
                <tr style="color:white;align-te" class=" text-center">

                    <th >Cédula</th>
                    <th data-priority="1">Apellidos y Nombres</th>
                    <th>Correo</th> 
                    <th>Telefono</th>     
                    <th data-priority="2">Acciones</th>  

                    <?php if($_SESSION['rol_id']==1) { ?>
                    <th>Eliminar</th>
                    <?php } ?> 
                </tr>
            </thead>

            <tbody>
          
                </tbody>
            </table>  
        </div>
          
    
        </section>
</main>

 <!--    Datatables -->
 <script>

    $(document).ready(function() {

      var table = $('#example').DataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
 	    "aServerSide": true,//Paginación y filtrado realizados por el servidor 
	
        "ajax":{
            url: 'index.php?c=Interesado&a=Lista',
            type : "get",
        },
        "bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 5,//Por cada 10 registros hace una paginación
        "lengthMenu": [5, 10, 20, 25, 50], 
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
	    
        "columnDefs": [ 
     { 
         responsivePriority: 1, targets: 0 
     },
     { 
         responsivePriority: 2, targets: -1 
     }],


             "language":{
                 "url": "assets/dataTables/es-ES.json"
             } ,
     responsive: {
         details: {
             display: $.fn.dataTable.Responsive.display.modal( {
                 header: function ( row ) {
                     var data = row.data();
                     return 'Datos del usuario';
                 }
             } ),
             renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                 tableClass: 'table'
             } )
         }
     },
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
        url: 'index.php?c=Interesado&a=Eliminar_i',
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
            
            table.ajax.reload();
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