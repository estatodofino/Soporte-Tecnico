
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Dependencias
        <small>Agregar Nueva</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="box box-solid">
            <div class="box-body">
              <form action="<?php echo base_url();?>admin/dependencias/store" method="POST">
            <div class="form-group col-md-12 <?php echo !empty(form_error('codigo')) ? 'has-error':'';?>">
                <label for="codigo">Codigo de la Dependencia:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo set_value('codigo');?>" placeholder="Ingrese el Codigo" >
                  <?php echo form_error("codigo","<span class='help-block'>","</span>");?>
            </div>

            <div class="form-group col-md-12 <?php echo !empty(form_error('nombre')) ? 'has-error':'';?>">
                <label for="nombre">Nombre de la Dependencia:</label><input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre');?>" placeholder="Ingrese el Nombre para la Dependencia" >
                <?php echo form_error('nombre',"<span class='help-block'>","</span>");?>
            </div>

            <div class="form-group col-md-12 <?php echo !empty(form_error('responsable')) ? 'has-error':'';?>">
                <label for="responsable">Responsable de la dependencia:</label>
                <input type="text" class="form-control" id="responsable" name="responsable" value="<?php echo set_value('responsable');?>" placeholder="Ingrese el Responsable de la dependencia" >
                <?php echo form_error("responsable","<span class='help-block'>","</span>");?>
            </div>

            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
            </div>
        </form>
 </div>
</div>
</section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
