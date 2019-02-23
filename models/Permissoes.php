<?php

/**
 * Created by PhpStorm.
 * User: MarioGeorge
 * Date: 10/09/2017
 * Time: 09:50
 */
class Permissoes extends model
{

    private $grupo;
    private $permissoes;

    public function setGrupo($idgrupoPermissoes){
        $this->grupo = $idgrupoPermissoes;
        $this->permissoes = array();

        $sql = $this->db->prepare("SELECT params FROM grupopermissoes WHERE idgrupoPermissoes = :idgrupoPermissoes");
        $sql->bindValue(':idgrupoPermissoes', $idgrupoPermissoes);
        $sql->execute();

        if($sql->rowCount() > 0){
            $row = $sql->fetch();

            // if(empty($row['params'])){
            //     $row['params'] = '0';
            // }

            $params = $row['params'];

            $sql = $this->db->prepare("SELECT nome FROM permissoes WHERE idpermissoes IN ($params)");
            $sql->bindValue('idpermissoes', $row['params']);
            $sql->execute();

            if($sql->rowCount() > 0){
               foreach($sql->fetchAll() as $item){
                    $this->permissoes[] = $item['nome'];
                }
            }
        }
            //print_r($this->permissoes);exit;
    }


    public function temPermissao($nome)
    {
        if (in_array($nome, $this->permissoes)) {
            return true;
        } else {
            return false;
        }
    }

    public function getLista(){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM permissoes");
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getGrupo($idgrupoPermissoes)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM grupopermissoes WHERE idgrupoPermissoes = :idgrupoPermissoes");
        $sql->bindValue(':idgrupoPermissoes', $idgrupoPermissoes);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $array['params'] = explode(',', $array['params']); //Esta linha esta quebrando a string da tabela GrupoPermissoes
            // na coluna params e separando dentro do array, para que possa
            // adicionar as informa��es dos checkbox na hora de editar os
            // grupos de permissoes.
        }
        return $array;

    }

    /*
    public function getGrupoPermissoes(){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM grupopermissoes");
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }
    */

    public function listaGrupo(){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM grupopermissoes");
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function adicionar($nome, $descricao){

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM permissoes WHERE nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();
        $row = $sql->fetch();

        if($row['c'] == 0) {

            $sql = $this->db->prepare("INSERT INTO permissoes SET nome = :nome, descricao = :descricao");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":descricao", $descricao);
            $sql->execute();

            return 1;
        }else{
            return 0;
        }
    }

    public function adicionarGrupos($nome, $plist)
    { //Metodos que adiciona as grupos de permissoes

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM grupopermissoes WHERE nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();
        $row = $sql->fetch();


        if($row['c'] == 0) {
            $params = implode(',', $plist);
            $sql = $this->db->prepare("INSERT INTO grupopermissoes SET nome = :nome, params = :params");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":params", $params);
            $sql->execute();
            return 1;
        }else{
            return 0;
        }
    }

    public function editarGrupos($nome, $plist, $idgrupoPermissoes)
    { //Metodos que adiciona as grupos de permissoes
        $params = implode(',', $plist);
        $sql = $this->db->prepare("UPDATE grupopermissoes SET nome = :nome, params = :params WHERE idgrupoPermissoes = :idgrupoPermissoes");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":params", $params);
        $sql->bindValue(":idgrupoPermissoes", $idgrupoPermissoes);
        $sql->execute();
    }

    public function deletaPermissao($idpermissao)
    {
        $sql = $this->db->prepare("DELETE FROM permissoes WHERE idpermissoes = :idpermissoes");
        $sql->bindValue(":idpermissoes", $idpermissao);
        $sql->execute();

    }

    public function deletaGrupo($idgrupoPermissoes)
    {
        $sql = $this->db->prepare("DELETE FROM grupopermissoes WHERE idgrupoPermissoes = :idgrupoPermissoes");
        $sql->bindValue(":idgrupoPermissoes", $idgrupoPermissoes);
        $sql->execute();

    }
}