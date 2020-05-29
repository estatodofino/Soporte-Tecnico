<!-- <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <h1 class="page-header">Orden de servicio <small>Asignacion</small></h1>

                </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Numero de Orden:<?=$ordenes->num_orden?></td>
                                <td>Fecha de Solicitud:<?=$ordenes->fecha_solicitud?></td>
                              </tr>
                                <tr>
                                 <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h5>Cliente</h5>
                                                <span><?=$ordenes->solicitante?></span><br>
                                                <span><?=$ordenes->dependencia?></span><br>
                                                <span>-</span>
                                            </span></li>
                                        </ul>
                                    </td>
                                        <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h5>Equipo</h5>
                                                <span>Codigo del equipo:<?=$ordenes->num_bien;?></span><br>
                                                <span>marca:<?=$ordenes->cod_marca;?></span><br>
                                                <span>Descripcion:<?=$ordenes->descrip_bien;?></span><br>
                                                <span>-</span>
                                            </span></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                <td >
                                        <li><span><h5>Descripcion de la orden</h5>
                                                <span>Codigo del equipo:<?=$ordenes->num_bien;?></span><br>
                                                <span>marca:<?=$ordenes->cod_marca;?></span><br>
                                                <span>Descripcion:<?=$ordenes->descrip_bien;?></span><br>
                                                <span>-</span>
                                            </span>
                                          </li>
                                </td>
                                 <td >
                                  <li><span><h5>Tecnico</h5>
                                                <span>Codigo del equipo:<?=$ordenes->num_bien;?></span><br>
                                                <span>marca:<?=$ordenes->cod_marca;?></span><br>
                                                <span>Descripcion:<?=$ordenes->descrip_bien;?></span><br>
                                                <span>-</span>
                                            </span>
                                          </li>
                                </td>
                              </tr>
                              <?php if($ordenes->ci_tecnico=''){?>
                                <div class="panel-body">
                                 <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade active in" id="home">
                                       <?=@$error?>
                                      <div  data-parsley-validate class="form-horizontal form-label-left">
                                       <span><?php echo validation_errors(); ?></span>
                                          <form action="<?php echo base_url();?>admin/Soporte/new_orden" method="POST">      <div class="form-group col-md-6">
                                                <label for="tecnico">Asignar Tecnico:</label>
                                                <select name="tecnico" id="tecnico" class="form-control">
                                                  <option value="">::Seleccione</option>
                                                   <?php foreach($tecnicos as $tecnico):?>
                                                    <option value="<?php echo $tecnico->ci_usuario;?>"><?php echo $tecnico->nom_usuario;?> <?php echo $tecnico->ape_usuario;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                              </div>
                                            <div class="form-group col-md-6">
                                                <label for="orden">Fecha de asignacion:</label>
                                                <input type="text" class="form-control" id="orden" name="orden"
                                               placeholder="<?php echo date("d-m-Y"); ?>" readonly="">
                                            </div>
                                          <div class="form-group">
                                            <label for="estado" class="col-lg-2 control-label">Estado de la orden</label>
                                            <div class="col-lg-10">
                                              <select class="form-control" name="estado" id="estado">
                                                <option selected="selected">::Seleccione</option>
                                                <option>En proceso</option>
                                                <option>Asignada</option>
                                                <option>Cerrada</option>
                                              </select>
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
                              <?php }else{ ?>
                                <div class="alert-success">Ya se ha asignado un tecnico <a href="">desea editarlo?</a></div>
                              <?php }?>
                            </tbody>
                        </table>
                        </div>

                          </div>
                  </div>


        </div>
        <script type="text/javascript">

        </script> -->
