
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio
        <small>Equipos</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body table-responsive">
          <div class="col-lg-12 col-xs-12">
            <?php if (count($dependencias)): ?>
              <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <td><h4>Dependencias</h4></td>
                  </tr>
                </thead>
                <tbody>
                   <?php foreach ($dependencias as $item ):?>
                           <tr>
                             <td>
                              <a href="<?php echo base_url()?>reportes/ordenes/usuario_depen/<?=$item->codigo?>"><?=$item->nombre;?></a>
                            </td>
                          </tr>
                   <?php endforeach; ?>
                </table>
          <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          </button>
          <strong><i class="fa fa-warning fa-fw"></i>Disculpe!</strong><p> No existe registro.</p>
        </div>

          <?php endif; ?>
                  </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
