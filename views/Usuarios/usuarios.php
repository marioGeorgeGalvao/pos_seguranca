<div class="col-md-12 col-sm-12 col-xs-12">
    <a href="<?php echo BASE_URL; ?>/usuarios/adicionar">
        <button class="btn btn-success">Novo Usuário</button>
    </a>    
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de usuários</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table">
                      <thead>
                        <tr>
                            <th>Nome do usuário</th>
                            <th>E-mail</th>
                            <th>Nivel de Acesso</th>
                            <th>Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($lista_usuarios as $u):?>
                    <tr>
                        <td>
                            <?php echo $u['nome_usuario']; ?>
                        </td>
                        <td><?php echo $u['login']; ?></td>
                        <td class="hidden-480"><?php echo $u['nome']; ?></td>
                        
                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                <a href=" <?php echo BASE_URL; ?>/usuarios/editarUsuario/<?php echo $u['idusuario']; ?> ">
                                    <button class="btn btn-xs btn-info">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </button>
                                </a>
                                <a href=" <?php echo BASE_URL; ?>/usuarios/deletarUsuario/<?php echo $u['idusuario']; ?> "
                                       onclick="return confirm('Deseja excluir o usuario selecionado?')">    
                                    <button class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </button>
                                </a>
                            </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                    </table>

        </div>
    </div>
</div>