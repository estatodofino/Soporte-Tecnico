<div class="row">
  <div class="col-xs-4">
    <div ><img style="width: 100%; height: 100%;" src="<?php echo base_url(); ?>assets/proy/images/cabecera_001.png"></div>
  </div>
  <div class="col-xs-8">
    <b style="text-aling:center">SISTEMA DE INFORMACION BAJO AMBIENTE WEB</b><br>
    <b>PARA EL CONTROL DE EQUIPOS Y SOPORTE TECNICO</b> <br>
    <b>DE LA COORDINACIÓN DE TELEMÁTICA – NPF</b><br>
  </div>
</div> <br>
<div class="row invoice-info">

<div class="col-sm-12 invoice-col">
  <div class="box-body no-padding">
    <div class="mailbox-read-info">
      <h3><?=$correo->asunto_mail;?></h3>
      <h5>From: <?=$correo->correo_mail;?>
        <span class="mailbox-read-time pull-right"><?=$correo->fecha_mail;?></span></h5>
    </div>
    <!-- /.mailbox-read-info -->
    <div class="mailbox-controls with-border text-center">
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
          <i class="fa fa-trash-o"></i></button>
        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
          <i class="fa fa-reply"></i></button>
        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
          <i class="fa fa-share"></i></button>
      </div>
      <!-- /.btn-group -->
      <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
        <i class="fa fa-print"></i></button>
    </div>
    <!-- /.mailbox-controls -->
    <div class="mailbox-read-message">
      <p><?=$correo->mensaje_mail;?></p>
    </div>
    <!-- /.mailbox-read-message -->
  </div>
</div>
<!-- /.col -->
</div>
