<?php
/**
* @author Michele Tabaldi <mptabaldi@gmail.com>
* @version 1.0 
* @since 2017-12-10
*/
class TopicoPost {
	private $idTopicoPost;
	private $idTopico;
	private $idPost;
	

	public function getIdTopicoPost() {
		return $this->id;
	}
	public function setIdTopicoPost($idTopicoPost) {
		$this->id = $id;
	}
	public function getIdTopico() {
		return $this->nome;
	}
	public function setIdTopico($idTopico) {
		$this->nome = $nome;
	}
	public function getIdPost() {
		return $this->senha;
	}
	public function setIdPost($idPost) {
		$this->senha = $senha;
	}


}