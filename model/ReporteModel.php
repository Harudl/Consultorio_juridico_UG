<?php

require_once 'config/Conexion.php';

class ReporteModel
{

    private $con;

    public function __construct()
    { //cosntructor
        $this->con = Conexion::getConexion(); //operador :: llamando a un metodo estatico
    }

    public function get_patrocinio_activo(){

      $sql = "SELECT * FROM patrocinio
      INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p= patrocinio.estado_patrocinio 
        INNER JOIN asesoria ON asesoria.id_asesoria= patrocinio.patrocinio_asesoria
        INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado
        INNER JOIN materia ON materia.id_materia= asesoria.fk_materia
        INNER JOIN interesado ON interesado.id_interesado= asesoria.fk_info_interesado
        INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_id_usuario 
        where estado_patrocinio ='1' ";  
            // preparar la sentencia
            $stmt = $this->con->prepare($sql);
            // ejecutar la sentencia
            $stmt->execute();
            //recuperar  resultados
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //retornar resultados
            return $resultado;
        } 


    public function get_patrocinio_pasivo(){

      $sql = "SELECT * FROM patrocinio
            INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p= patrocinio.estado_patrocinio 
            INNER JOIN asesoria ON asesoria.id_asesoria= patrocinio.patrocinio_asesoria
            INNER JOIN info_interesado ON asesoria.fk_info_interesado = info_interesado.id_info_interesado
            INNER JOIN materia ON materia.id_materia= asesoria.fk_materia
            INNER JOIN interesado ON interesado.id_interesado= asesoria.fk_info_interesado
            INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_id_usuario 
            where estado_patrocinio ='2' ";  
            // preparar la sentencia
            $stmt = $this->con->prepare($sql);
            // ejecutar la sentencia
            $stmt->execute();
            //recuperar  resultados
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //retornar resultados
            return $resultado;
      }


    public function get_patrocinio_finalizados(){


            $sql = "SELECT * FROM patrocinio
            INNER JOIN estado_patrocinio ON estado_patrocinio.id_estado_p= patrocinio.estado_patrocinio 
              INNER JOIN asesoria ON asesoria.id_asesoria= patrocinio.patrocinio_asesoria
              INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado
              INNER JOIN materia ON materia.id_materia= asesoria.fk_materia
              INNER JOIN interesado ON interesado.id_interesado= asesoria.fk_info_interesado
              INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_id_usuario 
              where estado_patrocinio ='3' ";  
                  // preparar la sentencia
                  $stmt = $this->con->prepare($sql);
                  // ejecutar la sentencia
                  $stmt->execute();
                  //recuperar  resultados
                  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  //retornar resultados
                  return $resultado;
    }

             

    public function get_asesoria_r(){

        $sql = "SELECT * FROM  asesoria 
        INNER JOIN materia ON materia.id_materia= asesoria.fk_materia 
        INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario= asesoria.fk_tipo_user
        INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado
        INNER JOIN etnia ON etnia.id_etnia = info_interesado.inf_etnia
        INNER JOIN genero ON genero.id_genero = info_interesado.info_genero
        INNER JOIN estado_civil ON estado_civil.id_estado_civil= info_interesado.info_estado_civil
        INNER JOIN instruccion ON instruccion.id_instruccion= info_interesado.info_instruccion
        INNER JOIN ocupacion ON ocupacion.id_ocupacion= info_interesado.inf_ocupacion             
        INNER JOIN interesado ON interesado.id_interesado= asesoria.fk_info_interesado
        INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_id_usuario ";  
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        //recuperar  resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultado;
    }
}