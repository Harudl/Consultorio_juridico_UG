<?php
session_start();

require_once 'model/LoginModel.php';

class LoginController {
      private $model;
      
  public function __construct(){
    $this->model = new LoginModel();

  }

  public function login(){
    require_once 'views/login/login.php';
  } 

  public function Usuario(){
    $errores = '';

    if(!empty($_POST['correo']) && !empty($_POST['pass'])){

        $correo = htmlentities($_POST['correo']);
        $pass = htmlentities($_POST['pass']);
   
        $usuario = $this->model->UsuarioList($correo, $pass);

/*   var_dump($usuario); */

        if(isset($usuario)){
         
          $_SESSION['user']= $correo;
          $_SESSION['usuario'] = $usuario['nombre'];
          $_SESSION['id'] = $usuario['id_usuario'];
          $_SESSION['rol'] = $usuario['rol_nombre'];
          $_SESSION['login'] = true;
          $_SESSION['rol_id'] = $usuario['rol']; 
        /* var_dump($_SESSION['rol'] = $usuario['rol_nombre']); */

        //require_once 'views/Home/Home.php';

        if($_SESSION['rol_id']==2){
            header("Location:index.php?c=Home&a=mostrarHomeAsesor");

        } else

      if($_SESSION['rol_id']==1){
        header("Location:index.php?c=Home&a=mostrarHomeAdmi");

    }
    
          }   
          
        else {
          /* require_once 'views/login/login.php'; */
          /* header('Location:index.php?c=Login&a=login');  */
            $errores .= 'La contraseña o correo son incorrecto';
            $_SESSION['login'] = false; 
            include 'views/login/login.php';
        }
      }
      else{
          $errores .= 'No puede quedar datos vacios...';
          $_SESSION['login'] = false; 
          include 'views/login/login.php';
        }

      }




      public function salirLogin(){
        
    
        $this->model->LoginCerrar();
        
        header('Location:index.php?c=login&a=login');
        
      }

   

      



}