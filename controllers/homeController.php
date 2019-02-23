<?php

    require_once 'models/Aluno.php';
    require_once 'models/Classe.php';

class homeController extends controller {

    public function __construct() {
        parent::__construct();

        $u = new Usuarios();
        if($u->isLogged() == false){
           header("Location: ".BASE_URL."/login");
        }
    }

    public function index() {
        $data = array();
        $u = new Usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['nivel'] = $u->getInfo($u->getId());
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown
        
        $aluno = new Aluno();
        $aluno->setMatricula($u->getUsuario());
        $data['dados_aluno'] = $aluno->getDadosAlunoPorMatricula(); 

        if($u->temPermissao('Home') OR $u->temPermissao('Alunos')){ //Aqui verifica se o usuario tem permiss?o para acessar a tela de Permissoes.

            

            $this->loadTemplate('home', $data);
        }else{
            $this->loadTemplate('semPermissao', $data);
        }
       
    }

    public function semPermissao() {
        $data = array();
        $u = new Usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        $this->loadTemplate('semPermissao', $data);
    }

}