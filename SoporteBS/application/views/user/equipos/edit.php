<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Equipos
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
                            <div class="callout callout-success">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("error"); ?></p>
                                 </div>
                        <?php endif;?>
      <form action="<?php echo base_url();?>user/equipos/update" method="POST">

        <input type="hidden" name="idbien" value="<?php echo $bienes->num_bien;?>">

                     <div class="form-group col-md-6 <?php echo !empty(form_error('numero')) ? 'has-error':'';?>">
                        <label for="numero">Numero:</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="<?php echo !empty(form_error('numero')) ? set_value('numero'):$bienes->num_bien?>" readonly>
                        <?php echo form_error("numero","<span class='help-block'>","</span>");?>
                    </div>

                    <input type="hidden" name="cod_marca" id="cod_marca" value="<?=$controlMar->marca;?>">

                    <div class="form-group col-md-6 <?php echo !empty(form_error('modelo')) ? 'has-error':'';?>">
                        <label for="modelo">Modelo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo !empty(form_error('modelo')) ? set_value('modelo'):$bienes->modelo_bien?>">
                        <?php echo form_error("modelo","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="form-group col-md-6">
                     <label for="newmarca">Marca del Componente:</label>
                     <div class="input-group">
                        <input type="text" class="form-control" name="newmarca" id="newmarca" placeholder="Agregar nuevo">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn_newmarca" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-plus"></span> Agregar</button>
                        </span>
                        </div><!-- /input-group -->


                        <select name="marca" id="marca" class="form-control">
                          <option>::Seleccione</option>
                        </select>

                    </div>
                    <div class="form-group col-md-12 <?php echo !empty(form_error('modelo')) ? 'has-error':'';?>">
                        <label for="modelo">Modelo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo !empty(form_error('modelo')) ? set_value('modelo'):$bienes->modelo_bien?>">
                          <?php echo form_error("modelo","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="form-group col-md-12 <?php echo !empty(form_error('descripcion')) ? 'has-error':'';?>">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo !empty(form_error('descripcion')) ? set_value('descripcion'):$bienes->descrip_bien?>">
                          <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                    </div>

                    <div class="form-group col-md-6 <?php echo !empty(form_error('color')) ? 'has-error':'';?>">
                        <label for="color">Color:</label>
                        <input type="text" class="form-control" id="color" name="color" value="<?php echo !empty(form_error('color')) ? set_value('color'):$bienes->color_bien?>">
                        <?php echo form_error('color',"<span class='help-block'>","</span>");?>
                    </div>

                    <div class="form-group col-md-6 <?php echo !empty(form_error('material')) ? 'has-error':'';?>">
                        <label for="material">Material:</label>
                        <input type="text" class="form-control" id="material" name="material" value="<?php echo !empty(form_error('material')) ? set_value('material'):$bienes->tipo_material_bien?>">
                        <?php echo form_error("material","<span class='help-block'>","</span>");?>
                    </div>
                     <div class="form-group col-md-6 <?php echo !empty(form_error('condicion')) ? 'has-error':'';?>">
                        <label for="condicion">Condicion del equipo:</label>
                        <select name="condicion" id="condicion" class="form-control">
                           <option value="<?=$bienes->condicion_bien;?>"><?=$bienes->condicion_bien;?></option>
                            <option value="Bueno">Bueno</option>
                            <option value="Regular">Regular</option>
                            <option value="Dañado">Dañado</option>
                            <option value="En reparacion">En reparacion</option>
                        </select>
                         <?php echo form_error("condicion","<span class='help-block'>","</span>");?>
                    </div>
                     <div class="form-group col-md-6">
                        <label for="tipox">Tipo de equipo:</label>
                        <select name="tipox" id="tipox" class="form-control">
                           <?php foreach($equipos as $equipo):?>
                                <?php if($equipo->cod_tipo_equipo == $bienes->cod_tipo_equipo):?>
                                <option value="<?php echo $bienes->cod_tipo_equipo;?>" selected><?php echo $bienes->tipos;?></option>
                            <?php else:?>
                                <option value="<?php echo $equipo->cod_tipo_equipo?>"><?php echo $equipo->tipo_de_equipo;?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
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
