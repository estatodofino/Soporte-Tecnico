
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio
        <small>Estatus</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body table-responsive">
					<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                           <thead>
                        <tr>
                            <td>Ordenes por Estatus</td>
                            </tr>
                        </thead>
						<tbody>
							<tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/ordenes/ver_estatus/espera"> En espera</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/ordenes/ver_estatus/asignada"> Asignada</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/ordenes/ver_estatus/proceso"> En proceso</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/ordenes/ver_estatus/cerrada"> Cerrada</a></td></tr>
						</table>
				</div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
