<?php
/**
* @author Michele Tabaldi <mptabaldi@gmail.com>
* @version 1.0 
* @since 2017-12-10
*/
class Topico {
	private $idTopico;
	private $descTopico;
	private $idSecao;
	private $idUsuario;
	

	public function getIdTopico() {
		return $this->idTopico;
	}
	public function setIdTopico($idTopico) {
		$this->idTopico = $idTopico;
	}
	public function getDescTopico() {
		return $this->descTopico;
	}
	public function setDescTopico($descTopico) {
		$this->descTopico = $descTopico;
	}
	public function getIdSecao() {
		return $this->idSecao;
	}
	public function setIdSecao($idSecao) {
		$this->idSecao = $idSecao;
	}
	
	public function getIdUsuario() {
		return $this->idUsuario;
	}
		
	public function setIdUsuario($idUsuario) {
		error_log("IdNao veio", 0);
		$this->idUsuario = $idUsuario;
	}

}