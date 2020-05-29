<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Equipos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata("success")):?>
        <div class="callout callout-success">
         <button type="button" class="close" data-dismiss="callout" aria-hidden="true">&times;</button>
          <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
              </div>
                <?php endif;?>
     <div class="box box-solid">
            <div class="box-body table-responsive">              
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <table id="table_id_2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th># Bien</th>
                              <th>Tipo</th>
                              <th>Marca</th>
                              <th>modelo</th>
                              <th>Descripcion</th>
                              <th>Condicion</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($equipos)): ?>
                                    <?php foreach($equipos as $item):?>
                                        <tr>
                                            <td><?php echo $item->num_bien;?></td>
                                            <td><?php echo $item->tipos;?></td>
                                            <td><?php echo $item->marca;?></td>
                                            <td><?php echo $item->modelo_bien;?></td>
                                            <td><?php echo $item->descrip_bien?></td>
                                            <td><?php echo $item->condicion_bien;?></td>
                                            <td>
                              <div class="btn-group">
                                  <a href="<?php echo base_url();?>tech/Equipos/ver/<?php echo $item->num_bien;?>" class="btn btn-info btn-view btn-sm"><span class="fa fa-search"></span></a>
                                    <a href="<?php echo base_url()?>tech/equipos/editar/<?=$item->num_bien;?>" class="btn btn-warning btn-sm"><span class="fa fa-cogs"></span></a>
                                  <a href="<?php echo base_url();?>tech/equipos/delete/<?=$item->num_bien;?>" class="btn btn-danger btn-remove btn-sm"><span class="fa fa-remove"></span></a>
                               </div>
                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
