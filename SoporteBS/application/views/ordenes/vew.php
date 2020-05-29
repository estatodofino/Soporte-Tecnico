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
  <div class="col-sm-4 invoice-col">
    <b>Solicitante</b>
    <address>
      <strong>Nombre y Apellido: </strong><?=$orden->solicitante;?><br>
      <strong>Cedula: </strong><?=$orden->ci_solicitante?><br>
      <strong>Dependencia: </strong><?=$orden->dependencia?><br>
    </address>
  </div>
  <!-- /.col -->
  <div class="col-sm-4 invoice-col">
   <b>Tecnico Asignado</b> 
    <address>
      <strong>Cedula: </strong><?php if ($orden->ci_tecnico=="2222222"): ?>
      <h1>No hay tecnico</h1>
    <?php endif;?>
      <br>
      <strong>Nombre y Apellido: </strong><?=$orden->tecnico;?><br>
      <strong>Fecha de asignacion:</strong> <?php if ($orden->fecha_asignacion_t=='0000-00-00') {
      echo "No se ha asignado la orden";
    }else {
      echo $orden->fecha_asignacion_t;
    };?><br>
    <b>Fecha de Cierre:</b><?php if ($orden->feccha_cierre=='0000-00-00') {
      echo "Orden Abierta";
    }else {
      echo $orden->feccha_cierre;
    };?><br>
    </address>
  </div>
  <!-- /.col -->
<div class="col-sm-4 invoice-col">
  <b>Numero de Orden:</b> #<?=$orden->num_orden?><br>
  <input type="hidden" id="inOrdes" value="<?=$orden->num_orden?>">
  <b>Tipo de Orden:</b> <?=$orden->tipoOrden;?><br>
  <b>Estado de la Orden:</b> <?=$orden->estatus_orden;?>
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
        <td><?=$orden->num_bien;?></td>
        <td><?=$orden->marca;?></td>
        <td><?=$orden->modelo_bien;?></td>
        <td><?=$orden->descrip_bien;?></td>
        <td><?=$orden->condicion_bien;?></td>
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
<?=$orden->descrip_orden;?>
</p>
</div>
</div>
  
  

