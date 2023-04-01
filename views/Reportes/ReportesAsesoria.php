
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>


<style>
    .dataTables_filter {
    display: none;
}
</style>
<!--Contenido  --> 
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Reportes</h1>
    </div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" >
                <div class="card-body">
                <h4 class="text-center fw-bolder text-muted mt-5 mb-3" 
                    style="color:#012970;"> Registro de Asesorías
            </h4>
                     
            <h5 class="text-left fw-bolder text-muted mt-5 mb-3" style="color:#012970;">
                    Búsqueda por rango de fecha
            </h5>

    <div class="row">
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1">
                    <i class="ri-calendar-2-fill ri-lg"></i>

                    </span>
                </div>
                <input type="text" class="form-control" id="min" name="min" placeholder="Fecha de inicio">
            </div>
        </div>

        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1">
                    <i class="ri-calendar-2-fill ri-lg"></i>

                    </span>
                </div>
                    <input type="text" class="form-control" id="max" name="max" placeholder="Fecha de fin" >
                   
            </div>
          
            
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <!-- <button id="limpiar">Limpiar</button> -->
                <button id="limpiar" class="btn btn-outline-secondary fw-bold form-control">
                    <i class="ri-refresh-line ri-xl" style="vertical-align: middle;"></i>&nbsp;Limpiar</button>
                </div>
            </div>
        </div>
      
    </div>
 
    <div class="table-responsive">
        <table id="example" class="nowrap cell-border hover" style="width:100%">
            <thead class="text-center" style="background:#256D85;">
                <tr style="color:white;" >
                            <th>Fecha de Creación</th>
                            <th>Abogado</th>              
                            <th>Materia</th>
                            <th>Tema de asesoría</th>
                            <th>Apellidos y Nombres</th>
                            <th>No. Cédula</th>
                            <th>Fecha de nacimiento</th>
                            <th>Edad</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Genero</th>
                            <th>Etnia</th>
                            <th>País</th>
                            <th>Instrucción</th>
                            <th>Ocupación</th>
                            <th>Estado Civil</th>
                            <th>Nivel de Ingresos</th>
                            <th>Recibe Bono</th>
                            <th>Discapacidad</th>
                            <th>Zona</th>
                            <th>Tipo de usuario</th>
                            <th>Derivado por</th>
                            <th>Estado de causa</th>
                            <th>Seguimiento</th>
                            <th>Patrocinio</th>
                            <th>Observación</th>                                                        
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
    </section>
</main>


<script>
var minDate, maxDate;

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[0] ); 
    
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
    // Creacion de inputs
    minDate = new DateTime($('#min'), {
     
     format: 'MMMM Do YYYY'
 });
 maxDate = new DateTime($('#max'), {
     format: 'MMMM Do YYYY'
 });


 var table = $('#example').DataTable({
    "aProcessing": true,//Activamos el procesamiento del datatables
 	    "aServerSide": true,//Paginación y filtrado realizados por el servidor 
	
        "ajax":{
            url: 'index.php?c=Reportes&a=Lista_Asesoria',
            type : "get",
        },
        "bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 5,//Por cada 10 registros hace una paginación
	  /*   "order": [[ 0, "asc" ]],//Ordenar (columna,orden) */
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

    dom: 'lrtip',
        
/*   "language":{
                 "url":"assets/dataTables/es-ES.json"
                } ,
                "lengthChange": false , 
             */
                 dom: 'PBfrtip',
          
            
     columnDefs: [
            {
                searchPanes: {
                    show: true,
                    initCollapsed: true 
                   
                },
                targets: [ 1,2,5,24]
            },
            {
                searchPanes: {
                    show: false
                },
                targets: [0,1,3,10,11,14,13,16,22,15,18,23,21,20,19,17]
            }
        ],   
        buttons: [

            {
            extend:    'excel',
            text:      '<i class="ri-download-2-fill ri-xl"></i>&nbsp;EXPORTAR EXCEL',
            titleAttr: 'Excel',
            className: 'btn-success',
            title:     'REGISTROS DE LAS ASESORÍAS DEL CONSULTORIO JURÍDICO GRATUITO UG',
       
            excelStyles:{
                cells:"2",
                style:{
                    fill:{
                        pattern:{
                            color:'FFEB3B'
                        }
                    }
                }
            },
            
            exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]
            } 
           
            
    }], 

    responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Datos de la asesoría';
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
      
        
});

$('#limpiar').on('click', function() {
    minDate.val('');
    maxDate.val('');
    $('#example').DataTable().search('').draw();
  /*   minDate.val('');
    maxDate.val(''); */
  });



// Refilter the table
$('#min, #max').on('change', function () {
        table.draw();
   
});

/* $('#Limpiar').on('click', function() {
 
  $('#min, #max').val("");

 table.search('').draw(); 
 table.draw();

});  */



 
});


</script>
      
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>