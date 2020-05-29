<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
<?php if($this->session->flashdata("success")):?>
  <div class="callout callout-success">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
       </div>
   <?php endif;?>
     <div class="box box-solid">
            <div class="box-body table-responsive">
                <div class="col-lg-12">
                 <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10%">N° de Orden</th>
                        <th width="20%">Solicitante</th>
                        <th width="10%">Fecha</th>
                        <th width="20%">Tipo de orden</th>
                        <th width="20%">Estatus</th>
                        <th width="20%">Opciones</th>
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
                                <td>
                                  <?php if ($orden->estado=="Asignada") :?>
                                    <span class="label label-success">Asignada</span>
                                  <?php elseif ($orden->estado=="En espera") :?>
                                    <span class="label label-warning">En espera
                                    </span>
                                  <?php elseif ($orden->estado=="En proceso") :?>
                                    <span class="label label-info">En proceso
                                    </span>
                                <?php elseif ($orden->estado=="Cerrada") :?>
                                  <span class="label label-danger">Cerrada
                                  </span>
                                <?php elseif ($orden->estado=="Procesada") :?>
                                  <span class="label label-primary">Procesada
                                  </span>
                                <?php endif;?>
                                  </td>
                                 <?php $datasolicitudes = $orden->orden."*".$orden->nombre."*".$orden->apellido."*".$orden->fechas."*".$orden->solicitud."*".$orden->estado;?>
                                <td>
                                   <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-info btn-view-ordenes btn-sm" data-toggle="modal" data-target="#modal-default" value="<?php echo $orden->orden;?>">
                                        <span class="fa fa-search"></span>
                                    </button> -->
                                    <a href="<?php echo base_url();?>tech/soporte/ver/<?=$orden->orden?>" class="btn btn-info" ><span class="fa fa-search"></span> </a>
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
