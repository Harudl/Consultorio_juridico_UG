<?php

class Usuario
{
    //properties
    private $id_usuario,$nombre, $usuario_password,$correo, $cedula, $nueva_usuario, $rol;


    function __construct()
    {

    }

	public function getRol() {
		return $this->rol;
	}
	
	public function setRol($rol): self {
		$this->rol = $rol;
		return $this;
	}

	
    public function getId_usuario() {
		return $this->id_usuario;
	}
	
	public function setId_usuario($id_usuario): self {
		$this->id_usuario = $id_usuario;
		return $this;
	}

	public function getCedula() {
		return $this->cedula;
	}
	
	public function setCedula($cedula): self {
		$this->cedula = $cedula;
		return $this;
	}

	public function getNueva_usuario() {
		return $this->nueva_usuario;
	}
	
	public function setNueva_usuario($nueva_usuario): self {
		$this->nueva_usuario = $nueva_usuario;
		return $this;
	}



    public function getNombre() {
		return $this->nombre_personal;
	}
	
	public function setNombre($nombre_personal): self {
		$this->nombre_personal = $nombre_personal;
		return $this;
	}

    public function getUsuario_password() {
		return $this->usuario_password;
	}
	
	public function setUsuario_password($usuario_password): self {
		$this->usuario_password = $usuario_password;
		return $this;
	}

    public function getCorreo() {
		return $this->correo;
	}
	
	public function setCorreo($correo): self {
		$this->correo = $correo;
		return $this;
	}



    
}