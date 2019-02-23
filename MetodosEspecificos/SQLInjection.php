<?php

class SQLInjection
{
    
    private $SQLinjection = array('script', 'insert', 'delet', 'detele', 'or', 'like', 'where', 'drop', 'select', 'update', 'create', '%', 'and', '"', '/', '(', '?', '#', '<', '>', '=');

    private $palavra;

    /**
     * Get the value of palavra
     */ 
    public function getPalavra()
    {
        return $this->palavra;
    }

    /**
     * Set the value of palavra
     *
     * @return  self
     */ 
    public function setPalavra($palavra)
    {
        $this->palavra = $palavra;

        return $this;
    }
    

    public function SQLinjection()
    {
        $array = explode(" ", $this->getPalavra());
        $key   = "";
        for ($i = 0; $i < count($array); $i++) {
            $key = strtolower($array[$i]);
            if (in_array($key, $this->SQLinjection)) {
                return true;
            }
        }
        return false;
    }
    
    public function SQLinjectionGet()
    {
        for ($i = 0; $i < count($this->SQLinjection); $i++) {
            if (strpos(trim(strtolower($this->getPalavra())), $this->SQLinjection[$i])) {
                return TRUE;
            }
        }
        return false;
    }
    

    

    
}