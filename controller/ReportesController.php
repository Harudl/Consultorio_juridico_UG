<?php

    session_start();

require_once 'model/ReporteModel.php';
require_once 'model/Dto/Patrocinio.php';

class reportesController
{
    private $model;

    public function __construct()
    {
         $this->model = new ReporteModel(); 

    } 


    public function mostrarReportesAsesoria()
    {
     require_once 'views/Reportes/ReportesAsesoria.php'; 
    }


    public function Lista_Asesoria()
    {
        $datos=$this->model->get_asesoria_r();
        $data= Array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["fecha_asesoria"];
            $sub_array[] = $row["nombre"];
            $sub_array[] = $row["materia_nombre"];
            $sub_array[] = $row["tema"];
            $sub_array[] = $row["nombresA"];
            $sub_array[] = $row["cedula"];
            $sub_array[] = $row["fechaN"];
            $sub_array[] = $row["edad"];
            $sub_array[] = $row["telefono"];
            $sub_array[] = $row["domicilio"];
            $sub_array[] = $row["genero_nombre"];
            $sub_array[] = $row["nombre_etnia"];
            $sub_array[] = $row["nacionalidad"];
            $sub_array[] = $row["instrucion_nom"];
            $sub_array[] = $row["ocupacion_nombre"];
            $sub_array[] = $row["estado_civil_nom"];
            $sub_array[] = $row["num_ingreso"];
            $sub_array[] = $row["bono"];
            $sub_array[] = $row["discapacidad"];
            $sub_array[] = $row["zonaV"];
            $sub_array[] = $row["tipo_usuario_nom"];
            $sub_array[] = $row["derivado"];
            $sub_array[] = $row["estado_causa"];
            $sub_array[] = $row["seguimiento"];


            if($row['patrocinado']==0) { 
                $sub_array[] ='no';
            }else if($row['patrocinado']==1) { 
                $sub_array[] ='si';
            } 

           
            $sub_array[] = $row["observacion"];
    
            
            $data[]=$sub_array;
        }
    
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo $json = json_encode($results);

     
    }

    public function mostrarReportesActivos()
    {
     require_once 'views/Reportes/ReportesActivos.php'; 
    }

    public function Lista_Patrocinio_activo(){
        $datos=$this->model->get_patrocinio_activo();
        $data= Array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["nombresA"];
            $sub_array[] = $row["nombre"];
            $sub_array[] = $row["Fecha_patrocinio"];
            $sub_array[] = $row["unidad_judicial"];
            $sub_array[] = $row["num_causa"];
            $sub_array[] = $row["materia_nombre"];
            $sub_array[] = $row["tema"];
            $sub_array[] = $row["estado_nombre"];
            $sub_array[] = $row["resumen"];
                     
            $data[]=$sub_array;
        }
    
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo $json = json_encode($results);
    }

    public function mostrarReportesPasivos()
    {
     require_once 'views/Reportes/ReportesPasivos.php'; 
    }

    public function Lista_Patrocinio_pasivo(){
        $datos=$this->model->get_patrocinio_pasivo();
        $data= Array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["nombresA"];
            $sub_array[] = $row["nombre"];
            $sub_array[] = $row["Fecha_patrocinio"];
            $sub_array[] = $row["unidad_judicial"];
            $sub_array[] = $row["num_causa"];
            $sub_array[] = $row["materia_nombre"];
            $sub_array[] = $row["tema"];
            $sub_array[] = $row["estado_nombre"];
            $sub_array[] = $row["resumen"];
                     
            $data[]=$sub_array;
        }
    
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo $json = json_encode($results);
    }
  
    
    public function mostrarReportesTerminados()
    {
        require_once 'views/Reportes/ReportesTerminado.php';
    }

    
    public function Lista_Patrocinio_finalizados(){
        $datos=$this->model->get_patrocinio_finalizados();
        $data= Array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["nombresA"];
            $sub_array[] = $row["nombre"];
            $sub_array[] = $row["Fecha_patrocinio"];
            $sub_array[] = $row["unidad_judicial"];
            $sub_array[] = $row["num_causa"];
            $sub_array[] = $row["materia_nombre"];
            $sub_array[] = $row["tema"];
            $sub_array[] = $row["estado_nombre"];
            $sub_array[] = $row["resumen"];
                     
            $data[]=$sub_array;
        }
    
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo $json = json_encode($results);
    }

}