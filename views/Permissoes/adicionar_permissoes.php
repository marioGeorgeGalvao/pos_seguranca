<div class="content mt-12">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <?php if(isset($error_msg) && (!empty($error_msg))): ?>
                    
                <div class="alert alert-warning" role="alert">
                    Atenção ! Permissão já existente.
                </div>
                    
                <?php endif; ?>

                <?php if(isset($sucess_msg) && (!empty($sucess_msg))): ?>
                <div class="alert alert-success" role="alert">
                    Sucesso ! Cadastro efetivado.    
                </div>
                    
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cadastro de Permissões</h2>
                    
                <div class="clearfix"></div>
            </div>
        <div class="x_content">
        
        <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome da Permissão <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="nome" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descrição <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="descricao" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
</div>
</div>