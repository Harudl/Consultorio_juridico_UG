
function validar_asesoria() {
    var r = true;

    var fec = document.getElementById('fecha_asesoria')
    var ho = document.getElementById('hora')

   var tipo = document.getElementById('tipoUsuario')
   var mate = document.getElementById('materia')
   
   var tema = document.getElementById('temaA')
   var observacion = document.getElementById('observaciones')



        //Validando campo de la fecha de nacimiento
        if(fec.value==''){
            r = false;
            validaFalla(fec, 'Campo vacío')
        }else{
            validaOk(fec, 'Correcto ✔')
        }

        
        
      //Validando campo de la fecha de nacimiento
        if(ho.value==''){
            r = false;
            validaFalla(ho, 'Campo vacío')
        }else{
            validaOk(ho, 'Correcto ✔')
        }
   






     //Validando campo de tipo de usuario
     if(!tipo.value || tipo.value==0){
        r = false;
        validaFalla(tipo, 'Seleccione una opcion ⛔ ')
        document.getElementById("tipoUsuario").style.border =" 2px solid #e74c3c";
    }else{
        validaOk(tipo, 'Correcto ✔')
        document.getElementById("tipoUsuario").style.border =" 2px solid #0dbf97";
    }

    //Validando campo de materia
    if(!mate.value || mate.value==0){
        r = false;
        validaFalla(mate, 'Seleccione una opcion ⛔ ')
        document.getElementById("materia").style.border =" 2px solid #e74c3c";
    }else{
        validaOk(mate, 'Correcto ✔')
        document.getElementById("materia").style.border =" 2px solid #0dbf97";
    }

    
      // Validando campo de tema de la consulta
      if(tema.value ==''){
        r = false;
        validaFalla(tema, 'Campo vacío')
    }else if(!validaLetra(tema.value)) {
        validaFalla(tema, 'Ingrese solo letras')
    }else{
        validaOk(tema, 'Correcto ✔')
    }

       // Validando campo de observacion
       if(!observacion.value || observacion.value==0 ){
        r = false;
        validaFalla(observacion, 'Campo vacío ⛔ ')
        document.getElementById("observaciones").style.border =" 2px solid #e74c3c";
    }else{
        validaOk(observacion, 'Correcto ✔')
        document.getElementById("observaciones").style.border =" 2px solid #0dbf97";
    }

         var des = document.getElementById('derivado')
         if(!des.value || des.value==0){
            r = false;
            validaFalla(des, 'Seleccione una opcion ⛔ ')
            document.getElementById("derivado").style.border =" 2px solid #e74c3c";
        }else{
            validaOk(des, 'Correcto ✔')
            document.getElementById("derivado").style.border =" 2px solid #0dbf97";
        }

        var resu = document.getElementById('resumen_consulta')
        if(!resu.value || resu.value==0){
           r = false;
           validaFalla(resu, 'Campo vacío ⛔ ')
           document.getElementById("resumen_consulta").style.border =" 2px solid #e74c3c";
       }else{
           validaOk(resu, 'Correcto ✔')
           document.getElementById("resumen_consulta").style.border =" 2px solid #0dbf97";
       }

       var reso = document.getElementById('resolucion_consulta')
       if(!reso.value || reso.value==0){
          r = false;
          validaFalla(reso, 'Campo vacío ⛔ ')
          document.getElementById("resolucion_consulta").style.border =" 2px solid #e74c3c";
      }else{
          validaOk(reso, 'Correcto ✔')
          document.getElementById("resolucion_consulta").style.border =" 2px solid #0dbf97";
      }

        
         return r;

}


   //Funciones de mensajes

   const validaFalla = (input, msje) => {
    const formBox = input.parentElement
    const aviso = formBox.querySelector('span')
    aviso.innerText = msje

    formBox.className = 'form-box falla'
}

const validaOk = (input, msje) => {
    const formBox = input.parentElement
    const aviso = formBox.querySelector('span')
    aviso.innerText = msje

    formBox.className = 'form-box ok'
}

const validaLetra = (prov) => {
return /^[A-ZÑa-zñáéíóúÁÉÍÓÚ'° ]+$/.test(prov);
}

const validaMaxNum = (ced) => {
   
return /^[0-9]{10}$/g.test(ced);
 }

 const validaEdad = (ed) => {
return /^[0-9]+$/.test(ed);

 }

 const validaEmail = (email) => {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);        
}