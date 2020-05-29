<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Dependencias</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body table-responsive">
          <?php if (count($dependencias)): ?>
                      <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <td>Dependencias</td>
                          </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($dependencias as $item ):?>
                                   <tr>
                                     <td style="width: 35%"><a href="<?php echo base_url()?>reportes/usuarios/ver_dependencias/<?=$item->codigo?>"> <?php echo $item->nombre;?> </a></td>
                                  </tr>
                           <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                    <strong><i class="fa fa-warning fa-fw"></i>Disculpe!</strong><p> No se han cargado Depencencias</p>
                  </div>

                    <?php endif; ?>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
