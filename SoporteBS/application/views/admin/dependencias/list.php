
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Dependencias
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
                 <?php if($this->session->flashdata("error")):?>
        <div class="callout callout-warning">
         <button type="button" class="close" data-dismiss="callout" aria-hidden="true">&times;</button>
          <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
              </div>
                <?php endif;?>
     <div class="box box-solid">
            <div class="box-body table-responsive">
                             <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">Codigo</th>
                                    <th width="20%">Nombre</th>
                                    <th width="20%">Responsable</th>
                                    <th width="10%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if(!empty($dependencias)):?>
                                    <?php foreach($dependencias as $dependencia):?>
                                        <tr>
                                            <td><?php echo $dependencia->codigo;?></td>
                                            <td><?php echo $dependencia->nombre;?></td>
                                            <td><?php echo $dependencia->responsable;?>
                                            <!-- <?php $datacliente = $dependencia->codigo."*".$dependencia->nombre."*".$dependencia->responsable;?> -->
                                            <td>
                                               <div class="btn-group">
                                                    <!-- <button type="button" class="btn btn-info btn-view-dependencia btn-sm" data-toggle="modal" data-target="#modal-default" value="<?php echo $datacliente?>">
                                                        <span class="fa fa-search"></span>
                                                    </button> -->
                                                    <a href="<?php echo base_url()?>admin/Dependencias/edit/<?php echo $dependencia->codigo;?>" class="btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>admin/Dependencias/delete/<?php echo $dependencia->codigo;?>" class="btn btn-danger eliminar_dependencia btn-sm"><span class="fa fa-remove"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                   <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
