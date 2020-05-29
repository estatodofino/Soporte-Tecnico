<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Informe Tecnico
        <small>numero de Informe: <?=$informe->cod_IT;?></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="">
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
     <div class="box box-solid">
            <div class="box-body">
              <div class="row">
                <div class="col-xs-4">
                  <div ><img style="width: 50%; height: 50%;" src="<?php echo base_url(); ?>assets/proy/images/cabecera_001.png"></div>
                </div>
                <div class="col-xs-8">
                  <b style="text-aling:center">SISTEMA DE INFORMACION BAJO AMBIENTE WEB</b><br>
                  <b>PARA EL CONTROL DE EQUIPOS Y SOPORTE TECNICO</b> <br>
                  <b>DE LA COORDINACIÓN DE TELEMÁTICA – NPF</b><br>
                </div>
              </div> <br>
              <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <b>Solicitante</b>
                <address>
                  <strong>Nombre y Apellido: </strong><div style="display:inline-block;" id="solicitante"></div><br>
                  <input type="hidden" name="ci_solicitante" id="ci_solicitante" value="<?=$informe->ci_solicitante?>">
                  <strong>Cedula: </strong><?=$informe->ci_solicitante?><br>
                  <strong>Dependencia: </strong><?=$informe->dependencia?><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
               <b>Tecnico Asignado</b>
                <address>
                  <?php if ($informe->ci_tecnico=="2222222"): ?>
                  <strong style="color:red;">No se ha asignado un tecnico</strong>
                <?php else:?>
                  <strong>Cedula: </strong><?=$informe->ci_tecnico;?><br>
                  <strong>Nombre y Apellido: </strong><?=$informe->nom_usuario;?> <?=$informe->ape_usuario;?><br>
                <?php endif;?>
                  <br>

                  <strong>Fecha de asignacion:</strong> <?php if ($informe->fecha_asignacion_t=='0000-00-00') {
                  echo "No se ha asignado la orden";
                }else {
                  echo $informe->fecha_asignacion_t;
                };?><br>
                <b>Fecha de Cierre:</b><?php if ($informe->feccha_cierre=='0000-00-00') {
                  echo "Orden Abierta";
                }else {
                  echo $informe->feccha_cierre;
                };?><br>
                </address>
              </div>
              <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Numero de Orden:</b> #<?=$informe->num_orden?><br>
              <input type="hidden" id="inOrdes" value="<?=$informe->num_orden?>">
              <b>Tipo de Orden:</b> <?=$informe->solicitud;?><br>
              <b>Estado de la Orden:</b> <?=$informe->estatus_orden;?>
            </div>
              <!-- /.col -->
              <div class="col-xs-12">
              <p class="lead">Descripcion de la Orden:</p>

              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              <?=$informe->descrip_orden;?>
              </p>
              </div>
              <div class="col-xs-12">
              <h1 class="lead">Informe Técnico:</h1>
              <b>Número de Informe: </b><?=$informe->cod_IT;?> <br>
              <b>Reporte técnico: </b>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              <?=$informe->descrip_IT;?>
              </p>
              <b>Fecha de Informe: </b><?=$informe->fecha_IT;?> <br>
              </div>
            </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
