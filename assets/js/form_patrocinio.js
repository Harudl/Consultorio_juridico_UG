
function validar_p() {
    var r = true;
   var esta = document.getElementById('estadoP');

   
    if(!esta.value || esta.value==0){
        r = false;
        validaFalla(esta, 'Seleccione una opcion ⛔ ')
        document.getElementById("estadoP").style.border =" 2px solid #e74c3c";
       /*  swal("Seleccion una opcion del estado", "Presione en ok!", "error");
         */
       Swal.fire(
        'Seleccion una opcion del estado',
        'Presione en ok!',
        'question'
      )
    }else{
        validaOk(esta, 'Correcto ✔')
        document.getElementById("estadoP").style.border =" 2px solid #0dbf97";
    }

    
     var imgVal = $('#file-input').val();  
      
        if(imgVal=='') 
        { 
          r = false;
            /* swal("Es necesario subir el expediente", "Presione en ok!", "warning"); */
            Swal.fire(
                'Es necesario subir el expediente',
                'Presione en ok!',
                'question'
              )
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