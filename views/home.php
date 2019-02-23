<?php 
    if($nome != 'Alunos'){
        require_once('include/home_admin.php');
        
    } 
?> 
<?php 
    if($nome == 'Alunos'){
        require_once('include/home_aluno.php'); 
    }
?> 


        
        
