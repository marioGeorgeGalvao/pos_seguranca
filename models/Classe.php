<?php


class Classe extends model
{

	private $idclasse;
	private $nome_classe;
	private $nivel;

	/**
	 * Get the value of idclasse
	 */ 
	public function getIdclasse()
	{
		return $this->idclasse;
	}

	/**
	 * Set the value of idclasse
	 *
	 * @return  self
	 */ 
	public function setIdclasse($idclasse)
	{
		$this->idclasse = $idclasse;

		return $this;
	}

	/**
	 * Get the value of nome_classe
	 */ 
	public function getNome_classe()
	{
		return $this->nome_classe;
	}

	/**
	 * Set the value of nome_classe
	 *
	 * @return  self
	 */ 
	public function setNome_classe($nome_classe)
	{
		$this->nome_classe = $nome_classe;

		return $this;
	}

	/**
	 * Get the value of nivel
	 */ 
	public function getNivel()
	{
		return $this->nivel;
	}

	/**
	 * Set the value of nivel
	 *
	 * @return  self
	 */ 
	public function setNivel($nivel)
	{
		$this->nivel = $nivel;

		return $this;
	}

	/////////////////////////////////////////////////////////////////

	public function getClasses()
	{
		try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			$sql = $this->db->prepare("SELECT * FROM classes ");
			$sql->execute();

				if($sql->rowCount() > 0){
						$array = $sql->fetchAll();
				}

				return $array;

		} catch (Exception $e) {
			echo '<h4>' . $e->getMessage() . '</h4>';
			return 0;
		}
	}

	public function getDadosClasse()
	{
		try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			$sql = $this->db->prepare("SELECT * FROM classes WHERE idclasse = '{$this->getIdclasse()}'");
			$sql->execute();

				if($sql->rowCount() > 0){
						$array = $sql->fetch();
				}

				return $array;

		} catch (Exception $e) {
			echo '<h4>' . $e->getMessage() . '</h4>';
			return 0;
		}
	}

	public function adicionar()
	{
		try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = $this->db->prepare("INSERT INTO classes SET nome_classe = '{$this->getNome_classe()}', nivel= '{$this->getNivel()}'");
			$sql->execute();

			return 1; //Estes retornos servem para verificar e
		} catch (Exception $e) {
			echo '<h4>' . $e->getMessage() . '</h4>';
			return 0;
		}

	}

	public function editar()
	{
		try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			$sql = $this->db->prepare("UPDATE classes SET nome_classe = '{$this->getNome_classe()}',
														  nivel = '{$this->getNivel()}'
														WHERE idclasse = '{$this->getIdclasse()}'");
			$sql->execute();

			return 1; //Estes retornos servem para verificar e
		} catch (Exception $e) {
			echo '<h4>' . $e->getMessage() . '</h4>';
			return 0;
		}

	}

	public function excluir()
	{
		try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			$sql = $this->db->prepare("DELETE FROM classes WHERE idclasse = '{$this->getIdclasse()}'");
			$sql->execute();

			return 1; //Estes retornos servem para verificar e
			} catch (Exception $e) {
				echo '<h4>' . $e->getMessage() . '</h4>';
				return 0;
			}

	}

}