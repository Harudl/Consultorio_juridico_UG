<?php

class Patrocinio
{
    //properties
    private $id_patrocinio, $fk_personal_a, $patrocinio_tipo, $patrocinio_estado, $patrocinio_asesoria, $tipo_judicatura, $unidad_judicial, 
    $nombre_juez, $num_causa, $actividad, $fecha_actividad, $sentencia, $fecha_sentencia, $resumen, 
    $expediente, $satje, $patricinio_reporte,
	$fecha_inicio, $fecha_final;


    function __construct()
    {

    }


    public function getFecha_inico() {
		return $this->fecha_inicio;
	}
	
	public function setFecha_inicio($fecha_inicio): self {
		$this->fecha_inicio = $fecha_inicio;
		return $this;
	}

	
    public function getFecha_final() {
		return $this->fecha_final;
	}
	
	public function setFecha_final($fecha_final): self {
		$this->fecha_final = $fecha_final;
		return $this;
	}




	
    public function getFk_personal_a() {
		return $this->fk_personal_a;
	}
	
	public function setFk_personal_a($fk_personal_a): self {
		$this->fk_personal_a = $fk_personal_a;
		return $this;
	}

    public function getId_patrocinio() {
		return $this->id_patrocinio;
	}
	
	public function setId_patrocinio($id_patrocinio): self {
		$this->id_patrocinio = $id_patrocinio;
		return $this;
	}

    public function getPatrocinio_tipo() {
		return $this->patrocinio_tipo;
	}
	
	public function setPatrocinio_tipo($patrocinio_tipo): self {
		$this->patrocinio_tipo = $patrocinio_tipo;
		return $this;
	}
    public function getPatrocinio_estado() {
		return $this->patrocinio_estado;
	}
	
	public function setPatrocinio_estado($patrocinio_estado): self {
		$this->patrocinio_estado = $patrocinio_estado;
		return $this;
	}
    public function getPatrocinio_asesoria() {
		return $this->patrocinio_asesoria;
	}
	
	public function setPatrocinio_asesoria($patrocinio_asesoria): self {
		$this->patrocinio_asesoria = $patrocinio_asesoria;
		return $this;
	}
    public function getTipo_judicatura() {
		return $this->tipo_judicatura;
	}
	
	public function setTipo_judicatura($tipo_judicatura): self {
		$this->tipo_judicatura = $tipo_judicatura;
		return $this;
	}
    public function getUnidad_judicial() {
		return $this->unidad_judicial;
	}
	
	public function setUnidad_judicial($unidad_judicial): self {
		$this->unidad_judicial = $unidad_judicial;
		return $this;
	}
    public function getNombre_juez() {
		return $this->nombre_juez;
	}
	
	public function setNombre_juez($nombre_juez): self {
		$this->nombre_juez = $nombre_juez;
		return $this;
	}
    public function getNum_causa() {
		return $this->num_causa;
	}
	
	public function setNum_causa($num_causa): self {
		$this->num_causa = $num_causa;
		return $this;
	}
    public function getActividad() {
		return $this->actividad;
	}
	
	public function setActividad($actividad): self {
		$this->actividad = $actividad;
		return $this;
	}
    public function getFecha_activida() {
		return $this->fecha_actividad;
	}
	
	public function setFecha_actividad($fecha_actividad): self {
		$this->fecha_actividad = $fecha_actividad;
		return $this;
	}
    public function getSentencia() {
		return $this->sentencia;
	}
	
	public function setSentencia($sentencia): self {
		$this->sentencia = $sentencia;
		return $this;
	}
    public function getFecha_sentencia() {
		return $this->fecha_sentencia;
	}
	
	public function setFecha_sentencia($fecha_sentencia): self {
		$this->fecha_sentencia = $fecha_sentencia;
		return $this;
	}
    public function getResumen() {
		return $this->resumen;
	}
	
	public function setResumen($resumen): self {
		$this->resumen = $resumen;
		return $this;
	}
    public function getExpediente() {
		return $this->expediente;
	}
	
	public function setExpediente($expediente): self {
		$this->expediente = $expediente;
		return $this;
	}
    public function getSatje() {
		return $this->satje;
	}
	
	public function setSatje($satje): self {
		$this->satje = $satje;
		return $this;
	}
    public function getPatrocinio_reporte() {
		return $this->patrocinio_reporte;
	}
	
	public function setPatrocinio_reporte($patrocinio_reporte): self {
		$this->patrocinio_reporte = $patrocinio_reporte;
		return $this;
	}
	
}