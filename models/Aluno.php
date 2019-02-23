<?php

    class Aluno extends model {


        private $idaluno;
        private $matricula;
        private $nome_aluno;
        private $data_matricula;
        private $nome_resposanvel;
        private $data_nascimento;
        private $endereco;
        private $numero;
        private $bairro;
        private $complemento;
        private $cidade;
        private $cep;

        private $email;
        private $contato1;
        private $contato2;
        private $situacao_aluno;

        private $idclasse;
       



        /**
         * Get the value of idaluno
         */ 
        public function getIdaluno()
        {
                return $this->idaluno;
        }

        /**
         * Set the value of idaluno
         *
         * @return  self
         */ 
        public function setIdaluno($idaluno)
        {
                $this->idaluno = $idaluno;

                return $this;
        }

        /**
         * Get the value of nome_aluno
         */ 
        public function getNome_aluno()
        {
                return $this->nome_aluno;
        }

        /**
         * Set the value of nome_aluno
         *
         * @return  self
         */ 
        public function setNome_aluno($nome_aluno)
        {
                $this->nome_aluno = $nome_aluno;

                return $this;
        }

        /**
         * Get the value of nome_resposanvel
         */ 
        public function getNome_resposanvel()
        {
                return $this->nome_resposanvel;
        }

        /**
         * Set the value of nome_resposanvel
         *
         * @return  self
         */ 
        public function setNome_resposanvel($nome_resposanvel)
        {
                $this->nome_resposanvel = $nome_resposanvel;

                return $this;
        }

        /**
         * Get the value of data_nascimento
         */ 
        public function getData_nascimento()
        {
                return $this->data_nascimento;
        }

        /**
         * Set the value of data_nascimento
         *
         * @return  self
         */ 
        public function setData_nascimento($data_nascimento)
        {
                $this->data_nascimento = $data_nascimento;

                return $this;
        }

        /**
         * Get the value of endereco
         */ 
        public function getEndereco()
        {
                return $this->endereco;
        }

        /**
         * Set the value of endereco
         *
         * @return  self
         */ 
        public function setEndereco($endereco)
        {
                $this->endereco = $endereco;

                return $this;
        }

        /**
         * Get the value of numero
         */ 
        public function getNumero()
        {
                return $this->numero;
        }

        /**
         * Set the value of numero
         *
         * @return  self
         */ 
        public function setNumero($numero)
        {
                $this->numero = $numero;

                return $this;
        }

        /**
         * Get the value of bairro
         */ 
        public function getBairro()
        {
                return $this->bairro;
        }

        /**
         * Set the value of bairro
         *
         * @return  self
         */ 
        public function setBairro($bairro)
        {
                $this->bairro = $bairro;

                return $this;
        }

        /**
         * Get the value of complemento
         */ 
        public function getComplemento()
        {
                return $this->complemento;
        }

        /**
         * Set the value of complemento
         *
         * @return  self
         */ 
        public function setComplemento($complemento)
        {
                $this->complemento = $complemento;

                return $this;
        }

        /**
         * Get the value of cidade
         */ 
        public function getCidade()
        {
                return $this->cidade;
        }

        /**
         * Set the value of cidade
         *
         * @return  self
         */ 
        public function setCidade($cidade)
        {
                $this->cidade = $cidade;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of contato
         */ 
        public function getContato1()
        {
                return $this->contato1;
        }

        /**
         * Set the value of contato1
         *
         * @return  self
         */ 
        public function setContato1($contato1)
        {
                $this->contato1 = $contato1;

                return $this;
        }

        /**
         * Get the value of contato
         */ 
        public function getContato2()
        {
                return $this->contato2;
        }

        /**
         * Set the value of contato2
         *
         * @return  self
         */ 
        public function setContato2($contato2)
        {
                $this->contato2 = $contato2;

                return $this;
        }

        /**
         * Get the value of situacao_aluno
         */ 
        public function getSituacao_aluno()
        {
                return $this->situacao_aluno;
        }

        /**
         * Set the value of situacao_aluno
         *
         * @return  self
         */ 
        public function setSituacao_aluno($situacao_aluno)
        {
                $this->situacao_aluno = $situacao_aluno;

                return $this;
        }

        /**
         * Get the value of idclasse
         */ 
        public function getIdclasse()
        {
                return $this->idclasse;
        }

        /**
         * Set the value of idclasse
         *
         * @return  self
         */ 
        public function setIdclasse($idclasse)
        {
                $this->idclasse = $idclasse;

                return $this;
        }

        /**
         * Get the value of cep
         */ 
        public function getCep()
        {
                return $this->cep;
        }

        /**
         * Set the value of cep
         *
         * @return  self
         */ 
        public function setCep($cep)
        {
                $this->cep = $cep;

                return $this;
        }

         /**
         * Get the value of data_matricula
         */ 
        public function getData_matricula()
        {
                return $this->data_matricula;
        }

        /**
         * Set the value of data_matricula
         *
         * @return  self
         */ 
        public function setData_matricula($data_matricula)
        {
                $this->data_matricula = $data_matricula;

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

        /////////////////////////////////////////////////////

        public function seExisteMatricula(){

                $sql = $this->db->prepare("SELECT COUNT(*) as resultado FROM alunos WHERE matricula = '{$this->getMatricula()}'");
                //print_r($sql);exit;
                $sql->execute();
        
                $resultado = $sql->fetch();
                
                if($resultado['resultado'] != 0){
                        return true;
                    }elseif($resultado['resultado'] == 0){
                        return false;
                    }
                
            }

        public function listar(){
                $array = array();
                
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = $this->db->prepare("SELECT * FROM alunos order by nome_aluno asc");
                $sql->execute();
                
                        if($sql->rowCount() > 0){
                                $array = $sql->fetchAll();
                        }
                return $array;
        }

        public function getAlunosPorClasse(){
                
                $array = array();
                
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = $this->db->prepare("SELECT * FROM alunos WHERE idclasse = '{$this->getIdclasse()}'");
                $sql->execute();
                
                        if($sql->rowCount() > 0){
                                $array = $sql->fetchAll();
                        }

                return $array;
        }

        public function getAlunosMatriculado(){
                
                $array = array();
                
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = $this->db->prepare("SELECT COUNT(*) as totalMatriculados FROM alunos WHERE idclasse = '{$this->getIdclasse()}'");
                $sql->execute();
                
                $total['totalMatriculados'] = $sql->fetch();
                return $total['totalMatriculados'];
        }

        public function getDadosAluno(){
                
                $array = array();
                
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = $this->db->prepare("SELECT * FROM alunos WHERE idaluno = '{$this->getIdaluno()}'");
                $sql->execute();
                
                        if($sql->rowCount() > 0){
                                $array = $sql->fetch();
                        }

                return $array;
        }

        public function getDadosAlunoPorMatricula(){
                
                $array = array();
                
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = $this->db->prepare("SELECT * FROM alunos WHERE matricula = '{$this->getMatricula()}'");
                $sql->execute();
                
                        if($sql->rowCount() > 0){
                                $array = $sql->fetch();
                        }

                return $array;
        }

        public function getNomeCompleto(){
                
                $array = array();
                
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = $this->db->prepare("SELECT nome_aluno FROM alunos WHERE matricula = '{$this->getMatricula()}'");
                $sql->execute();
                
                        if($sql->rowCount() > 0){
                                $array = $sql->fetch();
                        }

                return $array;
        }

        

        public function adicionar(){

                        try{
                        
                        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM alunos where nome_aluno = '{$this->getNome_aluno()}'");
                        $sql->execute();
                        $row = $sql->fetch();
                        
                                if($row['c'] == 0){
                                        $sql = $this->db->prepare("INSERT INTO alunos SET nome_aluno = '{$this->getNome_aluno()}',
                                                                                        matricula = '{$this->getMatricula()}',
                                                                                        nome_responsavel = '{$this->getNome_resposanvel()}',
                                                                                        data_nascimento = '{$this->getData_nascimento()}',
                                                                                        data_matricula = '{$this->getData_matricula()}',
                                                                                        contato1 = '{$this->getContato1()}',
                                                                                        contato2 = '{$this->getContato2()}',
                                                                                        email = '{$this->getEmail()}',
                                                                                        endereco = '{$this->getEndereco()}',
                                                                                        numero = '{$this->getNumero()}',
                                                                                        bairro = '{$this->getBairro()}',
                                                                                        complemento = '{$this->getComplemento()}',
                                                                                        cidade = '{$this->getCidade()}',
                                                                                        cep = '{$this->getCep()}',
                                                                                        idclasse = '{$this->getIdclasse()}',
                                                                                        situacao_aluno = 'MATRICULADO' ");
                                        //print_r($sql);exit;
                                        
                                        $sql->execute();
                                        
                                        return 1;

                                }else{
                                        
                                        return 0;
                                        
                                }
                        
                        }catch (Exception $e){
                        
                                return $e->getMessage();
                        
              }
        }

        public function editar(){

                try{
                
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql = $this->db->prepare("UPDATE alunos SET nome_aluno = '{$this->getNome_aluno()}',
                                                                                                                                nome_responsavel = '{$this->getNome_resposanvel()}',
                                                                                                                                data_nascimento = '{$this->getData_nascimento()}',
                                                                                                                                data_matricula = '{$this->getData_matricula()}',
                                                                                                                                contato1 = '{$this->getContato1()}',
                                                                                                                                contato2 = '{$this->getContato2()}',
                                                                                                                                email = '{$this->getEmail()}',
                                                                                                                                endereco = '{$this->getEndereco()}',
                                                                                                                                numero = '{$this->getNumero()}',
                                                                                                                                bairro = '{$this->getBairro()}',
                                                                                                                                complemento = '{$this->getComplemento()}',
                                                                                                                                cidade = '{$this->getCidade()}',
                                                                                                                                cep = '{$this->getCep()}',
                                                                                                                                idclasse = '{$this->getIdclasse()}',
                                                                                                                                situacao_aluno = 'MATRICULADO' 
                                                                                                                                where
                                                                                                                                idaluno = {$this->getIdaluno()}");
                        //print_r($sql);exit;
                        
                        $sql->execute();
                        
                        return 1;

                }catch (Exception $e){
                
                        return $e->getMessage();
                
               }
        }

        public function populaMatricula(){

                try{
                
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql = $this->db->prepare("UPDATE alunos SET matricula = '{$this->getMatricula()}' WHERE idaluno = '{$this->getIdaluno()}'");
                        //print_r($sql);exit;
                        
                        $sql->execute();
                        
                        return 1;

                }catch (Exception $e){
                
                        return $e->getMessage();
                
               }
        }

        public function excluir()
	{
		try {

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			$sql = $this->db->prepare("DELETE FROM alunos WHERE idaluno = '{$this->getIdaluno()}'");
			$sql->execute();

			return 1; //Estes retornos servem para verificar e
			} catch (Exception $e) {
				echo '<h4>' . $e->getMessage() . '</h4>';
				return 0;
			}

        }
        
        public function relatorioPorClasse()
    {
        
        
        $array = array();
        
        $sql = "SELECT * FROM alunos 
                INNER JOIN classes ON classes.idclasse=alunos.idclasse 
                
                WHERE ";
        
        $where = array();
        // $where[] = "sales.id_company = :id_company";
        
        if (!empty($this->getIdclasse())) {
            $where[] = "alunos.idclasse = {$this->getIdclasse()}";
        }

        // if (!empty($this->getData_conquista())) {
        //     $where[] = "talentos.data_conquista = '{$this->getData_conquista()}' ORDER BY data_conquista ASC";
        // }
        
        $sql .= implode(' AND ', $where);
        
        $sql = $this->db->prepare($sql);
        
        //print_r($sql);exit;
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }

}

