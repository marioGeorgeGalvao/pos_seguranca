
<?php require_once('include/chamada_css.php'); ?> 

<?php 

    if($viewData['nome'] != 'Alunos'){
        require_once('include/menu_lateral_admin.php'); 
    }elseif($viewData['nome'] == 'Alunos'){
        require_once('include/menu_lateral_aluno.php'); 
    }
?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

       <?php require_once('include/menu_topo.php'); ?> 

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="#" data-toggle="modal" data-target="#mediumModal">
                                <li class="active">WooHoo Tecnologia    </li>
                            </a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

           <?php $this->loadViewInTemplate($viewName, $viewData); ?> <!-- chama a pagina e insere a mesma no template -->
          
        </div> <!-- .content -->
        
    </div><!-- /#right-panel -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">WooHoo Tecnologia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="col-md-4">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    <div class="corner-ribon blue-ribon">
                                        <i class="far fa-lightbulb"></i>
                                    </div>
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:115px; height:105px;" alt="" src="<?php echo BASE_URL;?>/images/woohooLogo.jpg">
                                    </a>
                                    <h3>Mário Galvão</h3>
                                    <p>CEO e Analista de Sistemas </p>
                                </div>
                            </section>
                        </div>
                    </div>
                                <p style="text-align:center;">
                                    Empresa especializada em desenvolvimento de sistema web por demanda, 
                                    atendendo as necessidades e disponibilizando soluções tecnologicas para sua
                                    empresa, isso independente de seus segmentos.
                                </p>
                                <p style="text-align:center;">
                                    Entre em contato conosco e venha nos conhecer. Garanto a solução necessaria para sua empresa.

                                </p>
                                <p style="text-align:center;">
                                    Solicite um orçamento pelo meios de contato abaixo.
                                    
                                </p>
                                <p style="text-align:center;">
                                <i class="fas fa-at"></i> mario.galvao.woohoo@gmail.com
                                </p>
                                <p style="text-align:center;">
                                <i class="fas fa-phone-volume"></i> 83 98727-7068
                                </p>
                            </div>
                            <div class="modal-footer">
                                
                            </div>
                        </div>
                    </div>
                </div>
    
   <?php require_once('include/chamada_script.php'); ?> 