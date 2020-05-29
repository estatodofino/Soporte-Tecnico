 <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li style="text-align: center;" class="header">Menú</li>
                    <li><a href="<?php echo base_url();?>user/equipos/"><i class="fa fa-desktop"></i>Mis Equipos</a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Soporte tecnico</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>user/Soporte/nueva"><i class="fa fa-circle-o"></i>Nueva orden de servicio</a></li>
                            <li><a href="<?php echo base_url();?>user/Soporte/"><i class="fa fa-circle-o"></i> Consultar Orden de servicio</a></li>
                        </ul>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-lock"></i> <span>Seguridad</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>user/seguridad/cambiclave"><i class="fa fa-circle-o"></i> Cambio de clave</a></li>
                            <li><a href="<?php echo base_url();?>user/usuarios/Actualizar"><i class="fa fa-circle-o"></i> Actualizar Datos</a></li>
                        </ul>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Contacto</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>user/seguridad/Contacto"><i class="fa fa-circle-o"></i> Enviar un correo a servicio tecnico</a></li>
                            </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
         <!-- =============================================== -->

        