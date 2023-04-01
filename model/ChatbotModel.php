<?php

require_once 'config/Conexion.php';

class ChatbotModel
{

    private $con;

    public function __construct()
    { //cosntructor
        $this->con = Conexion::getConexion(); //operador :: llamando a un metodo estatico
    }


    public function preguntas_chatbot(){

        $sql = "SELECT *FROM chatbot_orientativo WHERE estado='A'";
        
                // preparar la sentencia
                $stmt = $this->con->prepare($sql);
                // ejecutar la sentencia
                $stmt->execute();
                //recuperar  resultados
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //retornar resultados
                return $resultado;
    }
    
    public function nuevo($chatbot){
 
        try{

            $sql = "INSERT INTO `chatbot_orientativo` (`preguntas`, `respuestas` ) 
            VALUES (:pre,:res)"; 
    
            $sentencia = $this->con->prepare($sql);
            $data = [   
                        'pre' =>  $chatbot->getPreguntas(),
                        'res' =>  $chatbot->getRespuestas()
                        
                        
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

    public function consultar($id) {
  
        $sql ="SELECT * FROM chatbot_orientativo where id_chatbot=:id"; 
               // preparar la sentencia
               $stmt = $this->con->prepare($sql);
               $data = ['id' => $id,];
               // ejecutar la sentencia
               $stmt->execute($data);
               // recuperar los datos (en caso de select)
               $resultado = $stmt->fetch(PDO::FETCH_OBJ);
               /* $user = $stmt->fetchAll(PDO::FETCH_ASSOC); */// fetch retorna el primer registro
               // retornar resultados
                return $resultado;  
    }


    public function update($chatbot){

        try{
        //prepare
        $sql = "UPDATE chatbot_orientativo SET preguntas =:pre, respuestas =:res  where id_chatbot =:id";
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [               
            'id' =>   $chatbot->getId_chatbot(),                    
            'pre' =>  $chatbot->getPreguntas(),
            'res' =>  $chatbot->getRespuestas()                                    
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

    public function Eliminar($id){
        //prepare
    /*     $sql = "DELETE FROM usuario WHERE `id_usuario` = :id"; */
    $sql = "UPDATE chatbot_orientativo SET estado='D' WHERE `id_chatbot` = :id";
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

/* function Responder_u($userQuery) {
    // Escapando caracteres especiales en el mensaje del usuario
    $getMesg = mysqli_real_escape_string($this->con, $userQuery);

    // Comprobando la consulta del usuario en la base de datos
    $Comprobar = "SELECT respuestas FROM chatbot_orientativo WHERE preguntas LIKE '%$getMesg%'";
    $run_query = mysqli_query($this->conn, $Comprobar) or die("Error");

    // Si la consulta del usuario coincide con la consulta de la base de datos, devolveremos la respuesta; de lo contrario, devolveremos NULL
    if (mysqli_num_rows($run_query) > 0) {
        // Recuperando la respuesta de la base de datos según la consulta del usuario
        $fetch_data = mysqli_fetch_assoc($run_query);
        // Almacenando la respuesta en una variable que devolveremos al controlador
        $replay = $fetch_data['respuestas'];
        return $replay;
    } else {
        return NULL;
    }
} */

 public function Responder_u($userQuery)
    {
        // Preparando consulta SQL
        $stmt = $this->con->prepare("SELECT respuestas FROM chatbot_orientativo WHERE preguntas LIKE :userQuery");

        // Ligando parámetros
        $stmt->bindValue(":userQuery", '%' . $userQuery . '%');

        // Ejecutando consulta SQL
        $stmt->execute();

        // Obteniendo respuesta de la consulta SQL
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si la respuesta no es nula, devolverla; de lo contrario, devolver NULL
        if ($response != NULL) {
            return $response['respuestas'];
        } else {
            return NULL;
        }
    }

    public function Lista_p()
    {
        // Preparando consulta SQL
        $stmt = $this->con->prepare("SELECT preguntas FROM chatbot_orientativo");
    
        // Ejecutando consulta SQL
        $stmt->execute();
    
        // Obteniendo respuesta de la consulta SQL
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Devolver la matriz asociativa con todas las filas de la consulta
        return $response;
    }

 
    public function obtenerPreguntas() {
        $query = "SELECT id_chatbot, preguntas, respuestas FROM chatbot_orientativo LIMIT 4";
        $result = $this->con->query($query);
    
        $preguntas = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $preguntas[] = $row;
        }
    
        return $preguntas;
      }



      public function obtenerRespuesta($idChatbot) {
        $query = "SELECT respuestas FROM chatbot_orientativo WHERE id_chatbot = :id_chatbot LIMIT 4";
        $statement = $this->con->prepare($query);
        $statement->bindValue(':id_chatbot', $idChatbot, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['respuestas'];
      }

      public function obtenerPregunta($idChatbot) {
        $query = "SELECT preguntas FROM chatbot_orientativo WHERE id_chatbot = :idChatbot LIMIT 4";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':idChatbot', $idChatbot);
        $stmt->execute();
        $pregunta = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pregunta['preguntas'];
      }
      

   

      public function consulta_interesado_bd($consulta)
      {

          // Preparando consulta SQL
          $stmt = $this->con->prepare("SELECT interesado.nombresA, info_interesado.edad, info_interesado.telefono, 
          info_interesado.correo, estado_civil.estado_civil_nom, ocupacion.ocupacion_nombre, instruccion.instrucion_nom,
           info_interesado.iess, info_interesado.bono, info_interesado.discapacidad, info_interesado.zonaV, info_interesado.ciudad 
           FROM info_interesado
           INNER JOIN estado_civil on estado_civil.id_estado_civil = info_interesado.info_estado_civil
           INNER JOIN interesado on interesado.id_interesado = info_interesado.fk_interesado
           INNER JOIN ocupacion on ocupacion.id_ocupacion = info_interesado.inf_ocupacion
           INNER JOIN instruccion on instruccion.id_instruccion = info_interesado.info_instruccion
           WHERE interesado.cedula= :consulta");
  
          // Ligando parámetros
      /*  $stmt->bindValue(":consulta", '%' . $consulta . '%');  */

      $stmt->bindValue(":consulta", $consulta);

       /*    $data = ['consulta' =>  $consulta]; */
  
          // Ejecutando consulta SQL
          $stmt->execute();
  
          // Obteniendo respuesta de la consulta SQL
          $response = $stmt->fetch(PDO::FETCH_ASSOC);
  
          // Si la respuesta no es nula, devolverla; de lo contrario, devolver NULL
          
          if ($response != NULL) {
              return $response;
          } else {
              return NULL;
          }
      }


      public function consulta_asesoria_bd($consulta)
      {
          // Preparando consulta SQL
          $stmt = $this->con->prepare("SELECT interesado.nombresA, asesoria.fecha_asesoria, asesoria.hora,
          asesoria.tema, materia.materia_nombre, tipo_usuario.tipo_usuario_nom, asesoria.observacion, 
          usuario.nombre
          FROM asesoria 
          INNER JOIN materia on materia.id_materia = asesoria.fk_materia
          INNER JOIN tipo_usuario on tipo_usuario.id_tipo_usuario = asesoria.fk_tipo_user
          INNER JOIN info_interesado on info_interesado.id_info_interesado = asesoria.fk_info_interesado
          INNER JOIN interesado on interesado.id_interesado = info_interesado.fk_interesado
          INNER JOIN usuario on usuario.id_usuario = asesoria.fk_id_usuario
          WHERE interesado.cedula= :consulta");
  
          // Ligando parámetros
      /*  $stmt->bindValue(":consulta", '%' . $consulta . '%');  */

      $stmt->bindValue(":consulta", $consulta);

       /*    $data = ['consulta' =>  $consulta]; */
  
          // Ejecutando consulta SQL
          $stmt->execute();
  
          // Obteniendo respuesta de la consulta SQL
          $response = $stmt->fetch(PDO::FETCH_ASSOC);
  
          // Si la respuesta no es nula, devolverla; de lo contrario, devolver NULL
          
          if ($response != NULL) {
              return $response;
          } else {
              return NULL;
          }
      }


      public function consulta_patrocinio_bd($consulta)
      {
          // Preparando consulta SQL
          $stmt = $this->con->prepare("SELECT interesado.nombresA, patrocinio.Fecha_patrocinio, estado_patrocinio.estado_nombre ,asesoria.tema,
           tipo_usuario.tipo_usuario_nom, usuario.nombre, patrocinio.tipo_judicatura, patrocinio.unidad_judicial, patrocinio.nombre_juez, 
           patrocinio.num_causa, patrocinio.resumen
          FROM patrocinio
          INNER JOIN estado_patrocinio on estado_patrocinio.id_estado_p = patrocinio.estado_patrocinio
          INNER JOIN asesoria on asesoria.id_asesoria = patrocinio.patrocinio_asesoria 
          INNER JOIN tipo_usuario on tipo_usuario.id_tipo_usuario = asesoria.fk_tipo_user
          INNER JOIN info_interesado on info_interesado.id_info_interesado = asesoria.fk_info_interesado
          INNER JOIN interesado on interesado.id_interesado = info_interesado.fk_interesado
          INNER JOIN usuario on usuario.id_usuario = asesoria.fk_id_usuario
          WHERE interesado.cedula= :consulta");
  
          // Ligando parámetros
      /*  $stmt->bindValue(":consulta", '%' . $consulta . '%');  */

      $stmt->bindValue(":consulta", $consulta);

       /*    $data = ['consulta' =>  $consulta]; */
  
          // Ejecutando consulta SQL
          $stmt->execute();
  
          // Obteniendo respuesta de la consulta SQL
          $response = $stmt->fetch(PDO::FETCH_ASSOC);
  
          // Si la respuesta no es nula, devolverla; de lo contrario, devolver NULL
          
          if ($response != NULL) {
              return $response;
          } else {
              return NULL;
          }
      }





}