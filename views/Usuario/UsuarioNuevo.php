
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>



<!-- CONTENIDO -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Usuarios</h1>
  </div>



  <section class="section">
    <div class="row">
     <div class="col-lg-12">
		<div class="containerM">
      <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">   
        <div class="contenidoDescripcion">
          <h3>REGISTRO DEL USUARIO</h3>
        </div>

<!-- Formulario de nuevo usuario -->
<form id="formulario" action="index.php?c=Usuario&a=Agregar_usuario"  onsubmit="return v_asesor()" method="post" enctype="multipart/form-data">
  <div class="formularios">
    <p>Datos del usuario<br> </p>
      <div class="containerForm">
        <div class="formItem" style="grid-template-columns: repeat(auto-fit, minmax(400px,1fr ));">
          <div class="form-box">
            <label for="nomnbre">Nombres Completos</label>
            <input type="text" name="nomnbre" id="nomnbre" placeholder="Digite apellidos y nombres">
            <span></span>
          </div>

      <div class="form-box">
            <label for="nCedula">No. Cedula</label>
            <input type="nCedula" name="nCedula" id="nCedula" placeholder="Digite el número de cédula" >
            <span></span>
          </div>


          <div class="form-box">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" placeholder="Digite el correo electrónico" >
            <span></span>
          </div>

          <div class="form-box">
          <label for="rol">Rol</label>
          <select name="rol" id="rol" >

          <option value="0">Elige una opción</option>
            <?php foreach ($SelectRol as $ro) {
             ?>
            <option value="<?php echo $ro->rol; ?>"><?php echo $ro->rol_nombre;?></option>
            <?php }?>  
          </select>
          <span></span>
        </div>
       

        <div class="form-box">
          <label for="password">Contraseña</label>
          <input type="pass" name="password" id="password" placeholder="Digite la contraseña">
          <span></span>
          <button type="button" class="btn btn-outline-danger fw-bold" onclick="generatePassword()">Generar Contraseña</button>
        </div>

        <div>
      </div>
  </div>
  <div class="formItemBoton" style="text-align: center;">
        <input class="bn3637 bn43" type="submit" value="Guardar datos" id="GuardarForm">
      </div>
</form>



</div>
</div>


</div></div>
</section>
</main>
                    
<script type="text/javascript" src="assets/js/form_asesor.js"></script> -   
<!-- <script type="text/javascript" src="assets/js/pruebaVadilar.js"></script> -->
                   
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>