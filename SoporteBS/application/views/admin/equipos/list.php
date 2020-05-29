<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Equipos
        <small>Consultas</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
    <?php if($this->session->flashdata("success")):?>
       <div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
           </div>
          <?php endif;?>
    <div class="box box-solid">
    <div class="box-body table-responsive">
                <table id="table_id_2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th># Bien</th>
                      <th>Tipo</th>
                      <th>Marca</th>
                      <th>Descripcion</th>
                      <th>Condicion</th>
                      <th>Opcion</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($equipos)): ?>
                            <?php foreach($equipos as $item):?>
                                <tr>
                                    <td><?php echo $item->num_bien;?></td>
                                    <td><?php echo $item->tipos;?></td>
                                    <td><?php echo $item->marca;?></td>
                                    <td><?php echo $item->descrip_bien?></td>
                                    <td><?php echo $item->condicion_bien;?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>admin/Equipos/ver/<?php echo $item->num_bien;?>" class="btn btn-info btn-view"><span class="fa fa-search"></span></a>
                                        <a href="<?php echo base_url();?>admin/Equipos/edit_equipo/<?php echo $item->num_bien;?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>

                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif ?>
                  </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
