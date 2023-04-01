
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- CONTENIDO -->
<main id="main" class="main">
         <div class="pagetitle">
            <h1>Interesado</h1>
         </div>
        <section class="section">

<!-- <div class="main_container"> -->
		<div class="containerM">
        <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">
  
    
<div class="contenidoDescripcion">
   <h3>ACTUALIZAR LOS DATOS DEL USUARIO INTERESADO</h3>
</div>
<form id="formulario" action="index.php?c=Interesado&a=modificar" onsubmit="return validar_usuario()" method="post" enctype="multipart/form-data">
  <div class="formularios">
    <p>Información Básica<br> </p>

<!-- BOTON DE INVISIBLE -->
<input type="hidden" name="id" id="id" value="<?php echo $user->id_info_interesado; ?>"/> 
<!-- -FIN DEL BOTON HIDDEN -->

    <div class="containerForm">
  
    <div class="formItem">

        <div class="form-box">
          <label for="nombresAp">Nombres Completos</label>
          <input type="text" name="nombresAp" id="nombresAp" placeholder="Apellidos y nombres" value="<?php echo $user->nombresA; ?>">
          <span></span>
        </div>

        <div class="form-box">
          <label for="cedula">N° Cédula</label>
          <input type="tel" name="cedula" id="cedula" placeholder="Digite la cédula" value="<?php echo $user->cedula; ?>">
          <span></span>
        </div>

        <div class="form-box">
          <label for="provincia">Provincia</label>
          <input type="text" name="provincia" id="provincia" placeholder="Digite la provincia" value="<?php echo $user->provincia; ?>" >
          <span></span>
        </div>

        <div class="form-box">
          <label for="ciudad">Ciudad</label>
          <input type="text" name="ciudad" id="ciudad" placeholder="Digite la ciudad" value="<?php echo $user->ciudad; ?>">
       <span></span>
        </div>

        <div class="form-box">
          <label for="fechaNa">Fecha de nacimiento</label>
          <input type="date" name="fechaNa" id="fechaNa" value="<?php echo $user->fechaN; ?>">
          <span></span>
        </div>

        <div class="form-box">
          <label for="Edad">Edad</label>
          <input type="text" name="Edad" id="Edad" placeholder="Digite la edad" value="<?php echo $user->edad; ?>" style="background:#dadada;" readonly >
          <span></span>
        </div>
        
        <div class="form-box">
          <label for="telefono">N° Telefono</label>
          <input type="tel" name="telefono" id="telefono" placeholder="Digite el celular o telf." value="<?php echo $user->telefono; ?>">
          <span></span>
        </div>

        <div class="form-box">
          <label for="correoElec">Correo Electrónico</label>
          <input type="email" name="correoElec" id="correoElec" placeholder="Digite el email" value="<?php echo $user->correo; ?>" >
          <span></span>
        </div>
        <div class="form-box">
          <label for="nacionalidad">Nacionalidad</label>
          <input type="text" name="nacionalidad" id="nacionalidad" placeholder="Digite la nacionalidad" value="<?php echo $user->nacionalidad; ?>">
        
        <span></span>
        </div>
        <div class="form-box">
          <label for="etnia">Etnia</label>
          <select name="etnia" id="etnia">
          <option value="0">Elige una opción</option> 
            <?php foreach ($etnia as $et) {
              $selected='';
              if($et->id_etnia == $user->inf_etnia){
                    $selected='selected="selected"';
              }
             ?>
            <option value="<?php echo $et->id_etnia; ?>" <?php echo $selected; ?>>
            <?php echo $et->nombre_etnia;?></option>
            <?php }?>   
          </select>
          <span></span>
      </div>
      <div class="form-box">
          <label for="domicilio">Domicilio</label>
          <input type="text" name="domicilio" id="domicilio" placeholder="Digite la dirección" value="<?php echo $user->domicilio; ?>">
    
          <span></span>
      </div>

      <div class="form-box">
          <label for="genero">Género</label>
          <select name="genero" id="genero" >
       
        <option value="0">Elige una opción</option> 

            <?php foreach ($gene as $ge) {
               $selected='';
               if($ge->id_genero == $user->info_genero){
                     $selected='selected="selected"';
               }
             ?>
            <option value="<?php echo $ge->id_genero; ?>" <?php echo $selected; ?> >
            <?php echo $ge->genero_nombre;?></option>
            <?php }?>   
          </select>
          <span></span>

      </div>

      <div class="form-box">
          <label for="instruccion">Instrucción</label>
          <select name="instruccion" id="instruccion">
          <option value="0">Elige una opción</option> 
            <?php foreach ($instru as $ins) {
              $selected='';
              if($ins->id_instruccion == $user->info_instruccion){
                    $selected='selected="selected"';
              }
             ?>
            <option value="<?php echo $ins->id_instruccion; ?>" <?php echo $selected; ?>>
            <?php echo $ins->instrucion_nom;?></option>
            <?php }?>   
          </select>
          <span></span>
      </div>

      <div class="form-box">
          <label for="estadoCivil">Estado Civil</label>
          <select name="estadoCivil" id="estadoCivil"  >
            <option value="0">Elige una opción</option>
            <?php foreach ($estado as $est) {
              $selected='';
              if($est->id_estado_civil == $user->info_estado_civil){
                    $selected='selected="selected"';
              }
             ?>
            <option value="<?php echo $est->id_estado_civil; ?>" <?php echo $selected; ?>>
            <?php echo $est->estado_civil_nom;?></option>
            <?php }?>  
          </select>
          <span></span>
      </div>

      
      <div class="form-box">
          <label for="Cdisca">Discapacidad</label>

       <select name="Cdisca" id="Cdisca" >
       
            <?php  $valor1=''; $valor2='';
              if($user->discapacidad == 'no'){
               $valor2='selected="selected"';
              }
              if($user->discapacidad =='si'){
                $valor1='selected="selected"';
               }
            ?>
            <option value="0" >Eliga una opción</option>
            <option value="si" <?php echo $valor1; ?> >si </option> 
            <option value="no" <?php echo $valor2; ?> >no </option>
        </select>
        <span></span>
      </div>



    </div>


    <p><br> Información Laboral e Ingresos<br> </p>
    <br>
    <div class="formItem">

        <div class="form-box">
          <label for="nivelIngresos">Nivel de Ingresos</label>
          <input type="tel" name="nivelIngresos" id="nivelIngresos" placeholder="Digite el ingreso"  value="<?php echo $user->num_ingreso ?>">
          <span></span>
        </div>

        <div class="form-box">
          <label for="ocupacion">Opucación</label>
          <select name="ocupacion" id="ocupacion" >
            <option value="0">Elige una opción</option>
            <?php foreach ($ocupacion as $ocu) {
               $selected='';
               if($ocu->id_ocupacion == $user->inf_ocupacion){
                     $selected='selected="selected"';
               }
             ?>
            <option value="<?php echo $ocu->id_ocupacion; ?>" <?php echo $selected; ?> >
            <?php echo $ocu->ocupacion_nombre;?></option>
            <?php }?>  
          </select>
          <span></span>
        </div>

      <div class="form-box">
          <label for="iess">Afiliado al IEES</label> 
    
       <select name="iess" id="iess" >
       <?php  $valor1=''; $valor2='';
              if($user->iess == 'no'){
               $valor2='selected="selected"';
              }
              if($user->iess == 'si'){
                $valor1='selected="selected"';
               }
            ?>


            <option value="0">Eliga una opción</option>
            <option value="si" <?php echo $valor1; ?>>si</option>
            <option value="no" <?php echo $valor2; ?>>no</option>
        </select>
        <span></span>
    </div>  

      <div class="form-box">
          <label for="Rbono">Recibe Bono</label>
         <select name="Rbono" id="Rbono" >
         <?php  $valor1=''; $valor2='';
              if($user->bono == 'no'){
               $valor2='selected="selected"';
              }
              if($user->bono == 'si'){
                $valor1='selected="selected"';
               }
            ?>
            <option value="0">Eliga una opción</option>
            <option value="si"<?php echo $valor1; ?>>Si</option>
            <option value="no"<?php echo $valor2; ?>>No</option>
        </select>
        <span></span>
      </div>


      <div class="form-box">
          <label for="zonaV">Zona de vivienda</label>       
         <select name="zonaV" id="zonaV" >
         <?php  $valor1=''; $valor2='';
              if($user->zonaV == 'runal'){
               $valor2='selected="selected"';
              }
              if($user->zonaV =='urbana'){
                $valor1='selected="selected"';
               }
            ?>
            <option value="0">Eliga una opción</option>
            <option value="urbana"<?php echo $valor1; ?>>Urbana</option>
            <option value="runal"<?php echo $valor2; ?>>Runal</option>
        </select>
        <span></span>
      </div>

    </div>
   
  </div>

  <div class="formItemBoton" style="text-align: center;">
        <input  class="bn3637 bn43" type="submit" value="Actualizar datos" id="GuardarForm">
     
      </div>         

</form>

</div>
</div>
<!-- </div> -->

</section>
</main>
<script type="text/javascript" src="assets/js/ConversionEdad.js"></script>
<script type="text/javascript" src="assets/js/pruebaVadilar.js"></script>

<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>
