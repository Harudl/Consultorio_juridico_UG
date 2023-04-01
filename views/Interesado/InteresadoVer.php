
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>



<style>
    .profile .profile-overview .row {
    margin-bottom: 20px;
    font-size: 18px;
}
</style>
<!-- CONTENIDO -->
<main id="main" class="main">

    <?php if(isset( $_SESSION['m_update_usuario'])){?>
            <script>
                
                Swal.fire({
                    icon: "success",
  title: "<?php echo $_SESSION['m_update_usuario']; ?>",
  /* text: 'Presione en ok!', */
  showConfirmButton: false,
  timer: 1900
})


            </script>
        <?php unset($_SESSION['m_update_usuario']); } ?> 


<section class="section profile">
    <div class="row">

    <div class="col-xxl-12">
    <div class="card" >
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <h1 class="card-title text-center border-bottom border-2 fw-bold" style="font-size:25px;">Datos del Interesado</h1>
    <div class="d-grid gap-1 d-md-flex justify-content-md-end">
        <a class="bn3637 bn41" style="font-size:16px;" 
        href="index.php?c=Interesado&a=editar_usuario&user=<?php echo $user_data->id_info_interesado; ?>">
        <i class="ri-file-edit-fill ri-2x"></i>&nbsp;Actualizar datos</a>         
    </div>
</div></div>
    </div>

    <div class="col-xl-6">
      <div class="row">
    <div class="col-6">   
            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">              
                        <img src="assets/img/perfil-interesado.png" alt="Profile" > <br> 
                        <h2><?php echo $user_data->nombresA;?></h2>
                        <h3 class="text-center mt-3"> Nombre Completo</h3>
            </div>
            </div>
            </div>
                 
            <div class="col-6">   
            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">              
                        <img src="assets/img/m-user-ced.png" alt="Profile" > <br> 
                        <h2><?php echo $user_data->cedula; ?></h2>
                        <h3 class="text-center mt-3"> Cedula </h3>
            </div>
            </div>
           </div>

           <div class="col-6">   
            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">              
                        <img src="assets/img/m-user-estado.png" alt="Profile" > <br> 
                        <h2><?php echo $user_data->estado_civil_nom; ?></h2>
                        <h3 class="text-center mt-3"> Estado civil </h3>
            </div>
            </div>
           </div>
           <div class="col-6">   
            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">              
                        <img src="assets/img/m-user-instrucc.png" alt="Profile" > <br> 
                        <h2><?php echo $user_data->instrucion_nom; ?></h2>
                        <h3 class="text-center mt-3"> Instrucción </h3>
            </div>
            </div>
           </div>

    </div>
     </div>
           
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                

                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col label fw-bolder">Afiliado al IESS:</div>
                        <div class="col-lg-12 "><?php echo $user_data->iess;?></div>
                        
                        
                     </div>
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class=" label fw-bolder">Recibe Bono:</div>
                        <div class="col-lg-12"><?php echo $user_data->bono;?></div>
                     </div>
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class=" label fw-bolder">Ocupación:</div>
                        <div class="col-lg-12 "><?php echo $user_data->ocupacion_nombre;?></div>
                     </div>
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="label fw-bolder">Discapacidad:</div>
                        <div class="col-lg-12"><?php echo $user_data->discapacidad;?></div>
                     </div>
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class=" label fw-bolder">Telefono:</div>
                        <div class="col-lg-12"><?php echo $user_data->telefono;?></div>
                     </div>
        
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class=" label fw-bolder">Dirección:</div>
                        <div class="col-lg-11"><?php echo $user_data->domicilio;?></div>
                     </div>               
                        
                        </div>                                               
                    </div>       
            </div>   
    </div>

    <div class="col-xl-3">
                <div class="card">
                    <div class="card-body pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            
               
                     <!--    <div  class="border  border-2" style="padding:10px; margin:10px;">  -->
                             <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col label fw-bolder">Nivel de ingresos:</div>
                        <div class="col-lg-12 "><?php echo $user_data->num_ingreso;?></div>
                        
                        
                     </div>
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class=" label fw-bolder">correo electrónico:</div>
                        <div class="col-lg-12"><?php echo $user_data->correo;?></div>
                     </div>
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class=" label fw-bolder">Zona de vivienda:</div>
                        <div class="col-lg-12 "><?php echo $user_data->zonaV;?></div>
                     </div>
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class=" label fw-bolder">Edad:</div>
                        <div class="col-lg-11"><?php echo $user_data->edad;?></div>
                     </div>
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class=" label fw-bolder">Fecha de nacimiento:</div>
                        <div class="col-lg-11"><?php echo $user_data->fechaN;?></div>
                     </div>
        
                     <div class="row col-11" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="label fw-bolder">Etnia:</div>
                        <div class="col-lg-11"><?php echo $user_data->nombre_etnia;?></div>
                     </div>               
                        
                        </div>                                               
                    </div>       
    

            </div>   
    </div>

    


	
<!-- Section de asesorias del usuario  -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center border-bottom border-2 fw-bold">Historial de Asesorías del Interesado</h5>
            <div class="row" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                <div class="col-lg-12">
         
                    <div class="table-responsive">
                        <table id="example" class="table table-stripped table-bardered nowrap" style="width:100%">
                            <thead class=" text-center" style="background:#256D85;">
                                <tr style="color:white;">

                                    <th >Fecha de Creación</th>
                                    <th>Tema</th>
                                    <th >Materia</th>                            
                                    <th >Tipo de usuario</th>
                                    <th >Patrocinio</th>  
                                    <th >Asesor</th>

                                </tr>
                            </thead>

                            <tbody>


                               <?php

                               $dd;
                               
                               foreach($resultado as $fila){ ?> 
                                <tr class="info">
                                    <td><?php echo $fila['fecha_asesoria']; ?></td>
                                    <td><?php echo $fila['tema']; ?></td>
                                    <td><?php echo $fila['materia_nombre']; ?></td>
                                    <td><?php echo $fila['tipo_usuario_nom']; ?></td>
                                  
                               <?php if($fila['patrocinado']==0) { ?>
                                <td><?php echo "no" ?></td>
                                <?php } ?>
                                <?php if($fila['patrocinado']==1) { ?>
                                <td><?php echo "si" ?></td>
                                        <?php } ?> 
                                    <td><?php echo $fila['nombre']; ?></td>
                                </tr>
                           <?php } ?> 
                           </tbody>
                        </table>  
                    </div>
	            </div>
            </div>
        </div>      
    </div> 

</section>
</main>
            

<!--    Datatables --> 
<script>
    $(document).ready(function() {
        $('#example').DataTable({
         responsive:true,
            scrollX: false,

            "language":{
                 "url": "assets/LanguajeDataTables/spanish.json"
                } ,
        columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ],
 
responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalles de la fecha '+data[2];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
        "lengthChange": false ,
        "searching": false,
        });
    } );  
    </script>
      
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>