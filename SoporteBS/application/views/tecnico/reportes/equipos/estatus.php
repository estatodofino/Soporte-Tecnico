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
     <div class="box box-solid ">
            <div class="box-body table-responsive">
					<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <td>Estado de los equipos</td>
                            </tr>
                        </thead>
						<tbody>
							<tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/equipo/ver_estatus/Bueno"> Bueno</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/equipo/ver_estatus/Regular"> Regular</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/equipo/ver_estatus/Dañado"> Dañado</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/equipo/ver_estatus/reparacion"> En reparacion</a></td></tr>
								 <tr>
								 <td style="width: 25%"><a href="<?php echo base_url()?>reportes/equipo/ver_estatus/Desincorporado"> Desincorporado</a></td></tr>
						</table>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
