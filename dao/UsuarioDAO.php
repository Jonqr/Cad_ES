<?php
include_once("../util/Chrome.php");

class UsuarioDAO {
	protected $db;
	function __construct() {
		try {
			$this->db = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e) {
			print 'Erro ao conectar';
		}
	}
	 /**
     * Método retorna a lista de usuario cadastrados no banco
     * @param Usuario
     * @return Lista de Usuários
     */

	public function getLista() {
		$sql = "SELECT * FROM Usuario";
		$result = $this->db->query($sql);
		return $result;
	}

	 /**
     * Método retorna o usuario através do nome e da senha
     * @param Usuario
     * @return Usuário
     */
	public function getUsuario($Usuario) {
		ChromePhp::log('DAO');
		$sql = "SELECT * 
				FROM Usuario
				WHERE nomeUsuario = :nomeUsuario and senhaUsuario = :senhaUsuario";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':nomeUsuario' => $Usuario -> getNome(),
			':senhaUsuario' => $Usuario -> getSenha()
		));
		$dados = $query->fetch();
		$Usuario = new Usuario();
		$Usuario->setId($dados['idusuario']);
		$Usuario->setNome($dados['nomeUsuario']);
		$Usuario->setSenha($dados['senhaUsuario']);
		return $Usuario;
	}

	 /**
     * Método que recebe o id do usuario
     * @return objeto Usuario.
     */
	public function get($id) {
		$Usuario = new Usuario();
		$sql = "SELECT * FROM Usuario
				WHERE id_Usuario = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':id' => $id,
		));
		$dados = $query->fetch();
		$Usuario->setId($dados['id_Usuario']);
		$Usuario->setNome($dados['nome_Usuario']);
		$Usuario->setSenha($dados['senha_Usuario']);
		return $Usuario;
	}

	 /**
     * Método que insere no banco de dados
     * @param objeto $Usuario
     */

	public function insere(Usuario $Usuario) {
		ChromePhp::log('Insere');
		$sql = "SELECT * FROM Usuario
				WHERE nomeUsuario = :nome";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':nome' => $Usuario->getNome()
		));
		$dados = $query->fetch();
		ChromePhp::log($dados);
		if($dados == false){
			$sql = "INSERT INTO Usuario
					(nomeUsuario, senhaUsuario)
				VALUES
					(:nome, :senha)";
			$query = $this->db->prepare($sql);
			$query->execute(array(
				':nome' => $Usuario->getNome(),
				':senha' => $Usuario->getsenha(),
			));
			 $mensagem = "Usuario cadastrado com sucesso.";
		 	 require_once ('../views/usuario/form.php');
		}else {
			 $mensagem = ("Usuario já cadastrado");
		 	 require_once ('../views/mensagem.php');
		}
	}
	/*public function remove(Usuario $Usuario) {
		$sql = "DELETE FROM Usuario
				WHERE idUsuario = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':id' => $Usuario->getId(),
		));
	}
	public function atualiza(Usuario $Usuario) {
		$sql = "UPDATE Usuario SET
					nomeUsuario	 = :nome,
					senhaUsuario = :senha,
				WHERE
					idUsuario = :id";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':nome' 	=> $Usuario->getNome(),
			':senha' 	=> $Usuario->getsenha(),
			':id' 		=> $Usuario->getId(),
		));
	}*/
}