
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>
<!-- <script src="assets/js/sweetalert.min.js"></script> -->

<style>
    .dataTables_filter {
    display: none;
}
</style>

<!-- contenido -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Patrocinio</h1>
    </div>
<section class="section">


<?php
        if (isset( $_SESSION['m_update_patrocinio'])) {?>
            <script>
                Swal.fire({
 
  icon: "<?php echo $_SESSION['m_icon_patrocinio']; ?>",
  title: "<?php echo $_SESSION['m_update_patrocinio']; ?>",
  /* text: 'Presione en ok!', */
  showConfirmButton: false,
  timer: 1900
})
            </script> 
        <?php unset( $_SESSION['m_update_patrocinio']);  
    }
    else 
        if(isset( $_SESSION['m_crear_patrocinio'])){?>
            <script>
               Swal.fire({
  icon: "<?php echo $_SESSION['m_icon_patrocinio']; ?>",
  title: "<?php echo $_SESSION['m_crear_patrocinio']; ?>",
  text: 'Presione en ok!',
})
            </script>
        <?php unset($_SESSION['m_crear_patrocinio']);  } ?>
     
    
<div class="row">
<div class="col-lg-12">
<div class="card" >
<div class="card-body">

    <h4 class="text-center fw-bolder text-muted mt-4 mb-4" style="color:#012970;">
        Listado de Patrocinio 
    </h4>

    <div class="row">
    <h5 class="text-left fw-bolder mt-3 mb-3" style="color:#256D85;">
                    Criterios de búsqueda
            </h5>
        <div class="col-md-3">
            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1">
                    <i class="ri-file-text-fill ri-xl"></i>

                    </span>
                </div>
                <input type="text" class="form-control" id="tema" data-index="0" placeholder="Digite el tema">
   
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1">
                    <i class="ri-stack-fill ri-xl"></i>

                    </span>
                </div>
                <input type="text" class="form-control" id="materia" data-index="1" placeholder="Digite la materia">
              
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1">
                    <i class="ri-passport-fill ri-xl"></i>
                    </span>
                </div>

                <input type="text" class="form-control"
                 id="cedula" data-index="2" placeholder="Digite la cédula">
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1">
                    <i class="ri-bar-chart-2-fill ri-xl"></i>

                    </span>
                </div>
                <input type="text" class="form-control" 
                id="estado" data-index="4" placeholder="Digite el estado">
            </div>
        </div>
        

    </div>


    <div class="row">
        <div class="col-lg-12">       
            <div class="table-responsive">
                <table id="example" class="nowrap cell-border hover" style="width:100%">
                    <thead style="background:#256D85;">
                        <tr class="text-center" style="color:white;" >
                        
                                <th >Tema</th>
                                <th >Materia</th>
                                <th >Cédula</th>
                                <th >Apellidos y Nombres</th>     
                            <?php if($_SESSION['rol_id']==1) { ?>
                             <th>Asesor</th>
                             <?php } ?>               
                                <th>Estado</th>
                                <th>Expediente</th>                                      
                                <th>Acciones</th>
                                <?php if($_SESSION['rol_id']==1) { ?>
                             <th>Eliminar</th>
                             <?php } ?>  
                            </tr>
                        </thead>

                        <tbody>
                        
                        </tbody>
                    </table>  
                </div>
            </div> 
        </div>
        </div>
        </div>
        </div>
    </div> 
</section>
</main>

    <script>
    $(document).ready(function() {
        var table =    $('#example').DataTable({


            "aProcessing": true,//Activamos el procesamiento del datatables
 	    "aServerSide": true,//Paginación y filtrado realizados por el servidor 
	
        "ajax":{
            url: 'index.php?c=Patrocinio&a=Lista',
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
        url: 'index.php?c=Patrocinio&a=Patrocinio_Delete',
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

     
       $('#tema').keyup(function(){
    table.column($(this).data('index')).search(this.value).draw();
})

$('#materia').keyup(function(){
    table.column($(this).data('index')).search(this.value).draw();
})
$('#cedula').keyup(function(){
    table.column($(this).data('index')).search(this.value).draw();
})
$('#estado').keyup(function(){
    table.column($(this).data('index')).search(this.value).draw();
}) 

    } );  
    </script>
      
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>