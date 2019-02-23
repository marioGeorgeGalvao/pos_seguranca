<?php

/**
 * Created by PhpStorm.
 * User: MarioGeorge
 * Date: 10/09/2017
 * Time: 09:41
 */

require_once 'MetodosEspecificos/validaSenha.php';

class usuariosController extends controller
{

    public function __construct() { //Verifica usuario logado, se n�o tiver logado volta para a tela de login.
        parent::__construct();

        $u = new Usuarios();                    // Criei o objeto para poder utilizar as fun��es existentes.
        if($u->isLogged()== false){             // Acessa o model Usuarios e verifica se o retorno do metodo isLogged � falso.
                                                // Se falso indica que o usuario n�o esta logado
            header("Location: ".BASE_URL."/login");
        }
    }

    public function index()
    {

        $data = array();

        $u = new Usuarios();
        $u->setLoggedUsuario();

        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['nivel'] = $u->getInfo($u->getId());
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown. Esta aplicado no template no ViewData.
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown
        $data['lista_usuarios'] = $u->getLista();
        
        

        if($u->temPermissao('Cadastro Usuarios')){ //Aqui verifica se o usuario tem permiss�o para acessar a tela de Permissoes.
            
            $this->loadTemplate('Usuarios/usuarios', $data);
        }else{
            $this->loadTemplate('semPermissao', $data);
        }
    }

    public function adicionar(){
        $data = array();

        $u = new Usuarios();
        $u->setLoggedUsuario();
        $data['lista_usuarios'] = $u->getLista();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown. Esta aplicado no template no ViewData.
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        $g = new Permissoes();
        $data['lista_grupo'] = $g->listaGrupo();

        $vl = new validaSenha();

        if($u->temPermissao('Cadastro Usuarios')){ //Aqui verifica se o usuario tem permiss�o para acessar a tela de Permissoes.

            //$usuarios = new usuarios();

            if (isset($_POST['login']) && !empty($_POST['login'])) {


                $idgrupoPermissao       = addslashes($_POST['idgrupoPermissao']);
                $nome_usuario           = addslashes($_POST['nome_usuario']);
                $login                  = addslashes($_POST['login']);
                $senha                  = $vl->valida((addslashes($_POST['senha'])));

                $a = $u->adicionar($idempresa = 1, $idgrupoPermissao, $nome_usuario, $login, $senha);
                //print_r($a);exit;

                if($a == 1) {
                    $data['sucess_msg'] = "ok";
                    //header("Location: " . BASE_URL . "/usuarios");
                }elseif($a == 0){
                    $data['error_msg'] = "Funcionario ou E-mail já existe";
                }
            }

            $this->loadTemplate('Usuarios/adicionar_usuarios', $data);
        }else{
            $this->loadTemplate('semPermissao', $data);
        }
    }

    public function editarUsuario($idusuario)
    {
        $data = array();

        $u = new usuarios();
        $u->setLoggedUsuario();
        $data['usuarioInfo'] = $u->getInfo($idusuario);
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown. Esta aplicado no template no ViewData.
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        $g = new Permissoes();
        $data['lista_grupos'] = $g->listaGrupo();


        if ($u->temPermissao('Cadastro Usuarios')) { // Aki o sistema ve se o usuario setado tem essa permissao.

            $data['lista_permissoes'] = $u->getLista();

            if (isset($_POST['nome_usuario']) && !empty($_POST['nome_usuario'])) {

                $nome_usuario = addslashes($_POST['nome_usuario']);
                $senha = md5(addslashes($_POST['senha']));
                $idgrupoPermissao = addslashes($_POST['idgrupoPermissao']);

                $ed = $u->editarUsuario($idusuario, $nome_usuario, $senha, $idgrupoPermissao);

                if($ed == 1) {
                    $data['sucess_msg'] = "ok";
                    header("Location: " . BASE_URL . "/usuarios");
                }elseif($ed == 0){
                    //$data['error_msg'] = "Funcionario ou E-mail já existe";
                }

            }

            $this->loadTemplate('Usuarios/editar_usuarios', $data);
        }else{
            $this->loadTemplate('semPermissao', $data);
        }

    }

    public function deletarUsuario($idusuario)
    { //Metodo de delete usuario funcionando...
        $data = array();

        $u = new usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown. Esta aplicado no template no ViewData.
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        if ($u->temPermissao('Cadastro Usuarios')) { // Aki o sistema ve se o usuario setado tem essa permissao.

            $s = $u->delete($idusuario);
            //print_r($s);exit;

            if($s == 1) {
                $data['sucess_msg'] = "ok";
                header("Location: " . BASE_URL . "/usuarios");
            }elseif($s == 0){
                $data['error_msg'] = "Funcionario ou E-mail já existe";
                header("Location: " . BASE_URL . "/usuarios");
            }


        } else {
            $this->loadTemplate('semPermissao', $data);
        }
    }
}