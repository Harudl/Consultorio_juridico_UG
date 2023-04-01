<style>
.pregunta {
  display: block;
  width: 100%;
  padding: 10px;
 /*  background-color: #FFA500; */
 background-color:#FFA726;
  border: none;
  border-radius: 20px;
/*   margin-bottom: 10px; */
  text-align: left;
  cursor: pointer;
  transition: background-color 0.3s ease;
  font-size: 15px;
}

.consultasB {
    display: block;
    width: 40%;
    padding: 10px;
    /* background-color: #FFA500; */
    background-color: #FFA726;
    border: none;
    border-radius: 20px;
   margin-bottom: 10px; 
    text-align: left;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 15px;
}
.consultasB:hover {
  box-shadow: 7px 7px 7px #ccc;
  background-color: #FB8C00;
}
.pregunta:hover {
  box-shadow: 7px 7px 7px #ccc;
  background-color: #FB8C00;
}

#preguntas-container em {
  line-height: 3;
  padding: 3px;
  font-size: 17px
}
#preguntas-container em i {
  vertical-align: -6px;
}

 #subirBTN-LOGO {
 /*  color: cadetblue; */
    background: cadetblue;
    color: white;
    border: none;
    font-size: 22px;
    cursor: pointer;
    position: fixed;
    z-index: 1000;
    bottom: 60px;
    margin-bottom: 7px;
    margin-left: 88%;
 } 
 
 #subirBTN-LOGO:hover {
 /*  color: cadetblue; */
    background: #477b7d;
    font-size:23px;
 }

.text_p {
  display: inline-block;
  vertical-align: middle;
  font-size: 16px;
  font-weight: bold;
 /*  color: #fff; */
 color:white;
  text-transform: uppercase;
}
input:disabled {
  /* Estilos para el input desactivado */
  opacity: 0.5;
  cursor: not-allowed;
}

input:enabled {
  /* Estilos para el input activado */
  opacity: 1;
  cursor: text;
}
#con_asesor:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

#con_asesor:enabled {
  opacity: 1;
  cursor: text;
}

</style>
<!-- ChatBot -->
<div class="chat_icon">
<i><img src="assets/img/chatbot.png" style="height:75px;" alt=""></i> 
<!-- <i class="ri-chat-smile-3-fill" aria-hidden="true"></i> -->
</div>

<div class="chat_box">
	<!-- <div class="my-conv-form-wrapper"> -->

    <div class="wrapper">
        <div class="title"><!--  <button id="limpiar-chat">Limpiar chat</button> -->
      <!--   <div class="limpiar" id="limpiar-chat"><i class="ri-restart-fill"></i></div> -->
        <div class="" style="display: contents;">&nbsp;&nbsp;
           <!--  <i class="ri-close-circle-fill ri-lg"></i> -->
          
           <p style="text-align: right;line-height: 0.5px;
    padding-top: 5px;
    padding-right: 5px;cursor: pointer;">


<?php if(!isset($_SESSION['id'])){ ?>
    <button id="limpiar-chat" style="    background: none;
    border: none;
    color: white;"><i class="ri-restart-fill ri-lg"></i></button>

<?php } if(isset($_SESSION['id'])){ ?>
    <button id="limpiar-chat-A" style="    background: none;
    border: none;
    color: white;"><i class="ri-restart-fill ri-lg"></i></button>
<?php } ?>


    <i class="chat_cerrar ri-close-circle-fill ri-lg"></i> </p>
            </div>
            <div class="title_nom" style="display: contents;">
                <p style="text-align: center;">Chatbot Orientativo </p>  
            </div>         
           
        </div>
        <div class="form" id="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="ri-chat-smile-3-line"></i>
                </div>
                <div class="msg-header">
                    <p>Hola, soy un chatbot del consultorio Jurídico Gratuito UG "Dr. Edmundo Durán Díaz"</p>
                   <!--  <p>Preguntas frecuentes</p>  -->

        <?php if(!isset($_SESSION['id'])){ ?>
                  <div id="preguntas-container">
                  <em class="fw-bold "><i class="ri-list-check ri-lg"></i>&nbsp;Preguntas Frecuentes&nbsp;<i class="ri-question-line ri-lg"></i></em>
  
                  <?php if (!empty($respuestas) && is_array($respuestas)) { ?>
                    <ul>      
  <?php
    foreach ($respuestas as $pregunta) { ?>
            <button class="pregunta" data-id_chatbot="<?php echo $pregunta['id_chatbot']; ?>">
   <?php echo $pregunta['preguntas']; ?></button><br>
  <?php  
} ?>
</ul>
<?php } ?>

              </div>          
                </div>
            
            </div>


            <div id="respuesta-container">
            <!-- <p>respuesta 1 </p> -->
          
            </div>
            
        </div>
        <button id="subirBTN-LOGO" class="subir-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Subir">
          <!-- <i class="ri-arrow-up-circle-fill ri-lg"></i> -->
          <i class="ri-arrow-up-s-line ri-lg"></i>
        </button>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Escriba su duda aquí.." required>
                <button id="send-btn">Enviar</button>
            </div>
        </div>
        <?php } ?>



        <?php if(isset($_SESSION['id'])){ ?>


          <div class="Lista_consulta">
          <em class="fw-bold ">Seleccione el tipo de consulta que desea realizar:<br></em> <br>
          <button class="consultasB" id="consultar-interesados">Interesados</button>
        <button class="consultasB" id="consultar-asesorias">Asesorías</button>
        <button  class="consultasB" id="consultar-patrocinios">Patrocinios</button>
          </div>

         



        </div> 
         
      </div>
      
        </div>
        <button id="subirBTN-LOGO" class="subir-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Subir">
          <!-- <i class="ri-arrow-up-circle-fill ri-lg"></i> -->
          <i class="ri-arrow-up-s-line ri-lg"></i>
        </button>
        <div class="typing-field">
            <div class="input-data">
            <input id="con_asesor" type="text" placeholder="Escriba aquí.." required disabled>
                <button id="consultar"><i class="ri-send-plane-2-fill ri-lx"></i>Ok</button>

                
            </div>
        </div>

       
        <?php } ?>
    </div>

 

	<!-- </div> -->
</div> 
<!-- ChatBot end -->

