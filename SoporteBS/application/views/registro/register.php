<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Registro de Uusuarios
        <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li><a href="<?php echo base_url('recovery') ?>">Registro</a></li>
                         <li><a href="<?php echo base_url('recovery/request_pass') ?>">Solicitar password</a></li>
                     </ul>
                </div>
                    <div class="col-md-8 col-md-offset-2">
    <div class="row" id="registerForm">
        <h1>Recuperación de password con codeigniter</h1>
        <br>
        <?php       
            messages_flash('danger',validation_errors(),'Errores del formulario', true);

            messages_flash('success','registered','Correcto');
        ?>
   <form action="<?php echo base_url();?>recovery/register" method="POST">

            <div class="input-group col-md-12">
                <span class="input-group-addon">Email</span>
                <input type="email" name="email" class="form-control" value="<?php echo set_value('email')?>">
            </div><br>

            <div class="input-group col-md-12">
                <span class="input-group-addon">Password</span>
                <input name="password" type="password" class="form-control">
            </div><br>

            <button type="submit" class="btn btn-success col-md-4 col-md-offset-8">Submit</button>

        </form>
    </div>
</div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->