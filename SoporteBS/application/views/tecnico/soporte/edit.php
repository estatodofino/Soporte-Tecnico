<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio
        <small>Nueva orden</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body">
                    <div class="row">
<div class="col-lg-12">
<div class="panel panel-default">

<div class="panel-body">
<table class="table">
<tbody>
<tr>
<td>Numero de Orden:<?=$ordenes->num_orden?></td>
<td>Fecha de Solicitud:<?=$ordenes->fecha_solicitud?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 0">
<ul>
<li>
    <span><h5>Solicitante</h5>
    <span>Nombre y apellido: <?=$ordenes->solicitante?></span><br>
    <span>Dependencia: <?=$ordenes->dependencia?></span><br>
    <span>-</span>
</span></li>
</ul>
</td>
<td style="width: 50%; padding-left: 0">
<ul>
<li>
    <span><h5>Equipo</h5>
    <span>Codigo del equipo:<?=$ordenes->num_bien;?></span><br>
    <span>marca:<?=$ordenes->cod_marca;?></span><br>
    <input type="hidden" name="marca" id="marca" value="<?=$ordenes->cod_marca;?>">
    <span>Descripcion:<?=$ordenes->descrip_bien;?></span><br>
    <span>-</span>
</span></li>
</ul>
</td>
</tr>
<tr>
<td >
<li><span><h5>Descripcion de la orden</h5>
    <span>Defecto o problema:<?=$ordenes->descrip_orden;?></span><br>
    <input type="hidden" name="solicitud" id="solicitud" value="<?=$ordenes->cod_tipo_solicitud;?>">
    <span>Tipo de solicitud:<?=$ordenes->cod_tipo_solicitud;?></span><br>
    <span>Estado de la orden:<?=$ordenes->estatus_orden;?></span><br>
    <span>-</span>
</span>
</li>
</td>
<td >
<li><span><h5>Tecnico</h5>
    <input type="hidden" name="nomTc" id="nomTc" value="<?=$ordenes->ci_tecnico;?>">
    <span id="tecNom"></span><br>
    <span>Cedula:<?=$ordenes->ci_tecnico;?></span><br>
    <span>Fecha de asignacion:<?=$ordenes->fecha_asignacion_t;?></span><br>
    <span>-</span>
</span>
</li>
</td>
</tr>
</tbody>
</table>
</div>
<div class="panel-footer">
  <?php if ($ordenes->estatus_orden=="Asignada") { ?>
    <div  class="btn btn-success btn-change-state" value="<?php echo $ordenes->num_orden;?>"><span class="fa fa-cog"></span> Procesar orden</div>
<?php }else { ?>
  <div class="alert-success">La orden ya fue procesada
  </div>
  <?php } ?>
</div>
</div>
</div>
<!-- /.row -->


</div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

