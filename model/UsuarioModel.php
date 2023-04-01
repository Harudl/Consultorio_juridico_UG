<?php

require_once 'config/Conexion.php';

class UsuarioModel
{

    private $con;

    public function __construct()
    { //cosntructor
        $this->con = Conexion::getConexion(); //operador :: llamando a un metodo estatico
    }

    //Muestra los datos en asesorias
    public function UsuarioLista(){

        $sql = "SELECT * FROM usuario
        INNER JOIN rol ON rol.rol = usuario.fk_rol WHERE estado='A'";  
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        //recuperar  resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultado;
    }


    public function Lista_usuarios(){

        $sql = "SELECT * FROM `usuario` INNER JOIN rol ON rol.rol = usuario.fk_rol WHERE estado='A'";  
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        //recuperar  resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultado;
    }

    //Funcion de insertar la tabla usuario 
    public function insertar_usuario($asesor){
 
        try{

            $sql = "INSERT INTO usuario (`nombre`,`usuario_cedula`,`correo`,`fk_rol`,`usuario_password`,`estado`) 
            VALUES (:nom,:nCedula,:correo,:rol,:contra,'A')"; 
    
            $sentencia = $this->con->prepare($sql);
            $data = [   'nom' =>  $asesor->getNombre(),
                        'nCedula' =>  $asesor->getCedula(),
                        'correo' =>  $asesor->getCorreo(),
                        'rol' =>  $asesor->getRol(),
                        'contra' =>  $asesor->getUsuario_password()
                                             
                    ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 

                if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                    //rowCount permite obtner el numero de filas afectadas
                    return false;
                }
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
            return true;                 
    }

    public function search($id) {
  
   $sql ="SELECT * FROM usuario 
   INNER JOIN rol ON rol.rol =usuario.fk_rol where id_usuario=:id"; 
          // preparar la sentencia
          $stmt = $this->con->prepare($sql);
          $data = ['id' => $id,];
          // ejecutar la sentencia
          $stmt->execute($data);
          // recuperar los datos (en caso de select)
          $user = $stmt->fetch(PDO::FETCH_OBJ);
          /* $user = $stmt->fetchAll(PDO::FETCH_ASSOC); */// fetch retorna el primer registro
          // retornar resultados
           return $user;  
          }


             public function verificarPassword($cambio){

                $sql ="SELECT usuario_password FROM usuario
    
                where id_usuario=:id AND usuario_password =:clave_a"; 
       
                     // preparar la sentencia
                     $stmt = $this->con->prepare($sql);
                     $data = ['id' => $cambio->getId_usuario(),
                     'clave_a' => $cambio->getCedula()];
                     // ejecutar la sentencia
                     $stmt->execute($data);
                     //recuperar  resultados
                     $res = $stmt->fetch(PDO::FETCH_OBJ);
                     //retornar resultados
                     return $res;
             
                 }

                 public function cambiarPassword($cambio){
                    try{
                        //prepare
                    $sql ="UPDATE  usuario set usuario_password=:clave_n
        
                    where id_usuario=:id"; 
           
                         // preparar la sentencia
                         $sentencia = $this->con->prepare($sql);
                         $data = ['id' => $cambio->getId_usuario(),
                         'clave_n' => $cambio->getNueva_usuario()];
                                   //execute
            $sentencia->execute($data);
            //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
            return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;        
    }




          public function Update_usuario($asesor){

            try{
            //prepare
            $sql = "UPDATE usuario SET
            nombre =:nom , usuario_cedula =:cedu ,correo=:cor, usuario_password=:pas, fk_rol=:rol
            where id_usuario =:id";
                   //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [                     
                        'id' =>   $asesor->getId_usuario(),                      
                        'nom' =>  $asesor->getNombre(),
                        'cedu' =>  $asesor->getCedula(),
                        'cor' =>  $asesor->getCorreo(),
                        'pas' =>  $asesor->getUsuario_password(),
                        'rol' =>  $asesor->getRol()
                                         
                        ];
                    //execute
            $sentencia->execute($data);
                    //retornar resultados, 
                if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                        //rowCount permite obtner el numero de filas afectadas
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
                return true;        
            }


        public function Eliminar_usuario($id){
            //prepare
        /*     $sql = "DELETE FROM usuario WHERE `id_usuario` = :id"; */
        $sql = "UPDATE usuario SET estado='D' WHERE `id_usuario` = :id";
            //bind parameters
    
            $sentencia = $this->con->prepare($sql);
            $data = ['id' =>  $id];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
            }
            return true;
        
    }

    
}