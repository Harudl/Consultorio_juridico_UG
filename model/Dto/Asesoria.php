<?php

class Asesoria
{
    //properties
    private $id_asesoria, $patrocinado, $fk_id_usuario, $fk_usuario, $tema, $derivado, 
	$observacion,$estado_causa,$seguimiento, $info_tipo_usertipo, $info_materia,
	$resumen_consulta, $resolucion_consulta;


    function __construct()
    {

    }

	public function getFecha_A() {
		return $this->fecha_A;
	}
	
	public function setFecha_A($fecha_A): self {
		$this->fecha_A = $fecha_A;
		return $this;
	}

	public function getHora() {
		return $this->hora;
	}
	
	public function setHora($hora): self {
		$this->hora = $hora;
		return $this;
	}

	public function getFk_id_usuario() {
		return $this->fk_id_usuario;
	}
	
	public function setFk_id_usuario($fk_id_usuario): self {
		$this->fk_id_usuario = $fk_id_usuario;
		return $this;
	}

	public function getPatrocinado() {
		return $this->patrocinado;
	}
	
	public function setPatrocinado($patrocinado): self {
		$this->patrocinado = $patrocinado;
		return $this;
	}



	public function getId_asesoria() {
		return $this->id_asesoria;
	}
	
	public function setId_asesoria($id_asesoria): self {
		$this->id_asesoria = $id_asesoria;
		return $this;
	}


    public function getFk_interesado() {
		return $this->fk_interesado;
	}
	
	public function setFk_interesado($fk_interesado): self {
		$this->fk_interesado = $fk_interesado;
		return $this;
	}
    public function getTema() {
		return $this->tema;
	}
	
	public function setTema($tema): self {
		$this->tema = $tema;
		return $this;
	}

	public function getDerivado() {
		return $this->derivado;
	}
	
	public function setDerivado($derivado): self {
		$this->derivado = $derivado;
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

    
	public function getInfo_materia() {
		return $this->info_materia;
	}
	
	public function setInfo_materia($info_materia): self {
		$this->info_materia = $info_materia;
		return $this;
	}

    public function getInfo_tipo_user() {
		return $this->info_tipo_user;
	}
	
	public function setInfo_tipo_user($info_tipo_user): self {
		$this->info_tipo_user = $info_tipo_user;
		return $this;
	}
	public function getResumen_consulta() {
		return $this->resumen_consulta;
	}
	
	public function setResumen_consulta($resumen_consulta): self {
		$this->resumen_consulta = $resumen_consulta;
		return $this;
	}
	public function getResolucion_consulta() {
		return $this->resolucion_consulta;
	}
	
	public function setResolucion_consulta($resolucion_consulta): self {
		$this->resolucion_consulta = $resolucion_consulta;
		return $this;
	}
}