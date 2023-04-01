<?php

require_once 'config/Conexion.php';

class InteresadoModel
{

    private $con;

    public function __construct()
    { //cosntructor
        $this->con = Conexion::getConexion(); //operador :: llamando a un metodo estatico
    }


    public function get_interesado(){

        $sql = "SELECT id_info_interesado, cedula, nombresA, correo, telefono, fk_interesado
        FROM info_interesado
        JOIN interesado ON info_interesado.fk_interesado = interesado.id_interesado
        JOIN etnia ON info_interesado.inf_etnia = etnia.id_etnia
        JOIN genero ON info_interesado.info_genero = genero.id_genero
        JOIN ocupacion ON info_interesado.inf_ocupacion = ocupacion.id_ocupacion
        JOIN estado_civil ON info_interesado.info_estado_civil = estado_civil.id_estado_civil
        JOIN instruccion ON info_interesado.info_instruccion = instruccion.id_instruccion
        WHERE info_interesado.estado='A'";
        
                // preparar la sentencia
                $stmt = $this->con->prepare($sql);
                // ejecutar la sentencia
                $stmt->execute();
                //recuperar  resultados
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //retornar resultados
                return $resultado;
            } 
    

    //Muestra los datos en asesorias
    public function ListarUser(){

        $sql = "SELECT nombresA, cedula FROM info_interesado, interesado";   

        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        // ejecutar la sentencia
        $stmt->execute();
        //recuperar  resultados
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultado;
    } 
 



    //Funcion de insertar la tabla usuario 
    public function insertar($userModel){
 
        try{

            $sql = "INSERT INTO `interesado` (`id_interesado`, `nombresA`, `cedula`, `fechaN`,`estado`) 
            VALUES (NULL,:nom,:ced,:fN,'A')"; 
    
            $sentencia = $this->con->prepare($sql);
            $data = [ 
                        'nom' =>  $userModel->getNombresA(),
                        'ced' =>  $userModel->getCedula(),
                        'fN' =>   $userModel->getFechaN()
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


    public function insertarAdicional($userModel, $id){
        try{
        
            $sql = "INSERT INTO `info_interesado` (`fk_interesado`,`provincia`,`ciudad`,`domicilio`,`edad`,
                    `telefono`,`correo`,`nacionalidad`,`inf_etnia`,`info_genero`,`info_estado_civil`,
                    `info_instruccion`,`num_ingreso`,`iess`,`bono`,`discapacidad`,`zonaV`,`inf_ocupacion`) 
                   VALUES (:id,:prov,:ciud,:domi,:eda,:tel,:corr, :nacio, :etn,:gen,:estad,:instr, :num, :ies, 
                   :bon, :dis, :zon, :ing_ocu)"; 

            $sentencia = $this->con->prepare($sql);
            $data = [
            ':id' => $id,
             'prov' =>   $userModel->getProvincia(),
             'ciud' =>   $userModel->getCiudad(),
             'domi' =>   $userModel->getDomicilio(),
             'eda' =>   $userModel->getEdad(),
             'tel' =>   $userModel->getTelefono(),
             'corr' =>   $userModel->getCorreo(),
             'nacio' =>   $userModel->getNacionalidad(),
             'etn' =>   $userModel->getEtnia(),
             'gen' =>   $userModel->getInfo_genero(),
             'estad' =>   $userModel->getInfo_estado_civil(),
             'instr' =>   $userModel->getInfo_instruccion(),
             'num' =>   $userModel->getNum_ingreso(),
             'ies' =>   $userModel->getIess(),
             'bon' =>   $userModel->getBono(),
             'dis' =>   $userModel->getDiscapacidad(),
             'zon' =>   $userModel->getZonaV(),
             'ing_ocu' =>   $userModel->getIngreso_ocupacion()
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


    //Funcion para extraer la id de la tabla usuario con la cedula
    public function recuperarID($ced){
        $sql = "SELECT id_interesado from interesado where "."cedula =:ced"; 
      /*$sql = "select * from Producto where "."id_producto =:id";*/       
        $stmt = $this->con->prepare($sql);
        $data = [':ced' => $ced];
        // ejecutar la sentencia
        $stmt->execute($data);
        //recuperar  resultados
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);
        //retornar resultados
        return $resultado->id_interesado;
    }

//Funcion para extraer la tabla usuario por su id
    public function selectOne($id) {

        $sql = "SELECT *
        FROM info_interesado
        INNER JOIN interesado ON id_info_interesado = id_interesado
        INNER JOIN genero ON info_genero = id_genero
        INNER JOIN estado_civil ON info_estado_civil = id_estado_civil
        INNER JOIN instruccion ON info_instruccion = id_instruccion
        INNER JOIN ocupacion ON inf_ocupacion = id_ocupacion
        INNER JOIN etnia ON inf_etnia = id_etnia
        WHERE id_interesado = :id";

        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        /* $user = $stmt->fetchAll(PDO::FETCH_ASSOC); */// fetch retorna el primer registro
        // retornar resultados
         return $user;  
        }

    public function user_asesoria($id){

  $sql ="SELECT * FROM asesoria 
  INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado
  INNER JOIN materia ON materia.id_materia= asesoria.fk_materia 

  INNER JOIN etnia ON etnia.id_etnia= info_interesado.inf_etnia  
  INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_id_usuario  
  INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario= asesoria.fk_tipo_user where fk_info_interesado=:id";


 
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        //recuperar  resultados
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $res;

    }


    public function update($userModel){

    try{

    $sql = "UPDATE info_interesado i
    JOIN interesado u On i.fk_interesado = u.id_interesado
    SET u.nombresA=:nom, u.fechaCre=:fech ,u.cedula=:ced, u.fechaN=:fechN,
    i.provincia=:pro,i.ciudad=:ciu, i.domicilio=:dom, i.edad=:ed, i.telefono=:tel, i.correo=:cor,
    i.nacionalidad=:nac, i.inf_etnia=:et, i.num_ingreso=:nu_i, i.iess=:ie, i.bono=:bon, i.discapacidad=:dis, 
    i.zonaV=:zon, i.info_genero=:gen, i.info_estado_civil=:estado, i.info_instruccion=:inst, i.inf_ocupacion=:ocu 
    where id_info_interesado =:id";
           //bind parameters
    $sentencia = $this->con->prepare($sql);
    $data = [
               /*  'id_user' =>   $userModel->getId_usuario(),  */
               'id' =>   $userModel->getId_info_interesado(),
                'nom' =>  $userModel->getNombresA(),
                'fech' =>  $userModel->getFechaCre(),
                'ced' =>  $userModel->getCedula(),
                'fechN' =>  $userModel->getFechaN(),

                 
                'pro' =>   $userModel-> getProvincia(),
                'ciu' =>   $userModel-> getCiudad(),
                'dom' =>  $userModel->getDomicilio(),
                'ed' =>  $userModel->getEdad(),
                'tel' =>  $userModel->getTelefono(),
                'cor' =>  $userModel->getCorreo(),
                'nac' =>  $userModel->getNacionalidad(),
                'et' =>  $userModel->getEtnia(),
                'nu_i' =>  $userModel->getNum_ingreso(),
                'ie' =>  $userModel->getIess(),
                'bon' =>  $userModel->getBono(),
                'dis' =>  $userModel->getDiscapacidad(),
                'zon' =>  $userModel->getZonaV(),
                'gen' =>  $userModel->getInfo_genero(),
                'estado' =>  $userModel->getInfo_estado_civil(),
                'inst' =>  $userModel->getInfo_instruccion(),
                'ocu' =>  $userModel->getIngreso_ocupacion()        
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




    public function Eliminar_interesado($id){
   
        /*  $sql = "UPDATE info_interesado, interesado SET estado='D'  WHERE `id_info_interesado` = :id AND 'id_interesado";  */
        $sql = "UPDATE info_interesado
        JOIN interesado
        ON info_interesado.fk_interesado = interesado.id_interesado
        SET info_interesado.estado = 'D', interesado.estado = 'D'
        WHERE info_interesado.id_info_interesado = :id;
        ";
      /*  $sql="DELETE FROM info_interesado WHERE id_info_interesado = :id"; */

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

    


        

 
 }