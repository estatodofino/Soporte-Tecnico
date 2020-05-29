<!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li style="text-align: center;" class="header">Menú</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-desktop"></i> <span>Equipos y mobiliarios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url()?>tech/Equipos/add_equipo"><i class="fa fa-circle-o"></i> Registrar Equipos</a></li>
                            <li><a href="<?php echo base_url()?>tech/Equipos/"><i class="fa fa-circle-o"></i> Consultar Equipos</a></li>
                        </ul>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Soporte tecnico</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url()?>tech/Soporte/nueva"><i class="fa fa-circle-o"></i> Crear nueva orden de servicio</a></li>
                            <li><a href="<?php echo base_url()?>tech/Soporte/"><i class="fa fa-circle-o"></i> Consultar Orden de servicio</a></li>
                            <li><a href="<?php echo base_url();?>tech/Soporte/atencion"><i class="fa fa-circle-o"></i>Atender orden </a></li>
                        </ul>

                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-lock"></i> <span>Seguridad</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>tech/seguridad/cambiclave"><i class="fa fa-circle-o"></i> Cambio de clave</a></li>
                            <li><a href="<?php echo base_url();?>tech/usuarios/Actualizar"><i class="fa fa-circle-o"></i> Actualizar Datos</a></li>
                            <li><a href="<?php echo base_url();?>tech/seguridad/Usuarios"><i class="fa fa-circle-o"></i>Buscar Usuario</a></li>
                        </ul>

                    </li>
                    <li class="treeview">
                              <a href="#">
                                <i class="fa fa-share"></i> <span>Reportes</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li class="treeview">
                                  <a href="#"><i class="fa fa-circle-o"></i> Listado de Equipos
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">                                   
                                    <li>
                                      <a href="<?php echo base_url();?>reportes/Equipo/tipo"><i class="fa fa-circle-o"></i> Por Tipo
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Equipo/estatus"><i class="fa fa-circle-o"></i> Por Estatus
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Equipos/componentes"><i class="fa fa-circle-o"></i> Por Componentes
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Equipo/Dependencia"><i class="fa fa-circle-o"></i> Por Dependencias
                                      </a>
                                    </li>
                                  </ul>
                                </li> 
                                <li class="treeview">
                                  <a href="#"><i class="fa fa-circle-o"></i> Ordenes de Servicios
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">                                   
                                    <li >
                                      <a href="<?php echo base_url();?>Reportes/Orden/tecnico"><i class="fa fa-circle-o"></i> Por tecnico en una fecha dada</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Orden/fecha"><i class="fa fa-circle-o"></i> Por fecha</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Orden/estatus"><i class="fa fa-circle-o"></i> Por Estatus
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Orden/tipo"><i class="fa fa-circle-o"></i> Por Tipo
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Ordenes/Usuarios"><i class="fa fa-circle-o"></i> Por Usuario
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/Orden/Dependencia"><i class="fa fa-circle-o"></i> Por Dependencia
                                      </a>
                                    </li>
                                  </ul>
                                </li>  
                                <li class="treeview">
                                  <a href="#"><i class="fa fa-circle-o"></i> Usuarios
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">                                   
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/usuarios/listas"><i class="fa fa-circle-o"></i> Listado General
                                      </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo base_url();?>Reportes/usuarios/Dependencias"><i class="fa fa-circle-o"></i> Por Dependencias </a>
                                    </li>
                                  </ul>
                                </li>                                
                              </ul>
                                
                            </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
         <!-- =============================================== -->