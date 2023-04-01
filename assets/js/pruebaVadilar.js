function validar_usuario() {
   var r = true;
   var name = document.getElementById('nombresAp')
   var prov = document.getElementById('provincia')
   var ced = document.getElementById('cedula')
   var ciud = document.getElementById('ciudad')
   var fNa = document.getElementById('fechaNa')
   
  /*  var ed = document.getElementById('Edad') */
   var tel = document.getElementById('telefono')
   var cor = document.getElementById('correoElec')
   var naci = document.getElementById('nacionalidad')
   var etn = document.getElementById('etnia')
   var dom = document.getElementById('domicilio')

   var gen = document.getElementById('genero')
   var inst = document.getElementById('instruccion')
   var esta = document.getElementById('estadoCivil')
   var nivel = document.getElementById('nivelIngresos')
   var ocu = document.getElementById('ocupacion')


   var iess = document.getElementById('iess')
   var bono = document.getElementById('Rbono')
   var dis = document.getElementById('Cdisca')
   var zona = document.getElementById('zonaV')

 
       //validando campo usuario
       if(name.value == ''){
           r = false;
           validaFalla(name, 'Campo vacío')
       }else if(!validaLetra(name.value)) {
           r = false;
           validaFalla(name, 'Ingrese solo letras')
       }else{
           validaOk(name, 'Correcto ✔')
       }

       //validando campo provincia
       if(prov.value==''){
           r = false;
           validaFalla(prov, 'Campo vacío')            
       }else if(!validaLetra(prov.value)) {
           r = false;
           validaFalla(prov, 'Ingrese solo letras')
       }else {
           validaOk(prov, 'Correcto ✔')
       }

       //validando campo cedu
         if(ced.value== ''){
           r = false;
           validaFalla(ced, 'Campo vacío')            
       }else if(!validaMaxNum(ced.value)) {
           r = false;
           validaFalla(ced, 'Máximo 10 digitos')
       }else {
           validaOk(ced, 'Correcto ✔')
       }

         //validando campo ciudad
         if(ciud.value==''){
           r = false;
           validaFalla(ciud, 'Campo vacío')            
       }else if(!validaLetra(ciud.value)) {
           r = false;
           validaFalla(ciud, 'Ingrese solo letras')
       }else {
           validaOk(ciud, 'Correcto ✔')
       }

        //Validando campo de la fecha de nacimiento
        if(fNa.value==''){
           r = false;
           validaFalla(fNa, 'Campo vacío')
       }else{
           validaOk(fNa, 'Correcto ✔')
       }

     //validando campo edad
      /*   if(ed.value==''){
            r = false; 
            validaFalla(ed, 'Campo vacío')            
        }else if(!validaEdad(ed.value)) {
       
            validaFalla(ed, 'La edad no es válida')
        }else {
            validaOk(ed, 'Correcto ✔')
        } */

         //validando campo telefono
         if(tel.value==''){
            r = false;
            validaFalla(tel, 'Campo vacío')            
        }else if(!validaMaxNum(tel.value)) {
            r = false;
            validaFalla(tel, 'Debe contener 10 digitos')
        }else {
            validaOk(tel, 'Correcto ✔')
        }

        //validando campo correo
        if(cor.value==''){
            r = false;
            validaFalla(cor, 'Campo vacío')            
        }else if(!validaEmail(cor.value)) {
            r = false;
            validaFalla(cor, 'El e-mail no es válido')
        }else {
            validaOk(cor, 'Correcto ✔')
        }

             //validando campo de nacionalidad
             if(naci.value==''){
                r = false;
                validaFalla(naci, 'Campo vacío')            
            }else if(!validaLetra(naci.value)) {
                r = false;
                validaFalla(naci, 'Ingrese solo letras')
            }else {
                validaOk(naci, 'Correcto ✔')
            }
    
            //Validando campo de etnia
            if(!etn.value || etn.value==0){
                r = false;
                validaFalla(etn, 'Seleccione una opcion ⛔ ')
                document.getElementById("etnia").style.border =" 2px solid red";
            }else{
                validaOk(etn, 'Correcto ✔')
          document.getElementById("etnia").style.border =" 2px solid #0dbf97";
            }


    
              //validando campo domicilio
              if(dom.value==''){
                r = false;
                validaFalla(dom, 'Campo vacío')            
            }
            else {
                validaOk(dom, 'Correcto ✔')
            }

           //Validando campo genero
            if(!gen.value || gen.value==0){
                r = false;
                validaFalla(gen, 'Seleccione una opcion ⛔ ')
                document.getElementById("genero").style.border =" 2px solid red";
            }else{
                validaOk(gen, 'Correcto ✔')
          document.getElementById("genero").style.border =" 2px solid #0dbf97";
            }

                //Validando campo de instruccion
         if(!inst.value || inst.value==0){
            r = false;
            validaFalla(inst, 'Seleccione una opcion ⛔ ')
            document.getElementById("instruccion").style.border =" 2px solid red";
        }else{
            validaOk(inst, 'Correcto ✔')
            document.getElementById("instruccion").style.border =" 2px solid #0dbf97";
        }

           //Validando campo de estado
           if(!esta.value || esta.value==0){
            r = false;
            validaFalla(esta, 'Seleccione una opcion ⛔ ')
            document.getElementById("estadoCivil").style.border =" 2px solid red";
        }else{
            validaOk(esta, 'Correcto ✔')
      document.getElementById("estadoCivil").style.border =" 2px solid #0dbf97";
        }

        // Validando campo de nivel de ingreso
        if(!nivel.value){
            r = false;
            validaFalla(nivel, 'Campo vacío')
        }else{
            validaOk(nivel, 'Correcto ✔')
        }

        //Validando campo de ocupacion
        if(!ocu.value || ocu.value==0){
            r = false;
            validaFalla(ocu, 'Seleccione una opcion ⛔ ')
            document.getElementById("ocupacion").style.border =" 2px solid red";
        }else{
            validaOk(ocu, 'Correcto ✔')
            document.getElementById("ocupacion").style.border =" 2px solid #0dbf97";
        }

      


        //Validando campo de iesss
if(!iess.value || iess.value==0){
    r = false;
    validaFalla(iess, 'Seleccione una opcion ⛔ ')
    document.getElementById("iess").style.border =" 2px solid red";
}else{
    validaOk(iess, 'Correcto ✔')
    document.getElementById("iess").style.border =" 2px solid #0dbf97";
}

//Validando campo de bono
if(!bono.value || bono.value==0){
    r = false;
    validaFalla(bono, 'Seleccione una opcion ⛔ ')
    document.getElementById("Rbono").style.border =" 2px solid red";
}else{
    validaOk(bono, 'Correcto ✔')
    document.getElementById("Rbono").style.border =" 2px solid #0dbf97";
}

//Validando campo de discapacidad
if(!dis.value || dis.value==0){
    r = false;
    validaFalla(dis, 'Seleccione una opcion ⛔ ')
    document.getElementById("Cdisca").style.border =" 2px solid red";
}else{
    validaOk(dis, 'Correcto ✔')
    document.getElementById("Cdisca").style.border =" 2px solid #0dbf97";
}

//Validando campo de zona 
if(!zona.value || zona.value==0){
    r = false;
    validaFalla(zona, 'Seleccione una opcion ⛔ ')
    document.getElementById("zonaV").style.border =" 2px solid red";
}else{
    validaOk(zona, 'Correcto ✔')
    document.getElementById("zonaV").style.border =" 2px solid #0dbf97";
}


         /* if(fR.value && ){
            r=true;
             validaOk(r, '¡SE HA REGISTRADI COMPLETAMENTE AL USUARIO!')
         } else{
            r=false;
         } */



      
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

   const validaMaxNum = (ced) => {
      
 return /^[0-9]{10}$/g.test(ced);
    }

    const validaEdad = (ed) => {
 return /^[0-9]+$/.test(ed);

    }

    const validaEmail = (email) => {
       return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);        
   }