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
                            <td>Nº de la orden</td>
                            <td>Solicitante</td>
                            <td>Fecha solicitud</td>
                            <td>Fecha Asignacion</td>
                            <td>estado</td>
                            <td>opciones</td>
                          </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($ordenes as $item ):?>
                             <tr>

                               <td><?=$item->num_orden;?></td>
                               <td><?=$item->nom_usuario?> <?=$item->ape_usuario?></td>
                              <td><?=$item->fecha_asignacion;?></td>
                              <td><?=$item->fecha_asignacion;?></td>
                              <td><?=$item->estado;?></td>
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
                    <strong><i class="fa fa-warning fa-fw"></i>Disculpe!</strong><p> No Existen ordenes en esta dependencia</p>
                  </div>
                    <?php endif; ?>
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
