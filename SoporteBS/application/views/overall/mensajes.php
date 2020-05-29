<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Mensajes
        <small>Recibidos</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
       <div class="box-header with-border">
         <h3 class="box-title">Contacto </h3>
         <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
           </button>
         </div>
       </div>
      <div class="box-body">
        <div class="box-body table-responsive">
                    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>fecha</th>
                          <th>correo</th>
                          <th>nombres</th>
                          <th>asunto</th>
                          <th>mensaje</th>
                          <th>Opcion</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($contactos)): ?>
                                <?php foreach($contactos as $item):?>
                                    <tr>
                                        <td><?php echo $item->fecha_mail;?></td>
                                        <td><?php echo $item->correo_mail;?></td>
                                        <td><?php echo $item->nombres_mail;?></td>
                                        <td><?php echo $item->asunto_mail;?></td>
                                        <td><?php echo $item->mensaje_mail;?></td>
                                        <td>
                                          <input type="hidden" name="id_correo" id="id_correo" value="<?=$item->id;?>">
                                            <a href="#" class="btn btn-info btn-view-correo" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif ?>
                      </tbody>
                    </table>
                </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
    <section class="content">
     <div class="box box-solid">
       <div class="box-header with-border">
         <h3 class="box-title">Ordenes</h3>
         <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
           </button>
         </div>
       </div>
      <div class="box-body">
        <div class="box-body table-responsive">
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>fecha</th>
                <th>numero de Orden</th>
                <th>mensaje</th>
                <th>Respuesta</th>
                <th>Opcion</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($mensajes)): ?>
                      <?php foreach($mensajes as $item):?>
                          <tr>
                              <td><?php echo $item->fecha_resp;?></td>
                              <td><?php echo $item->num_orden;?></td>
                              <td><?php echo $item->respuesta_solic;?></td>
                              <td><?php if ($item->comentario_final=="") {
                              echo "<b>No hay respuesta...</b>";
                              }else {
                                echo $item->comentario_final;
                              }?></td>
                              <td>
                                <?php if ($item->comentario_final=="") {?>
                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-primary" value=""><span class="fa fa-envelope"></span></a>
                              <?php }else {?>
                                <a href="#" class="btn btn-warning disabled"  value=""><span class="fa fa-envelope"></span></a>
                                <?php } ?>
                                </td>
                          </tr>
                      <?php endforeach;?>
                  <?php endif ?>
            </tbody>
          </table>
      </div>
    </div>
    </div>
    </section>
</div>
<!-- /.content-wrapper -->
<!--Modal ddefaul-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensaje</h4>
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
<div class="modal fade" id="modal-primary">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-envelope-o"></span> Nuevo Mensaje</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>admin/soporte/mensaje_respuesta" method="POST">
          <input type="hidden" name="orden_num" id="orden_num" value="<?=$item->num_orden?>">
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
