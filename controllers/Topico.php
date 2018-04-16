<?php
include_once("/opt/lampp/htdocs/forum/models/Topico.php");
include_once("/opt/lampp/htdocs/forum/dao/TopicoDAO.php");

$Topico = new Topico();

if(isset($_POST['Submit'])){
	$idSecao = $_POST['idSecao'];
} else {
	$idSecao = $_GET['idSecao'];	
}


if (isset($_POST['Submit'])) {

	// inserir
	if (isset($_POST['idSecao'], $_POST['descTopico'])) {
		// criar o objeto
		$Topico->setDescTopico  ($_POST['descTopico']);
		$Topico->setIdSecao     ($_POST['idSecao']);
		$Topico->setIdUsuario   ($_POST['idUsuario']);
		$dao = new TopicoDAO();
		$dao->insere($Topico);
		$mensagem = "Topico cadastrado!";
		require_once __DIR__.'/../views/mensagem.php';
	}
	else {
		$Topico = new Topico();
		//require_once __DIR__.'/../views/Topico/form.php';
	}
}

elseif (isset($_GET['f']) && ($_GET['f'] == 'atualiza')) {
	// atualizar
	$dao = new TopicoDAO();
	$Topico = $dao->get($_GET['idTopico']);
	if (isset($_POST['idTopico'], $_POST['descTopico'], $_POST['idSecao'], $_POST['idUsuario'])) {
		// atualiza no banco
		$Topico->setIdTopico    ($_POST['idTopico']);
		$Topico->setDescTopico  ($_POST['descopico']);
		$Topico->setIdSecao     ($_POST['idSecao']);
		$Topico->setIdUsuario   ($_POST['idUsuario']);
		$dao->atualiza($Topico);
		$mensagem = "Topico atualizado!";
		require_once __DIR__.'/../views/mensagem.php';
	}
	else {
		// mostra form de alteracao
		require_once __DIR__.'/../views/cliente/form.php';
	}
}
elseif (isset($_GET['f']) && ($_GET['f'] == 'remove')) {
	// remover
	$dao = new TopicoDAO();
	$Topico = $dao->get($_GET['idTopico']);
	$dao->remove($Topico);
	$mensagem = "Topico removido!";
	require_once __DIR__.'/../views/mensagem.php';
}
else {
	if (isset($_GET['idSecao']) && (isset($_GET['act']) && $_GET['act']=='listar')){
		$dao = new TopicoDAO();
		$lista = $dao->getLista($_GET['idSecao']);
		//require_once __DIR__.'/../views/cliente/lista.php';
	}	
}