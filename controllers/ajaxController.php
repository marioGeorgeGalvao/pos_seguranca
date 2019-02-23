<?php


class ajaxController extends controller{

    public function __construct(){

        parent::__construct();

        $u = new Usuarios();

        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "/login");
            echo ", Deveria encaminhar para a tela de login"; //Coloquei so pra ver que esta mensagem esta aparecendo na tela home
            exit;
        }
    }

    public function index(){/*Vazio mesmo*/}

    public function pegar_alunos() { //Metodo usado pelo Ajax no javaScript para popular o campo de aluno atraves do campo classe.
       
    
        if(isset($_POST['classe'])){
            
            $alunos = new Aluno();
            
            $alunos->setIdclasse(addslashes($_POST['classe']));
            $array = $alunos->getAlunosPorClasse();

            echo json_encode($array);
            exit;
        }
    }

    public function pegar_saldo() { //Metodo usado pelo Ajax no javaScript para popular o campo de aluno atraves do campo classe.
           
        if(isset($_POST['aluno'])){
            
            $talentos = new Talento();
            $talentos->setIdaluno(addslashes($_POST['aluno']));

            $array['saldoTransacao'] = $talentos->getSaldo_talento();

            echo json_encode($array['saldoTransacao']);
            exit;
        }
    }

}