
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reportes
        <small>Equipos</small>
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
        <td>Codigo del componente</td>
        <td>Nombre</td>
        <td>Tipo de Componente</td>
      </tr>
    </thead>
    <tbody>
       <?php foreach ($componentes as $item ):?>
               <tr>
                 <td ><?=$item->cod_componente;?></td>
                 <td ><?=$item->nom_componente;?></td>
                 <td ><?=$item->tipo_componente;?></td>
                <td><a href="<?php echo base_url();?>reportes/Equipos/ver_compo/<?=$item->cod_componente;?>" class="btn btn-info btn-view"><span class="fa fa-search"></span></a></td>
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
