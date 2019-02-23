<?php

class notFoundController extends controller
{

    public function __construct()
    {
        parent::__construct();

        $u = new Usuarios();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "/login");
        }
    }

    public function index()
    {
        $data = array();

        $u = new Usuarios();
        $u->setLoggedUsuario();
        $data['nome_usuario'] = $u->getUsuario();//Mostra o nome do usuario logado. Atenção, sempre tem que pegar a informação com essa linha.
        $data['id_usuario'] = $u->getId();
        $data['nome'] = $u->getNivel(); //Mostra o nivel de acesso no topo da pagina, dentro do menu dropdown
        $data['razao'] = $u->getRazao(); //Mostra a razao social no topo da pagina, dentro do menu dropdown

        $this->loadTemplate('404', $data);
    }

   
}