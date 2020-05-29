<!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                  <div class="panel-content">
                               <div class="panel-header">

                        <div class="panel-body">
                          <?php if($this->session->flashdata("success")):?>
                            <div class="alert alert-success">
                              <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success")?></p>
                            </div>
                          <?php endif; ?>
                            <?php if($this->session->flashdata("error")):?>
                              <div class="alert alert-danger">
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error")?></p>
                              </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url();?>welcome/login" method="post">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Cedula" name="cedula">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-off"></span> Iniciar Sesión</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                             </div>
                             <div class="panel-footer text-center">
                                      <p>¿Eres un nuevo usuario?<a href="<?php echo base_url()?>welcome/registrate"> Regístrate Aquí</a></p>
                                      <p>¿Olvidó su clave?<a href="<?php echo base_url()?>recovery/request_pass"> Recuperar Clave</a></p>
                                          <p>¿Deseas  contactarnos?<a href="<?php echo base_url();?>welcome/contactar"> Escríbenos</a></p>
                                     </div>
                               </div>
                             </div>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
<div class="modal fade" id="Lostpass">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Recuperacion de contraseña</h4>
              </div>
              <div class="modal-body">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="EIngrese su Email">
              </div>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Recuperar clave</button>
              </div>
              <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
