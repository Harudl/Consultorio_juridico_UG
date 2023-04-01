<?php
    session_start();
require_once 'model/Dto/Chatbot.php';
require_once 'model/ChatbotModel.php';

class ChatbotController
{
    private $model;
    public function __construct()

    {
     $this->model = new ChatbotModel(); 
    }

    public function mostrar_tabla()
    {
        require_once 'views/Chatbot/ChatbotLista.php';
    }


    public function Lista_pregunta()
    {
        $datos=$this->model->preguntas_chatbot();
        $data= Array();
        $contador = 0;
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $contador = $contador+1;
            $sub_array[] = $row["preguntas"];
            $sub_array[] = $row["respuestas"];
           $sub_array[] = '<a class="bn3637 bn41" href="index.php?c=Chatbot&a=Mostrar_Editar&editar='.$row['id_chatbot'].'"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="ri-pencil-fill ri-lg"></i></a>
            <a  class="bn3637 bn39 eliminar" href="index.php?c=Chatbot&a=Delete&id='.$row['id_chatbot'].'" data-id="'.$row['id_chatbot'].'"
             data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Asesor"><i class="ri-delete-bin-6-fill ri-lg"></i></a>';
                 
            $data[]=$sub_array;
        }
    
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo $json = json_encode($results);
    }

    public function Mostrar_Nuevo()
    {
        require_once 'views/Chatbot/ChatbotNuevo.php';
    }

    public function crear_nuevo()
    {
        $chatbot = new Chatbot(); 
        $chatbot->setPreguntas(htmlspecialchars($_POST['Pregunta'] ));
        $chatbot->setRespuestas(htmlspecialchars($_POST['Respuesta'])); 

        $exito = $this->model->nuevo($chatbot);
        $msj = 'Guardado exitosamente';
        $color = 'success';
        if (!$exito) {
          
            $msj = "No se pudo realizar el guardado";
            $color = "danger";
        }

        if (!isset($_SESSION)) {
            session_start();
        };
        $_SESSION['m_crear_chatbot'] = $msj;
        $_SESSION['m_icon_chatbot'] =$color;
   
        //llamar a la vista  
        header('Location:index.php?c=Chatbot&a=mostrar_tabla'); 
       /*  require_once 'views/Chatbot/ChatbotLista.php'; */
    }


    public function Mostrar_Editar(){

        $this->user = $_GET['editar'];  

        $editar = $this->model->consultar($this->user);
     
       require_once 'views/Chatbot/ChatbotEditar.php'; 

    }


    public function Editar_preguntas(){
    
        $chatbot = new Chatbot(); 
        $chatbot->setId_chatbot(htmlentities($_POST['id'] ));
        $chatbot->setPreguntas(htmlspecialchars($_POST['Pregunta'] ));
        $chatbot->setRespuestas(htmlspecialchars($_POST['Respuesta'])); 

        $exito = $this->model->update($chatbot);
        $msj = 'Guardado exitosamente';
        $color = 'success';
      if (!$exito) {
        
          $msj = "No se pudo realizar la actualización";
          $color = "error";
      }
    
      if (!isset($_SESSION)) {
          session_start();
      };
      $_SESSION['m_editar_chatbot'] = $msj;
    
      $_SESSION['m_icon_chatbot_editar'] = $color;
    
        //llamar a la vista
        header('Location:index.php?c=Chatbot&a=mostrar_tabla'); 
       /* var_dump($userModel); */  
    }

    public function Delete(){

        // Obtener el ID del registro a eliminar desde la solicitud AJAX
        $id = $_GET['id'];
         
        // Eliminar el registro de la base de datos
        $resultado = $this->model->Eliminar($id);
         
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

    public function Interaccion_usuarios() {
        $userQuery = $_POST['userQuery']; // Obtiene los datos del usuario desde la solicitud POST
        $responder = $this->model->Responder_u($userQuery);
        $pre = $this->model->Lista_p();

        if ($responder != NULL) {
             // Si la respuesta no es nula, devolverla al cliente
            echo $responder;
        } else {
            // Si la respuesta es nula, devolver un mensaje de error al cliente
             echo "Lo siento, no puedo responder esa pregunta en este momento."; 
            /* echo "Hola me podrías ayudar? Tengo una consulta" */
/*      foreach ($pre as $p) { 
      echo $p['preguntas'].'<br>'; 
     } */
    }
}



public function obtenerPreguntas() {
    $preguntas = $this->model->obtenerPreguntas();
    echo json_encode($preguntas);
  }


  public function obtenerRespuesta() {
    $idChatbot = $_POST['id_chatbot'];
    $respuesta = $this->model->obtenerRespuesta($idChatbot);
    $pregunta = $this->model->obtenerPregunta($idChatbot);
    echo json_encode(array('pregunta' => $pregunta,'respuesta' => $respuesta));
  }


public function consulta_interesados() {
    if (isset($_POST['consulta'])) {
        $con = $_POST['consulta'];
        $consulta = $this->model->consulta_interesado_bd($con);
        if ($consulta != NULL) {
        
           $response = array(
                "nombresA" => $consulta['nombresA'],
                "edad" => $consulta['edad'],
                "telefono" => $consulta['telefono'],
                "correo" => $consulta['correo'],
                "estado_civil_nom" => $consulta['estado_civil_nom'],
                "ocupacion_nombre" => $consulta['ocupacion_nombre'],
                "instrucion_nom" => $consulta['instrucion_nom'],
                "iess" => $consulta['iess'],
                "bono" => $consulta['bono'],
                "discapacidad" => $consulta['discapacidad'],
                "zonaV" => $consulta['zonaV'],
                "ciudad" => $consulta['ciudad']
            ); 
            echo json_encode($response);
        } else {
            echo "Lo siento, El interesado no existe en los registros de la base de datos. Por favor, vuelva seleccionar una consulta"; 
        }
    } else {
        echo "Lo siento."; 
    }
}

public function consulta_asesorias() {
    if (isset($_POST['consulta'])) {
        $con = $_POST['consulta'];
        $consulta = $this->model->consulta_asesoria_bd($con);
        if ($consulta != NULL) {
        
           $response = array(
                "nombresA" => $consulta['nombresA'],
                "fecha_asesoria" => $consulta['fecha_asesoria'],
                "hora" => $consulta['hora'],
                "tema" => $consulta['tema'],
                "materia_nombre" => $consulta['materia_nombre'],
                "tipo_usuario_nom" => $consulta['tipo_usuario_nom'],
                "nombre" => $consulta['nombre'],
                "observacion" => $consulta['observacion'],

            ); 
            echo json_encode($response);
        } else {
            echo "Lo siento, no existe asesoría en los registros de la base de datos. Por favor, vuelva seleccionar una consulta."; 
        }
    } else {
        echo "Lo siento."; 
    }


}

public function consulta_patrocinios() {
    // Llamar a la función en el modelo para obtener los patrocinios
    if (isset($_POST['consulta'])) {
        $con = $_POST['consulta'];
        $consulta = $this->model->consulta_patrocinio_bd($con);
        if ($consulta != NULL) {
        
           $response = array(
                "nombresA" => $consulta['nombresA'],
                "Fecha_patrocinio" => $consulta['Fecha_patrocinio'],
                "estado_nombre" => $consulta['estado_nombre'],
                "tema" => $consulta['tema'],
                "tipo_judicatura" => $consulta['tipo_judicatura'],
                "unidad_judicial" => $consulta['unidad_judicial'],
                "nombre_juez" => $consulta['nombre_juez'],
                "num_causa" => $consulta['num_causa'],
                "tipo_usuario_nom" => $consulta['tipo_usuario_nom'],
                "nombre" => $consulta['nombre'],
                "resumen" => $consulta['resumen']

            ); 
            echo json_encode($response);
        } else {
            echo "Lo siento, no existe patrocinaio registrado. Por favor, vuelva seleccionar una consulta"; 
        }
    } else {
        echo "Lo siento."; 
    }

}

    
}