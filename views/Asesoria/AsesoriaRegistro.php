

<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>

<style>
  #label{
    font-weight: 500;
  }
</style>


<!-- CONTENIDO -->
<main id="main" class="main">
         <div class="pagetitle">
         <!--    <h1>Registro de nueva asesoría</h1> -->
         </div>
        <section class="section">


<!-- <div class="main_container"> -->

		<div class="containerM">

        <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">
  
    
<div class="contenidoDescripcion">
   <h3>FORMULARIO DE ASESORÍA AL USUARIO</h3>
</div>

<form id="formulario" action="index.php?c=Asesoria&a=nuevo" onsubmit="return validar_asesoria()"  method="post" enctype="multipart/form-data">
  <div class="formularios">

    <div class="containerForm"> 
    <input type="hidden" name="id" id="id" value="<?php echo $this->user; ?>"/>  

   
    <p>Datos del usuario <br> </p> 
     <div class="formItem"> 
     <div class="form-box">
     <label for="tipoPatrocinio">Apellidos y Nombres</label>
<input type="text" style="background:#dadada;" value="<?php echo $user_a->nombresA; ?>" disabled>
</div>
<div class="form-box">
     <label for="tipoPatrocinio">N° Cédula</label>
<input type="text" style="background:#dadada;" value="<?php echo $user_a->cedula; ?>" disabled>
</div>

</div>

<p>informacion de la asesoría <br> </p> 
<div class="formItem">
<div class="form-box">
            <label for="fecha_asesoria">Fecha de Creación</label>
            <input type="date" id="fecha_asesoria"  name="fecha_asesoria" placeholder="Digite la fecha" > 
           <span></span>


    </div>
    <div class="form-box">
            <label for="hora">Hora de creación</label>
            <input type="time" id="hora"  name="hora" placeholder="Digite la hora" >
           <span></span>
    </div>
    <div class="form-box">
          <label for="tipoUsuario">Tipo de Usuario</label>
          <select name="tipoUsuario" id="tipoUsuario" >

          <option value="0">Elige una opción</option>
            <?php foreach ($tipoU as $tuser) {
             ?>
            <option value="<?php echo $tuser->id_tipo_usuario; ?>"><?php echo $tuser->tipo_usuario_nom;?></option>
            <?php }?>  
          </select>
          <span></span>
        </div>

        <div class="form-box">
          <label for="materia">Materia</label>
          <select name="materia" id="materia" >
            <option value="0">Eliga una opción</option>
            <?php foreach ($materia as $ma) {
             ?>
            <option value="<?php echo $ma->id_materia; ?>"><?php echo $ma->materia_nombre;?></option>
            <?php }?>  
          </select>
          <span></span>
      </div>

</div>



     <div class="formItem">
     <div class="form-box">
                <label for="temaA">Tema de la asesoria</label>
                <input type="text" id="temaA"  name="temaA" placeholder="Digite un tema" > </input>
               <span></span>
        </div>


    
  </div>
  

   <!--  <div class="formItem">

        <div class="form-box">
                <label for="temaA">Tema de la asesoria</label>
                <input type="text" id="temaA"  name="temaA" placeholder="Digite un tema" > </input>
               <span></span>
        </div>
        

    </div>
    -->

    <p><br> Información de la consulta<br> </p>
    
    <div class="formItem">
    <div class="form-box">
                <label for="resumen_consulta">Tema de la consulta </label>
                <textarea id="resumen_consulta"  name="resumen_consulta" rows="3" placeholder="Ingrese una observación"> </textarea>
                <span></span>
        </div>
        <div class="form-box">
                <label for="resolucion_consulta">Resolución de la consulta</label>
                <textarea id="resolucion_consulta"  name="resolucion_consulta" rows="3" placeholder="Ingrese una observación"> </textarea>
                <span></span>
        </div>
        
    </div>
    <div class="formItem">
    <div class="form-box">
            <label for="derivado">Derivado por</label>
            <select name="derivado" id="derivado">
            
             <option value="0" >Eliga una opción</option>
            <option value="si" >si </option> 
            <option value="no">no </option>
            </select>
            <span></span>        
        </div>
   
    <div class="form-box">
                <label for="observaciones">Observaciones</label>
                <textarea id="observaciones"  name="observaciones" rows="3" placeholder="Ingrese una observación"> </textarea>
                <span></span>
        </div>
    </div>

    <p><br> Información adicional<br> </p>
    
    <!-- <div class="formItem">
    
        <div class="form-box">
            <label for="derivado">Derivado por</label>
            <select name="derivado" id="derivado" onchange="mostrarCamposDerivado()">
            
             <option value="0" >Eliga una opción</option>
            <option value="si" >si </option> 
            <option value="no">no </option>
            </select>
            <span></span>        
        </div>
   



        
    </div>
 -->
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
         
          <textarea id="estadoCausa"  name="estadoCausa" rows="3" cols="50" > </textarea>
        </div>

        <div class="form-box" id="campoDerivado">
          <label for="seguimiento">Seguimiento de la causa derivada</label>
          
          <textarea id="seguimiento"  name="seguimiento" rows="3" cols="50" > </textarea>
      </div>
                  </div>
                </div>   
            </div>
            </div>
    </div>

  </div>
  <br><br>
  <div class="formItemBoton" style="text-align: center;">
       <!--  <input  class="bn3637 bn43" type="submit" value="Guardar datos" id="GuardarForm"> -->

        <button  class="bn3637 bn43" id="GuardarForm"><i class="ri-save-3-fill ri-xl"></i>&nbsp;Guardar</button>
      <!--   <a class="bn3637 bn40" href="index.php?c=Usuario&a=indexLista">Regresar</a> -->
      </div>
</form>

</div>
</div>

</section>
</main>
<!-- <script>
function mostrarCamposDerivado() {
  var seleccion = document.getElementById("derivado").value;
  if (seleccion == "si") {
    document.getElementById("camposDerivado").style.display = "block";
    document.getElementById("campoDerivado").style.display = "block";
  } else {
    document.getElementById("camposDerivado").style.display = "none";
    document.getElementById("campoDerivado").style.display = "none";
  }
}
</script> -->

<script type="text/javascript" src="assets/js/form_registro_asesoria.js"></script>
<!-- <script type="text/javascript" src="assets/js/validar_registro_asesoria.js"></script> -->

<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>