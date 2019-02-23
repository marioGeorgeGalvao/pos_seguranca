<?php
class Usuarios extends model {

    private $userInfo; //Esta variavel irar armazenar todas as informa�oes do usuario.
    private $permissoes;

    private $matricula;
    private $nomeAluno;
    private $loginAluno;
    private $senha;
    private $idpermissao;

     /**
     * Get the value of nomeAluno
     */ 
    public function getNomeAluno()
    {
        return $this->nomeAluno;
    }

    /**
     * Set the value of nomeAluno
     *
     * @return  self
     */ 
    public function setNomeAluno($nomeAluno)
    {
        $this->nomeAluno = $nomeAluno;

        return $this;
    }

    /**
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

      /**
     * Get the value of loginAluno
     */ 
    public function getLoginAluno()
    {
        return $this->loginAluno;
    }

    /**
     * Set the value of loginAluno
     *
     * @return  self
     */ 
    public function setLoginAluno($loginAluno)
    {
        $this->loginAluno = $loginAluno;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of idpermissao
     */ 
    public function getIdpermissao()
    {
        return $this->idpermissao;
    }

    /**
     * Set the value of idpermissao
     *
     * @return  self
     */ 
    public function setIdpermissao($idpermissao)
    {
        $this->idpermissao = $idpermissao;

        return $this;
    }

    //////////////////////////////////////////

    

    public function isLogged(){
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            return true;
        }else{
              return false;
                }
    }
    public function doLogin($login, $senha){

        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE login = :login and senha = :senha");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", $senha);
        $sql->execute();


        if($sql->rowCount() > 0){
            
            $row = $sql->fetch();
            
            setcookie("TesteCookie", "123456", time()+60*60*7, "/", "example.com", true, true);
            
            $_SESSION['ccUser'] = $row['idusuario'];
            //$_COOKIE['TesteCookie'] = $row['idusuario'];
            
            return true;

        }else{
            
            return false;

        }
    }

    public function isLogin(){

        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE login = '{$this->getMatricula()}'");
        //print_r($sql);exit;
        $sql->execute();

        $resultado = $sql->fetch();
        
        if($resultado == 0){
                return true;
            }elseif($resultado != 0){
                return false;
            }
        
    }

    public function logout()
    {
        unset($_SESSION['ccUser']);
    }
    public function temPermissao($nome)
    {
        return $this->permissoes->temPermissao($nome);
    }

    public function setLoggedUsuario() //O retorno deste metodo tras os dados e armazena na variavel privada $userinfo.
    {
        if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) { //Verifica se tem a sessao.
            $idusuario = $_SESSION['ccUser'];

            $sql = $this->db->prepare("SELECT *, gp.nome FROM usuarios as u
                                              INNER JOIN grupopermissoes as gp ON gp.idgrupoPermissoes = u.idgrupoPermissao
                                              INNER JOIN empresa as e ON e.idempresa = u.idempresa
                                              WHERE idusuario = :idusuario ");
            $sql->bindValue(':idusuario', $idusuario);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $this->userInfo = $sql->fetch();
                $this->permissoes = new Permissoes();
                $this->permissoes->setGrupo($this->userInfo['idgrupoPermissao']); // Esse dado 'idpermissao' vem da tabela usuarios coluna idpermissao "Nivel de acesso".
            }
        }
    }

    public function getUsuario()
    {
        if (isset($this->userInfo['nome_usuario'])) {
            return $this->userInfo['nome_usuario'];
        } else {
            return 0;
        }
    }

    public function getLogin()
    {
        if (isset($this->userInfo['login'])) {
            return $this->userInfo['login'];
        } else {
            return '0';
        }
    }
    public function getNivel()
    {
        if (isset($this->userInfo['nome'])) {
            return $this->userInfo['nome'];
        } else {
            return '';
        }
    }
    public function getLogo()
    {
        if (isset($this->userInfo['caminho_logo'])) {
            return $this->userInfo['caminho_logo'];
        } else {
            return '';
        }
    }

    public function getInfo($idusuario) {
        $array = array();

        $sql = $this->db->prepare("SELECT *, gp.nome FROM usuarios as u INNER JOIN grupopermissoes as gp ON gp.idgrupoPermissoes = u.idgrupoPermissao WHERE idusuario = :idusuario");
        $sql->bindValue(":idusuario", $idusuario);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

 
    public function getId()
    {
        if (isset($this->userInfo['idusuario'])) {
            return $this->userInfo['idusuario'];
        } else {
            return '';
        }
    }

    public function getRazao()
    {
        if (isset($this->userInfo['razao_social'])) {
            return $this->userInfo['razao_social'];
        } else {
            return '';
        }
    }

    public function getLista(){
       $array = array();

       $sql = $this->db->prepare("SELECT *, gp.nome FROM usuarios as u INNER JOIN grupopermissoes as gp ON gp.idgrupoPermissoes = u.idgrupoPermissao");
       $sql->execute();

       if($sql->rowCount() > 0){
           $array = $sql->fetchAll();
       }

       return $array;
   }

   public function listaUsuarios(){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM usuarios");
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }


    public function adicionar($idempresa = 1, $idgrupoPermissao, $nome_usuario ,$login, $senha )

    {//Metodos que adiciona o registro de usuarios, mas antes verifica se ja existe usuario com o emailFuncional cadastrado, pois  o mesmo é o login.


        //Aqui confere se o email existe!
        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM usuarios WHERE login = :login");
        $sql->bindValue(":login", $login);
        $sql->execute();
        $row = $sql->fetch();


        if($row['c'] == 0 ) {

            $sql = $this->db->prepare("INSERT INTO usuarios SET idempresa = :idempresa, idgrupoPermissao = :idgrupoPermissao, nome_usuario = :nome_usuario ,login = :login, senha = :senha");
            $sql->bindValue(":idempresa", $idempresa);
            $sql->bindValue(":idgrupoPermissao", $idgrupoPermissao);
            $sql->bindValue(":nome_usuario", $nome_usuario);
            $sql->bindValue(":login", $login);
            $sql->bindValue(":senha", $senha);
            //print_r($sql);exit;
            $sql->execute();

            return '1'; //Estes retornos servem para verificar e
        }else{
            return '0';
        }
    }
    public function editarUsuario($idusuario, $nome_usuario, $senha, $idgrupoPermissao )
    { //Metodos que edita o registro de usuarios, e verifica se a senha foi alterada, se a mesma não foi irar receber a mesma.

        $sql = $this->db->prepare("Select count(*) as c from usuarios WHERE idusuario = :idusuario");
        $sql->bindValue(":idusuario", $idusuario);
        $sql->execute();
        $row = $sql->fetch();

        if($row['c'] == 1) {

            $sql = $this->db->prepare("UPDATE usuarios
                                    SET idgrupoPermissao = :idgrupoPermissao, nome_usuario = :nome_usuario
                                    WHERE idusuario = :idusuario");
            $sql->bindValue(":idusuario", $idusuario);
            $sql->bindValue(":nome_usuario", $nome_usuario);
            $sql->bindValue(":idgrupoPermissao", $idgrupoPermissao);

            $sql->execute();

            if (!empty($senha)) {
                $sql = $this->db->prepare("UPDATE usuarios
                                            SET senha = :senha
                                            WHERE idusuario = :idusuario");
                $sql->bindValue(":idusuario", $idusuario);
                $sql->bindValue(":senha", $senha);
                $sql->execute();
            }
            return 1;
        }else{
            return 0;
        }
    }
    public function delete($idusuario)
    {
        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM usuarios WHERE idusuario = :idusuario");
        $sql->bindValue(":idusuario", $idusuario);
        $sql->execute();
        $row = $sql->fetch();

        if($row['c'] == 1) {

            $sql = $this->db->prepare("DELETE FROM usuarios WHERE idusuario = :idusuario");
            $sql->bindValue(":idusuario", $idusuario);
            $sql->execute();

            return 1;
        }else{
            return 0;
        }
    }

    public function usuarioAluno()

    {//Metodos que adiciona o registro de usuarios, mas antes verifica se ja existe usuario com o emailFuncional cadastrado, pois  o mesmo é o login.

        
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = $this->db->prepare("INSERT INTO usuarios SET idempresa = 1, 
                                                                                                                             idgrupoPermissao = 5,
                                                                                                                             nome_usuario = '{$this->getLoginAluno()}', 
                                                                                                                             login = '{$this->getLoginAluno()}', 
                                                                                                                             senha = '{$this->getSenha()}'");
            //print_r($sql);exit;
            $sql->execute();

            return '1'; //Estes retornos servem para verificar e

    }
  
}
