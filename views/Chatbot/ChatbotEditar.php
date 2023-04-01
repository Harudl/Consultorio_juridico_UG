
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>



<!-- CONTENIDO -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>ChatBot</h1>
  </div>

  <section class="section">
    <div class="row">
     <div class="col-lg-6">
		<div class="containerM">
      <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">   
      <div class="contenidoDescripcion">
          <h3>AÑADIR NUEVO</h3>
        </div>

<form id="formulario" action="index.php?c=Chatbot&a=Editar_preguntas"  onsubmit="return chatbot_p()" method="post" enctype="multipart/form-data">
  <div class="formularios">
      <div class="containerForm">

 <!-- BOTON DE INVISIBLE -->
 <input type="hidden" name="id" id="id" value="<?php echo $editar->id_chatbot; ?>"> </input> 
<!-- -FIN DEL BOTON HIDDEN -->

        <div class="formItem" style="grid-template-columns: repeat(auto-fit, minmax(400px,1fr ));">
          <div class="form-box">
            <label for="Pregunta">Pregunta</label>
            <textarea name="Pregunta" id="Pregunta" cols="10" rows="5"><?php echo $editar->preguntas; ?></textarea>
           <span></span>
          </div>

      <div class="form-box">
            <label for="Respuesta">Respuesta</label>
           <!--  <input type="nCedula" name="nCedula" id="nCedula" placeholder="Digite el número de cédula" > -->
           <textarea name="Respuesta" id="Respuesta" cols="10" rows="5"><?php echo $editar->respuestas; ?></textarea>
           <span></span>
          </div>


        <div>
      </div>
  </div>
  <div class="formItemBoton" style="text-align: center;">
        <input class="bn3637 bn43" type="submit" value="Guardar" id="GuardarForm">
      </div>
</form>



</div>
</div>


</div></div>
</section>
</main>
                    
<script type="text/javascript" src="assets/js/form_chatbot.js"></script> -   

                   
<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>