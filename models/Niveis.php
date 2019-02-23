<?php

class Niveis extends model{ //Esta classe Extends "Herda" de model, pois lá existe um contrutor que realiza a conexao com o banco de dados.//


    public function getNiveis(){

    	$array = array();

    	$sql = $this->db->prepare("SELECT * FROM niveis");
    	$sql->execute();

    	if($sql->rowCount() > 0){
    		$array = $sql->fetchAll();
    	}

    	return $array;
    }
}
?>