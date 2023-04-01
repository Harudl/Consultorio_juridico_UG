function v_cambiar() {
    var r = true;

var cla_a = document.getElementById('clave_Actual') 
var cla_n = document.getElementById('clave_nueva') 
 

  

    if(cla_a.value==''){
        r = false;
        validaFalla(cla_a, 'Campo vacío')            
    }
    else
        {
        validaOk(cla_a, 'Correcto ✔')
    } 


    //validando  
    if(cla_n.value==''){
        r = false;
        validaFalla(cla_n, 'Campo vacío')            
    }else if(!validaClave(cla_n.value)) {
        r = false;
        validaFalla(cla_n, 'La contraseña debe tener al entre 8 y 16 caracteres,al menos un dígito, al menos una minúscula y al menos una mayúscula.')
    }else {
        validaOk(cla_n, 'Correcto ✔')
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


 const validaClave = (clave) => {
    return /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(clave);        
}

