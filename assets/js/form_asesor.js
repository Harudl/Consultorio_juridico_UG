function v_asesor() {
    var r = true;
    
  var nom = document.getElementById('nomnbre') 
  var nced = document.getElementById('nCedula') 
    var corr = document.getElementById('correo')
    var rol = document.getElementById('rol')
 var cla = document.getElementById('password') 
 

     //validando campo nombre
     if(nom.value == ''){
        r = false;
        validaFalla(nom, 'Campo vacío')
    }else if(!validaLetra(nom.value)) {
        r = false;
        validaFalla(nom, 'Ingrese solo letras')
    }else{
        validaOk(nom, 'Correcto ✔')
    }


      //validando campo cedu
      if(nced.value== ''){
        r = false;
        validaFalla(nced, 'Campo vacío')            
    }else if(!validaMaxNum(nced.value)) {
        r = false;
        validaFalla(nced, 'Máximo 10 digitos')
    }else {
        validaOk(nced, 'Correcto ✔')
    }
 
    //validando campo correo
    if(corr.value==''){
        r = false;
        validaFalla(corr, 'Campo vacío')            
    }else if(!validaEmail(corr.value)) {
        r = false;
        validaFalla(corr, 'El e-mail no es válido')
    }else {
        validaOk(corr, 'Correcto ✔')
    }


    if(!rol.value || rol.value==0){
        r = false;
        validaFalla(rol, 'Seleccione una opcion ⛔ ')
        document.getElementById("rol").style.border =" 2px solid red";
    }else{
        validaOk(rol, 'Correcto ✔')
        document.getElementById("rol").style.border =" 2px solid #0dbf97";
    }




    if(cla.value==''){
        r = false;
        validaFalla(cla, 'Campo vacío')            
    }
    else {
        validaOk(cla, 'Correcto ✔')
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
return /^[A-ZÑa-zñáéíóúÁÉÍÓÚü'° ]+$/.test(prov);
}


 const validaEmail = (email) => {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);        
}
const validaMaxNum = (ced) => {
      
    return /^[0-9]{10}$/g.test(ced);
       }
   


 function generatePassword() {
    const chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    let password = '';
    for (let i = 0; i < 8; i++) {
      const index = Math.floor(Math.random() * chars.length);
      password += chars[index];
    }
    document.getElementById('password').value = password;
  } 