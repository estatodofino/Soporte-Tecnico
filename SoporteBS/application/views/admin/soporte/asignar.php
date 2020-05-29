<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Orden de servicio
        <small>Asignacion</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata("success")):?>
        <div class="alert callout callout-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
         </div>
      <?php endif;?>
<div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-xs-4">
          <div ><img style="width: 50%;" src="<?php echo base_url(); ?>assets/proy/images/cabecera_001.png"></div>
        </div>
        <div class="col-xs-8">
          <b style="text-aling:center">SISTEMA DE INFORMACION BAJO AMBIENTE WEB</b><br>
          <b>PARA EL CONTROL DE EQUIPOS Y SOPORTE TECNICO</b> <br>
          <b>DE LA COORDINACIÓN DE TELEMÁTICA – NPF</b><br>
        </div>
      </div> <br>
      <?php if ($ordenes->estatus_orden!="Cerrada"):?>
         <?php if ($ordenes->estatus_orden!="Procesada"):?>
           <?php if($ordenes->ci_tecnico=='2222222'){?>
             <div class="callout callout-warning">
               <h4>No se ha asignado un tecnico!</h4></div>
               <form action="<?php echo base_url();?>admin/Soporte/update_orden/<?=$ordenes->num_orden?>" method="POST">      <div class="form-group col-md-6">
                 <input type="hidden" name="numO" id="numO" value="<?=$ordenes->num_orden;?>"/>
                   <label for="tecnico">Asignar Tecnico:</label>
                   <select name="tecnico" id="tecnico" class="form-control">
                     <option value="">::Seleccione</option>
                      <?php foreach($tecnicos as $tecnico):?>
                       <option value="<?php echo $tecnico->ci_usuario;?>"><?php echo $tecnico->nom_usuario;?> <?php echo $tecnico->ape_usuario;?></option>
                       <?php endforeach;?>
                   </select>
                 </div>
               <div class="form-group col-md-6">
                   <label for="fechasig">Fecha de asignacion:</label>
                   <input type="text" class="form-control" id="fechasig" name="fechasig"
                  placeholder="<?php echo date("Y-m-d"); ?>" readonly="">
               </div>
                 <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                  </div>
               </form>
               <?php }else {?>
                 <div class="callout callout-success">
                   <h4>Se ha asignado un tecnico!</h4></div>
                 <?php }?>
         <?php endif;?>
      <?php elseif($ordenes->estatus_orden=="Cerrada"):?>
        <div class="callout callout-danger">
          <h4>Orden cerrada!</h4></div>
        <?php endif;?>
      <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <b>Solicitante</b>
        <address>
          <strong>Nombre y Apellido: </strong><?=$ordenes->solicitante;?><br>
          <strong>Cedula: </strong><?=$ordenes->ci_solicitante?><br>
          <strong>Dependencia: </strong><?=$ordenes->dependencia?><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
       <b>Tecnico Asignado</b>
        <address>
          <?php if ($ordenes->ci_tecnico=="2222222"): ?>
          <strong style="color:red;">No se ha asignado un tecnico</strong>
        <?php else:?>
          <strong>Cedula: </strong><?=$ordenes->ci_tecnico;?><br>
          <strong>Nombre y Apellido: </strong><?=$ordenes->tecnico;?><br>
        <?php endif;?>
          <br>

          <strong>Fecha de asignacion:</strong> <?php if ($ordenes->fecha_asignacion_t=='0000-00-00') {
          echo "No se ha asignado la orden";
        }else {
          echo $ordenes->fecha_asignacion_t;
        };?><br>
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
    </div>
    <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-12">
    <p class="lead">Informes tecnicos:</p>

    <?php if(!empty($informes)):?>
      <div class="col-xs-12 table-responsive">
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
    <?php if ($ordenes->estatus_orden=="Procesada"):?>
      <input type="hidden" name="ordenid" id="ordenid" value="<?=$ordenes->num_orden?>">
    <a class="btn btn-change-state-clo btn-danger"><span class="fa fa-lock"></span> Cerrar Orden</a>
  <?php endif;?>
       </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
