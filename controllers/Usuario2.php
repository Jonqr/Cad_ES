<?php
include_once("../models/Usuario.php");
include_once("../dao/UsuarioDAO.php");
include_once("../util/Chrome.php");

$usuario = new Usuario();


if (isset($_POST['Submit'])) {

	// inserir
	if (isset($_POST['nome'], $_POST['senha'])) {
		// criar o objeto
		ChromePhp::log($_POST['nome']);
		ChromePhp::log($_POST['senha']);

		$usuario->setNome($_POST['nome']);
		$usuario->setSenha($_POST['senha']);
		$dao = new UsuarioDAO();
		$usuario = $dao->getUsuario($usuario); 
		ChromePhp::log($usuario);
		if($usuario->getNome() == null){
		 $mensagem = "Usuario ou senha invalido.";
		 require_once ('../views/mensagem.php');
		} else {
			require_once ('../views/secao/listaSecao.php');
		}
	}
}

