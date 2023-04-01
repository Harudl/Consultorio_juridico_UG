
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
                    <h4 class="text-center fw-bolder text-muted mt-5 mb-3" style="color:#012970;">
                    Patrocinios Finalizados
            </h4>

<h5 class="text-left fw-bolder text-muted mt-4 mb-3" style="color:#012970;">
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
                <input type="text" class="form-control" id="min" name="min" placeholder="Fecha de inicio" readonly>
            </div>
        </div>

        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon1">
                    <i class="ri-calendar-2-fill ri-lg"></i>

                    </span>
                </div>
                    <input type="text" class="form-control" id="max" name="max" placeholder="Fecha de fin" readonly>
                   
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
                            <th>Fecha</th>
                                <th>Apellidos y Nombres</th>
                                <th>Abogado</th>
                               
                                <th>Unidad Judicial</th>
                                <th>N° DE PROCESO</th>
                                <th>Materia</th>
                                <th>Tema</th>
                                <th>Estado</th>         
                                <th>Tema Resumen</th>
                            
                                                                         
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
 // Custom filtering function which will search data in column four between two values
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
 
 
         // Create date inputs
     minDate = new DateTime($('#min'), {
      
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
 
    
 
     
 
         var table =    $('#example').DataTable({

            
            "aProcessing": true,//Activamos el procesamiento del datatables
 	    "aServerSide": true,//Paginación y filtrado realizados por el servidor 
	
        "ajax":{
            url: 'index.php?c=Reportes&a=Lista_Patrocinio_finalizados',
            type : "get",
        },
        "bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
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
  
     responsive: {
             details: {
                 display: $.fn.dataTable.Responsive.display.modal( {
                     header: function ( row ) {
                         var data = row.data();
                         return 'Datos del patrocinio';
                     }
                 } ),
                 renderer: $.fn.dataTable.Responsive.renderer.tableAll()
             }
         },
      searching: true,
 
             "language":{
                     "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                 } ,
                 "lengthChange": false , 
    
    /*  dom: 'Bfrtip', */
     dom: 'PBfrtip',
     columnDefs: [
             {
                 searchPanes: {
                     show: true,
                     initCollapsed: true
                 },
                 targets: [0, 1, 5]
             }
         ],
         buttons: [ 
             
             {
             extend:    'excelHtml5',
             text:      '<i class="ri-download-2-fill ri-xl"></i>&nbsp;EXPORTAR EXCEL',
             titleAttr: 'Excel',
            className: 'btn btn-success',
             title:     'REGISTROS DE LOS PATROCINIOS CONSULTORIO JURÍDICO GRATUITO UG',
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
                 columns: [0,1,2,3]
             }         
         },
         {
             extend:    'pdfHtml5',
             text:      '<i class="ri-download-2-fill ri-xl"></i>&nbsp;EXPORTAR PDF',
             titleAttr: 'PDF',
             className: 'btn btn-danger',
             title:     'REGISTROS DE LOS PATROCINIOS CONSULTORIO JURÍDICO GRATUITO UG',
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
                 columns: [0,1,2,3]
             }     
         }
     ], 
     
 
    
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
 
 
 });
 
     </script>    
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>