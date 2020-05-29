<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio
        <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
        <div class="box-body table-responsive">
         <?php if (count($ordenes)): ?>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <td>Numero de Orden</td>
                            <td>Solicitante</td>
                            <td>Estatus</td>
                            <td>Fecha de Solicitud</td>
                            <td>Fecha de Asignacion</td>
                            <td>Fecha de cierre</td>
                            <td>Opciones</td>
                          </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($ordenes as $item ):?>
                             <tr>
                              <td><?=$item->orden;?></td>
                              <td><?=$item->nombre?><?=$item->apellido?></td>
                              <td><?=$item->estado;?></td>
                              <td><?=$item->fechas;?></td>
                              <td><?php if ($item->fecha_asignacion=="0000-00-00") {
                                echo "No se ha asignado un tecnico";
                              }else {
                                echo $item->fecha_asignacion;
                              }?></td>
                              <td><?php if ($item->feccha_cierre=="0000-00-00") {
                                echo "Orden Abierta";
                              }else {
                                echo $item->feccha_cierre;
                              }?></td>
                              <td>
                                <button type="button" name="button" class="btn btn-success btn-view-ordenes" data-toggle="modal" data-target="#modal-default" value="<?=$item->orden;?>"><span class="fa fa-search"></span></button>
                              </td>
                            </tr>
                           <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                  <div class="alert callout callout-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                    <strong><i class="fa fa-warning fa-fw"></i>Disculpe!</strong><p> No Existen ordenes en este estado</p>
                  </div>
                    <?php endif; ?>
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
        <button type="button" class="btn btn-primary btn-print" ><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
