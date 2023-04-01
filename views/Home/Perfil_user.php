<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>

<!-- CONTENIDO -->
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Información del Asesor</h1>
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
            <h5 class="card-title fw-bolder">Datos del <?php echo $perfil->rol_nombre;?></h5>
            <?php if($_SESSION['rol_id']==1) { ?>  
               <img src="assets/img/administrador.png" alt="Profile" > <br>
               <?php } if($_SESSION['rol_id']==2) { ?>   
               <img src="assets/img/abogado-a.png" alt="Profile" > <br>
               <?php } ?>   
                  <h2><?php echo $perfil->nombre;?></h2>
                  <h3 class="">Nombre del <?php echo $perfil->rol_nombre;?> </h3>
                 

                     <div class="row text-center" style="border:1px solid darkgrey; margin:10px; padding:10px; font-size:19px;">
                     <div class=" label fw-bolder">Número de Cédula</div>
                        <div ><?php echo $perfil->usuario_cedula;?></div>
                        <div class="label fw-bolder ">Correo Electrónico</div>
                        <div><?php echo $perfil->correo;?></div>
                     </div>
                      
            </div>
         </div>
      </div>
     
      
      <?php
        if (isset( $_SESSION['m_incorrecto'])) {?>
            <script>
                     Swal.fire({
  icon: "<?php echo $_SESSION['m_icon']; ?>",
  title: "<?php echo $_SESSION['m_incorrecto']; ?>",
  showConfirmButton: false,
  timer: 1500
}) 
                
            </script> 
        <?php unset($_SESSION['m_incorrecto']); 
        unset($_SESSION['m_icon']); 
     } ?> 
     
     


      <div class="col-xl-4">
         <div class="card" >
            <div class="card-body profile-card pt-4 m-4 ">
               <div class="col-xxl-12">
               <h5 class="card-title fw-bolder text-center">Cambiar contraseña</h5>
<h6><em>La nueva contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.</em></h6>
<form method="post" action="index.php?c=Usuario&a=cambiar_clave" onsubmit="return v_cambiar()" >
               <div class="formItem "> 
    <div class="form-box">
                    <!--  <div class="row" style=" margin:10px; padding:10px;"> -->
                        <div class="label fw-bolder">Contraseña Actual</div>
                       <input class="" type="text" id="clave_Actual" name="clave_Actual">
                       <span></span>
                  <!--    </div> -->
</div></div>

<div class="formItem"> 
    <div class="form-box">
                  
                        <div class=" label fw-bolder">Nueva Contraseña</div>
                        <input class="" type="text" id="clave_nueva" name="clave_nueva">
                        <span></span>
                
                     </div></div>
                     <div class="formItemBoton" style="text-align: center;">
                     <input class="bn3637 bn43" type="submit" value="Confirmar" id="cambiar" name="cambiar">
                     </div>
                     </form>                     
               </div>
            </div>
         </div>
      </div>


    



   </section>
</main>
<script type="text/javascript" src="assets/js/form_cambiar_clave.js"></script>   
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>