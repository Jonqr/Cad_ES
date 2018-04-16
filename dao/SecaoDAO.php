<?php
class SecaoDAO {
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
     * Método retorna a lista de Secões cadastrados no banco
     * @return Lista de seções
     */


	public function getLista() {
		$sql = "SELECT * FROM Secao";
		$result = $this->db->query($sql);
		return $result;
	}
    /**
     * Método que recebe o idsecao do Secao
     * @param $idSecao
     * @return objeto Secao.
     */
	public function get($idSecao) {
		$Secao = new Secao();
		$sql = "SELECT * FROM Secao
				WHERE idSecao = :idSecao";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':idSecao' => $idSecao,
		));
		$dados = $query->fetch();
		$Secao->setIdSecao  ($dados['idSecao']);
		$Secao->setDescSecao($dados['descSecao']);
		return $Secao;
	}
	/**
     * Método que insere no banco de dados
     * @param objeto $Secao
     */
	public function insere(Secao $Secao) {
		$sql = "INSERT INTO Secao
					(idSecao, descSecao)
				VALUES
					(:idSecao, :descSecao)";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':idSecao'   => $Secao->getIdSecao(),
			':descSecao' => $Secao->getDescSecao(),
		));
	}
	/*public function remove(Secao $Secao) {
		$sql = "DELETE FROM Secao
				WHERE idSecao = :idSecao";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':idSecao' => $Secao->getIdSecao(),
		));
	}
	public function atualiza(Secao $Secao) {
		$sql = "UPDATE Secao SET
					idSecao	  = :idSecao,
					descSecao = :descSecao,
				WHERE
					idSecao = :idSecao";
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':idSecao' 	 => $Secao->getIdSecao(),
			':descSecao' => $Secao->getDescSecao(),
		));
	}*/
}