<?php

class Conexion {
    public static function getConexion(){
        $dsn = 'mysql:host=localhost;port=3306;dbname=' . "bd_consultorio"; 
        $conexion = null;

        try{
            $conexion = new PDO($dsn, "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8mb4"));

        } catch (Exception $e){
            echo $e;
            die("ERROR:" . $e->getMessage());
        }

        return $conexion;

    }
}