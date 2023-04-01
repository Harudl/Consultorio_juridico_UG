
<?php
    session_start();
require_once 'model/InteresadoModel.php';
require_once 'model/Dto/Interesado.php';
require_once 'model/ConsultaSelectModel.php';

class InteresadoController
{
    private $model;
     public $user;  

    public function __construct()

     {
        $this->model = new InteresadoModel();
        $this->user = '';  
    }
      public function indexLista()
    {
       /*  $resultado = $this->model->Listar();   */
        require_once 'views/Interesado/InteresadoLista.php';
    }  
    
 public function Lista() {
    $datos=$this->model->get_interesado();
    $data= Array();
    foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["cedula"];
        $sub_array[] = $row["nombresA"];
        $sub_array[] = $row["correo"];
        $sub_array[] = $row["telefono"];
        

        $sub_array[]  = '<a class="bn3637 bn38" href="index.php?c=Asesoria&a=new_asesoria&user='.$row['fk_interesado'].'"
        data-bs-toggle="tooltip" data-bs-placement="top"
        title="Nueva Asesoría">
        <i class="ri-file-add-line ri-lg"></i>&nbsp;Crear Asesoría
        </a>
        <a class="bn3637 bn44"
        href="index.php?c=Interesado&a=viewUser&user='.$row['id_info_interesado'].'"
        data-bs-toggle="tooltip" data-bs-placement="top"
        title="Ver datos">
        <i class="ri-user-search-fill ri-lg"></i>&nbsp;Ver datos
        </a>';

        if($_SESSION['rol_id']==1) {
          $sub_array[] = '<a class="bn3637 bn39 eliminar"
                href="index.php?c=Interesado&a=Eliminar_i&id='.$row['id_info_interesado'].'"  data-id="'.$row['id_info_interesado'].'"
                data-bs-toggle="tooltip" data-bs-placement="top"
                title="Borrar usuario interesado">
                <i class="ri-delete-bin-6-fill ri-lg"></i>
                            </a> ';
        } 
        $data[]=$sub_array;
    }

    $results = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);
    echo $json = json_encode($results);
}



    // Selects options
    public function mostrar_nuevo(){
        //comunicarse con el modelo
        $modeloGenero = new ConsultaSelecctModel();
        $gene = $modeloGenero->consultarGenero();

        $modeloInstruccion = new ConsultaSelecctModel();
        $instru = $modeloInstruccion->consultar();

        $modeloEstadoC = new ConsultaSelecctModel();
        $estado = $modeloEstadoC->consultarE();

        $modeloOcupacion = new ConsultaSelecctModel();
        $ocupacion = $modeloOcupacion->consultarOcu();

        $modeloEtnia = new ConsultaSelecctModel();
        $etnia = $modeloEtnia->consultarEtnia();

        require_once 'views/Interesado/InteresadoNuevo.php';
    }

    public function viewUser(){
     //leer parametro
    $this->user = $_GET['user'];  
    $user_data = $this->model->selectOne($this->user); 

    $resultado = $this->model->user_asesoria($this->user);

    require_once 'views/Interesado/InteresadoVer.php'; 
    }


    public function nuevo_usuario() {
        $userModel = new Interesado(); // llamar a las entidades de la clase usuarios
        // lectura de parametros
        $userModel->setNombres(htmlspecialchars($_POST['nombresAp']));
        $userModel->setCedula(htmlentities($_POST['cedula']));
        $userModel->setProvincia(htmlspecialchars($_POST['provincia']));
        $userModel->setCiudad(htmlspecialchars($_POST['ciudad']));
        $userModel->setFechaN(htmlentities($_POST['fechaNa']));
        $userModel->setEdad($_POST['Edad']);
        $userModel->setTelefono(htmlentities($_POST['telefono']));
        $userModel->setCorreo(htmlentities($_POST['correoElec']));
        $userModel->setNacionalidad(htmlentities($_POST['nacionalidad']));
        $userModel->setEtnia(htmlentities($_POST['etnia']));
        $userModel->setDomicilio(htmlspecialchars($_POST['domicilio']));
        $userModel->setInfo_genero(htmlentities($_POST['genero']));
        $userModel->setNum_ingreso(htmlentities($_POST['nivelIngresos']));
        $userModel->setIess(htmlentities($_POST['iess']));
        $userModel->setBono(htmlentities($_POST['Rbono'])); 
        $userModel->setDiscapacidad(htmlentities($_POST['Cdisca']));
        $userModel->setZonaV(htmlentities($_POST['zonaV']));
        $userModel->setIngreso_ocupacion(htmlentities($_POST['ocupacion']));
        $userModel->setInfo_estado_civil(htmlentities($_POST['estadoCivil']));
        $userModel->setInfo_instruccion(htmlentities($_POST['instruccion']));
        $ced=$userModel->getCedula();
      
        //llamar al modelo
        $exito = $this->model->insertar($userModel);
        
        if (!$exito) {
          $msj = "El usuario ha sido registrado, número de cédula existente";
          $icon = 'error';
        }

        else{
          $msj = 'Guardado exitosamente';
          $icon ='success';
          
          $id = $this->model-> recuperarID($ced);
          $exito = $this->model->insertarAdicional($userModel,$id); 
              
        }

        $_SESSION['m_crear_usuario'] = $msj;
        $_SESSION['m_icon_interesado'] = $icon;
          header('Location:index.php?c=Interesado&a=indexLista');
    } 


    public function editar_usuario(){
  
     $this->user = $_GET['user']; 
    
      $user = $this->model->selectOne( $this->user);

    //comunicarse con el modelo
    $modeloGenero = new ConsultaSelecctModel();
    $gene = $modeloGenero->consultarGenero();

    $modeloInstruccion = new ConsultaSelecctModel();
    $instru = $modeloInstruccion->consultar();

    $modeloEstadoC = new ConsultaSelecctModel();
    $estado = $modeloEstadoC->consultarE();

    $modeloOcupacion = new ConsultaSelecctModel();
    $ocupacion = $modeloOcupacion->consultarOcu();
    
    $modeloEtnia = new ConsultaSelecctModel();
    $etnia = $modeloEtnia->consultarEtnia();

    require_once 'views/Interesado/InteresadoEditar.php'; 
    }


     public function modificar(){
      
        $userM = new Interesado();

              // lectura de parametros
        $userM->setId_info_interesado(htmlentities($_POST['id']));
        $userM->setNombres(htmlspecialchars($_POST['nombresAp']));
        $userM->setCedula(htmlentities($_POST['cedula']));
        $userM->setProvincia(htmlspecialchars($_POST['provincia']));
        $userM->setCiudad(htmlspecialchars($_POST['ciudad']));
        $userM->setFechaN(htmlentities($_POST['fechaNa']));
        $userM->setEdad($_POST['Edad']);
        $userM->setTelefono(htmlentities($_POST['telefono']));
        $userM->setCorreo(htmlentities($_POST['correoElec']));
        $userM->setNacionalidad(htmlentities($_POST['nacionalidad']));
        $userM->setEtnia(htmlentities($_POST['etnia']));
        $userM->setDomicilio(htmlspecialchars($_POST['domicilio']));
        $userM->setInfo_genero(htmlentities($_POST['genero']));
        $userM->setNum_ingreso(htmlentities($_POST['nivelIngresos']));
        $userM->setIess(htmlentities($_POST['iess']));
        $userM->setBono(htmlentities($_POST['Rbono'])); 
        $userM->setDiscapacidad(htmlentities($_POST['Cdisca']));
        $userM->setZonaV(htmlentities($_POST['zonaV']));
        $userM->setIngreso_ocupacion(htmlentities($_POST['ocupacion']));
        $userM->setInfo_estado_civil(htmlentities($_POST['estadoCivil']));
        $userM->setInfo_instruccion(htmlentities($_POST['instruccion']));
     

          //llamar al modelo
        $exito = $this->model->update($userM);
        $msj = 'Se ha actualizar correctamente';

        if (!$exito) {
          $msj = "No se pudo realizar la actualización";
        }

         $_SESSION['m_update_usuario'] = $msj;

       /*   header('Location:index.php?c=Interesado&a=indexLista');  */
       header('Location:index.php?c=Interesado&a=viewUser&user='.$_POST['id']);
    }


    public function Eliminar_i(){
     
      $id = $_GET['id'];
       
       // Eliminar el registro de la base de datos
       $resultado = $this->model->Eliminar_interesado($id);
    
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