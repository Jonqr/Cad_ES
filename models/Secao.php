<?php
/**
* @author Michele Tabaldi <mptabaldi@gmail.com>
* @version 1.0 
* @since 2017-12-10
*/
class Secao{
	private $idSecao;
	private $descSecao;
	
	public function getIdSecao() {
		return $this->idSecao;
	}
	public function setIdSecao($idSecao) {
		$this->idSecao = $idSecao;
	}
	public function getDescSecao() {
		return $this->descSecao;
	}
	public function setDescSecao($descSecao) {
		$this->descSecao = $descSecao;
	}



}