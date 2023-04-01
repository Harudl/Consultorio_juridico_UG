<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilosLogin.css">
    <link rel="icon" href="assets/img/logo-ConUg.png" type="image/x-icon">
    <title>Inicio de sesión</title>

    <link rel="stylesheet" href="assets/sweetAlert/bootstrap.min.css">
    <script type="text/javascript" src="assets/sweetAlert/sweetalert.min.js"></script>
<!-- 
    <link href="assets/panel/css/bootstrap.min.css" rel="stylesheet"> -->
</head> 

<body>

<section class="ContenidoLogin">
    <div class="BoxP">
    <div class="ImgBox">
        <img src="assets/img/login-G.jpg" alt="">
    </div>
            
    <div class="contentF">
        <div class="formBox">
            <div class="volver">
                <p><a class="link-a" href="index.php"><img src="assets/img/volver.svg" style="width:38px; height:38px;"></img>Volver</a></p>
            </div>

        <div class="logo-img">
            <img src="assets/img/usuario-i.png" alt="">
        </div>
            <h2 style="text-align:center;font-weight:600;font-size: revert;">Iniciar Sesión <Br>Personal Jurídico </h2>
                        
    <form action="index.php?c=Login&a=Usuario"   onsubmit="return enviarForm()" method="post" id="form1" >
        <div class="inputBox">
            <span><img src="assets/img/mail-fill.svg" style="width:25px; height:17px;"></img>Correo</span>
            <input class="inp" id="correo" type="email" name="correo" placeholder="Ingrese su correo electronico" >        
        </div>

        <div class="inputBox">
                <span><img src="assets/img/lock-2-fill.svg" style="width:25px; height:17px;"></img>Contraseña</span>
                <input  class="inp" id="pass" type="password" name="pass" placeholder="Ingrese su contraseña" >

                            <?php if (!empty($errores) )  {?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><?php echo $errores; ?></strong> 
                                        <button type="button" class="close" data-dismiss="alert" style="font-size: 25px;font-weight:600;" aria-label="Close">
                                            <span aria-hidden="true" style="font-weight:600;font-size:28px;">&times;</span>
                                        </button>
                                </div>
                            <?php }?>

        </div>

        <div class="inputBox">
            <input  type="submit" value="Iniciar sesión" name="ingresar" >             
        </div>

        </form>
    </div>
    </div>
    </div>
</section>
    <!--  <script src="assets/js/formulario_login_validar.js"></script>  -->
<!--    <script src="assets/js/bootstrap.min.js"></script>  -->
<!--    <script src="assets/panel/js/bootstrap.bundle.min.js"></script> -->
    <script src="assets/jquery/jquery-3.5.1.slim.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
</body>




  <script>
  
        function enviarForm(){
        const cor = document.getElementById('user').value;
        const pas = document.getElementById('pass').value;
    if(cor === "" && pas === ""){

    /*     alert("Ingrese su Correo Electrónico y Contraseña"); */
    swal ( "Oops" ,  "Something went wrong!" ,  "error" )


    }     else if(cor === null ||  cor === ''){
            alert("Ingrese su correo electrónico");
            }else
            if(pas === null ||  pas === ''){
                alert("Ingrese su contraseña");
                  }
        } 
    </script> 

<!--   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  -->
 

    
</html>