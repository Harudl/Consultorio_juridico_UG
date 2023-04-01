
  <?php require_once("views/templates/header_navbar.php"); ?>

  <?php require_once("views/templates/sidebar_lateral.php"); ?>
  <?php require_once 'config/Conexion.php' ?> 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- contenido -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Inicio</h1>
  </div>

  <section class="section">

    <?php if($_SESSION['rol_id']==2) { ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card" >
            <div class="card-body">
              <h5 class="card-title fw-bold">Gestión de los casos jurídicos</h5>

            <div class="row">
                  <div class="col-lg-4">
                    <a href="index.php?c=Interesado&a=indexLista">
                  <div class="card" style="background:#256D85;">
                     <div class="card-body" style="display:flex; padding:20px;">
                     <i class='bx' style="background:#114f64;padding: 5px;border-radius: 10px;"><img src="assets/img/NewR.svg" ></i>
                        <h4 class="card-title" style="color:white;margin-left:7px;">Usuarios Interesados</h4>
                        <div class="home-Contador" style=" font-size: 20px;margin-left: auto;"> <span>
                          <h6>&nbsp;&nbsp;N°&nbsp;&nbsp;</h6>
                          <h3 style="border:0px solid; padding:2px; background:lightgray;text-align: center;font-size: 25px;font-weight: 900;border-radius: 5px;"> 
                          <?php 
                          $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
                          $sql="SELECT COUNT(*) AS cantidad_usuario FROM interesado"; 
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

                  <div class="col-lg-4">
                    <a href="index.php?c=Asesoria&a=Lista_asesoria">
                      <div class="card" style="background:#0097A7;">
                        <div class="card-body" style="display:flex; padding:20px;">
                          <i class='bx' style="background:#05717c; padding: 5px; border-radius: 10px;">
                          <img src="assets/img/team-fill.svg" ></i>
                          <h5 class="card-title" style="color:white;margin-left:7px;">Asesorías</h5>
                          <div class="home-Contador" style=" font-size: 18px;margin-left: auto;"> <span>
                          <h6>&nbsp;&nbsp;N°&nbsp;&nbsp;</h6>
                          <h3 style="border:0px solid; padding:2px; background:lightgray;text-align: center;border-radius: 5px;font-size: 25px;font-weight: 900;"> 
                          <?php 
                            $id_asesor= $_SESSION['id'];
                            $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
                            $sql="SELECT COUNT(*) AS cantidad_asesorias FROM asesoria INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario where id_usuario=".$id_asesor; 
                            $consulta = mysqli_query($con, $sql);
                            while ($resultado = mysqli_fetch_assoc($consulta)){
                            echo $resultado['cantidad_asesorias']; 
                            }?> 
                          </h3></span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-lg-4">
                    <a href="index.php?c=patrocinio&a=mostrarPatrocinio"> 
                      <div class="card" style="background:#00897B;">
                        <div class="card-body" style="display:flex; padding:20px;">
                          <i class='bx' style="background:#00685e;padding: 5px;border-radius: 10px;"><img src="assets/img/auction-fill.svg" alt=""></i>
                          <h5 class="card-title" style="color:white;margin-left:7px;">Patrocinios</h5>
                          <div class="home-Contador" style=" font-size: 18px;margin-left: auto;"> <span>
                          <h6>&nbsp;&nbsp;N°&nbsp;&nbsp;</h6>
                          <h3 style="border:0px solid; padding:2px; background:lightgray;text-align: center;border-radius: 5px;font-size: 25px;font-weight: 900;"> 
                          <?php 
                          $id_asesor= $_SESSION['id'];
                          $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
                          $sql="SELECT COUNT(*) AS cantidad_patrocinio FROM patrocinio
                          INNER JOIN usuario ON usuario.id_usuario = patrocinio.fk_usuario_p where id_usuario=".$id_asesor; 
                          $consulta = mysqli_query($con, $sql);
                          while ($resultado = mysqli_fetch_assoc($consulta)){     
                          echo $resultado['cantidad_patrocinio']; 
                          }?> 
                          </h3></span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

            </div>


      </div>
    </div>
  </div> 
</div>

    <!-- Graficos  -->
    <?php require_once("views/Home/Graficos.php"); ?>  

    <?php } ?>


		</section>
</main>
                    
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>

