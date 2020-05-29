<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Configuracion
        <small>Actualizar Informacion</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                                <div class="callout callout-success">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
                                     </div>
                            <?php endif;?>
                        <form action="<?php echo base_url();?>user/usuarios/update" method="POST">
                            <input type="hidden" name="idusuario" value="<?php echo $usuario->ci_usuario ?>">

                            <div class="form-group <?php echo form_error("nombres") != false ? 'has-error':'';?>">
                                <label for="nombres">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo form_error("nombres") !=false ? set_value("nombres") : $usuario->nom_usuario;?>">
                                <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group <?php echo form_error("apellidos") != false ? 'has-error':'';?>">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo form_error("apellidos") !=false ? set_value("apellidos") : $usuario->ape_usuario;?>">
                                <?php echo form_error("apellidos","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group <?php echo form_error("cargo") != false ? 'has-error':'';?>">
                                <label for="cargo">Cargo:</label>
                                <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo form_error("cargo") !=false ? set_value("cargo") : $usuario->cargo;?>">
                                <?php echo form_error("cargo","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group">
                                <label for="dependencia">Dependencia:</label>
                                <input type="text" id="dependencia" name="dependencia" class="form-control" value="<?php echo $usuario->dependencia;?>" readonly="">
                            </div>

                            <div class="form-group <?php echo form_error("email") != false ? 'has-error':'';?>">
                                <label for="email">Correo:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo form_error("email") !=false ? set_value("email") : $usuario->correo_usuario;?>">
                                <?php echo form_error("correo","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Guardar">
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


