
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reportes
        <small>Equipos por componentes</small>
        </h1>
    </section>
    <!-- Main content -->
<section class="content">
<div class="box box-solid">
<div class="box-body table-responsive">
<?php if (count($componentes)): ?>
  <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
    <tr>
        <td>Tipos de Componentes</td>
        </tr>
    </thead>
    <tbody>
       <?php foreach ($componentes as $item ):?>
               <tr>
                 <td style="width: 35%"><a href="<?php echo base_url()?>reportes/equipos/ver_por_tipo_compo/<?=$item->cod_tipo?>"> <?php echo $item->nom_tipo;?> </a></td>
              </tr>
       <?php endforeach; ?>
    </table>
<?php else: ?>
<div class="alert alert-danger alert-dismissible fade in" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
</button>
<strong><i class="fa fa-warning fa-fw"></i>Disculpe!</strong><p> No se han cargado Componentes</p>
</div>
<?php endif; ?>
</div>
</div>
</section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
