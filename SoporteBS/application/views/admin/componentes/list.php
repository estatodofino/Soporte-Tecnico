
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Componentes
        <small>Consultar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if(empty($componentes)):?>
    <div class="callout callout-warning">
     <h4><p>No posee componentes ingresados! agregar componente <a href="<?php echo base_url();?>admin/Componentes/agregar">aqui</a></p></h4></div>
    <?php endif;?>
    <?php if($this->session->flashdata("success")):?>
    <div class="callout callout-success">
     <button type="button" class="close" data-dismiss="callout" aria-hidden="true">&times;</button>
      <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
          </div>
            <?php endif;?>
     <div class="box box-solid">
            <div class="box-body table-responsive">
                     <div>
                        <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Tipo de componente</th>
                         <th>Acciones
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (!empty($componentes)): ?>
                        <?php foreach($componentes as $item):?>
                            <tr>
                                <td><?php echo $item->cod_componente;?></td>
                                <td><?php echo $item->nom_componente;?></td>
                                <td><?php echo $item->tipo_componente;?></td>
                                <td>
                                    <a href="<?php echo base_url();?>admin/Componentes/ver/<?php echo $item->cod_componente;?>" class="btn btn-info btn-view"><span class="fa fa-search"></span></a>

                                </td>
                            </tr>
                        <?php endforeach;?>
                       <?php endif ?>
                      </tbody>
                    </table>
                </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--Modal ddefaul-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion del componente</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
