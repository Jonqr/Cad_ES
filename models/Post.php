<?php
/**
* @author Michele Tabaldi <mptabaldi@gmail.com>
* @version 1.0 
* @since 2017-12-10
*/
class Post {
	private $idPost;
	private $tituloPost;
	private $textoPost;
	private $idUsuario;
	private $idTopico;
	

	public function getIdPost() {
		return $this->idPost;
	}
	public function setIdPost($idPost) {
		$this->idPost = $idPost;
	}
	public function getTituloPost() {
		return $this->tituloPost;
	}
	public function setTituloPost($tituloPost) {
		$this->tituloPost = $tituloPost;
	}
	public function getTextoPost() {
		return $this->textoPost;
	}
	public function setTextoPost($textoPost) {
		$this->textoPost = $textoPost;
	}
	public function getIdUsuario() {
		return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	public function getIdTopico() {
		return $this->idTopico;
	}
	public function setIdTopico($idTopico) {
		$this->idTopico = $idTopico;
	}


}