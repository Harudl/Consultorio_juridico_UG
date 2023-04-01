<?php
    session_start();
require_once 'model/AsesoriaModel.php';
require_once 'model/Dto/Asesoria.php';
require_once 'model/ConsultaSelectModel.php';

class AsesoriaController
{
    private $model;
    public $user;
    public function __construct()

    {
        $this->model = new AsesoriaModel();
 
 $this->user = '';
    }


    public function Lista_asesoria()
    {
       /*  $resultado = $this->model->Listar(); */
        require_once 'views/Asesoria/AsesoriaLista.php';
    } 

public function Lista(){
    
    $datos=$this->model->get_asesoria();

    $data= Array();
    foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["tema"];
        $sub_array[] = $row["materia_nombre"];
        $sub_array[] = $row["cedula"];
        $sub_array[] = $row["nombresA"];
        $sub_array[] = $row["tipo_usuario_nom"];
        if($_SESSION['rol_id']==1) {
            $sub_array[] = $row["nombre"];
        }
        if($row['patrocinado']==0) {
           $sub_array[] = '<a class="bn3637 bn38" href="index.php?c=Patrocinio&a=agregarPatrocinio&patro='.$row['id_asesoria'].'."
           data-bs-toggle="tooltip" data-bs-placement="top" title="Crear un Patrocinio">
           <i class="ri-shield-user-fill ri-lg"></i>&nbsp;Nuevo</a>'; 
        }
        if($row['patrocinado']==1) {
            $sub_array[] = '<span class="badge bg-secondary">Patrocinado</span>';
             } 
      
        $sub_array[] = '<a class="bn3637 bn41" href="index.php?c=Asesoria&a=asesoriaEditar&asesoria_edit='.$row['id_asesoria'].'">
        <i class="ri-file-edit-fill ri-lg"></i>&nbsp;Editar</a> <a class="bn3637 bn44" href="index.php?c=Asesoria&a=asesoriaView&user='.$row['id_asesoria'].'">
       <i class="ri-file-search-fill ri-lg"></i>&nbsp;Ver</a> ';
       if($_SESSION['rol_id']==1) {
$sub_array[] = '<a class="bn3637 bn39 eliminar" 
href="index.php?c=Asesoria&a=Eliminar_asesoria&id='.$row['id_asesoria'].'" data-id="'.$row['id_asesoria'].'"
data-bs-toggle="tooltip" data-bs-placement="top" 
title="Eliminar Asesoria">
    <i class="ri-delete-bin-6-fill ri-lg"></i>&nbsp;Borrar
</a>';
       }
       $data[]=$sub_array; 
       
     
    }

    $results = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);
       /*  var_dump($results); */
    echo $json = json_encode($results); 

    /*  require_once 'views/Asesoria/AsesoriaLista.php';    */
}




    public function new_asesoria(){
        $this->user = $_GET['user'];  

        $user_a = $this->model->user_name_A($this->user);

        //comunicarse con el modelo
        $modeloTipoUser = new ConsultaSelecctModel();
        $tipoU = $modeloTipoUser->consultarTipoUser(); 

        $modeloMateria = new ConsultaSelecctModel();
        $materia = $modeloMateria->consultarMateria();

        require_once 'views/Asesoria/AsesoriaRegistro.php';
  }

    public function asesoriaView(){


    $this->user = $_GET['user'];
    
    $user_asesoria = $this->model->selectOne($this->user); 
    $resultado = $this->model->user_asesoria($this->user); 

    require_once 'views/Asesoria/AsesoriaView.php'; 
    
    }

    public function ViewPDF()
    {
        require_once 'views/Asesoria/AsesoriaR.php'; 
    }


    public function nuevo() {


        $userModel = new Asesoria(); // llamar a las entidades 
    
        $userModel->setFk_id_usuario(htmlentities($_SESSION['id']));
        $userModel->setFecha_A(htmlentities($_POST['fecha_asesoria']));
        $userModel->setHora(htmlentities($_POST['hora']));
        $userModel->setTema(htmlspecialchars($_POST['temaA']));
        $userModel->setFk_interesado(htmlentities($_POST['id']));
        $userModel->setDerivado(htmlentities($_POST['derivado']));
        $userModel->setObservacion(htmlspecialchars($_POST['observaciones']));
        $userModel->setEstado_causa(htmlentities($_POST['estadoCausa']));
        $userModel->setSeguimiento(htmlspecialchars($_POST['seguimiento']));
        $userModel->setInfo_materia(htmlentities($_POST['materia']));
        $userModel->setInfo_tipo_user(htmlentities($_POST['tipoUsuario']));
        $userModel->setResumen_consulta(htmlspecialchars($_POST['resumen_consulta']));
        $userModel->setResolucion_consulta(htmlspecialchars($_POST['resolucion_consulta']));
        

          $exito = $this->model->insertar($userModel);
          $msj = 'Guardado exitosamente';
          if (!$exito) {
            
              $msj = "No se pudo realizar el guardado";
              $color = "danger";
          }

          if (!isset($_SESSION)) {
              session_start();
          };
          $_SESSION['m_crear_asesoria'] = $msj;
     
          //llamar a la vista  
          header('Location:index.php?c=Asesoria&a=Lista_asesoria'); 
        } 

        
  public function asesoriaEditar(){

    $this->user = $_GET['asesoria_edit'];  


    $asesoria_edit = $this->model->selectOne( $this->user);
 $resultado = $this->model->user_asesoria($this->user); 

     //comunicarse con el modelo
     $modeloTipoUser = new ConsultaSelecctModel();
     $tipoU = $modeloTipoUser->consultarTipoUser(); 

     $modeloMateria = new ConsultaSelecctModel();
     $materia = $modeloMateria->consultarMateria();

   require_once 'views/Asesoria/AsesoriaEditar.php'; 
/*  var_dump($user_asesoria); */
    }

    public function modificar(){
    
    $userModel = new Asesoria(); // llamar a las entidades de la clase usuarios
 
             $userModel->setFecha_A(htmlentities($_POST['fecha_asesoria']));
              $userModel->setHora(htmlentities($_POST['hora']));
              $userModel->setTema(htmlspecialchars($_POST['temaA']));
              $userModel->setId_asesoria(htmlentities($_POST['id']));
              $userModel->setDerivado(htmlentities($_POST['derivado']));
              $userModel->setObservacion(htmlspecialchars($_POST['observaciones']));
              $userModel->setEstado_causa(htmlentities($_POST['estadoCausa']));
              $userModel->setSeguimiento(htmlspecialchars($_POST['seguimiento']));
              $userModel->setInfo_materia(htmlentities($_POST['materia']));
              $userModel->setInfo_tipo_user(htmlentities($_POST['tipoUsuario']));
              $userModel->setResumen_consulta(htmlspecialchars($_POST['resumen_consulta']));
              $userModel->setResolucion_consulta(htmlspecialchars($_POST['resolucion_consulta']));

  //llamar al modelo
  $exito = $this->model->update($userModel);
  $msj = 'Se ha actualizar correctamente';
  $color = 'primary';
  if (!$exito) {
    
      $msj = "No se pudo realizar la actualización";
      $color = "danger";
  }

  if (!isset($_SESSION)) {
      session_start();
  };
  $_SESSION['m_update_asesoria'] = $msj;
  $_SESSION['color'] = $color; 

    //llamar a la vista
    header('Location:index.php?c=Asesoria&a=Lista_asesoria'); 
   /* var_dump($userModel); */
              
   
    }


  /*   public function Eliminar_asesoria(){
        //leeer parametros
        $id= $_REQUEST['id'];
              //comunicando con el modelo
          $exito = $this->model->Eliminar_asesoria($id);
          $msj = 'Se ha eliminado exitosamente';
          $color = 'primary';
                 if (!$exito) {
                     $msj = "No se pudo eliminar";
                     $color = "danger";
                 }
                  if(!isset($_SESSION)){ session_start();};
                 $_SESSION['mensaje'] = $msj;
                 $_SESSION['color'] = $color;
            header('Location:index.php?c=Asesoria&a=Lista_asesoria');
    } */
    public function Eliminar_asesoria(){
        $id = $_GET['id'];
    
        // Eliminar el registro de la base de datos
        $resultado = $this->model->Eliminar_asesoria($id);
    
        // Verificar si la eliminación fue exitosa
        if ($resultado) {
            // La eliminación fue exitosa
            $response = array('exito' => true);
        } else {
            // La eliminación no fue exitosa
            $response = array('exito' => false);
        }
    
        // Devolver la respuesta en formato JSON
        echo json_encode($response);
    
    } 

   

   
    }

