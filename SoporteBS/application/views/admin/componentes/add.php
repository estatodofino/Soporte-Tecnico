<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Componentes
        <small>Nuevo</small>
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
    <div id="soft">
    <form action="<?php echo base_url();?>admin/Componentes/store" method="POST">

      <input type="hidden" name="numero" id="numero" value="<?=$equipo->num_bien;?>">
      <input type="hidden" name="tipoe" id="tipoe" value="<?=$equipo->cod_tipo_equipo;?>">

    <div class="form-group col-md-6">
         <label for="tipico">Tipo de Componente:</label>
         <!--<div class="input-group">
            <input type="text" class="form-control" id="tipico" placeholder="Agregar nuevo tipo">
            <span class="input-group-btn">
                <a class="btn btn-primary btn-tipicos" type="button"><span class="fa fa-plus"></span> Agregar</a>
            </span>
            </div> /input-group -->

            <select name="tipoco" id="tipoco" class="form-control">
              <option>::Seleccione</option>
              <?php foreach($tipcom as $tipco):?>
            <option value="<?php echo $tipco->cod_tipo?>"><?php echo $tipco->nom_tipo;?></option>
                 <?php endforeach;?>
            </select>

        </div>

          <div class="form-group col-md-6">
           <label for="nombreCompo">Nombre del Componente:</label>
           <div class="input-group">
              <?php $controlcomponente = ($control->componente +1);?>
          <input type="text" class="form-control" id="numbreCompo" placeholder="Ingrese nuevo nombre">
          <input type="hidden" name="control_compo" id="control_compo" value="<?=$controlcomponente;?>">
          <span class="input-group-btn">
              <a class="btn btn-primary btn-nombreCompo" type="button"><span class="fa fa-plus"></span> Agregar</a>
          </span>
          </div><!-- /input-group -->
            <select name="nombreCompo" id="nombreCompo" class="form-control">
                  <option>::Seleccione</option>
              </select>
              </div>
              <div class="form-group col-md-6 <?php echo !empty(form_error('sereal')) ? 'has-error':'';?>">
                   <label for="sereal">Serial del Componente:</label>
                   <input type="text" class="form-control" id="sereal" name="sereal" value="<?php echo set_value('sereal');?>">
                   <?php echo form_error("sereal","<span class='help-block'>","</span>");?>
               </div>

                   <div class="form-group col-md-6 <?php echo !empty(form_error('estatus')) ? 'has-error':'';?>">
                   <label for="estatus">Condicion del componente:</label>
                   <select name="estatus" id="estatus" class="form-control">
                      <option>::Seleccione</option>
                       <option value="Bueno">Bueno</option>
                       <option value="Regular">Regular</option>
                       <option value="Dañado">Dañado</option>
                       <option value="En reparacion">En reparacion</option>
                   </select>
                    <?php echo form_error("estatus","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="form-group col-md-6 <?php echo !empty(form_error('capacidad')) ? 'has-error':'';?>">
                        <label for="capacidad">Capacidad/ Velocidad/ Voltaje/ Arquitectura:</label>
                        <input type="text" class="form-control" id="capacidad" name="capacidad" value="<?php echo set_value('capacidad');?>">
                        <?php echo form_error("capacidad","<span class='help-block'>","</span>");?>
                        </div>
                    <div class="form-group col-md-12 <?php echo !empty(form_error('observacion')) ? 'has-error':'';?>">
                    <label for="observacion">Observacion:</label>
                    <input type="text" class="form-control" id="observacion" name="observacion" value="<?php echo set_value('observacion');?>">
                    <?php echo form_error("observacion","<span class='help-block'>","</span>");?>
                    </div>

                    <input type="hidden" name="cod_marca" id="cod_marca" value="<?=$controlMar->marca;?>">

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
                    <div class="form-group col-md-6 <?php echo !empty(form_error('modelo')) ? 'has-error':'';?>">
                        <label for="modelo">Modelo del Componente:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo set_value('modelo');?>">
                          <?php echo form_error("modelo","<span class='help-block'>","</span>");?>
                    </div>

                    <div class="form-group col-md-12 <?php echo !empty(form_error('descripcion')) ? 'has-error':'';?>">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo set_value('descripcion');?>">
                    <?php echo form_error("descripcion","<span class='help-block'>","</span>");?>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                    </div>

                </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-orden">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo componente de Software </h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>admin/componentes/new_sof" method="POST">
          <input type="hidden" name="numero_so" id="numero_so" value="<?=$equipo->num_bien;?>">
          <input type="hidden" name="tipo_so" id="tipo_so" value="<?=$equipo->cod_tipo_equipo;?>">
          <div class="form-group">
          <label for="serial_so"></label>
          <input type="text" class="form-control" name="serial_so" id="serial_so" placeholder="Ingrese el serial de componente">
        </div>
        <div class="form-group">
        <label for="descrip_so"></label>
        <input type="text" class="form-control" name="descrip_so" id="descrip_so" placeholder="Descripcion del componente">
      </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
