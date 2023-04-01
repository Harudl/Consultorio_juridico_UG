<?php
require_once 'config/Conexion.php';

class LoginModel
{

    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function UsuarioList($correo, $pass)

    {

       $sql = "SELECT id_usuario,nombre, usuario_password, correo,
       rol_nombre, fk_rol AS rol
       FROM usuario, rol where fk_rol =rol AND correo=:correo and usuario_password=:pass";

        $stmt = $this->con->prepare($sql);

        $data = ['correo' => $correo, 'pass' => $pass,];

        $stmt->execute($data); //ejecuto la sentencia

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() <= 0) {   // verificar si se inserto 
        
            return $resultado = null;
        }
        return $resultado;

    }


    public function LoginCerrar (){

      unset($_SESSION['login']);
       
      session_destroy(); 
      
    }


           



}