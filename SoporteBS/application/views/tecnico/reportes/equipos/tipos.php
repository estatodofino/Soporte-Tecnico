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
            	<div class="row">
					<?php if (count($tipos)): ?>

					<?php foreach ($tipos as $item ):?>
					<div class="col-sm-3 col-md-6 col-xs-12">
						<div class="small-box bg-aqua">
				            <div class="inner">
				              <p><h3><?=$item->tipo_de_equipo;?></h3></p>
				            </div>
				            <div class="icon">
				              <i class="fa fa-desktop"></i>
				            </div>
				            <a href="<?php echo base_url();?>Reportes/Equipo/ver_por_tipo/<?=$item->cod_tipo_equipo;?>" class="small-box-footer">ver detalles <i class="fa fa-arrow-circle-right"></i></a>
				          </div>

					</div>
					<?php endforeach; ?>
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
