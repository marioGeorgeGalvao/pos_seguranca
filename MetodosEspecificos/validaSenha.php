<?php

class validaSenha{

    protected $custo   = '10';
    protected $salt    = 'Af2f11eDAeKlBJpmM0F7aJ';
    
    private $senha;

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

    function valida($senha){
        return crypt($senha, '$2a$' . $this->custo . '$' . $this->salt . '$'); 
    }

}
