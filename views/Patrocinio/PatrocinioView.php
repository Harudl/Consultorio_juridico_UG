<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>

<!-- CONTENIDO -->
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Información del Patrocinio</h1>
   </div>

   <div class="col-xl-12 mb-1">
      <a class="bn3637 bn40" href="javascript: history.go(-1)">Volver</a> 
   </div>
   
<section class="section profile">
   <a href=""></a>
   <div class="row" >
      <div class="col-xl-4">
         <div class="card" >
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
               <!-- <img src="assets/img/datos-user-r.png" alt="Profile" > -->
               <img src="assets/img/abogado-a.png" alt="Profile" > <br>
                  <h2><?php echo $resultado->nombre;?></h2>
                  <h3 class="">Nombre del Asesor Designado</h3>

                      <!--   <a href="">PDF</a>
                        <a href="">Imprimir</a> -->
            </div>
         </div>
      </div>
      <div class="col-xl-4">
         <div class="card" >
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
               <!-- <img src="assets/img/datos-user-r.png" alt="Profile" > -->
               <img src="assets/img/acuerdo.png" alt="Profile" > <br>
                  <h2><?php echo $resultado->nombresA;?></h2>
                  <h3 class="">Nombre del Patrocinado</h3>

                      <!--   <a href="">PDF</a>
                        <a href="">Imprimir</a> -->
            </div>
         </div>
      </div>
      
      <div class="col-xl-4">
         <div class="card" >
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
               <!-- <img src="assets/img/datos-user-r.png" alt="Profile" > -->
               <img src="assets/img/informacion-personal.png" alt="Profile" > <br>
               <a target="_blank" href="<?php echo $resultado->expediente;?>" class="bn3637 bn42 fw-bold pt-1 pb-1 pr-1 pl-2 mb-1 ">Ver Documento</a>
                  <h3 class="">Expediente del Patrocinado</h3> 
                  
                      <!--   <a href="">PDF</a>
                        <a href="">Imprimir</a> -->
            </div>
         </div>
      </div>
     <!--  <div class="col-xl-12">
      <div class="card">
         <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <div class="col-lg-3 col-md-4 label fw-bolder">Expediente del Patrocinado</div>
            <div class="col-lg-9 col-md-8">
            <a href="?php echo $resultado->expediente;?>" class="btn btn-primary">Ver Archivo</a>
            </div>
            
            </div>
         </div>
      </div> -->
     

      <div class="col-xl-12">
         <div class="card" >
            <div class="card-body profile-card pt-4 m-4 ">
               <div class="col-xxl-12" style="font-size:19px;">
                  <h5 class="card-title fw-bold" style="font-size:20px;">Detalles del Patrocinado</h5>

                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder ">Tema</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->tema;?></div>
                     </div>

                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder ">Estado de Patrocinio</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->estado_nombre;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">Tipo de Judicatura</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->tipo_judicatura;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">Unidad Judicial</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->unidad_judicial;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">Nombre del Juez</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->nombre_juez;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">N° de causa</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->num_causa;?></div>
                     </div>
                    <!--  <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">Actividad</div>
                        <div class="col-lg-9 col-md-8">?php echo $resultado->actividad;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">Fecha de Actividad</div>
                        <div class="col-lg-9 col-md-8">?php echo $resultado->fecha_actividad;?></div>
                     </div> -->
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">Sentencia</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->sentencia;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">Fecha de Sentencia</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->fecha_sentencia;?></div>
                     </div>
                     <div class="row" style="border:1px solid darkgrey; margin:10px; padding:10px;">
                        <div class="col-lg-3 col-md-4 label fw-bolder">Resumen</div>
                        <div class="col-lg-9 col-md-8"><?php echo $resultado->resumen;?></div>
                     </div>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
                  
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>