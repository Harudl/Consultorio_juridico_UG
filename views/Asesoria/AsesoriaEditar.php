

<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>

<!-- CONTENIDO -->
<main id="main" class="main">
         <div class="pagetitle">
            <h1>Asesoria</h1>
         </div>
        <!--  <div class="mb-2">
         <a class="bn3637 bn40" href="javascript: history.go(-1)">Volver</a> 
         </div> -->

  <section class="section">
		<div class="containerM">

        <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">
  
    
<div class="contenidoDescripcion ">
   <h3 >ACTUALIZACIÓN DE ASESORÍA DEL USUARIO</h3>
</div>

<form id="formulario" action="index.php?c=Asesoria&a=modificar" onsubmit="return validar_asesoria()"  method="post" enctype="multipart/form-data">
  <div class="formularios">

      
    <!-- BOTON DE INVISIBLE -->
<input type="hidden" name="id" id="id" value="<?php echo $asesoria_edit->id_asesoria; ?>"/> 
<!-- -FIN DEL BOTON HIDDEN -->

    <div class="containerForm"> 

  <!--   <p><br> Información de la Asesoría<br> </p>
 -->

    <p>Datos del usuario <br> </p> 
     <div class="formItem"> 
     <div class="form-box">
     <label for="tipoPatrocinio">Apellidos y Nombres</label>
<input type="text" style="background:#dadada;" value="<?php echo $resultado->nombresA; ?>" disabled>
</div>
<div class="form-box">
     <label for="tipoPatrocinio">N° Cédula del usuario</label>
<input type="text" style="background:#dadada;" value="<?php echo $resultado->cedula; ?>" disabled>
</div>
     </div>

 <p>informacion de la asesoría <br> </p> 
  <div class="formItem">

    <div class="form-box">
            <label for="fecha_asesoria">Fecha de Creación</label>
            <input type="date" id="fecha_asesoria"  name="fecha_asesoria" placeholder="Digite la fecha" value="<?php echo $asesoria_edit->fecha_asesoria; ?>"> </input>
           <span></span>


    </div>
    <div class="form-box">
            <label for="hora">Hora</label>
            <input type="time" id="hora"  name="hora" placeholder="Digite la hora" value="<?php echo $asesoria_edit->hora; ?>" > </input>
           <span></span>
    </div>

       
        
        <div class="form-box">
          <label for="tipoUsuario">Tipo de Usuario</label>
          <select name="tipoUsuario" id="tipoUsuario" >
          <option value="0">Elige una opción</option>
            <?php foreach ($tipoU as $tuser) {
                $selected='';
                if($tuser->id_tipo_usuario == $asesoria_edit->fk_tipo_user){
                      $selected='selected="selected"';
                }
             ?>
            <option value="<?php echo $tuser->id_tipo_usuario; ?>" <?php echo $selected; ?>>
            <?php echo $tuser->tipo_usuario_nom;?></option>
            <?php }?>  
          </select>
          <span></span>
        </div>

        <div class="form-box">
          <label for="materia">Materia</label>

          <select name="materia" id="materia" >
            <option value="0">Eliga una opción</option>

            <?php foreach ($materia as $ma) {
               $selected='';
               if($ma->id_materia == $asesoria_edit->fk_materia){
                $selected='selected="selected"';
                }
             ?>
            <option value="<?php echo $ma->id_materia; ?>" <?php echo $selected; ?>>
            <?php echo $ma->materia_nombre;?></option>
            <?php }?>  
          </select>
          <span></span>
      </div>


      

    </div>
    <div class="formItem">
<div class="form-box">
                <label for="temaA">Tema de la asesoria</label>
                <input type="text" id="temaA"  name="temaA" placeholder="Digite un tema" value="<?php echo $asesoria_edit->tema; ?>"> </input>
               <span></span>
        </div>
</div>

    <p><br> Información de la consulta<br> </p>
    
    <div class="formItem">
    <div class="form-box">
                <label for="resumen_consulta">Tema de la consulta </label>
                <textarea id="resumen_consulta"  name="resumen_consulta" rows="3" value=''><?php echo $asesoria_edit->resumen_consulta; ?>  </textarea>
                <span></span>
        </div>
        <div class="form-box">
                <label for="resolucion_consulta">Resolución de la consulta</label>
                <textarea id="resolucion_consulta"  name="resolucion_consulta" rows="3" value=''><?php echo $asesoria_edit->resolucion_consulta; ?> </textarea>
                <span></span>
        </div>
        
    </div>

    <div class="formItem">
    <div class="form-box">
            <label for="derivado">Derivado por</label>
            <select name="derivado" id="derivado" >
            <?php  $valor1=''; $valor2='';
              if($asesoria_edit->derivado == 'no'){
               $valor2='selected="selected"';
              }
              if($asesoria_edit->derivado =='si'){
                $valor1='selected="selected"';
               }
            ?>
             <option value="2" >Eliga una opción</option>
            <option value="si" <?php echo $valor1; ?> >Si </option> 
            <option value="no" <?php echo $valor2; ?> >No </option>
        </select>
      <span></span>        
    </div>
    <div class="form-box">
                <label for="observaciones">Observaciones</label>
                <textarea id="observaciones"  name="observaciones" rows="3" value=''><?php echo $asesoria_edit->observacion; ?> </textarea>
                <span></span>
        </div>
    </div>

    <p><br> Información adicional<br> </p>
    

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree"> 
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
            style="background:#6c757d;color:white;" data-bs-target="#collapseThree" aria-expanded="false" 
            aria-controls="collapseThree"><i class="ri-add-fill ri-xl"></i>&nbsp;Causa derivada </button></h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body"> 
                <div class="containerForm">
                  <div class="formItem">
                  <div class="form-box">
          <label for="estadoCausa">Estado de la causa derivada</label>
         
          <textarea id="estadoCausa"  name="estadoCausa" rows="3" cols="50" ><?php echo $asesoria_edit->estado_causa; ?></textarea>
        </div>

        <div class="form-box" id="campoDerivado">
          <label for="seguimiento">Seguimiento de la causa derivada</label>
          
          <textarea id="seguimiento"  name="seguimiento" rows="3" cols="50" ><?php echo $asesoria_edit->seguimiento; ?> </textarea>
      </div>
                  </div>
                </div>   
            </div>
            </div>
    </div>
      
    <br>
  </div>
  <div class="formItemBoton" style="text-align: center;">
       <!--  <input  class="bn3637 bn43" type="submit" value="Actualizar datos" id="GuardarForm"> -->
        <button  class="bn3637 bn43" id="GuardarForm"><i class="ri-refresh-line ri-xl"></i>&nbsp;Actualizar</button>
       
      </div>
</form>

</div>
</div>
</section>
</main>


<script type="text/javascript" src="assets/js/form_registro_asesoria.js"></script>
<!-- <script type="text/javascript" src="assets/js/validar_registro_asesoria.js"></script> -->
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>