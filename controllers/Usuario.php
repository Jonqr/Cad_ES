<?php
include_once("../models/Usuario.php");
include_once("../dao/UsuarioDAO.php");
include_once("../util/Chrome.php");


$usuario = new Usuario();


if (isset($_POST['Submit'])) {

	// inserir
	if (isset($_POST['nome'], $_POST['senha'])) {
		// criar o objeto
		$usuario->setNome($_POST['nome']);
		$usuario->setSenha($_POST['senha']);
		$dao = new UsuarioDAO();
		$dao->insere($usuario);
		require_once '../views/usuario/form.php';
	}
	
}