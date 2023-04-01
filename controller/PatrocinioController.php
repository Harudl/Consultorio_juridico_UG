<?php

    session_start();
    require_once 'model/ConsultaSelectModel.php';
     require_once 'model/Dto/Patrocinio.php';
     require_once 'model/PatrocinioModel.php';
     require_once 'model/Dto/Asesoria.php';
 
class patrocinioController
{
    private $model;
    public $patro;

     public function __construct()
    {
         $this->model = new PatrocinioModel(); 
         $this->patro='';

    } 

    public function mostrarPatrocinio()
    {
      /* $resultado = $this->model->Listar();  */
        require_once 'views/Patrocinio/Patrocinio.php';
    }

    public function Lista()
    {
        $datos=$this->model->get_patrocinio();
        $data= Array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["tema"];
            $sub_array[] = $row["materia_nombre"];
            $sub_array[] = $row["cedula"];
            $sub_array[] = $row["nombresA"];

            if($_SESSION['rol_id']==1) {
              $sub_array[] = $row["nombre"];
             }

            if($row['estado_nombre']=='Activo'){
             $sub_array[]='<span class="badge bg-success">'.$row['estado_nombre'].'</span> ';
            }else if($row['estado_nombre']=='Pasivo'){
               $sub_array[] ='<span class="badge bg-secondary">'.$row['estado_nombre'].'</span>';
            } else if($row['estado_nombre']=='Finalizado'){ 
                $sub_array[] = '<span class="badge bg-danger">'.$row['estado_nombre'].'</span>';
            } 
          
              $archivo = $row['expediente']; 
             if (!empty($archivo) || file_exists($archivo) || !is_dir($archivo)) {
                /*  if (!is_dir($archivo)) { */
                     $sub_array[] = "<a class='bn3637 bn42' data-bs-toggle='modal' data-bs-target='#exampleModal".$row['id_patrocinio']."' href='$archivo'data-parent='#modalDataTable'> 
                                     <i class='ri-folder-open-fill ri-xl'></i>&nbsp;Abrir<a/>
                                     <div class='modal fade' id='exampleModal".$row['id_patrocinio']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' data-parent='#modalDataTable' >
                                         <div class='modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable' style='max-witdh:90% !important; role='document '>
                                             <div class='modal-content'>
                                                 <div class='modal-header'>
                                                     <h5 class='modal-title fw-bold' id='exampleModalLabel'>Expediente Adjunto</h5>
                                                     <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                 </div>
                                                 <div class='modal-body'>
                                                     <embed src='$archivo'  width='100%' height='600px' zoom='100'>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>"; 
                /*  } */
               } 

              
             
            $sub_array[] = '<a class="bn3637 bn41" 
            href="index.php?c=patrocinio&a=P_editar&patro_edit='.$row['id_patrocinio'].'&patro='.$row['id_asesoria'].'"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
            <i class="ri-file-edit-fill ri-lg"></i>&nbsp;Editar</a>

            <a class="bn3637 bn44" href="index.php?c=patrocinio&a=patrocinioView&patro='.$row['id_patrocinio'].'"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Ver datos"><i class="ri-file-search-fill ri-lg"></i>&nbsp;Ver</a>';
            
            if($_SESSION['rol_id']==1) {
            $sub_array[] = '<a class="bn3637 bn39 eliminar" 
            href="index.php?c=Patrocinio&a=Patrocinio_Delete&id='.$row['id_patrocinio'].'&id_a='.$row['id_asesoria'].'" data-id="'.$row['id_patrocinio'].'"
            data-bs-toggle="tooltip" data-bs-placement="top" 
            title="Eliminar Patrocinio">
                <i class="ri-delete-bin-6-fill ri-lg"></i>&nbsp;Borrar
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






    public function agregarPatrocinio()
    {

        $this->patro=$_GET['patro'];

        $res = $this->model->user_asesoria($this->patro); 

       $modeloEstado = new ConsultaSelecctModel();
       $estaP = $modeloEstado->EstadoPatrocinio();
 
       require_once 'views/Patrocinio/PatrocinioNuevo.php';
  
      

    }

    public function patrocinioView(){

        $this->user = $_GET['patro'];
        
       $user_patrocinio = $this->model->selectOne($this->user); 
       $resultado = $this->model->user_patrocinio($this->user); 
    
         require_once 'views/Patrocinio/PatrocinioView.php'; 
    }



    public function nuevo_patrocinio() {
  
        $patroM = new Patrocinio(); // llamar a las entidades de la clase 
        $asesoria = new Asesoria(); 
        // lectura de parametros
      

        $asesoria->setId_asesoria(htmlentities($_POST['id'] ));
        $patroM->setFk_personal_a(htmlentities($_SESSION['id'])); 
        $patroM->setPatrocinio_asesoria(htmlentities($_POST['id']));
        $patroM->setPatrocinio_estado(htmlentities($_POST['estadoP']));
        $patroM->setTipo_judicatura(htmlspecialchars($_POST['tipoJudicatura']));
        $patroM->setUnidad_judicial(htmlspecialchars($_POST['unidadJ']));
        $patroM->setNombre_juez(htmlspecialchars($_POST['nomJuez']));
        $patroM->setNum_causa(htmlspecialchars($_POST['noCausa']));
        $patroM->setSentencia(htmlspecialchars($_POST['sentencia']));
        $patroM->setFecha_sentencia(htmlentities($_POST['fechaS']));
        $patroM->setResumen(htmlspecialchars($_POST['resumen']));
        $patroM->setId_patrocinio(htmlentities($_POST['id']));  
        $asesoria->setPatrocinado(htmlentities($_POST['id_p']));
       
        $cod= $_POST['id'];
        $ruta = "assets/Doc_expediente/" .$cod. "/";  
        $ruta_final= $ruta."Expediente.pdf";
        if(!file_exists($ruta)){
          mkdir($ruta,0777);
        }
        if(move_uploaded_file($_FILES['file-input']['tmp_name'], $ruta."Expediente.pdf")){ 
          $patroM->setExpediente($ruta_final);
        }

      /*   var_dump($patroM); */
        //llamar al modelo
      /*   $exito = $this->model->insertar($patroM); */
        $msj = 'Guardado exitosamente';
        

//llamar al modelo
$exito = $this->model->insertar($patroM);
$msj = 'Guardado exitosamente';
          if (!$exito) {
            
              $msj = "No se pudo realizar el guardado";
            
          }
          else {
            $exito = $this->model->insertar_P($asesoria);
          }

          $_SESSION['m_crear_patrocinio'] = $msj;
        
   /* var_dump($exito); */
          //llamar a la vista  
          header('Location:index.php?c=Patrocinio&a=mostrarPatrocinio');     

 
        } 


    public function P_editar(){
      
        $this->user_a = $_GET['patro'];



        $this->user = $_GET['patro_edit'];  

        /* Traer el nombre del usuario, materia y tema de la asesoria */
        $res = $this->model->user_asesoria($this->user_a); 
    
        $patrocinio_edit = $this->model->selectOne( $this->user);
    
         //comunicarse con el modelo
         $modeloEstado = new ConsultaSelecctModel();
         $estaP = $modeloEstado->EstadoPatrocinio();
   
    
         require_once 'views/Patrocinio/PatrocinioEditar.php';

        }


    
        public function modificar(){
    
          $patroM = new Patrocinio(); // llamar a las entidades de la clase patrocinio

          $asesoria = new Asesoria(); 
            // lectura de parametros

               $asesoria->setId_asesoria(htmlentities($_POST['patro'] ));

            
                    $patroM->setId_patrocinio(htmlentities($_POST['id']));  
                     $patroM->setPatrocinio_estado(htmlentities($_POST['estadoP']));
                     $patroM->setPatrocinio_asesoria(htmlentities($_POST['patro'])); 
                     $patroM->setTipo_judicatura(htmlspecialchars($_POST['tipoJudicatura']));
                     $patroM->setUnidad_judicial(htmlspecialchars($_POST['unidadJ']));
                     $patroM->setNombre_juez(htmlspecialchars($_POST['nomJuez']));
                     $patroM->setNum_causa(htmlspecialchars($_POST['noCausa']));        
                     $patroM->setSentencia(htmlspecialchars($_POST['sentencia']));
                     $patroM->setFecha_sentencia(htmlentities($_POST['fechaS']));
                     $patroM->setResumen(htmlspecialchars($_POST['resumen']));


$cod = $_POST['patro'];
$ruta = "assets/Doc_expediente/" .$cod. "/";  
$ruta_final= $ruta."Expediente.pdf";

/* if(!file_exists($ruta)){
  mkdir($ruta,0777,true);
}

  if(file_exists($_FILES['file-input']['tmp_name'])){
 
  if(move_uploaded_file($_FILES['file-input']['tmp_name'], $ruta."Expediente.pdf")){ 
    $patroM->setExpediente($ruta_final);
   }
}
 */

 if(!file_exists($ruta)){
  mkdir($ruta,0777,true);
}

if(file_exists($_FILES['file-input']['tmp_name'])){
  if(move_uploaded_file($_FILES['file-input']['tmp_name'], $ruta_final)){ 
    $patroM->setExpediente($ruta_final);
  }
} elseif (file_exists($ruta_final)) {
  $patroM->setExpediente($ruta_final);
}
          //llamar al modelo
          $exito = $this->model->update($patroM);
          $msj = 'Actualización exitosamente';
          $m_i = 'success';
          
          if (!$exito) {
            
              $msj = "No se pudo realizar la actualización";
              $m_i = "error";
          }
        
          if (!isset($_SESSION)) {
              session_start();
          };

          $_SESSION['m_update_patrocinio'] = $msj;
          $_SESSION['m_icon_patrocinio']  = $m_i;
            //llamar a la vista
             header('Location:index.php?c=patrocinio&a=mostrarPatrocinio'); 
           /* var_dump($userModel); */
                      
               
           
           
            }
    
            
  /*   public function Patrocinio_Delete(){
      //leeer parametros
      $id= $_REQUEST['id'];
      $id_a=$_REQUEST['id_a'];
            //comunicando con el modelo
        $exito = $this->model->Eliminar_patrocinio($id);
        $exito = $this->model->actualizar_campo_p($id_a);
       
               if (!$exito) {
                   $msj = "No se pudo eliminar"; 
               }
                if(!isset($_SESSION)){ session_start();};
               $_SESSION['m_delete_patrocinio'] = "Se ha Eliminado correctamente";
              
          header('Location:index.php?c=Patrocinio&a=mostrarPatrocinio');
  } 
 */
public function Patrocinio_Delete(){
    $id = $_GET['id'];
    
    // Eliminar el registro de la base de datos
    $resultado = $this->model->Eliminar_patrocinio($id);

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