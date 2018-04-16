<?php
class PostDAO {
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
     * Método retorna a lista de Tópicos cadastrados no banco
     *@param $idTopico
     * @return Lista de Tópicos
     */

	public function getLista($idTopico) {
		$sql = "SELECT p.tituloPost, p.textoPost FROM Post p WHERE p.idTopico = $idTopico";
		$result = $this->db->query($sql);
		return $result;
	}
	 /**
     * Método que recebe o idPost do Post
     * @param $idPost
     * @return objeto Post.
     */
	public function get($idPost) {
		$Post = new Post();
		$sql = "SELECT * FROM Post
				WHERE idPost = :idPost";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':idPost' => $idPost,
		));
		$dados = $query->fetch();
		$Post->setIdPost    ($dados ['idPost']);
		$Post->setTituloPost($dados ['tituloPost']);
		$Post->setTextoPost ($dados ['textoPost']);
		$Post->setIdUsuario ($dados ['idUsuario']);
		return $Post;
	}
		/**
     * Método que insere no banco de dados
     * @param objeto $Post
     */
	public function insere(Post $Post) {
		$sql = "INSERT INTO Post
					(tituloPost, textoPost, idUsuario, idTopico)
				VALUES
					(:tituloPost, :textoPost, :idUsuario, :idTopico)";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':tituloPost' => $Post->getTituloPost(),
			':textoPost'  => $Post->getTextoPost(),
			':idUsuario'  => $Post->getIdUsuario(),
			':idTopico'  => $Post->getIdTopico()
		));
	}
	/*public function remove(Post $Post) {
		$sql = "DELETE FROM Post
				WHERE idPost = :idPost";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':idPost' => $Post->getIdPost(),
		));
	}*/
	/*
	public function atualiza(Post $Post) {
		$sql = "UPDATE Post SET
					idPost     = :idPost,
					tituloPost = :tituloPost,
					textoPost  = :textoPost,
					idUsuario  = :descPost"
		
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':idPost' 	   => $Post->getIdPost(),
			':tituloPost'  => $Post->getTituloPost(),
			':textoPost'   => $Post->getTextoPost(),
			':idUsuario'   => $Post->getidUsuario()
		));
	}*/
}