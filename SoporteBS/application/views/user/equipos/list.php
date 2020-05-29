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
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>user/equipos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Equipo</a>
                    </div>
                </div>
                <hr>
              <div class="row">
                <div class="col-md-12">
                <?php if(!empty($equipos)):?>
                 <table id="table_id_2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th>Descripcion</th>
                              <th>estado</th>
                              <th>Opciones</th>
                          </tr>
                      </thead>
                      <tbody>
                    <?php foreach($equipos as $equipo):?>
                        <tr>
                            <td><?php echo $equipo->num_bien;?></td>
                            <td><?php echo $equipo->marca;?></td>
                            <td><?php echo $equipo->modelo_bien;?></td>
                            <td><?php echo $equipo->descrip_bien;?></td>
                            <td><?php echo $equipo->condicion_bien;?></td>
                            <?php $dataequipo = $equipo->num_bien."*".$equipo->marca."*".$equipo->modelo_bien;?>
                            <td>
                              <div class="btn-group">
                                   <a href="<?php echo base_url()?>user/equipos/ver/<?=$equipo->num_bien;?>" type="button" class="btn btn-info btn-view-equipos btn-sm">
                                       <span class="fa fa-search"></span>
                                   </a>
                                    <a href="<?php echo base_url()?>user/equipos/editar/<?=$equipo->num_bien;?>" class="btn btn-warning btn-sm"><span class="fa fa-cogs"></span></a>
                                  <a href="<?php echo base_url();?>user/equipos/delete/<?=$equipo->num_bien;?>" class="btn btn-danger btn-remove btn-sm"><span class="fa fa-remove"></span></a>
                               </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                  </tbody>
              </table>
            <?php endif;?>
            <?php if(empty($equipos)):?>
              <div class="callout callout-warning">
               <h4><p>No posee equipos Asignados!</p></h4><p>agregar equipo <a href="<?php echo base_url();?>user/equipos/add">aqui</a> </p></div>

              <?php endif;?>
                    </div>
                  </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
