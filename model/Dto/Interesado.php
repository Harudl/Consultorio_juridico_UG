<?php

class Interesado
{
    //properties
    private $id_info_interesado, $fechaCre, $nombresA, $cedula, $provincia, $ciudad, $fechaN, 
	$edad, $telefono, $correo, $nacionalidad, $etnia, $domicilio, $info_genero, $num_ingreso, 
	$iess, $bono, $discapacidad, $zonaV, $tema, $derivado_por, $estado_causa, $seguimiento, 
	$observacion, $ingreso_ocupacion, $info_materia, $info_estado_civil, $info_instrucion,
	$info_tipo_user;

    function __construct()
    {

    }
	 
	public function getId_info_interesado() {
		return $this->id_info_interesado;
	}
	
	public function setId_info_interesado($id_info_interesado): self {
		$this->id_info_interesado = $id_info_interesado;
		return $this;
	}


	public function getFechaCre() {
		return $this->fechaCre;
	}
	
	public function setFechaCre($fechaCre): self {
		$this->fechaCre = $fechaCre;
		return $this;
	}

	public function getNombresA() {
		return $this->nombresA;
	}

	public function setNombres($nombres): self {
		$this->nombresA = $nombres;
		return $this;
	}
	
	
	public function getCedula() {
		return $this->cedula;
	}
	
	
	public function setCedula($cedula): self {
		$this->cedula = $cedula;
		return $this;
	}


	public function getProvincia() {
		return $this->provincia;
	}
	
	
	public function setProvincia($provincia): self {
		$this->provincia = $provincia;
		return $this;
	}

	public function getCiudad() {
		return $this->ciudad;
	}
	
	
	public function setCiudad($ciudad): self {
		$this->ciudad = $ciudad;
		return $this;
	}


	
	
	public function getTelefono() {
		return $this->telefono;
	}
	

	public function setTelefono($telefono): self {
		$this->telefono = $telefono;
		return $this;
	}
	

	public function getCorreo() {
		return $this->correo;
	}
	

	public function setCorreo($correo): self {
		$this->correo = $correo;
		return $this;
	}
	

	public function getNacionalidad() {
		return $this->nacionalidad;
	}
	

	public function setNacionalidad($nacionalidad): self {
		$this->nacionalidad = $nacionalidad;
		return $this;
	}
	
	public function getEtnia() {
		return $this->etnia;
	}
	

	public function setEtnia($etnia): self {
		$this->etnia = $etnia;
		return $this;
	}
	

	public function getDomicilio() {
		return $this->domicilio;
	}
	
	public function setDomicilio($domicilio): self {
		$this->domicilio = $domicilio;
		return $this;
	}
	
	public function getInfo_genero() {
		return $this->info_genero;
	}
	

	public function setInfo_genero($info_genero): self {
		$this->info_genero = $info_genero;
		return $this;
	}
	
	
	public function getNum_ingreso() {
		return $this->num_ingreso;
	}
	
	
	public function setNum_ingreso($num_ingreso): self {
		$this->num_ingreso = $num_ingreso;
		return $this;
	}

	
	
	public function getIess() {
		return $this->iess;
	}
	

	public function setIess($iess): self {
		$this->iess = $iess;
		return $this;
	}
	
	
	public function getBono() {
		return $this->bono;
	}
	

	public function setBono($bono): self {
		$this->bono = $bono;
		return $this;
	}
	

	public function getDiscapacidad() {
		return $this->discapacidad;
	}
	

	public function setDiscapacidad($discapacidad): self {
		$this->discapacidad = $discapacidad;
		return $this;
	}
	
	
	public function getZonaV() {
		return $this->zonaV;
	}
	

	public function setZonaV($zonaV): self {
		$this->zonaV = $zonaV;
		return $this;
	}
	
	
	public function getResumenC() {
		return $this->resumenC;
	}
	

	public function setResumenC($resumenC): self {
		$this->resumenC = $resumenC;
		return $this;
	}
	

	public function getResolucionC() {
		return $this->resolucionC;
	}
	
	
	public function setResolucionC($resolucionC): self {
		$this->resolucionC = $resolucionC;
		return $this;
	}

	public function getFechaN() {
		return $this->fechaN;
	}
	

	public function setFechaN($fechaN): self {
		$this->fechaN = $fechaN;
		return $this;
	}
	
	public function getEdad() {
		return $this->edad;
	}
	
	public function setEdad($edad): self {
		$this->edad = $edad;
		return $this;
	}
	public function getTema() {
		return $this->tema;
	}
	
	public function setTema($tema): self {
		$this->tema = $tema;
		return $this;
	}

	public function getDerivado_por() {
		return $this->derivado_por;
	}
	
	public function setDerivado_por($derivado_por): self {
		$this->derivado_por = $derivado_por;
		return $this;
	}

	public function getEstado_causa() {
		return $this->estado_causa;
	}
	
	public function setEstado_causa($estado_causa): self {
		$this->estado_causa = $estado_causa;
		return $this;
	}

	public function getSeguimiento() {
		return $this->seguimiento;
	}
	
	public function setSeguimiento($seguimiento): self {
		$this->seguimiento = $seguimiento;
		return $this;
	}

	public function getObservacion() {
		return $this->observacion;
	}
	
	public function setObservacion($observacion): self {
		$this->observacion = $observacion;
		return $this;
	}

	/* public function getUsuarios_personas() {
		return $this->usuarios_personas;
	}
	
	public function setUsuarios_personas($usuarios_personas): self {
		$this->usuarios_personas = $usuarios_personas;
		return $this;
	} */

	public function getIngreso_ocupacion() {
		return $this->ingreso_ocupacion;
	}
	
	public function setIngreso_ocupacion($ingreso_ocupacion): self {
		$this->ingreso_ocupacion = $ingreso_ocupacion;
		return $this;
	}

	public function getInfo_materia() {
		return $this->info_materia;
	}
	
	public function setInfo_materia($info_materia): self {
		$this->info_materia = $info_materia;
		return $this;
	}

	public function getInfo_estado_civil() {
		return $this->info_estado_civil;
	}
	
	public function setInfo_estado_civil($info_estado_civil): self {
		$this->info_estado_civil = $info_estado_civil;
		return $this;
	}

	public function getInfo_instruccion() {
		return $this->info_instrucion;
	}
	
	public function setInfo_instruccion($info_instrucion): self {
		$this->info_instrucion = $info_instrucion;
		return $this;
	}

	public function getInfo_tipo_user() {
		return $this->info_tipo_user;
	}
	
	public function setInfo_tipo_user($info_tipo_user): self {
		$this->info_tipo_user = $info_tipo_user;
		return $this;
	}




	
}