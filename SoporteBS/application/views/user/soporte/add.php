<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Soporte
        <small>Nueva Orden</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php  if ($equipos==False) { ?>
        <div class="callout callout-warning">
         <h4><p>No posee equipos Asignados!</p></h4><p>agregar equipo <a href="<?php echo base_url();?>user/equipos/add">aqui</a> </p></div>
    <?php }  ?>
     <div class="box box-solid">
            <div class="box-body">
              
          <div class="row">
                <div class="col-lg-12">
                      <div class="panel panel-default">

                          <div class="panel-body">
                            <?php if($this->session->flashdata("error")):?>
                                <div class="alert alert-success alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
                                     </div>
                            <?php endif;?>

                               <form action="<?php echo base_url();?>user/Soporte/new_orden" method="POST">

                             <div class="form-group col-md-6">
                               <label for="tipo">Tipo de orden:</label>
                                 <select name="tipo" id="tipo" class="form-control">
                                    <option>::Seleccione</option>
                                     <?php foreach($ordenes as $tipo):?>
                                    <?php $datacomprobante = $tipo->cod_tipo_orden."*".$tipo->tipo_orden."*".$tipo->cantidad;?>
                                          <option value="<?php echo $datacomprobante;?>"><?php echo $tipo->tipo_orden;?></option>
                                      <?php endforeach;?>
                                  </select>
                                  <input type="hidden" name="idorden" id="idorden" value="<?=$control->secuencia;?>" >
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="numero">N° Orden:</label>
                                  <input type="text" class="form-control" id="numero" name="numero" readonly="" >
                              </div>
                              <div class="form-group col-md-6">
                                <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">Buscar Equipo</button>
                                
                              </div>
                              <div class="form-group col-md-6">
                                <label for="equipoNum">N° Equipo:</label>
                                <input type="text" class="form-control" id="equipoNum" name="equipoNum" readonly="" >
                                <label for="marca">Marca:</label>
                                <input type="text" class="form-control" id="marca" name="marca" readonly="" >
                                <input type="hidden" class="form-control" id="idmarca" name="idmarca" readonly="" >
                                <label for="modelo">Modelo:</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" readonly="" >
                              </div>



                              <div class="form-group col-md-12">
                                        <label for="descripcion" class="control-label">Descripcion:</label>
                                        <div class="col-lg-12">
                                          <input class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion o falla del equipo">
                                          </div>
                                      </div>

                              <div class="form-group col-md-12">
                                  <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                              </div>
                          </form>
                                </div>
                              </div>
                          </div>
                        </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Listado de equipos</h4>
            </div>
            <div class="modal-body">

                        <?php if(!empty($equipos)):?>
                          <table id="table_id_2" class="table table-bordered table-striped table-hover">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Marca</th>
                                      <th>Modelo</th>
                                      <th>Opcion</th>
                                  </tr>
                              </thead>
                              <tbody>
                            <?php foreach($equipos as $equipo):?>
                                <tr>
                                    <td><?php echo $equipo->num_bien;?></td>
                                    <td><?php echo $equipo->marca;?></td>
                                    <td><?php echo $equipo->modelo_bien;?></td>
                                    <?php $dataequipo = $equipo->num_bien."*".$equipo->marca."*".$equipo->cod_marca."*".$equipo->modelo_bien;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-check" value="<?php echo $dataequipo;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                          </tbody>
                      </table>
                    <?php endif;?>
                    <?php if(empty($equipos)):?>
                      <div class="callout callout-warning">
                       <h4><p>No posee equipos Asignados!</p></h4><p>agregar equipo <a href="<?php echo base_url();?>user/equipos/add">aqui</a> </p></div>

                      <?php endif;?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
