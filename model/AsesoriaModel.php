<?php

require_once 'config/Conexion.php';

class AsesoriaModel
{

    private $con;

    public function __construct()
    { //cosntructor
        $this->con = Conexion::getConexion(); //operador :: llamando a un metodo estatico
    }

    //Muestra los datos en asesorias
    public function get_asesoria(){

if($_SESSION['rol_id']==1){
  $sql = "SELECT * FROM asesoria
  INNER JOIN info_interesado ON info_interesado.id_info_interesado = asesoria.fk_info_interesado
  INNER JOIN interesado ON interesado.id_interesado = info_interesado.fk_interesado
  INNER JOIN materia ON materia.id_materia = asesoria.fk_materia
  INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario = asesoria.fk_tipo_user
  INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario WHERE asesoria.estado='A' ";  

} else {

    $sql = "SELECT * FROM asesoria
   INNER JOIN info_interesado ON info_interesado.id_info_interesado = asesoria.fk_info_interesado
  INNER JOIN interesado ON interesado.id_interesado = info_interesado.fk_interesado
  INNER JOIN materia ON materia.id_materia = asesoria.fk_materia
  INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario = asesoria.fk_tipo_user
  INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario
      where id_usuario=:id_asesor AND asesoria.estado='A'"; 
}
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        if($_SESSION['rol_id']!=1){
        $stmt->bindValue(':id_asesor',$_SESSION['id']);
        }
        // ejecutar la sentencia
        $stmt->execute();
        //recuperar  resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultado;

    } 


  /*   public function get_asesoria(){
        
        $sql="SELECT * FROM asesoria
        INNER JOIN info_interesado ON info_interesado.id_info_interesado = asesoria.fk_info_interesado
        INNER JOIN interesado ON interesado.id_interesado = info_interesado.fk_interesado
        INNER JOIN materia ON materia.id_materia = asesoria.fk_materia
        INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario = asesoria.fk_tipo_user
        INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario";

        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        //recuperar  resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultado;

    }
 */

    //Funcion de insertar la tabla usuario 
    public function insertar($userModel){
 
        try{

            $sql = "INSERT INTO `asesoria` (`fecha_asesoria`,`hora`,`tema`, `fk_id_usuario`, `fk_info_interesado`,
            `fk_tipo_user`, `fk_materia`,`observacion`,`derivado`,`estado_causa`,`seguimiento`,`resumen_consulta`,
            `resolucion_consulta`) 
            VALUES (:fec,:ho,:tem,:fk_id,:fku,:tip_user,:mat,:observa,:deri,:estado,:seguim,:resu,:reso)"; 
    
            $sentencia = $this->con->prepare($sql);

            $data = [   'fec' =>  $userModel->getFecha_A(),
                        'ho' =>  $userModel->getHora(),
                        'tem' =>  $userModel->getTema(),
                        'fk_id' =>  $userModel->getFk_id_usuario(),
                        'fku' =>  $userModel->getFk_interesado(),
                        'tip_user' =>  $userModel->getInfo_tipo_user(),
                        'mat' =>  $userModel->getInfo_materia(),
                        'observa' =>   $userModel->getObservacion(),
                        'deri' =>   $userModel->getDerivado(),
                        'estado' =>   $userModel->getEstado_causa(),
                        'seguim' =>   $userModel->getSeguimiento(),
                        'resu' =>   $userModel->getResumen_consulta(),
                        'reso' =>   $userModel->getResolucion_consulta()
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


    public function user_asesoria($id){
            
        $sql ="SELECT * FROM asesoria 
            INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado
            INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_id_usuario
            INNER JOIN materia ON materia.id_materia= asesoria.fk_materia  
            INNER JOIN interesado ON interesado.id_interesado= info_interesado.fk_interesado 
            INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario= asesoria.fk_tipo_user 
            where id_asesoria=:id"; 
           // preparar la sentencia
             $stmt = $this->con->prepare($sql);
             $data = ['id' => $id];
             // ejecutar la sentencia
             $stmt->execute($data);
            //recuperar  resultados
             $res = $stmt->fetch(PDO::FETCH_OBJ);
             //retornar resultados
             return $res;
                
    }

           
    public function selectOne($id) {
     
         $sql ="SELECT * FROM asesoria 
                  INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado 
                  INNER JOIN materia ON materia.id_materia= asesoria.fk_materia  
                  INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario= asesoria.fk_tipo_user 
                  where id_asesoria=:id"; 
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        /* $user = $stmt->fetchAll(PDO::FETCH_ASSOC); */// fetch retorna el primer registro
        // retornar resultados
         return $user;  
    }


    public function user_name_A($id){

        $sql ="SELECT * FROM info_interesado 
              INNER JOIN interesado ON interesado.id_interesado= info_interesado.fk_interesado 
               where id_interesado=:id"; 
            
                    // preparar la sentencia
         $stmt = $this->con->prepare($sql);
          $data = ['id' => $id];
            // ejecutar la sentencia
          $stmt->execute($data);
              //recuperar  resultados
           $res = $stmt->fetch(PDO::FETCH_OBJ);
             //retornar resultados
            return $res;
            
    }


     public function update($userModel){

        try{
            //prepare
            $sql = "UPDATE asesoria SET
            fecha_asesoria=:fec,  hora=:ho,   tema =:te , fk_tipo_user=:tipo_u, fk_materia=:mat,
            observacion=:obs,derivado=:der,estado_causa=:esta,seguimiento=:seg,
            resumen_consulta=:resu,resolucion_consulta=:reso
            where id_asesoria =:id";
                   //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                      
                        'id' =>   $userModel->getId_asesoria(), 
                        'fec' =>  $userModel->getFecha_A(),
                        'ho' =>  $userModel->getHora(),               
                        'te' =>  $userModel->getTema(),
                        'tipo_u' =>  $userModel->getInfo_tipo_user(),
                        'mat' =>  $userModel->getInfo_materia(),
                        'obs' =>  $userModel->getObservacion(),                    
                        'der' =>   $userModel-> getDerivado(),
                        'esta' =>   $userModel-> getEstado_causa(),
                        'seg' =>  $userModel->getSeguimiento(),
                        'resu' =>   $userModel->getResumen_consulta(),
                        'reso' =>   $userModel->getResolucion_consulta()                   
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


    public function Eliminar_asesoria($id){
                //prepare
        $sql = "UPDATE asesoria SET estado='D'  WHERE `id_asesoria` = :id";

       /*  $sql = "DELETE FROM asesoria WHERE `id_asesoria` = :id"; */
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




