
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>


<!-- CONTENIDO -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Registro del Patrocinio</h1>
    </div>


<section class="section">
  <div class="containerM">
      <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">
        <div class="contenidoDescripcion"><h3>CREACIÓN DEL NUEVO PATROCINIO</h3></div>

<form action="index.php?c=Patrocinio&a=nuevo_patrocinio" onsubmit="return validar_p()" method="post"  class="formulario" id="formulario" enctype="multipart/form-data">

    <input type="hidden" name="id" id="id" value="<?php echo $this->patro; ?>" />
    <input type="hidden" name="id_p" id="id_p" value="1" />

  <div class="formularios">
    <div class="containerForm">
      <p>Datos de la asesoría <br> </p> 

      <div class="formItem"> 
        <div class="form-box">
            <label for="tipoPatrocinio">Usuario interesado</label>
            <input type="text" style="background:#dadada;" value="<?php echo $res->nombresA; ?>" disabled>
        </div>
        <div class="form-box">
            <label for="tipoPatrocinio">Tipo de Usuario</label>
            <input type="text" style="background:#dadada;" value="<?php echo $res->tipo_usuario_nom; ?>" disabled>
        </div>
      </div>

      <div class="formItem"> 
        <div class="form-box">
          <label for="tipoPatrocinio">Tema</label>
          <input type="text" style="background:#dadada;" value="<?php echo $res->tema; ?>" disabled>
        </div>

        <div class="form-box">
          <label for="tipoPatrocinio">Materia</label>
          <input type="text" style="background:#dadada;" value="<?php echo $res->materia_nombre; ?>" disabled>
        </div>
      </div> 

    </div>
<!-- DOCUMENTACION °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° -->
    <div class="containerForm">
        <p>Información requerida <br> </p> 

    <div class="formItem">
        <div class="form-box">
            <label for="estadoP">Estado del patrocinio</label>
            <select name="estadoP" id="estadoP">
            <option value="0">Elige una opción</option> 
            <?php foreach ($estaP as $est) { ?>
            <option value="<?php echo $est->id_estado_p; ?>"><?php echo $est->estado_nombre;?></option>
            <?php }?>   
            </select>
            <span></span>
        </div>

        <div class="form-box">
            <label for="formFile" class="form-label">Expediente digital</label>
              <div class="drag-drop-container" style=" background: white;">
                <div class="drag-drop-message"><em class="fw-bold">Arrastra y suelta un archivo aquí </em></div>
                    <i class="mt-2 ri-upload-2-fill ri-3x"></i>
                    <!-- <em class="fw-bold">Haz clic para seleccionarlo</em> -->
                    <em class="btn btn-danger fw-bold">Seleccionar un archivo</em>
                    <input type="file" id="file-input" class="file-input" name="file-input" accept="application/pdf">
                    <span></span>
              </div>
        </div> 
    </div>

  </div> 


<!-- ACORDIONES ADICIONALES  -->

    <p>Información adicional <br> </p> 
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo"> 
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
          style="background:#6c757d;color:white;" data-bs-target="#collapseTwo" aria-expanded="false" 
          aria-controls="collapseTwo"><i class="ri-add-fill ri-xl"></i>&nbsp;Judicialización </button></h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body"> 
         <!--    <div class="containerForm"> -->

          <div class="formItem">
            <div class="form-box">
              <label for="tipoJudicatura">Tipo de Institución</label>
              <input class="form-c" type="text" name="tipoJudicatura" id="tipoJudicatura" placeholder="Ingrese el tipo de judicatura">           
            </div>

            <div class="form-box">
              <label for="unidadJ">Unidad Judicial</label>
              <input type="text" name="unidadJ" id="unidadJ" placeholder="Ingrese la unidad judicial">
            </div>

            <div class="form-box">
              <label for="nomJuez">Nombre del Autoridad</label>
              <input type="text" name="nomJuez" id="nomJuez" placeholder="Ingrese el nombre del juez">
            </div>

            <div class="form-box">
              <label for="noCausa">No. Causa</label>
              <input type="tel" name="noCausa" id="noCausa" placeholder="Ingrese el N° causa">
            </div>
          </div>

       <!--  </div> -->
        </div>
      </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree"> 
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
            style="background:#6c757d;color:white;" data-bs-target="#collapseThree" aria-expanded="false" 
            aria-controls="collapseThree"><i class="ri-add-fill ri-xl"></i>&nbsp;Cierre del Caso </button></h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body"> 
                <div class="containerForm">
                  <div class="formItem">
                      <div class="form-box">
                          <label for="sentencia">Sentencia</label>
                          <textarea id="sentencia"  name="sentencia" rows="3" cols="60" placeholder="Ingrese la sentencia"> </textarea>
                      </div>

                      <div class="form-box">
                          <label for="fechaS">Fecha de la Sentencia</label>
                          <input type="date" name="fechaS" id="fechaS">
                      </div>
                  </div>
                </div>   
            </div>
            </div>
    </div>


    <div class="accordion-item">
        <h2 class="accordion-header" id="headingF"> 
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            style="background:#6c757d;color:white;" data-bs-target="#collapseF" aria-expanded="false" 
            aria-controls="collapseF"><i class="ri-add-fill ri-xl"></i>&nbsp; Conclusiones </button></h2>
            <div id="collapseF" class="accordion-collapse collapse" aria-labelledby="headingF" data-bs-parent="#accordionExample">
            <div class="accordion-body"> 
                <div class="containerForm">
                    <div class="formItem">
                        <div class="form-box">
                            <label for="resumen">Tema resumen</label>
                            <textarea id="resumen"  name="resumen" rows="3" cols="60" placeholder="Ingrese un breve resumen"> </textarea>
                        </div>     
                    </div>
                </div>
            </div>
            </div>
     </div>



<!-- boton del form -->
<div class="formItemBoton mt-3" style="text-align: center;">
  <button  class="bn3637 bn43" id="GuardarForm">
    <i class="ri-save-3-fill ri-xl"></i>&nbsp;Guardar
  </button>
</div>

<!-- inicio del contenedor formulario -->
</div>
<!-- Fin del contenedor -->
</form>
</div>



<!-- </div> -->
</div>




</section>
</main>

<script>
      const formFile = document.getElementById("file-input");

formFile.addEventListener("change", function() {
  const file = this.files[0];
  const fileType = file.type;
  if (fileType !== "application/pdf") {
   swal("Solo se permiten archivo PDF", "Presione en ok!", "warning");
    this.value = ""; // borrar el valor del input para evitar subir archivos no deseados
  }
});
</script>

<script>
    const dragDropContainer = document.querySelector('.drag-drop-container');
const dragDropMessage = document.querySelector('.drag-drop-message');
const fileInput = document.querySelector('#file-input');

// Prevenir el comportamiento predeterminado de arrastrar y soltar archivos en el navegador
dragDropContainer.addEventListener('dragover', (e) => {
  e.preventDefault();
  e.stopPropagation();
  dragDropContainer.classList.add('dragging');
  dragDropMessage.classList.add('dragging');
});

dragDropContainer.addEventListener('dragleave', (e) => {
  e.preventDefault();
  e.stopPropagation();
  dragDropContainer.classList.remove('dragging');
  dragDropMessage.classList.remove('dragging');
});

dragDropContainer.addEventListener('drop', (e) => {
  e.preventDefault();
  e.stopPropagation();
  dragDropContainer.classList.remove('dragging');
  dragDropMessage.classList.remove('dragging');
  dragDropContainer.classList.add('dropped');
  dragDropMessage.classList.add('dropped');
  const files = e.dataTransfer.files;
  fileInput.files = files;
  // Aquí puedes realizar cualquier acción con los archivos seleccionados
});

// Abrir el cuadro de diálogo de selección de archivos al hacer clic en el contenedor
dragDropContainer.addEventListener('click', () => {
  fileInput.click();
});

// Actualizar el mensaje del contenedor cuando se selecciona un archivo
fileInput.addEventListener('change', () => {
  if (fileInput.files.length > 0) {
    dragDropMessage.innerHTML = `<i class="fas fa-check"></i> Archivo seleccionado: ${fileInput.files[0].name}`;
  } else {
    dragDropMessage.innerHTML = '<p>Arrastra y suelta un archivo aquí o haz clic para seleccionarlo</p>';
  }
});

</script>


 <script type="text/javascript" src="assets/js/form_patrocinio.js"></script> 

<!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>