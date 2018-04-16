<?php
/**
* @author Michele Tabaldi <mptabaldi@gmail.com>
* @version 1.0 
* @since 2017-12-10
*/
class Usuario {
	private $id;
	private $nome;
	private $senha;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getSenha() {
		return $this->senha;
	}
	public function setSenha($senha) {
		$this->senha = $senha;
	}


}