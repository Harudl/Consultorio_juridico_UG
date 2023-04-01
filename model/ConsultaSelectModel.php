<?php
require_once 'config/Conexion.php';

class ConsultaSelecctModel {
    private $con;
    
    public function __construct() {
        $this->con = Conexion::getConexion();
    }

      //Consultar los select option de Genero
      public function consultarGenero(){
        //prepare
      $sql="SELECT * FROM genero";
      $sentencia = $this->con->prepare($sql);
        //binding parameters
        //execute
      $sentencia->execute();
        //retornar resultados
      $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
      return $resultados;
        
    }
    
    //Consultar los select option de instruccion
    public function consultar(){
          //prepare
        $sql="SELECT * FROM instruccion";
        $sentencia = $this->con->prepare($sql);
        //binding parameters
        //execute
        $sentencia->execute();
        //retornar resultados
        $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultados;
        
    }

    //Consultar los select option de Estado civil 
    public function consultarE(){
        //prepare
      $sql="SELECT * FROM estado_civil";
      $sentencia = $this->con->prepare($sql);
      //binding parameters
      //execute
      $sentencia->execute();
      //retornar resultados
      $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
      
      return $resultados;
      }

    //Consultar los select option de Ocupacion
    public function consultarOcu(){
         //prepare
    $sql="SELECT * FROM ocupacion";
    $sentencia = $this->con->prepare($sql);
    //binding parameters
    //execute
    $sentencia->execute();
    //retornar resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
  
    return $resultados;
    }

    //Consultar los select option de Tipo de usuario
    public function consultarTipoUser(){
        //prepare
    $sql="SELECT * FROM tipo_usuario";
    $sentencia = $this->con->prepare($sql);
      //binding parameters
      //execute
    $sentencia->execute();
    //retornar resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $resultados; 
    }

    //Consultar los select option de Materia
    public function consultarMateria(){
      //prepare
    $sql="SELECT * FROM materia";
    $sentencia = $this->con->prepare($sql);
       //binding parameters
       //execute
    $sentencia->execute();
      //retornar resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $resultados;
    }

    //Consultar los select option de estado de patrocinio
    public function EstadoPatrocinio(){
      //prepare
    $sql="SELECT * FROM estado_patrocinio";
    $sentencia = $this->con->prepare($sql);
       //binding parameters
       //execute
    $sentencia->execute();
      //retornar resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $resultados;
    }
 //Consultar los select option de etnia
    public function consultarEtnia(){
      //prepare
    $sql="SELECT * FROM etnia";
    $sentencia = $this->con->prepare($sql);
       //binding parameters
       //execute
    $sentencia->execute();
      //retornar resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $resultados;
    }


     //Consultar los select option de etnia
     public function ConsultarRol(){
      //prepare
    $sql="SELECT * FROM rol";
    $sentencia = $this->con->prepare($sql);
       //binding parameters
       //execute
    $sentencia->execute();
      //retornar resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $resultados;
    }




    
}
