<?php


class ResumoDeClasse extends model
{

	private $idresumo;
	private $idclasse;
    private $data_resumo;

    private $visitante;
    private $biblia;
    private $presenca;
    private $revista;




	/**
	 * Get the value of idresumo
	 */ 
	public function getIdresumo()
	{
		return $this->idresumo;
	}

	/**
	 * Set the value of idresumo
	 *
	 * @return  self
	 */ 
	public function setIdresumo($idresumo)
	{
		$this->idresumo = $idresumo;

		return $this;
	}

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
     * Get the value of data_resumo
     */ 
    public function getData_resumo()
    {
        return $this->data_resumo;
    }

    /**
     * Set the value of data_resumo
     *
     * @return  self
     */ 
    public function setData_resumo($data_resumo)
    {
        $this->data_resumo = $data_resumo;

        return $this;
    }

    /**
     * Get the value of visitante
     */ 
    public function getVisitante()
    {
        return $this->visitante;
    }

    /**
     * Set the value of visitante
     *
     * @return  self
     */ 
    public function setVisitante($visitante)
    {
        $this->visitante = $visitante;

        return $this;
    }

    /**
     * Get the value of biblia
     */ 
    public function getBiblia()
    {
        return $this->biblia;
    }

    /**
     * Set the value of biblia
     *
     * @return  self
     */ 
    public function setBiblia($biblia)
    {
        $this->biblia = $biblia;

        return $this;
    }

    /**
     * Get the value of presenca
     */ 
    public function getPresenca()
    {
        return $this->presenca;
    }

    /**
     * Set the value of presenca
     *
     * @return  self
     */ 
    public function setPresenca($presenca)
    {
        $this->presenca = $presenca;

        return $this;
    }

    /**
     * Get the value of revista
     */ 
    public function getRevista()
    {
        return $this->revista;
    }

    /**
     * Set the value of revista
     *
     * @return  self
     */ 
    public function setRevista($revista)
    {
        $this->revista = $revista;

        return $this;
    }


    ///////////////////////////////////////////////

    public function lanca_resumo()
    {
        try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = $this->db->prepare("INSERT INTO resumo_classes SET idclasse = '{$this->getIdclasse()}', 
                                                                        data_resumo = '{$this->getData_resumo()}',
                                                                        biblia = '{$this->getBiblia()}',
                                                                        revista = '{$this->getRevista()}',
                                                                        presenca = '{$this->getPresenca()}',
                                                                        visitante = '{$this->getVisitante()}'");
            //print_r($sql);exit;                                                               
            $sql->execute();
           
            
            return 1;

		} catch (Exception $e) {
            
            echo '<h4>' . $e->getMessage() . '</h4>';
			//return 0;
		}
    }

    public function editar_resumo()
    {
        try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = $this->db->prepare("UPDATE resumo_classes SET idclasse = '{$this->getIdclasse()}', 
                                                                        data_resumo = '{$this->getData_resumo()}',
                                                                        biblia = '{$this->getBiblia()}',
                                                                        revista = '{$this->getRevista()}',
                                                                        presenca = '{$this->getPresenca()}',
                                                                        visitante = '{$this->getVisitante()}'
                                                                        WHERE idresumo = '{$this->getIdresumo()}'");
            //print_r($sql);exit;                                                               
            $sql->execute();
           
            
            return 1;

		} catch (Exception $e) {
            
            echo '<h4>' . $e->getMessage() . '</h4>';
			//return 0;
		}
    }

    public function getLancamentosPorClasse(){
                
        $array = array();
        
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = $this->db->prepare("SELECT * FROM talentos 
                                                INNER JOIN classes 
                                                ON classes.idclasse=talentos.idclasse 
                                                WHERE talentos.idclasse = '{$this->getIdclasse()}'");
        $sql->execute();
        
                if($sql->rowCount() > 0){
                        $array = $sql->fetchAll();
                }

        return $array;
    }

    public function getDadosLancamento(){
                
        $array = array();
        
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = $this->db->prepare("SELECT * FROM resumo_classes 
                                                INNER JOIN classes 
                                                ON classes.idclasse=resumo_classes.idclasse 
                                                WHERE resumo_classes.idresumo = '{$this->getIdresumo()}'");
        $sql->execute();
        
                if($sql->rowCount() > 0){
                        $array = $sql->fetch();
                }

        return $array;
    }

    public function excluir()
	{
		try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			$sql = $this->db->prepare("DELETE FROM resumo_classes WHERE idresumo = '{$this->getIdresumo()}'");
			$sql->execute();

			return 1; //Estes retornos servem para verificar e
			} catch (Exception $e) {
				echo '<h4>' . $e->getMessage() . '</h4>';
				return 0;
			}

	}
}