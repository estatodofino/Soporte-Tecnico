<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Componentes
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box box-solid">
    <div class="box-body">
   <div class="row">
        <div class="col-md-12">
            <?php if($this->session->flashdata("error")):?>
                <div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
                     </div>
            <?php endif;?>
    <form action="<?php echo base_url();?>admin/Componentes/update_so" method="POST">
     <input type="hidden" name="serialiso" id="serialiso" value="<?=$componente->serial_compo;?>">

         <div class="form-group col-md-6 <?php echo !empty(form_error('tipo')) ? 'has-error':'';?>">
           <label for="tipo">Tipo de Componente:</label>
          <input disabled="disabled" type="text" class="form-control" id="tipo" name="tipo" value="<?php echo !empty(form_error('tipo')) ? set_value('tipo'):$componente->tipo_componente?>">
              <?php echo form_error("tipo","<span class='help-block'>","</span>");?>
          </div>

           <div class="form-group col-md-6 <?php echo !empty(form_error('sereal')) ? 'has-error':'';?>">
                <label for="sereal">Serial del Componente:</label>
                <input disabled="disabled" type="text" class="form-control" id="sereal" name="sereal" value="<?php echo !empty(form_error('sereal')) ? set_value('sereal'):$componente->serial_compo?>">
                <?php echo form_error("sereal","<span class='help-block'>","</span>");?>
            </div>

            <div class="form-group col-md-12 <?php echo !empty(form_error('descripcion')) ? 'has-error':'';?>">
            <label for="descripcion">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo !empty(form_error('descripcion')) ? set_value('descripcion'):$componente->descrip_compo?>">
            <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group col-md-6 <?php echo !empty(form_error('estado')) ? 'has-error':'';?>">
                <label for="estado">Estatus del Componente:</label>
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo !empty(form_error('estado')) ? set_value('estado'):$componente->estatus_compo?>">
                  <?php echo form_error("estado","<span class='help-block'>","</span>");?>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
            </div>
        </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
