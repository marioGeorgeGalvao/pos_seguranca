<?php

/**
 * Created by PhpStorm.
 * User: MarioGeorge
 * Date: 10/09/2017
 * Time: 09:48
 */
class permissoesController extends controller
{
    public function __construct() { //Verifica usuario logado, se n�o tiver logado volta para a tela de login.
        parent::__construct();

        $u = new Usuarios();                    // Criei o objeto para poder utilizar as fun��es existentes.
        if($u->isLogged()== false){             // Acessa o model Usuarios e verifica se o retorno do metodo isLogged � falso.
                                                // Se falso indica que o usuario n�o esta logado
            header("Location: ".BASE_URL."/login");
        }
    }


    public function index(){
        $data = array();

        $u = new Usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        if($u->temPermissao('tela_permissoes')){ //Aqui verifica se o usuario tem permiss�o para acessar a tela de Permissoes.
            $permissoes = new Permissoes();
            $data['lista_permissoes'] = $permissoes->getLista();
            $data['lista_grupoPermissoes'] = $permissoes->listaGrupo();

            $this->loadTemplate('Permissoes/permissoes', $data);
        }else{
            $this->loadTemplate('semPermissao', $data);
        }

    }


    public function adicionarPermissoes(){
        $data = array();

        $u = new usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        if($u->temPermissao('tela_permissoes')){ //Aqui verifica se o usuario tem permiss�o para acessar a tela de Permissoes.
            $permissoes = new Permissoes();

            if(isset($_POST['nome']) && !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $descricao = addslashes($_POST['descricao']);

                $s = $permissoes->adicionar($nome, $descricao);

                if($s == 1) {
                    $data['sucess_msg'] = "olha ai...";
                    //header("Location: " . BASE_URL . "/permissoes");
                }elseif($s == 0){
                    $data['error_msg'] = "aa";
                }

            }
            $this->loadTemplate('Permissoes/adicionar_permissoes', $data); //Caso o usuario tenha pemiss�o ser� encaminhado para a tela de adicionar permiss�o.
        }else{
            $this->loadTemplate('semPermissao', $data); //Caso nao tenha permiss�o ser� encaminhado para a pagina home.
        }

    }

    public function adicionarGrupos(){
        $data = array();

        $u = new usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        if($u->temPermissao('tela_permissoes')) { // Aki o sistema ve se o usuario setado tem essa permissao.
            $permissoes = new Permissoes();
            $data['lista_permissoes'] = $permissoes->getLista();

            if(isset($_POST['nome']) && !empty($_POST['nome'])) {

                $nome = addslashes($_POST['nome']);
                $plist = $_POST['permissoes'];

                $g = $permissoes->adicionarGrupos($nome, $plist);

                if($g == 1) {
                    $data['sucess_msg'] = "olha ai...";
                    //header("Location: " . BASE_URL . "/permissoes");
                }elseif($g == 0){
                    $data['error_msg'] = "aa";
                }
            }
            $this->loadTemplate('Permissoes/adicionar_grupos', $data); //Caso o usuario tenha pemiss�o ser� encaminhado para a tela de adicionar permiss�o.
        }else{
            header("Location: ".BASE_URL); //Caso o usuario tenha pemiss�o ser� encaminhado para a tela de adicionar permiss�o.
        }

    }


    public function editarGrupos($idgrupoPermissoes){
        $data = array();

        $u = new usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        if($u->temPermissao('tela_permissoes')) { // Aki o sistema ve se o usuario setado tem essa permissao.

            $permissoes = new Permissoes();

            $data['lista_permissoes'] = $permissoes->getLista();
            $data['info_grupo'] = $permissoes->getGrupo($idgrupoPermissoes);

            if(isset($_POST['nome']) && !empty($_POST['nome'])) {

                $pnome = addslashes($_POST['nome']);
                $plist = $_POST['permissoes'];

                $permissoes->editarGrupos($pnome, $plist, $idgrupoPermissoes);
                header("Location: ".BASE_URL."/permissoes");
            }
            $this->loadTemplate('Permissoes/editarGrupos', $data); //Caso o usuario tenha pemiss�o ser� encaminhado para a tela de adicionar permiss�o.
        }else{
            header("Location: ".BASE_URL);
        }
    }


    public function deletarPermissao($idpermissao){
        $data = array();

        $u = new usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown. Esta aplicado no template no ViewData.
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        if($u->temPermissao('tela_permissoes')) { // Aki o sistema ve se o usuario setado tem essa permissao.
            $permissoes = new Permissoes();
            $permissoes->deletaPermissao($idpermissao);
            header("Location: ".BASE_URL."/permissoes");
        }else{
            header('Location: '.BASE_URL); //Caso nao tenha permiss�o ser� encaminhado para a pagina home.
        }
    }

    public function deletarGrupo($idgrupoPermissoes){
        $data = array();

        $u = new usuarios();
        $u->setLoggedUsuario();
        //$funcionarios = new funcionarios($u->getEmpresa()); //Aqui seta o usuario e recebe o usuario pelo getFuncionario.
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        if($u->temPermissao('tela_permissoes')) { // Aki o sistema ve se o usuario setado tem essa permissao.
            $permissoes = new Permissoes();
            $permissoes->deletaGrupo($idgrupoPermissoes);
            header("Location: ".BASE_URL."/permissoes");
        }else{
            header('Location: '.BASE_URL); //Caso nao tenha permiss�o ser� encaminhado para a pagina home.
        }
    }
}