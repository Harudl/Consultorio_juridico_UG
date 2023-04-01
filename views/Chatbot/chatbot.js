 $(document).ready(function() {

	$('.chat_icon').click(function() {
		$('.chat_box').toggleClass('active');
	});

    $('.chat_cerrar').click(function() {
		$('.chat_box').toggleClass('active');
	});

 
});



$(document).ready(function(){

    $('#subirBTN-LOGO').on('click', function() {
     /*  $('#preguntas-container').animate({ scrollTop: 0 }, 'fast'); */
     $('#form').animate({ scrollTop: 0 }, 'fast');
    });

  
  $('#limpiar-chat').click(function() {
    $('#respuesta-container').empty();
   $('#user-i,#bot-i').remove(); 

  });

  $('#limpiar-chat-A').click(function() {
    $('#respuesta-container').empty();
   $('#user-i,#bot-i').remove(); 
   $('#con_asesor').prop('disabled', true); // desactivar input
   /* $('#con_asesor').css({'opacity': '0.5', 'cursor': 'not-allowed'}); // aplicar estilo a input desactivado */

  });


  


// Evento click para los botones de preguntas
$(document).on('click', '.pregunta', function() {
    var idChatbot = $(this).data('id_chatbot');
    obtenerRespuesta(idChatbot);
  });

  function obtenerRespuesta(idChatbot) {
    $.ajax({
      url: 'index.php?c=Chatbot&a=obtenerRespuesta',
      type: 'POST',
      data: { id_chatbot: idChatbot },
      dataType: 'json',
      success: function(data) {

      var mensaje = '<div class="bot-inbox inbox">';
       var mensaje2 = '<div class="user-inbox inbox">';
      mensaje2 += '<div class="msg-header"><p>' + data.pregunta + '</p></div></div>';
      mensaje += '<div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>' + data.respuesta + '</p></div></div>';
      mensaje += '</div>'; 

     
      var preguntas = $('#respuesta-container').find('.bot-inbox .msg-header p');
      var ultimoMensaje = preguntas.last().text().trim();
if (ultimoMensaje !== data.respuesta) {
  $('#respuesta-container').append(mensaje2, mensaje);
}
$('#respuesta-container')[0].scrollIntoView({ behavior: 'smooth', block: 'end', inline:'nearest' });
$('#data').val(''); //limpiar input

      }
    });
  }
  
  // Petición AJAX para obtener las preguntas
  $.ajax({
    url: 'index.php?c=Chatbot&a=obtenerPreguntas',
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      $.each(data, function(index, pregunta) {
        var botonPregunta = $('<button>').addClass('pregunta').attr('data-id_chatbot', pregunta.id_chatbot).text(pregunta.preguntas);
        $('#preguntas-container').append(botonPregunta).append('<br>');
      });
    }
  });
   

    $("#send-btn").on("click", function(){
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox" id="user-i"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');
        
        // Peticion mediante AJAX
        $.ajax({
          //  url: 'views/Chatbot/bdChatbot.php', 
          url: 'index.php?c=Chatbot&a=Interaccion_usuarios',
            type: 'POST',
           /*  data: 'text='+$value, */
           data: { userQuery: $value }, // Pasa los datos del usuario como un objeto
            success: function(result){
                $replay = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                $(".form").append($replay);
             // Cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });

  
    });

    /* PETICIONES DEL CHATBOT PARA ABOGADOS */

var tipoConsulta = ""; // variable para guardar el tipo de consulta

$("#consultar-interesados").on("click", function() {
  tipoConsulta = "interesados"; // se asigna el tipo de consulta
  $("#con_asesor").prop("disabled", false); // habilita el campo de entrada de texto
  $mensaje_abogado = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>Por favor, digite el número de cédula del interesado.</p></div></div>'
  $(".form").append($mensaje_abogado);
  $(".form").scrollTop($(".form")[0].scrollHeight);
});

$("#consultar-asesorias").on("click", function() {
  tipoConsulta = "asesorias"; // se asigna el tipo de consulta
  $("#con_asesor").prop("disabled", false); // habilita el campo de entrada de texto
  $mensaje_abogado = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>Para consultar la asesoría, ingrese el número de cédula del interesado</p></div></div>'
  $(".form").append($mensaje_abogado);
  $(".form").scrollTop($(".form")[0].scrollHeight);
});

$("#consultar-patrocinios").on("click", function() {
  tipoConsulta = "patrocinios"; // se asigna el tipo de consulta
  $("#con_asesor").prop("disabled", false); // habilita el campo de entrada de texto
  $mensaje_abogado = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>Ingrese el número de cédula del patrocinado.</p></div></div>'
  $(".form").append($mensaje_abogado);
  $(".form").scrollTop($(".form")[0].scrollHeight);
});


$("#consultar").on("click", function(){
  // Verifica el tipo de consulta que se va a realizar
  if (tipoConsulta == "interesados") {
// Peticion mediante AJAX
$value = $("#con_asesor").val();
$msg = '<div class="user-inbox inbox" id="user-i"><div class="msg-header"><p>'+ $value +'</p></div></div>';
   $(".form").append($msg);
   $("#con_asesor").val('');
   
   // Peticion mediante AJAX
   $.ajax({
     //  url: 'views/Chatbot/bdChatbot.php', 
     url: 'index.php?c=Chatbot&a=consulta_interesados',
       type: 'POST',
       data: { consulta: $value }, // Pasa los datos del usuario como un objeto
       success: function(response){
         if (response.startsWith("Lo siento")) {
           $texto = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>'+ response +'</p></div></div>';
       } else {
         var data = JSON.parse(response);
         var mensaje = 'Nombres: ' + data.nombresA + '<br> Edad: ' + data.edad + '<br> Telefono: ' 
        + data.telefono  + '<br> Correo: ' + data.correo  + '<br> Estado civil: ' 
        + data.estado_civil_nom  + '<br> Ocupación: ' + data.ocupacion_nombre  + '<br> Instrucción: '
        + data.instrucion_nom + '<br> IESS: ' + data.iess  + '<br> Bono: ' + data.bono  
        + '<br> Discapacidad: ' + data.discapacidad  + '<br> Zona vivienda: ' + data.zonaV
        + '<br> Ciudad: ' + data.ciudad       ;
         
           $texto = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>'+ mensaje +'</p></div></div>';
       }
           $(".form").append($texto);
        // Cuando el chat baja, la barra de desplazamiento llega automáticamente al final
           $(".form").scrollTop($(".form")[0].scrollHeight);
           $('#con_asesor').prop('disabled', true); // desactivar input
       },
       error: function(xhr, status, error) {
         console.log('Error en la petición AJAX:', error);
         // manejar el error aquí (por ejemplo, mostrar un mensaje al usuario)
       }
   });

    // código para consultar interesados
  } else if (tipoConsulta == "asesorias") {
      // Peticion mediante AJAX
      $value = $("#con_asesor").val();
      $msg = '<div class="user-inbox inbox" id="user-i"><div class="msg-header"><p>'+ $value +'</p></div></div>';
         $(".form").append($msg);
         $("#con_asesor").val('');
         
         // Peticion mediante AJAX
         $.ajax({
           //  url: 'views/Chatbot/bdChatbot.php', 
           url: 'index.php?c=Chatbot&a=consulta_asesorias',
             type: 'POST',
             data: { consulta: $value }, // Pasa los datos del usuario como un objeto
             success: function(response){
               if (response.startsWith("Lo siento")) {
                 $texto = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>'+ response +'</p></div></div>';
             } else {
               var data = JSON.parse(response);
               var mensaje = 'Fecha de asesoría: ' + data.fecha_asesoria + '<br> Hora: ' + data.hora + '<br> Nombres: ' + data.nombresA +
                '<br>Tema:' +data.tema + '<br> Materia:' +data.materia_nombre + '<br> Tipo de usuario:' +data.tipo_usuario_nom + '<br> Abogado:' +data.nombre
                + '<br> Observacion:' +data.observacion ;
               
                 $texto = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>'+ mensaje +'</p></div></div>';
             }
                 $(".form").append($texto);
              // Cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                 $(".form").scrollTop($(".form")[0].scrollHeight);
                 $('#con_asesor').prop('disabled', true); // desactivar input
             },
             error: function(xhr, status, error) {
               console.log('Error en la petición AJAX:', error);
               // manejar el error aquí (por ejemplo, mostrar un mensaje al usuario)
             }
         });
    } else if (tipoConsulta == "patrocinios") {

       // Peticion mediante AJAX
       $value = $("#con_asesor").val();
       $msg = '<div class="user-inbox inbox" id="user-i"><div class="msg-header"><p>'+ $value +'</p></div></div>';
          $(".form").append($msg);
          $("#con_asesor").val('');
          
          // Peticion mediante AJAX
          $.ajax({
            //  url: 'views/Chatbot/bdChatbot.php', 
            url: 'index.php?c=Chatbot&a=consulta_patrocinios',
              type: 'POST',
              data: { consulta: $value }, // Pasa los datos del usuario como un objeto
              success: function(response){
                if (response.startsWith("Lo siento")) {
                  $texto = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>'+ response +'</p></div></div>';
              } else {
                var data = JSON.parse(response);
                var mensaje = 'Fecha de patrocinio: ' + data.Fecha_patrocinio + '<br> Estado: ' + data.estado_nombre + 
                '<br> Nombres: ' + data.nombresA + '<br>Tema:' +data.tema + '<br>Tipo de usuario:' +data.tipo_usuario_nom +
                '<br> Tipo de Judicatura: ' + data.tipo_judicatura + '<br>Unidad Judicial:' +data.unidad_judicial + 
                '<br> Nombre del Juez:' +data.nombre_juez + '<br> Nro. Causa:' +data.num_causa +
                '<br> Abogado:' +data.nombre + '<br> Resumen:' +data.resumen;
                
                  $texto = '<div class="bot-inbox inbox"  id="bot-i"><div class="icon"><i class="ri-chat-smile-3-line"></i></div><div class="msg-header"><p>'+ mensaje +'</p></div></div>';
              }
                  $(".form").append($texto);
               // Cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                  $(".form").scrollTop($(".form")[0].scrollHeight);
                  $('#con_asesor').prop('disabled', true); // desactivar input
              },
              error: function(xhr, status, error) {
                console.log('Error en la petición AJAX:', error);
                // manejar el error aquí (por ejemplo, mostrar un mensaje al usuario)
              }
          });

        }
  // limpia la variable de tipo de consulta
  tipoConsulta = "";
});

});  






