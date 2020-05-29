<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Panel de control
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body">
              <div class="row">
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                      <div class="inner">
                          <h3><?php echo $cantOrdenes;?></h3>

                          <p>Ordenes</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-file-text-o"></i>
                      </div>
                      <a href="<?php echo base_url();?>admin/soporte/atencion" class="small-box-footer">Ver Ordenes <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                      <div class="inner">
                          <h3><?php echo $cantBienes;?></h3>

                          <p>Bienes</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-desktop"></i>
                      </div>
                      <a href="<?php echo base_url();?>admin/equipos" class="small-box-footer">Ver Bienes <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                      <div class="inner">
                          <h3><?php echo $cantUsuarios;?></h3>

                          <p>Usuarios</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person-add"></i>
                      </div>
                      <a href="<?php echo base_url();?>admin/usuarios" class="small-box-footer">Ver Usuarios <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                      <div class="inner">
                          <h3><?php echo $cantInformes;?></h3>

                          <p>Informes tecnicos</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="<?php echo base_url();?>reportes/Informes" class="small-box-footer">Ver Ventas <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->
                 </div>
            </div>
    <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info box collapsed-box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Ultimas Ordenes</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>N° de Orden</th>
                              <th>Solicitante</th>
                              <th>Fecha</th>
                              <th>Tipo de orden</th>
                              <th>Estatus</th>
                              <th>Ver orden</th>
                          </tr>
                      </thead>
                       <tbody>
                           <?php if(!empty($ordenes)):?>
                              <?php foreach($ordenes as $orden):?>
                                  <tr>
                                      <td><?php echo $orden->orden;?></td>
                                      <td><?php echo $orden->nombre;?> <?php echo $orden->apellido;?></td>
                                      <td><?php echo $orden->fechas;?></td>
                                      <td><?php echo $orden->solicitud;?></td>
                                      <td>
                                        <?php if ($orden->estado=="Asignada") :?>
                                          <span class="label label-success">Asignada</span>
                                        <?php elseif ($orden->estado=="En espera") :?>
                                          <span class="label label-warning">En espera
                                          </span>
                                        <?php elseif ($orden->estado=="En proceso") :?>
                                          <span class="label label-info">En proceso
                                          </span>
                                        <?php elseif ($orden->estado=="Procesada") :?>
                                          <span class="label label-primary">Procesada
                                          </span>
                                      <?php elseif ($orden->estado=="Cerrada") :?>
                                        <span class="label label-danger">Cerrada
                                        </span>
                                      <?php endif;?>
                                        </td>
                                       <?php $datasolicitudes = $orden->orden."*".$orden->nombre."*".$orden->apellido."*".$orden->fechas."*".$orden->solicitud."*".$orden->estado;?>
                                      <td>
                                         <div class="btn-group">
                                              <a href="<?php echo base_url()?>admin/soporte/asignar/<?=$orden->orden?>" type="button" class="btn btn-info btn-sm" value="<?php echo $datasolicitudes?>">
                                                  <span class="fa fa-search"></span>
                                              </a>
                                          </div>
                                      </td>
                                  </tr>
                             <?php endforeach;?>
                          <?php endif;?>
                      </tbody>
                  </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <a href="<?php echo base_url();?>admin/soporte/" class="btn btn-sm btn-info btn-flat pull-left">Ver mis Ordenes</a>
                <a href="<?php echo base_url();?>admin/soporte/atencion" class="btn btn-sm btn-default btn-flat pull-right">Ver todas las Ordenes</a>
              </div>
              <!-- /.box-footer -->
                  <!-- /.panel-body -->
              </div>
              
              <!-- /.panel -->
          </div>
          <!-- /.table-responsive -->

        </div>

    </div>

    <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
