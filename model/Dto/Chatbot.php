<?php

class Chatbot
{
    //properties
    private $id_chatbot, $preguntas, $respuestas ;


    function __construct()
    {
		
    }
	public function getId_chatbot() {
		return $this->id_chatbot;
	}
	
	public function setId_chatbot($id_chatbot): self {
		$this->id_chatbot = $id_chatbot;
		return $this;
	}

    public function getPreguntas() {
		return $this->preguntas;
	}
	
	public function setPreguntas($preguntas): self {
		$this->preguntas = $preguntas;
		return $this;
	}

	
    public function getRespuestas() {
		return $this->respuestas;
	}
	
	public function setRespuestas($respuestas): self {
		$this->respuestas = $respuestas;
		return $this;
	}
}