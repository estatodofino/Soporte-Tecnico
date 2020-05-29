<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reportes
        <small>Listado por Dependencia</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body table-responsive">
              <?php if (count($equipos)): ?>
               <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <!-- <td>Usuario</td> -->
                            <td>Codigo del Bien</td>
                            <td>Marca</td>
                            <td>Modelo</td>
                            <td>Tipo de equipo</td>
                            <td>Condicion</td>
                            <td>Opciones</td>
                          </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($equipos as $item ):?>
                             <tr>
                              <!-- <td>Usuario: <?=$item->ci_usuario?></td> -->
                              <td><?=$item->num_bien;?></td>
                              <td><?=$item->marca;?></td>
                              <td><?=$item->modelo_bien;?></td>
                              <td><?=$item->tipos;?></td>
                              <td><?=$item->condicion_bien;?></td>
                            </tr>
                           <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                    <strong><i class="fa fa-warning fa-fw"></i>Disculpe!</strong><p> No Existen equipos en este estado</p>
                  </div>
                    <?php endif; ?>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
