<?php

require_once 'config/Conexion.php';

class PatrocinioModel
{

    private $con;

    public function __construct()
    { //cosntructor
        $this->con = Conexion::getConexion(); //operador :: llamando a un metodo estatico
    }

    //Muestra los datos en asesorias
   /*  public function Listar(){

if($_SESSION['rol_id']==1){
  $sql = "SELECT * FROM patrocinio
  INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p = patrocinio.estado_patrocinio
  INNER JOIN asesoria On asesoria.id_asesoria = patrocinio.patrocinio_asesoria
  INNER JOIN materia On materia.id_materia = asesoria.fk_materia
  INNER JOIN info_interesado ON info_interesado.id_info_interesado =asesoria.fk_info_interesado
  INNER JOIN interesado ON interesado.id_interesado = asesoria.fk_info_interesado ";       
} else {

    $sql = "SELECT * FROM patrocinio
    INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p = patrocinio.estado_patrocinio
    INNER JOIN asesoria On asesoria.id_asesoria = patrocinio.patrocinio_asesoria
    INNER JOIN materia On materia.id_materia = asesoria.fk_materia
    INNER JOIN info_interesado ON info_interesado.id_info_interesado =asesoria.fk_info_interesado
    INNER JOIN interesado ON interesado.id_interesado = asesoria.fk_info_interesado
    INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario
        where id_usuario=:id_patrocinio ";    

}

        // preparar la sentencia
        $stmt = $this->con->prepare($sql);

        if($_SESSION['rol_id']!=1){
            $stmt->bindValue(':id_patrocinio',$_SESSION['id']);
        }
        // ejecutar la sentencia
        $stmt->execute();
        //recuperar  resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultado;
    } */


    public function get_patrocinio(){

        if($_SESSION['rol_id']==1){
          $sql = "SELECT * FROM patrocinio
          INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p = patrocinio.estado_patrocinio
          INNER JOIN asesoria On asesoria.id_asesoria = patrocinio.patrocinio_asesoria
          INNER JOIN materia On materia.id_materia = asesoria.fk_materia
          INNER JOIN info_interesado ON info_interesado.id_info_interesado =asesoria.fk_info_interesado
          INNER JOIN interesado ON interesado.id_interesado = asesoria.fk_info_interesado 
          INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario
          WHERE patrocinio.estado ='A'";       
        } else {
        
            $sql = "SELECT * FROM patrocinio
            INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p = patrocinio.estado_patrocinio
            INNER JOIN asesoria On asesoria.id_asesoria = patrocinio.patrocinio_asesoria
            INNER JOIN materia On materia.id_materia = asesoria.fk_materia
            INNER JOIN info_interesado ON info_interesado.id_info_interesado =asesoria.fk_info_interesado
            INNER JOIN interesado ON interesado.id_interesado = asesoria.fk_info_interesado
            INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario
                where id_usuario=:id_patrocinio AND patrocinio.estado ='A' ";    
        
        }
        
                // preparar la sentencia
                $stmt = $this->con->prepare($sql);
        
                if($_SESSION['rol_id']!=1){
                    $stmt->bindValue(':id_patrocinio',$_SESSION['id']);
                }
                // ejecutar la sentencia
                $stmt->execute();
                //recuperar  resultados
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //retornar resultados
                return $resultado;
            }


    public function insertar($userModel){
 
        try{

            $sql = "INSERT INTO `patrocinio` (`fk_usuario_p`, `patrocinio_asesoria`,
             `estado_patrocinio`, `tipo_judicatura`, `unidad_judicial`,`nombre_juez`,`num_causa`,
             `sentencia`, `fecha_sentencia`, `resumen`, `expediente` ) 
            VALUES (:fk_pa,:ase,:esta_p,:tip_jud,:uni,:nom_j,:num,:sen,:fech_s,:resu,:exp)"; 
    
            $sentencia = $this->con->prepare($sql);
            $data = [   
                        'fk_pa' =>  $userModel->getFk_personal_a(),
                        'ase' =>  $userModel->getPatrocinio_asesoria(),
                        'esta_p' =>  $userModel->getPatrocinio_estado(),
                        'tip_jud' =>  $userModel->getTipo_judicatura(),
                        'uni' =>  $userModel->getUnidad_judicial(),
                        'nom_j' =>   $userModel->getNombre_juez(),
                        'num' =>   $userModel->getNum_causa(),
                        'sen' =>   $userModel->getSentencia(),
                        'fech_s' =>   $userModel->getFecha_sentencia(),
                        'resu' =>   $userModel->getResumen(),
                        'exp' =>   $userModel->getExpediente()
                        
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

//
    public function insertar_P($asesoria){
 
        try{

            $sql = "UPDATE `asesoria` a 
            SEt a.patrocinado=:pa
            WHERE id_asesoria =:id"; 
    
            $sentencia = $this->con->prepare($sql);
            $data = [  
                        'pa' =>  $asesoria->getPatrocinado(),
                        'id' =>  $asesoria->getId_asesoria()
                        
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






    public function user_patrocinio($id){

           $sql ="SELECT * 
          FROM patrocinio 
          INNER JOIN asesoria ON asesoria.id_asesoria= patrocinio.patrocinio_asesoria
          INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado
          INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_id_usuario 
          INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p= patrocinio.estado_patrocinio
          INNER JOIN interesado ON interesado.id_interesado= asesoria.fk_info_interesado 
           where id_patrocinio=:id"; 
        
        
         
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
                
        $sql ="SELECT * 
                FROM patrocinio 
                INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p= patrocinio.estado_patrocinio  
                INNER JOIN asesoria ON asesoria.id_asesoria= patrocinio.patrocinio_asesoria where id_patrocinio=:id"; 
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
    
    public function update($userModel){

        try{
            //prepare
            $sql = "UPDATE patrocinio SET
                     estado_patrocinio=:esta_pa, tipo_judicatura=:t_j,
                    unidad_judicial=:u_j,nombre_juez=:n_j,num_causa=:n_ca, sentencia=:sen, fecha_sentencia=:f_sen, resumen=:resu,
                    expediente=:ex
                    where id_patrocinio =:id";
                           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                              
                                'id' =>   $userModel->getId_patrocinio(),                        
                               
                                'esta_pa' =>  $userModel->getPatrocinio_estado(),
                                't_j' =>  $userModel->getTipo_judicatura(),
                                'u_j' =>  $userModel->getUnidad_judicial(),                    
                                'n_j' =>   $userModel-> getNombre_juez(),
                                'n_ca' =>   $userModel-> getNum_causa(),                           
                                'sen' =>   $userModel-> getSentencia(),
                                'f_sen' =>   $userModel-> getFecha_sentencia(),
                                'resu' =>   $userModel-> getResumen(),
                                'ex' =>   $userModel-> getExpediente()
                                                                 
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


           $sql ="SELECT * 
          FROM asesoria 
          INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado
          INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_id_usuario 
          INNER JOIN materia ON materia.id_materia= asesoria.fk_materia  
          INNER JOIN interesado ON interesado.id_interesado= info_interesado.fk_interesado 
          INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario= asesoria.fk_tipo_user where id_asesoria=:id"; 
        
        
         
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

       
    public function Eliminar_patrocinio($id){
                //prepare

              /*  $sql = "UPDATE patrocinio, asesoria SET patrocinio.estado='D', 
               asesoria.patrocinado='0' 
               WHERE `id_patrocinio` = :id AND id_asesoria = :id_a"; */
           /*  $sql="UPDATE patrocinio 
            JOIN asesoria ON patrocinio.id_asesoria = asesoria.id_asesoria 
            SET patrocinio.estado='D', asesoria.patrocinado='0' 
            WHERE patrocinio.id_patrocinio = :id AND asesoria.id_asesoria = :id_a;";
 */
       /*  $sql="DELETE FROM patrocinio 
        WHERE id_patrocinio = :id"; */
        $sql="UPDATE patrocinio set estado ='D' 
        WHERE id_patrocinio = :id";

                $sentencia = $this->con->prepare($sql);
                $data = ['id' =>  $id
              
            
            
            ];

                //execute
                $sentencia->execute($data);
                //retornar resultados, 
                if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
                }
                return true;
            
        }

        public function actualizar_campo_p($id_a){
            //prepare
    $sql="UPDATE asesoria 
    SET patrocinado = '0'
    WHERE id_asesoria = :id_a";

            $sentencia = $this->con->prepare($sql);
            $data = [
            'id_a' =>  $id_a
        
        
        ];

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