<div class="content mt-12">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <?php if(isset($error_msg) && (!empty($error_msg))): ?>
                    
                <div class="alert alert-warning" role="alert">
                    Atenção ! Usuário ou login já existente.
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

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Cadastro de Usuários</h2>
        <div class="clearfix"></div>
    </div>
<div class="x_content">
<form action="" method="post" class="">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome do Usuário</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="nome_usuario" value="<?php echo $usuarioInfo['nome_usuario'];?>" placeholder="" class="form-control" required>
                            <small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Login</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="login" placeholder="" value="<?php echo $usuarioInfo['login'];?>" class="form-control" disabled>
                            <small class="form-text text-muted"></small></div>
                          </div>
                                                   
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Senha</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password-input" name="senha" placeholder="" class="form-control">
                            <small class="help-block form-text"></small></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Nivel de Acesso</label></div>
                            <div class="col-12 col-md-9">
                              <select name="idgrupoPermissao" id="SelectLm" class="form-control-sm form-control">
                                <option value="0">Informe o nivel de acesso</option>
                                <?php foreach($lista_grupos as $g): ?>
                                    <option value="<?php echo $g['idgrupoPermissoes']; ?>" <?php echo ($g['idgrupoPermissoes']==$usuarioInfo['idgrupoPermissao'])?'selected="selected"':''; ?>><?php echo $g['nome']; ?></option>
                                <?php endforeach;?>    
                              </select>
                            </div>
                          </div>
                          <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Cadastrar Usuário</button></div>
                        </form>
  </div>
</div>
</div>

