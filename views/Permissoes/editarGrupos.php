<div class="content mt-12">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <?php if(isset($error_msg) && (!empty($error_msg))): ?>
                    
                <div class="alert alert-warning" role="alert">
                    Atenção ! Grupo de Permissão já existente.
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
<div class="content mt-12">
    <div class="animated fadeIn">
        <div class="row">
        
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">Cadastro de Grupo de Permissão</div>
                      <div class="card-body card-block">
                      
                        <form action="" method="post" class="">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome da Permissão</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="nome" value="<?php echo $info_grupo['nome'];?>" placeholder="" class="form-control" required>
                            <small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Permissões</label>
                            </div>
                            <?php foreach($lista_permissoes as $p):?>

                            <label for="p_<?php echo $p['idpermissoes'];?>" class="form-check-label "></label>
                            <input type="checkbox" name="permissoes[]" style="margin-left: 270px; margin-bottom: 5px; width: 50px;" value="<?php echo $p['idpermissoes'];?>" id="p_<?php echo $p['idpermissoes'];?>" <?php echo (in_array($p['idpermissoes'], $info_grupo['params']))?'checked="checked"':''; ?>/><?php echo $p['nome'];?><br>
                                
                            <?php endforeach; ?>
                            <small class="form-text text-muted"></small></div>    
                          </div>
                          
                          <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Cadastrar Grupo</button></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
</div>