<?php
include_once("../models/TopicoPost.php");
include_once("../dao/TopicoPostDAO.php");

$TopicoPost = new TopicoPost();


if (isset($_POST['Submit'])) {

	// inserir
	if (isset($_POST['idTopicoPost'], $_POST['idTopico'], $_POST['idPost'])) {
		// criar o objeto
		$TopicoPost->setIdTopicoPost($_POST['idTopicoPost']);
		$TopicoPost->setIdTopico($_POST['idTopico']);
		$TopicoPost->setIdPost($_POST['idPost']);
		$dao = new TopicoPostDAO();
		$dao->insere($TopicoPost);
		$mensagem = "Post cadastrado!";
		require_once __DIR__.'/../views/mensagem.php';
	}
	else {
		$TopicoPost = new TopicoPost();
		require_once __DIR__.'/../views/TopicoPost/form.php';
	}
}

elseif (isset($_GET['f']) && ($_GET['f'] == 'atualiza')) {
	// atualizar
	$dao = new TopicoPostDAO();
	$TopicoPost = $dao->get($_GET['idTopicoPost']);
	if (isset($_POST['idTopicoPost'], $_POST['idTopico'], $_POST['idPost'])) {
		// atualiza no banco
		$TopicoPost->setIdTopicoPost($_POST['idTopicoPost']);
		$TopicoPost->setIdTopico($_POST['idTopico']);
		$TopicoPost->setIdPost($_POST['idPost']);
		$dao->atualiza($TopicoPost);
		$mensagem = "TopicoPost atualizado!";
		require_once __DIR__.'/../views/mensagem.php';
	}
	else {
		// mostra form de alteracao
		require_once __DIR__.'/../views/cliente/form.php';
	}
}
elseif (isset($_GET['f']) && ($_GET['f'] == 'remove')) {
	// remover
	$dao = new TopicoPostDAO();
	$TopicoPost = $dao->get($_GET['idTopicoPost']);
	$dao->remove($TopicoPost);
	$mensagem = "TopicoPost removido!";
	require_once __DIR__.'/../views/mensagem.php';
}
/*else {
	// consulta e mostra a lista
	$dao = new TopicoPostDAO();
	$lista = $dao->getLista();
	require_once __DIR__.'/../views/cliente/lista.php';
}*/
