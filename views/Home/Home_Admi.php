<?php require_once("views/templates/header_navbar.php"); ?>
<?php require_once 'config/Conexion.php' ?> 
<?php require_once("views/templates/sidebar_lateral.php"); ?>


<!-- contenido -->
<main id="main" class="main">
       <div class="pagetitle">
          <h1>Inicio</h1>
       </div>
      <section class="section">
     
      <?php if($_SESSION['rol_id']==1) { ?>  

        <div class="row">
    <div class="col-xl-6">
                  <div class="card" >
                     <div class="card-body">

                        <h5 class="card-title fw-bold">Panel del Administrador</h5>
                        <div class="row">
                           
               <div class="col-lg-11">
               <a href="index.php?c=Usuario&a=Usuario_nuevo">
                  <div class="card" style="background:#256D85;">
                     <div class="card-body" style="display:flex; padding:20px;">
                     <i class='bx' ><img src="assets/img/a1.png"  style="height:90px;width:80px;" ></i>
                        <h4 class="card-title" style="color:white;margin-left:7px;">Nuevo<br>Usuarios</h4>
                     </div>
                  </div>
                  </a>

                  
               </div>

      

               <div class="col-lg-11">
               <a href="index.php?c=Usuario&a=Listado_usuarios">
                  <div class="card" style="background:#0097A7;">
                    <div class="card-body" style="display:flex; padding:20px;">
                        <i class='bx ' ><img src="assets/img/pr2.png" style="height:90px;width:90px;" ></i>
                        <h5 class="card-title" style="color:white;margin-left:7px;">Lista de <br>Usuarios</h5>
                        <div class="home-Contador" style=" font-size: 20px;margin-left: auto;"> <span>
                          <h6>&nbsp;&nbsp;N°&nbsp;&nbsp;</h6>
                          <h3 style="border:0px solid; padding:2px; background:lightgray;text-align: center;font-size: 25px;font-weight: 900;border-radius: 5px;"> 
                          <?php 
                          $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
                          $sql="SELECT COUNT(*) AS cantidad_usuario FROM usuario"; 
                          $consulta = mysqli_query($con, $sql);
                          while ($resultado = mysqli_fetch_assoc($consulta)){
                          echo $resultado['cantidad_usuario']; 
                          }?> 
                          </h3></span>
                        </div>
                     </div>
                  </div>
               </a>
               </div>
            </div>
        </div></div>


        </div>
    <!-- Graficos  -->
    <?php require_once("views/Home/Graficos.php"); ?>        
       
    
       <?php } ?>    
       
       </section>
</main>
                    
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>

