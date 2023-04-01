

<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>


<!-- CONTENIDO -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Interesado</h1>
  </div>

 
  <?php
if (isset( $_SESSION['mensaje'])) {
 $respuesta =  $_SESSION['mensaje']; ?>
<script>
/* var a = ?php echo $respuesta; ?>; Guardado exitosamente*/
//alert(a);
swal("<?php echo $respuesta; ?>", "Presione click en ok!", "danger");
  </script>
<?php 
 unset($_SESSION['mensaje']);  
} ?>

 


      <section class="section">
		    <div class="containerM">
          <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">
     
              <div class="contenidoDescripcion">
                  <h3>FORMULARIO PARA REGISTRAR AL USUARIO</h3>
              </div>

<!-- Formulario de nuevo usuario -->
    <form id="formulario" action="index.php?c=Interesado&a=nuevo_usuario" onsubmit="return validar_usuario()" method="post" enctype="multipart/form-data">
        <div class="formularios">
          <p>Información Básica<br> </p>

        <div class="containerForm">
  
        <div class="formItem">

        <div class="form-box">
            <label for="nombresAp">Apellidos y Nombres</label>
            <input type="text" name="nombresAp" id="nombresAp" placeholder="Digite apellidos y nombres">
             <span></span>
        </div>

        <div class="form-box">
          <label for="cedula">N° Cédula</label>
          <input type="tel" name="cedula" id="cedula" placeholder="Digite la cédula" >
          <span></span>
         <em id="cedula-status" style></em> 
        </div>

        <div class="form-box">
          <label for="provincia">Provincia</label>
          <input type="text" name="provincia" id="provincia" placeholder="Digite la provincia" >
          <span></span>
        </div>

        <div class="form-box">
          <label for="ciudad">Ciudad/Cantón</label>
          <input type="text" name="ciudad" id="ciudad" placeholder="Digite la ciudad">
       <span></span>
        </div>

        <div class="form-box">
          <label for="fechaNa">Fecha de nacimiento</label>
          <input type="date" name="fechaNa" id="fechaNa">
          <span></span>
        </div>

        <div class="form-box">
          <label for="Edad">Edad</label>
          <input type="text" name="Edad" id="Edad" placeholder="Ingrese la fecha de nacimiento" style="background:#dadada;" readonly>
          <span></span>
        </div>
        
        <div class="form-box">
          <label for="telefono">N° Telefono</label>
          <input type="tel" name="telefono" id="telefono" placeholder="Digite el celular o telf.">
          <span></span>
        </div>

        <div class="form-box">
          <label for="correoElec">Correo Electrónico</label>
          <input type="email" name="correoElec" id="correoElec" placeholder="Digite el email" >
          <span></span>
        </div>
        <div class="form-box">
          <label for="nacionalidad">Nacionalidad</label>
          <input type="text" name="nacionalidad" id="nacionalidad" placeholder="Digite la nacionalidad">
        
        <span></span>
        </div>
        <div class="form-box">
          <label for="etnia">Etnia</label>
          <select name="etnia" id="etnia" >
         <option value="0">Elige una opción</option>
            <?php foreach ($etnia as $et) {
             ?>
            <option value="<?php echo $et->id_etnia; ?>"><?php echo $et->nombre_etnia;?></option>
            <?php }?>   
          </select>
          <span></span>
      </div>

      <div class="form-box">
          <label for="domicilio">Domicilio</label>
          <input type="text" name="domicilio" id="domicilio" placeholder="Digite la dirección">
    
          <span></span>
      </div>

      <div class="form-box">
          <label for="genero">Género</label>
          <select name="genero" id="genero" >
       
         <option value="0">Elige una opción</option>
            <?php foreach ($gene as $ge) {
             ?>
            <option value="<?php echo $ge->id_genero; ?>"><?php echo $ge->genero_nombre;?></option>
            <?php }?>   
          </select>
          <span></span>

      </div>

      <div class="form-box">
          <label for="instruccion">Instrucción</label>
          <select name="instruccion" id="instruccion">
          <option value="0">Elige una opción</option> 
            <?php foreach ($instru as $ins) {
             ?>
            <option value="<?php echo $ins->id_instruccion; ?>"><?php echo $ins->instrucion_nom;?></option>
            <?php }?>   
          </select>
          <span></span>
      </div>

      <div class="form-box">
          <label for="estadoCivil">Estado Civil</label>
          <select name="estadoCivil" id="estadoCivil"  >
            <option value="0">Elige una opción</option>
            <?php foreach ($estado as $est) {
             ?>
            <option value="<?php echo $est->id_estado_civil; ?>"><?php echo $est->estado_civil_nom;?></option>
            <?php }?>  
          </select>
          <span></span>
      </div>

      
      <div class="form-box">
        <label for="Cdisca">Discapacidad</label>
       <select name="Cdisca" id="Cdisca" >
            <option value="0">Eliga una opción</option>
            <option value="si">si</option>
            <option value="no">no</option>
        </select>
        <span></span>
      </div>



    </div>


    <p><br> Información Laboral e Ingresos<br> </p>
    <br>
    <div class="formItem">

        <div class="form-box">
          <label for="nivelIngresos">Nivel de Ingresos</label>
          <input type="tel" name="nivelIngresos" id="nivelIngresos" placeholder="Digite el ingreso" >
          <span></span>
        </div>

        <div class="form-box">
          <label for="ocupacion">Ocupación</label>
          <select name="ocupacion" id="ocupacion" >
            <option value="0">Elige una opción</option>
            <?php foreach ($ocupacion as $ocu) {
             ?>
            <option value="<?php echo $ocu->id_ocupacion; ?>"><?php echo $ocu->ocupacion_nombre;?></option>
            <?php }?>  
          </select>
          <span></span>
        </div>

      <div class="form-box">
          <label for="iess">Afiliado al IEES</label> 
       <select name="iess" id="iess" >
            <option value="0">Eliga una opción</option>
            <option value="si">si</option>
            <option value="no">no</option>
        </select>
        <span></span>
    </div>  

      <div class="form-box">
          <label for="Rbono">Recibe Bono</label>
         <select name="Rbono" id="Rbono" >
            <option value="0">Eliga una opción</option>
            <option value="si">si</option>
            <option value="no">no</option>
        </select>
        <span></span>
      </div>


      <div class="form-box">
          <label for="zonaV">Zona de vivienda</label>
         <select name="zonaV" id="zonaV" >
            <option value="0">Eliga una opción</option>
            <option value="urbana">urbana</option>
            <option value="runal">runal</option>
        </select>
        <span></span>
      </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#cedula').on('input', function() {
      const cedula = $(this).val();
      if (cedula.length === 10 && /^\d{10}$/.test(cedula)) {
        $.ajax({
          url: 'model/validar.php',
          type: 'POST',
          data: { cedula },
          success: function(response) {
            $('#cedula-status').html(response);
          }
        });
      } else {
        $('#cedula-status').empty();
      }
    });
  });
</script>


<script type="text/javascript" src="assets/js/ConversionEdad.js"></script>
<script type="text/javascript" src="assets/js/pruebaVadilar.js"></script>
                   
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>
