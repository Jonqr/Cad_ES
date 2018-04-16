<?php
include_once("../models/Secao.php");
include_once("../dao/SecaoDAO.php");

$secao = new Secao();


if (isset($_POST['Submit'])) {

	// inserir
	if (isset($_POST['idSecao'], $_POST['descSecao'])) {
		// criar o objeto
		$Secao->setIdSecao($_POST['idSecao']);
		$Secao->setDescSecao($_POST['descSecao']);
		$dao = new SecaoDAO();
		$dao->insere($Secao);
		$mensagem = "Secao cadastrado!";
		require_once __DIR__.'/../views/mensagem.php';
	}
	else {
		$Secao = new Secao();
		$dao = new SecaoDAO();
		$lista = $dao->getLista();
		require_once '../views/secao/listaSecao.php';
	}
}

elseif (isset($_GET['f']) && ($_GET['f'] == 'atualiza')) {
	// atualizar
	$dao = new SecaoDAO();
	$Secao = $dao->get($_GET['idSecao']);
	if (isset($_POST['idSecao'], $_POST['descSecao'])) {
		// atualiza no banco
		$Secao->setIdSecao($_POST['idSecao']);
		$Secao->setDescSecao($_POST['descSecao']);
		$dao->atualiza($Secao);
		$mensagem = "Secao atualizado!";
		require_once '../views/mensagem.php';
	}
	else {
		// mostra form de alteracao
		require_once __DIR__.'/../views/secao/form.php';
	}
}
elseif (isset($_GET['f']) && ($_GET['f'] == 'remove')) {
	// remover
	$dao = new SecaoDAO();
	$Secao = $dao->get($_GET['idSecao']);
	$dao->remove($Secao);
	$mensagem = "Secao removida!";
	require_once __DIR__.'/../views/mensagem.php';
}

else {
	// consulta e mostra a lista
	$dao = new SecaoDAO();
	$lista = $dao->getLista();
	//require_once __DIR__.'/../views/cliente/lista.php';
}

