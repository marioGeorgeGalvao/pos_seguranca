
<!DOCTYPE html>
<html lang="en">
<head>
	<title>EBD Gincana</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo BASE_URL;?>/assets/login_gincana/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/login_gincana/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/login_gincana/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/login_gincana/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/login_gincana/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/login_gincana/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/login_gincana/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/login_gincana/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/login_gincana/css/main.css">
<!--===============================================================================================-->

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-40 p-r-40 p-t-70 p-b-20">
			
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-50">
                    
                    
					</span>

					<div class="wrap-input100 m-b-16" >
						<input class="input100" type="text" name="login" placeholder="Login">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 m-b-16" >
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="primeiroAcesso">
						<label class="label-checkbox100" for="ckb1">
							<!-- Primeiro Acesso -->
							Esqueci senha
						</label>
					</div>
					<?php if(isset($erroSqlInjection) && (!empty($erroSqlInjection))): ?>
					    <label class="wrap-input100" style="text-align:center;color:orange;" >
							Acesso malicioso.
						</label>
					<?php endif; ?>

                    <?php if(isset($errorAcesso) && (!empty($errorAcesso))): ?>
					    <label class="wrap-input100" style="text-align:center;color:orange;" >
							Login/Senha invalida.
						</label>
					<?php endif; ?>
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
				<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
					
						</span>
						<div class="text-center w-full p-t-42 p-b-22">
                        
                            <a href="#" data-toggle="modal" data-target="#mediumModal">
                    
                            </a>
                        
                    </div>		
					</div>

					</div>
					
			</div>
			
		</div>
		
	</div>
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
					<div class="feed-box text-center">
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
						</div>
                            <div class="modal-footer">
                                
                            </div>
                        </div>
                    </div>
                </div>


<!--===============================================================================================-->	
	<script src="<?php echo BASE_URL;?>/assets/login_gincana/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL;?>/assets/login_gincana/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo BASE_URL;?>/assets/login_gincana/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL;?>/assets/login_gincana/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL;?>/assets/login_gincana/js/main.js"></script>

</body>
</html>