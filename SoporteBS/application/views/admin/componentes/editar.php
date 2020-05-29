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
    <form action="<?php echo base_url();?>admin/Componentes/update" method="POST">
     <input type="hidden" name="serialise" id="serialise" value="<?=$componente->serial_compo;?>">

    <div class="form-group col-md-6">
         <label for="tipico">Tipo de Componente:</label>
         <!--<div class="input-group">
            <input type="text" class="form-control" id="tipico" placeholder="Agregar nuevo tipo">
            <span class="input-group-btn">
                <a class="btn btn-primary btn-tipicos" type="button"><span class="fa fa-plus"></span> Agregar</a>
            </span>
            </div> /input-group -->

            <select name="tipoco" id="tipoco" class="form-control">
              <option value="<?=$componente->tipo_componente;?>"><?=$componente->tipo_componente;?></option>
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
                   <option value="<?=$componente->nom_componente;?>"><?=$componente->nom_componente;?></option>
                </select>
                </div>
       <div class="form-group col-md-6 <?php echo !empty(form_error('sereal')) ? 'has-error':'';?>">
            <label for="sereal">Serial del Componente:</label>
            <input disabled="disabled" type="text" class="form-control" id="sereal" name="sereal" value="<?php echo !empty(form_error('sereal')) ? set_value('sereal'):$componente->serial_compo?>">
            <?php echo form_error("sereal","<span class='help-block'>","</span>");?>
        </div>

            <div class="form-group col-md-6 <?php echo !empty(form_error('estatus')) ? 'has-error':'';?>">
            <label for="estatus">Condicion del componente:</label>
            <select name="estatus" id="estatus" class="form-control">
               <option value="<?=$componente->estatus_compo;?>"><?=$componente->estatus_compo;?></option>
                <option value="Bueno">Bueno</option>
                <option value="Regular">Regular</option>
                <option value="Dañado">Dañado</option>
                <option value="En reparacion">En reparacion</option>
            </select>
             <?php echo form_error("estatus","<span class='help-block'>","</span>");?>
             </div>

            <div class="form-group col-md-6 <?php echo !empty(form_error('capacidad')) ? 'has-error':'';?>">
                <label for="capacidad">Capacidad/ Velocidad/ Voltaje/ Arquitectura:</label>
                <input type="text" class="form-control" id="capacidad" name="capacidad" value="<?php echo !empty(form_error('capacidad')) ? set_value('capacidad'):$componente->capacidad?>">
                <?php echo form_error("capacidad","<span class='help-block'>","</span>");?>
                </div>
            <div class="form-group col-md-12 <?php echo !empty(form_error('observacion')) ? 'has-error':'';?>">
            <label for="observacion">Observacion:</label>
            <input type="text" class="form-control" id="observacion" name="observacion" value="<?php echo !empty(form_error('observacion')) ? set_value('observacion'):$componente->obser_compo?>">
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
                  <option value="<?=$componente->marca;?>"><?=$componente->marca;?></option>
                </select>

            </div>



            <div class="form-group col-md-6 <?php echo !empty(form_error('modelo')) ? 'has-error':'';?>">
                <label for="modelo">Modelo del Componente:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo !empty(form_error('modelo')) ? set_value('modelo'):$componente->modelo?>">
                  <?php echo form_error("modelo","<span class='help-block'>","</span>");?>
            </div>

            <div class="form-group col-md-12 <?php echo !empty(form_error('descripcion')) ? 'has-error':'';?>">
            <label for="descripcion">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo !empty(form_error('descripcion')) ? set_value('descripcion'):$componente->descrip_compo?>">
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
