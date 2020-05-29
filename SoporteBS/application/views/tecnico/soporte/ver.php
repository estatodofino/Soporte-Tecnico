
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio
        <small>Ver orden</small>
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
             <?php if ($ordenes->ci_tecnico=="2222222"){
               echo "<strong style='color:red;'>No hay tecnico Asignado</strong><br>";
             } else { ?>
               <strong>Cedula:</strong>
               <strong>Nombre y Apellido: </strong><?=$ordenes->tecnico;?><br>
             <?php } ?>
             <strong>Fecha de asignacion:</strong><?php if ($ordenes->fecha_asignacion_t=='0000-00-00') {
               echo "No se ha asignado la orden";
             }else {
               echo $ordenes->fecha_asignacion_t;
             };?>
             <b>Fecha de Cierre:</b><?php if ($ordenes->feccha_cierre=='0000-00-00') {
               echo "Orden Abierta";
             }else {
               echo $ordenes->feccha_cierre;
             };?><br>
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
              <!-- Informes tecnicos -->
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
                <!-- Informes tecnicos -->
            </div>
            <?php if($ordenes->feccha_cierre!="0000-00-00"):?>
              <div class="row">
                <div class="col-xs-12">
                  <p class="lead">Mensaje:</p>
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php if ($ordenes->respuesta_solic=="") {
                      echo "<b>No ha enviado ningun mensaje...</b>";
                    }else {
                      echo $ordenes->respuesta_solic;
                    }?>
                  </p>
                  <p class="lead">Respuesta:</p>
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php if ($ordenes->comentario_final=="") {
                      echo "<b>No ha enviado ningun mensaje...</b>";
                    }else {
                      echo $ordenes->comentario_final;
                    }?>
                  </p>
                </div>
              </div>
            <?php endif;?>
             <div class="row no-print">
                <div class="col-xs-12">
                  <input type="hidden" name="ordenid" id="ordenid" value="<?=$ordenes->num_orden?>">
                    <?php if ($ordenes->estatus_orden =="Cerrada" && $ordenes->respuesta_solic==""): ?>
                      <button type="button" name="button" class="btn-success btn" data-toggle="modal" data-target="#modal-default"><span class="fa fa-envelope-o"></span> Enviar Mensaje</button>
                    <?php endif;?>
                  <a class="btn btn-default btn-print pull-right"><i class="fa fa-print"></i> Print</a>
                </div>
              </div>
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
                <h4 class="modal-title"><span class="fa fa-envelope-o"></span> Nuevo Mensaje</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url();?>tech/soporte/mensaje" method="POST">
                  <input type="hidden" name="orden_num" id="orden_num" value="<?=$ordenes->num_orden?>">
                  <div class="form-group">
                  <label for="mensaje">Mensaje</label>
                  <textarea type="text" class="form-control" name="mensaje" id="mensaje" placeholder=""></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary"><span class="fa  fa-send"></span> Enviar</button>
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
