<?php //print_r($extrato);?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1>DEMOSTRATIVO</h1>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-6 col-md-6" style="text-align:center;">
            <div class="card" >
               <div class="card-body" style="text-align:center;">
                  <div class="stat-widget-one">
                     <div class="stat-icon dib"><i class="fab fa-bitcoin text-success border-success"></i></div>
                     <div class="stat-content dib">
                        <div class="stat-text">Saldo de Pontos</div>
                        <div class="stat-digit"><?php echo $saldo;?></div>
                        <div>
                           Extrato emitido em: 
                           <?php 
                              date_default_timezone_set('America/Sao_Paulo');
                              $date = date('d/m/Y H:i');
                              echo $date;
                              ;?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <strong class="card-title">Extrato de pontos por classe</strong>
               </div>
               <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size:11px;">
                     <thead>
                        <tr>
                           <th>Classe</th>
                           <th>Descrição</th>
                           <th>Valores</th>
                           <th>Data da Conquista</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($extrato as $l): ?>
                        <tr>
                           <td><?php echo $l['nome_classe'];?></td>
                           <td><?php echo $l['descricao'];?></td>
                           <td><?php echo '<span class="badge badge-success">'.'+'.$l['quantidade_talentos'].'</span>';;?></td>
                           <td><?php echo date('d/m/Y', strtotime ($l['data_conquista']));?></td>
                        </tr>
                        <?php endforeach;?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- .animated -->
</div><!-- .content -->