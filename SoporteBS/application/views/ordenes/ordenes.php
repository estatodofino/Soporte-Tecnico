<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio
        <small>Procesar ordenes</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata("error")):?>
         <div class="callout callout-warning">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
            </div><?php endif;?>
    <?php if($this->session->flashdata("success")):?>
         <div class="callout callout-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
            </div><?php endif;?>

     <div class="box box-solid">
            <div class="box-body">
              <div class="row">
              <div class="col-xs-12">
                <div class="col-xs-4">
                    <div ><img style="width: 80%;" src="<?php echo base_url(); ?>assets/proy/images/cabecera_001.png"></div>
                  </div>
                  <div class="col-xs-8">
                    <b style="text-aling:center">SISTEMA DE INFORMACION BAJO AMBIENTE WEB</b><br>
                    <b>PARA EL CONTROL DE EQUIPOS Y SOPORTE TECNICO</b> <br>
                    <b>DE LA COORDINACIÓN DE TELEMÁTICA – NPF</b><br>
                  </div>
                </div> <br>
              <!-- /.col -->
            </div>
            <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <b>Solicitante</b>
              <address>
                <strong>Nombre y Apellido: </strong><?=$ordenes->solicitante?><br>
                <strong>Cedula: </strong><?=$ordenes->ci_solicitante?><br>
                <strong>Dependencia: </strong><?=$ordenes->dependencia?><br>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
             <b>Tecnico Asignado</b>
              <address>
                <strong>Nombre y Apellido: </strong><?=$ordenes->tecnico;?><br>
                <strong>Cedula: </strong><?=$ordenes->ci_tecnico;?><br>
                <strong>Fecha de asignacion:</strong> <?=$ordenes->fecha_asignacion_t;?><br>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Numero de Orden:</b> #<?=$ordenes->num_orden?><br>
              <input type="hidden" id="inOrdes" value="<?=$ordenes->num_orden?>">
              <b>Tipo de Orden:</b> <?=$ordenes->tipoOrden;?><br>
              <b>Estado de la Orden:</b> <?=$ordenes->estatus_orden;?>
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Codigo del Equipo</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Descripcion</th>
                  <th>Condicion</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td><?=$ordenes->num_bien;?></td>
                  <td><?=$ordenes->marca;?></td>
                  <td><?=$ordenes->modelo_bien;?></td>
                  <td><?=$ordenes->descrip_bien;?></td>
                  <td><?=$ordenes->condicion_bien;?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
            <!-- /.col -->
                </div>
                  <div class="row">
              <!-- accepted payments column -->
              <div class="col-xs-12">
                <p class="lead">Descripcion de la Orden:</p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                  <?=$ordenes->descrip_orden;?>
                </p>
              </div>
              <div class="col-xs-12">
                <?php if(!empty($informes)):?>
                  <div class="col-xs-12 table-responsive">
                    <h1>Informes Técnicos</h1>
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>N° informe</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>N° Orden</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach($informes as $item): ?>
                      <tr>
                        <td><?=$item->cod_IT;?></td>
                        <td><?=$item->fecha_IT;?></td>
                        <td><?=$item->descrip_IT;?></td>
                        <td><?=$item->num_orden;?></td>
                          </tr>
                          <?php endforeach;?>
                          </tbody>
                        </table>
                      </div>
                <?php endif;?>
                <?php if(empty($informes)):?>
                  <div class="">
                  <div class="callout callout-warning">
                   <h4><p>No hay informes tecnicos para esta orden!</p></h4></div>
                     </div>
                  <?php endif;?>
              </div>
            </div>
             <div class="row no-print">
                <div class="col-xs-12">
                  <input type="hidden" name="ordenid" id="ordenid" value="<?=$ordenes->num_orden?>">
                  <?php if ($ordenes->estatus_orden !="Procesada") {
                    if($ordenes->estatus_orden=="Asignada"){?>
                     <a class="btn btn-change-state btn-success"><span class="fa fa-file-text-o"></span> Crear Informe tecnico</a>
                   <?php  }elseif($ordenes->estatus_orden=="En proceso") {?>
                     <a class="btn new_info btn-info" data-toggle="modal" data-target="#modal-default"><span class="fa fa-file-text"></span> Crear Informe Tecnico</a>
                     <?php if (empty($informes)) {

                     }else {
                       echo '<a class="btn btn-change-state-pro btn-danger"><span class="fa fa-lock"></span> Cerrar Orden</a>';
                     } ?>

                  <?php  } }?>


                  <a class="btn btn-default btn-print pull-right"><i class="fa fa-print"></i> Print</a>
                </div>
              </div>
                  <div id="informes"></div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo informe tecnico </h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url();?>tech/soporte/new_informe" method="POST">
                  <input type="hidden" name="orden_num" id="orden_num" value="<?=$ordenes->num_orden?>">
                  <div class="form-group">
                  <label for="informe">Informe tecnico</label>
                  <textarea type="text" class="form-control" name="informe" id="informe" placeholder=""></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Guardar Informe</button>
                </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
