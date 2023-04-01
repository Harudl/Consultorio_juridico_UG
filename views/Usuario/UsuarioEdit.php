
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>



<!-- CONTENIDO -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Usuarios</h1>
  </div>



<!-- <div class="mb-2">
  <a class="bn3637 bn40" href="javascript: history.go(-1)">Volver</a>
</div>
 -->
  <section class="section">
		<div class="containerM">
      <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">   
        <div class="contenidoDescripcion">
          <h3>Actualizar DATOS DEL USUARIO</h3>
        </div>

<!-- Formulario de nuevo usuario -->
<form id="formulario" action="index.php?c=Usuario&a=EditarUsuario"  onsubmit="return v_asesor()" method="post" enctype="multipart/form-data">
  <div class="formularios">
    <p>Información del Usuario<br> </p>

    <!-- BOTON DE INVISIBLE -->
    <input type="hidden" name="id" id="id" value="<?php echo $asesor_edit->id_usuario; ?>"> </input> 
<!-- -FIN DEL BOTON HIDDEN -->

      <div class="containerForm">
        <div class="formItem" style="grid-template-columns: repeat(auto-fit, minmax(400px,1fr ));">
          <div class="form-box">
            <label for="nomnbre_personal">Nombres Completos</label>
            <input type="text" name="nomnbre_personal" id="nomnbre_personal" placeholder="Digite apellidos y nombres" value="<?php echo $asesor_edit->nombre; ?>"> </input>
            <span></span>
          </div>

     <div class="form-box">
 <label for="nCedula">No. Cedula</label>
            <input type="nCedula" name="nCedula" id="nCedula" placeholder="Digite el número de cédula" value="<?php echo $asesor_edit->usuario_cedula; ?>">
            <span></span>
          </div>

          <div class="form-box">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" placeholder="Digite el correo electrónico" value="<?php echo $asesor_edit->correo; ?>"> </input>
            <span></span>
          </div>

           
        <div class="form-box">
          <label for="rol">Rol</label>
          <select name="rol" id="rol" >
          <option value="0">Elige una opción</option>
            <?php foreach ($SelectRol as $r) {
                $selected='';
                if($r->rol == $asesor_edit->fk_rol){
                      $selected='selected="selected"';
                }
             ?>
            <option value="<?php echo $r->rol; ?>" <?php echo $selected; ?>>
            <?php echo $r->rol_nombre;?></option>
            <?php }?>  
          </select>
          <span></span>
        </div>
       

        <div class="form-box">
          <label for="clave">Contraseña</label>
          <input type="password" name="password" id="password" placeholder="Digite la contraseña" value="<?php echo $asesor_edit->usuario_password; ?>"> </input>
          <span></span>
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



</section>
</main>
<script type="text/javascript" src="assets/js/form_asesor.js"></script> -         

                   
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>