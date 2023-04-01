
<?php require_once("views/templates/header_navbar.php"); ?>

<?php require_once("views/templates/sidebar_lateral.php"); ?>


<!-- CONTENIDO -->
<main id="main" class="main">
         <div class="pagetitle">
            <h1>Patrocinio</h1>
         </div>

<section class="section">
	<div class="containerM">
    <div class="content" style="background: #eee;box-shadow: 0px 0px 0px 0px;">

<div class="contenidoDescripcion">
    <h3>ACTUALIZAR DATOS DEL PATROCINIO</h3>
</div>

<form action="index.php?c=patrocinio&a=modificar" method="post" enctype="multipart/form-data">

 <!-- BOTON DE INVISIBLE -->
 <input type="hidden" name="id" id="id" value="<?php echo $patrocinio_edit->id_patrocinio; ?>"/> 

 <input type="hidden" name="patro" id="patro" value="<?php echo $this->user_a; ?>" />
<!-- -FIN DEL BOTON HIDDEN -->

<div class="formularios">

<div class="containerForm">
<p>Datos de la asesoría<br> </p>
<div class="formItem"> 
     <div class="form-box">
     <label for="tipoPatrocinio">Usuario</label>
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

        <!-- <input type="text" class="formulario_input" name="tipoPatrocinio" id="tipoPatrocinio" placeholder="Ingrese el tipo de patrocinio" > -->
        <input type="text" style="background:#dadada;" value="<?php echo $res->tema; ?>" disabled>
       
        
        <span></span>

    </div>
    <div class="form-box">

<label for="tipoPatrocinio">Materia</label>

<!-- <input type="text" class="formulario_input" name="tipoPatrocinio" id="tipoPatrocinio" placeholder="Ingrese el tipo de patrocinio" > -->
<input type="text" style="background:#dadada;" value="<?php echo $res->materia_nombre; ?>" disabled>


<span></span>
</div>
</div>
</div>

<div class="containerForm">
        <p>Información requerida <br> </p> 
<div class="formItem"> 

  <!-- visualizar expediente -->
  <div class="form-box">
        <label for="formFile" class="form-label">Expediente digital</label>
            <div class="drag-drop-container" style=" background: white;">
                <div class="drag-drop-message"><em class="fw-bold">Arrastra y suelta un archivo aquí </em></div>
              <!--   <br> -->
                    <i class=" mt-2 ri-upload-2-fill ri-3x"><!-- <em class="fw-bold">Seleccionar un archivo</em> --></i>
                    <em class="btn btn-danger fw-bold">Seleccionar un archivo</em>
                    <input type="file" id="file-input" class="file-input" name="file-input" value="<?php echo $patrocinio_edit->expediente;?>">
                   <br>
            </div>
        
    </div>

    <div class="form-box">
        <label for="estadoP">Estado del patrocinio</label>
        <select name="estadoP" id="estadoP" required>
        <option selected>Elige una opción</option> 
        <?php foreach ($estaP as $est) {
            $selected='';
            if($est->id_estado_p == $patrocinio_edit->estado_patrocinio){
                  $selected='selected="selected"';
            }
        ?>
        <option value="<?php echo $est->id_estado_p; ?>" <?php echo $selected; ?>>
        <?php echo $est->estado_nombre;?></option>
        <?php }?>   
        </select>
    </div>   

  

 </div>
 <div class="formItem"> 
    <div class="form-box">
 <?php 

$cod =  $this->patro=$_GET['patro'];
 $path = "assets/Doc_expediente/".$cod;

 if(file_exists($path)){
    $directorio = opendir($path);
  
    while ($archivo = readdir($directorio)){ 

        if(!is_dir($archivo)){
           
            echo "<div class='d-flex align-items-center fw-bold' data='".$path."/".$archivo.
            "'> <i class='ri-folder-user-fill ri-5x'></i>
            <a href='".$path."/".$archivo."'
            title='Ver archivo adjunto'> <span
             class='glyphicon 
             glyphicon-picture'> </span></a>"; 
        echo "$archivo <a href='#' 
            title='Ver archivo adjunto'> <span class='glyphicon glyphicon-trash' aria-hidden='true'> 
            </span></a>"; 
 echo "<a  class='btn btn-outline-info fw-bold ms-2' data-bs-toggle='modal' data-bs-target='#exampleModal' href='assets/Doc_expediente/$cod/$archivo' > 
 Visualizar <a/>";
 echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable' style='max-witdh:90% !important; role='document '>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title fw-bold' id='exampleModalLabel'>Expediente Adjunto</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
      <iframe src='assets/Doc_expediente/$cod/$archivo' width='100%' height='500px' zoom='100'> </iframe>
      </div>
    </div>
  </div>
</div>
 
 
 "; 
    /* modal-fullscreen-xl-down  echo "<iframe src='assets/Doc_expediente/$cod/$archivo' width='350'> </iframe>";  */
        }
    }
  } 

?> 
</div>   
</div>


</div>

<!-- judicatura -->

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
              <input class="form-c" type="text" name="tipoJudicatura" id="tipoJudicatura" placeholder="Ingrese el tipo de judicatura" value="<?php echo $patrocinio_edit->tipo_judicatura; ?>">           
            </div>

            <div class="form-box">
              <label for="unidadJ">Unidad Judicial</label>
              <input type="text" name="unidadJ" id="unidadJ" placeholder="Ingrese la unidad judicial" value="<?php echo $patrocinio_edit->unidad_judicial; ?>">
            </div>

            <div class="form-box">
              <label for="nomJuez">Nombre del Autoridad</label>
              <input type="text" name="nomJuez" id="nomJuez" placeholder="Ingrese el nombre del juez" value="<?php echo $patrocinio_edit->nombre_juez; ?>">
            </div>

            <div class="form-box">
              <label for="noCausa">No. Causa</label>
              <input type="tel" name="noCausa" id="noCausa" placeholder="Ingrese el N° causa" value="<?php echo $patrocinio_edit->num_causa; ?>">
            </div>
          </div>

       <!--  </div> -->
        </div>
      </div>
    </div>

<!-- Cierre del caso -->

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
                          <textarea id="sentencia"  name="sentencia" rows="3" cols="60" placeholder="Ingrese la sentencia" ><?php echo $patrocinio_edit->sentencia; ?> </textarea>
                      </div>

                      <div class="form-box">
                          <label for="fechaS">Fecha de la Sentencia</label>
                          <input type="date" name="fechaS" id="fechaS" value="<?php echo $patrocinio_edit->fecha_sentencia; ?>">
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
                            <textarea id="resumen"  name="resumen" rows="3" cols="60" placeholder="Ingrese un breve resumen"><?php echo $patrocinio_edit->resumen; ?>  </textarea>
                        </div>     
                    </div>
                </div>
            </div>
            </div>
     </div>


<br>


<div class="formItemBoton mt-3" style="text-align: center;">
<!-- <input class="bn3637 bn43" type="submit" value="Actualizar datos" id="GuardarForm"> 
<i class="ri-refresh-line"></i> -->
<button  class="bn3637 bn43" id="GuardarForm">
    <i class="ri-refresh-line ri-xl"></i>&nbsp;Actualizar
  </button>
</div>

</div> 
</div>
</form>


</div>
</div>
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
    dragDropMessage.innerHTML = `<h4><i class="ri-checkbox-circle-fill ri-2x" style="color:#0dbf97;"></i> Archivo seleccionado: ${fileInput.files[0].name}</h4>`;
  } else {
    dragDropMessage.innerHTML = '<h3 class="fw-bold ">Arrastra y suelta un archivo aquí o haz clic para seleccionarlo</h3>';
  }
});

</script>

<script src="assets/js/form_patrocinio.js"></script>
   <!-- Fin del contenido -->
<?php require_once("views/templates/footerDash.php"); ?>