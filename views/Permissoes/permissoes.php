
<div class="col-md-6 col-sm-6 col-xs-12">
<a href="<?php echo BASE_URL; ?>/permissoes/adicionarPermissoes">
    <button class="btn btn-success"> Adicionar Permissões</button>
</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Permissões</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                            <th scope="col">Permissões</th>
                            <th scope="col">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($lista_permissoes as $p): ?>
                        <tr>
                            <td><?php echo $p['nome']; ?></td>
                            <td>
                                <span class="editable" id="username"><a href=" <?php echo BASE_URL; ?>/permissoes/deletarPermissao/<?php echo $p['idpermissoes']; ?> " onclick="return confirm('Deseja excluir a permissão selecionada?')"> Excluir</a></span>                      
                            </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>

<div class="col-md-6 col-sm-6 col-xs-12">
<a href="<?php echo BASE_URL; ?>/permissoes/adicionarGrupos">
    <button class="btn btn-success"> Adicionar Grupos de Permissões</button>
</a>
    <div class="x_panel">
        <div class="x_title">
            <h2>Grupos de Permissões</h2>
        <div class="clearfix"></div>
    </div>
<div class="x_content">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Grupos de Permissões</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
            <tbody>
                <?php foreach ($lista_grupoPermissoes as $gp): ?>
                <tr>
                    <td><?php echo $gp['nome']; ?></td>
                    <td>
                        <span class="editable" id="username"><a href=" <?php echo BASE_URL; ?>/permissoes/editarGrupos/<?php echo $gp['idgrupoPermissoes']; ?> ">Editar </a> - <a href=" <?php echo BASE_URL; ?>/permissoes/deletarGrupo/<?php echo $gp['idgrupoPermissoes']; ?> " onclick="return confirm('Deseja excluir a permissão selecionada?')"> Excluir</a></span>                      
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
</div>
</div>
</div>

