<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ordenes de Servicio
        <small>atencion</small> 
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if($this->session->flashdata("success")):?>
  <div class="callout callout-success">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
       </div>
   <?php endif;?>
     <div class="box box-solid">
            <div class="box-body table-responsive">
                     <div class="row">
                <div class="col-lg-12">
                             <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">N° de Orden</th>
                                    <th width="20%">Solicitante</th>
                                    <th width="10%">Fecha Solicitud</th>
                                    <th width="10%">Fecha Asignacion</th>
                                    <th width="20%">Tipo de orden</th>
                                    <th width="20%">Estatus</th>
                                    <th width="20%">Opciones</th>
                                </tr>
                            </thead>
                             <tbody>
                                 <?php if(!empty($ordenes)):?>
                                    <?php foreach($ordenes as $orden):?>
                                        <tr>
                                            <td><?php echo $orden->orden;?></td>
                                            <td><?php echo $orden->nombre;?> <?php echo $orden->apellido;?></td>
                                            <td><?php echo $orden->fechas;?></td>
                                            <td><?php echo $orden->fecha_asignacion;?></td>
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
                                            <?php elseif ($orden->estado=="Cerrada") :?>
                                              <span class="label label-danger">Cerrada
                                              </span>
                                            <?php elseif ($orden->estado=="Procesada") :?>
                                              <span class="label label-primary">Procesada
                                              </span>
                                            <?php endif;?>
                                              </td>
                                             <?php $datasolicitudes = $orden->orden."*".$orden->nombre."*".$orden->apellido."*".$orden->fechas."*".$orden->solicitud."*".$orden->estado;?>
                                            <td>
                                               <div class="btn-group">
                                                 <a href="<?php echo base_url();?>tech/Soporte/ver_orden/<?=$orden->orden;?>"><div class="btn btn-info btn-sm" ><span class="fa fa-search"></span>
                                                 </div></a>
                                                </div>
                                            </td>
                                        </tr>
                                   <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
