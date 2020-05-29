<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio(tecnico)
        <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
       <?php if($this->session->flashdata("error")):?>
         <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
               </div>
                        <?php endif;?>
     <div class="box box-solid">
            <div class="box-body table-responsive">
                  <div class="col-lg-12">
                          <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                              <div class="form-group">
                                  <label for="" class="col-md-1 control-label">fecha:</label>
                                  <div class="col-md-3">
                                      <input type="date" class="form-control" name="fecha" value="<?php echo !empty($fecha) ? $fecha:'';?>">
                                  </div>

                                  <div class="col-md-3">

                                  </div>
                                  <div class="col-md-4">
                                      <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                      <a href="<?php echo base_url(); ?>reportes/ordenes/tecnico" class="btn btn-danger">Restablecer</a>
                                  </div>
                              </div>
                          </form>
                      <hr>
                             <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">N° de Orden</th>
                                    <th width="20%">Solicitante</th>
                                    <th width="10%">Fecha</th>
                                    <th width="20%">Tipo de orden</th>
                                    <th width="20%">Estatus</th>
                                    <th width="3%">Opciones</th>
                                </tr>
                            </thead>
                             <tbody>
                                 <?php if(!empty($ordenes)):?>
                                    <?php foreach($ordenes as $orden):?>
                                        <tr>
                                            <td><?php echo $orden->orden;?></td>
                                            <td><?php echo $orden->nombre;?> <?php echo $orden->apellido;?></td>
                                            <td><?php echo $orden->fechas;?></td>
                                            <td><?php echo $orden->solicitud;?></td>
                                            <td><?php echo $orden->estado;?></td>
                                             <?php $datasolicitudes = $orden->orden."*".$orden->nombre."*".$orden->apellido."*".$orden->fechas."*".$orden->solicitud."*".$orden->estado;?>
                                            <td>
                                               <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-ordenes btn-sm" data-toggle="modal" data-target="#modal-default" value="<?php echo $orden->orden;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                   <?php endforeach;?>
                                <?php endif;?>
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
        <h4 class="modal-title">Informacion de la Orden</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
