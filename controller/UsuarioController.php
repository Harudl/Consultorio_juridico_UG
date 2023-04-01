<?php
    session_start();
require_once 'model/Dto/Usuario.php';
require_once 'model/UsuarioModel.php';
require_once 'model/ConsultaSelectModel.php';

class UsuarioController
{
    private $model;
    public $user;
    public function __construct()

    {
     $this->model = new UsuarioModel(); 
     $this->user = '';
    }


//Modulo de Administrador
    public function Listado_usuarios()
    {
        require_once 'views/Usuario/UsuarioList.php';
    }

    public function Lista_usuarios()
    {
        $datos=$this->model->UsuarioLista();
        $data= Array();
        $contador = 0;
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $contador = $contador+1;
            $sub_array[] = $row["nombre"];
            $sub_array[] = $row["usuario_cedula"];
            $sub_array[] = $row["correo"];
             $sub_array[] = $row["rol_nombre"];
             $sub_array[] = $row["fecha_creacion"];
            $sub_array[] = '<a class="bn3637 bn41" href="index.php?c=Usuario&a=Usuario_Editar&asesor_edit='.$row['id_usuario'].'"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="ri-pencil-fill ri-lg"></i>&nbsp;Editar</a> 
            
            <a  class="bn3637 bn39 eliminar" href="index.php?c=Usuario&a=Delete_usuario&id='.$row['id_usuario'].'" data-id="'.$row['id_usuario'].'"
             data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Asesor"><i class="ri-delete-bin-6-fill ri-lg"></i>&nbsp;Borrar</a>';
                     
            $data[]=$sub_array;
        }
    
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo $json = json_encode($results);
    }

  
    public function Usuario_nuevo()
    {

        $modeloRol = new ConsultaSelecctModel();
        $SelectRol = $modeloRol->ConsultarRol(); 
        require_once 'views/Usuario/UsuarioNuevo.php';
    }

    public function Agregar_usuario()
    {
        $asesor= new Usuario(); // llamar a las entidades de la clase usuarios

        // lectura de parametros
        $asesor->setNombre(htmlspecialchars($_POST['nomnbre']));
        $asesor->setCedula(htmlentities($_POST['nCedula']));
        $asesor->setCorreo(htmlentities($_POST['correo']));
        $asesor->setRol(htmlentities($_POST['rol']));
        $asesor->setUsuario_password(htmlspecialchars($_POST['password']));

        $exito = $this->model->insertar_usuario($asesor);
        $alert="success";
        $msj = "Se ha realizar el guardado";
        if (!$exito) {
            $alert="error";
            $msj = "No se pudo realizar el guardado";
        
        }

        if (!isset($_SESSION)) {
            session_start();
        };
        $_SESSION['me_asesor'] = $msj;
        $_SESSION['m_icon_asesor'] = $alert;

        header('Location:index.php?c=Usuario&a=Listado_usuarios');

    }


    public function perfil_user(){

      $this->user = $_GET['user_asesor'];  

      $perfil = $this->model->search($this->user);
      
       require_once 'views/Home/perfil_user.php'; 

    }


    public function cambiar_clave(){

        if (empty($_POST['clave_Actual']) || empty($_POST['clave_nueva'])) {
            $mjs_cambio = "Campos vacios, ingrese si desea cambiar la contraseña";
            $icon = "info";
            $_SESSION['m_incorrecto'] = $mjs_cambio;
            $_SESSION['m_icon'] =$icon;
           header('Location: index.php?c=Usuario&a=perfil_user&user_asesor=' . $_SESSION['id']); 
             return; 
        }

        $cambio= new Usuario(); // llamar a las entidades de la clase usuarios

        // lectura de parametros
        $cambio->setId_usuario(htmlentities( $_SESSION['id']));
        $cambio->setCedula(htmlspecialchars($_POST['clave_Actual']));
        $cambio->setNueva_usuario(htmlspecialchars($_POST['clave_nueva']));

        $passwordVerificada = $this->model->verificarPassword($cambio);
        if(!$passwordVerificada || $passwordVerificada->personal_password === $cambio->getNueva_usuario()){
            $mjs_cambio= "La contraseña actual no es correcta";
            $icon="error";
        }
        
        if($passwordVerificada){ 
        $resultado = $this->model->cambiarPassword($cambio);
        if($resultado){
            $mjs_cambio = "Cambio correcto";
            $icon="success";
            header('Location:index.php?c=Usuario&a=perfil_user&user_asesor='.$_SESSION['id']);
        }
        }
        $_SESSION['m_incorrecto'] = $mjs_cambio;
        $_SESSION['m_icon'] =$icon;
        header('Location:index.php?c=Usuario&a=perfil_user&user_asesor='.$_SESSION['id']);
    
      }


    public function Usuario_Editar(){

        $this->user = $_GET['asesor_edit'];  

        $asesor_edit = $this->model->search($this->user);

        $modeloRol = new ConsultaSelecctModel();
        $SelectRol = $modeloRol->ConsultarRol(); 
     
       require_once 'views/Usuario/UsuarioEdit.php'; 

    }

    public function EditarUsuario(){
    
        $asesor= new Usuario(); // llamar a las entidades de la clase usuarios

        // lectura de parametros
        $asesor->setId_usuario(htmlentities($_POST['id']));
        $asesor->setNombre(htmlspecialchars($_POST['nomnbre_personal']));
        $asesor->setCedula(htmlentities($_POST['nCedula']));
        $asesor->setCorreo(htmlentities($_POST['correo']));
        $asesor->setRol(htmlentities($_POST['rol']));
        $asesor->setUsuario_password(htmlspecialchars($_POST['password']));
    
      //llamar al modelo
      $exito = $this->model->Update_usuario($asesor);
      $msj = 'Se ha actualizado correctamente ';
      $alert = "success";
      if (!$exito) {
        
          $msj = "No se pudo realizar la actualización";
          $alert = "error";
      }
    
      if (!isset($_SESSION)) {
          session_start();
      };
      $_SESSION['m_asesor_editar'] = $msj;
    
      $_SESSION['m_icon_asesor_e'] = $alert;
    
        //llamar a la vista
        header('Location:index.php?c=Usuario&a=Listado_usuarios'); 
       /* var_dump($userModel); */
                  
        
       
        }

    public function Delete_usuario(){
   
        // Obtener el ID del registro a eliminar desde la solicitud AJAX
        $id = $_GET['id'];
    
        // Eliminar el registro de la base de datos
        $resultado = $this->model->Eliminar_usuario($id);
    
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

