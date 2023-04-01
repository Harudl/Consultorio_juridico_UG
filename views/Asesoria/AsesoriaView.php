
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>

<!-- CONTENIDO -->
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Información de la asesoría</h1>
   </div>

 <!--   <div class="col-xl-12 mb-1">
      <a class="bn3637 bn40" href="javascript: history.go(-1)">Volver</a> 
   </div> -->
   
<section class="section profile">
   <a href=""></a>
   <div class="row" >
      <div class="col-xl-6">
      <div class="row">
         <div class="card" >
         <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
               <img src="assets/img/user-d-a.png" alt="Profile" > <br>
                  <h2><?php echo $resultado->nombresA;?></h2>
                  <h3>Nombre Completo del usuario</h3>
         </div>
         </div>

         
         <div class="col-6">   
            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="assets/img/pdf-aser.png" alt="Profile" > <br> 
                        <h2 class="label fw-bold mb-1">Formulario de asesoría</h2>  
                      <!--   <h3 class="text-center"> Descargar Archivo</h3>      -->      
                        <a class="btn btn-danger mb-1" target="_blank" 
                        href="index.php?c=Asesoria&a=ViewPDF&id=<?php echo $resultado->id_asesoria;?>">
                           <i class="ri-download-2-fill ri-lg"></i>&nbsp;PDF
                        </a>
                    
            </div>
            </div>
            </div>
                 
            <div class="col-6">   
            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">              
                        <img src="assets/img/abogado-a.png" alt="Profile" > <br> 
                        <h2><?php echo $resultado->nombre;?></h2>
                        <h3 class="text-center mt-3"> Abogado Designado</h3>
            </div>
            </div>
           </div>
           <div class="col-6">   
            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">              
                        <img src="assets/img/tipo_user.png" alt="Profile" > <br> 
                        <h2><?php echo $resultado->tipo_usuario_nom;?></h2>
                        <h3 class="text-center">Tipo de usuario</h3>
            </div>
            </div>
           </div>
           <div class="col-6">   
            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">              
                        <img src="assets/img/legal_m.png" alt="Profile" > <br> 
                        <h2><?php echo $resultado->materia_nombre;?></h2>
                        <h3 class="text-center">Materia</h3>
            </div>
            </div>
           </div>
        <!--  </div> -->
         </div>







      </div>
      
   

    
  
      <div class="col-xl-6">
         <div class="card" >
            <div class="card-body profile-card pt-4 m-4 ">
               <div class="col-xxl-12" style="font-size:19px;">
                  <h5 class="card-title fw-bold" style="font-size:21px;">Detalles de la asesoría</h5>

                    
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-9 col-md-4 label fw-bolder ">Tema de la asesoría</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->tema;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-9 col-md-4 label fw-bolder">Fecha de inicio</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->fecha_asesoria;?></div>
                     </div>
                   
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-9 col-md-4 label fw-bolder">Resumen de la consulta</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->resumen_consulta;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-9 col-md-4 label fw-bolder">Resolucion de la consulta</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->resolucion_consulta;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-9 col-md-4 label fw-bolder">Derivado por</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->derivado;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-9 col-md-4 label fw-bolder">Estado de la causa</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->estado_causa;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-9 col-md-4 label fw-bolder">Seguimiento</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->seguimiento;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-9 col-md-4 label fw-bolder">Observaciones</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->observacion;?></div>
                     </div>
               </div>
            </div>
         </div>
      </div>

   </section>
</main>
                  
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>