<?php

require_once 'MetodosEspecificos/validaSenha.php';
require_once 'MetodosEspecificos/SQLInjection.php';

class loginController extends controller
{

    
    public function index(){
        $data = array();

        if(isset($_POST['login']) && !empty($_POST['login']) &&  empty($_POST['primeiroAcesso'])){
          
            $u = new Usuarios();
            $vs = new validaSenha();
            $sql_injection = new SQLInjection();
            $sql_injection->setPalavra($_POST['login']);

            if(!$sql_injection->SQLinjection()){
                
                $login = addslashes($_POST['login']);
                $senha = $vs->valida((addslashes($_POST['senha'])));

                    if($u->doLogin($login, $senha)){
                        
                        
                        header("Location: ".BASE_URL);
                        exit;
                    } else{
                        $data['errorAcesso'] = "Acesso negado, verificar login e senha.";
                    }

            }elseif($sql_injection->SQLinjection()){
                $data['erroSqlInjection'] = 'Acesso malicioso';
            }

            
        }

        if(!empty($_POST['primeiroAcesso'])){
            
            header("Location: ".BASE_URL."/login/primeiro_acesso");
            exit;

        }

        $this->loadView('login', $data);
    }

    public function primeiro_acesso(){
        
        $data = array();
        $u = new Usuarios();
        $u->setLoggedUsuario();

        if(isset($_POST['matricula']) && !empty($_POST['senha'])){
            
            $aluno = new Aluno();

            $u->setMatricula(addslashes($_POST['matricula']));
            $aluno->setMatricula($u->getMatricula());
            $u->setLoginAluno(addslashes($_POST['matricula']));
            $u->setSenha(md5(addslashes($_POST['senha'])));
            
            if($aluno->seExisteMatricula() == 0){
                $data['sem_matricula'] = "Sem Matricula";
            }elseif($aluno->seExisteMatricula() == 1){
                
                if($u->isLogin() == true ){
                    
                    $u->usuarioAluno();
                    $data['success'] = "Success";
                    
                }elseif($u->isLogin() == false){
                    
                    $data['error'] = "error";
                    
                }
            }

                
            
        }
            
        $this->loadView('primeiro_acesso', $data);

    }

    public function logout(){
        $u = new Usuarios();
        $u->setLoggedUsuario();
            $u->logout();

        header("Location: ". BASE_URL);

    }


}