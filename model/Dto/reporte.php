<?php

class reporte
{
    //properties
    private $id_reporte, $fecha_inicio, $fecha_final;


    function __construct()
    {

    }
	
    public function getFk_personal_a() {
		return $this->fk_personal_a;
	}
	
	public function setFk_personal_a($fk_personal_a): self {
		$this->fk_personal_a = $fk_personal_a;
		return $this;
	}
}