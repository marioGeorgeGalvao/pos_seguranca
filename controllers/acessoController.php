<?php

class acessoController extends controller
{

    public function index()
    {

        $data = array();

        $this->loadView('solicitaAcesso', $data);
    }

}
?>