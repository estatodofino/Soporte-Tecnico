  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- /.navbar-header -->

            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse gris">
                   <!--aqui inicia el menu-->
                   <ul class="nav" id="side-menu">
                        <li>
                          <div class="logo">
                      <div  id="Login" role="dialog" >
                       <div class="panel-dialog">

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
                             </div>//55
                             <div class="panel-footer text-center">
                                      <p>¿Eres un nuevo usuario?<a href="<?php echo base_url()?>welcome/registrate"> Regístrate Aquí</a></p>
                                      <p>¿Olvidó su clave?<a  data-toggle="modal" data-target="#Lostpass" href="#"> Recuperar Clave</a></p>
                                          <p>¿Deseas  contactarnos?<a> Escríbenos</a></p>
                                     </div>
                               </div>
                             </div>
                             </div>
                          </div>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
