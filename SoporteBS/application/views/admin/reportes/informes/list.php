<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Informes tecnicos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
 <section class="content">
    <?php if($this->session->flashdata("success")):?>
          <div class="alert callout callout-success">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
               </div>
      <?php endif;?>
      <?php if($this->session->flashdata("error")):?>
          <div class="alert callout callout-danger">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
               </div>
      <?php endif;?>
   <div class="box box-solid">
    <div class="box-body table-responsive">
        <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
          <div class="form-group">
          <label for="mes" class="col-md-1 control-label">Mes:</label>   <div class="col-md-3">
              <select name="mes" id="mes" class="form-control">
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Abril</option>
                <option value="04">Marzo</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiempre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
              </select>
              </div>
              <label for="year" class="col-md-1 control-label">Año:</label>
              <div class="col-md-3">
                  <select name="year" id="year" class="form-control">
                    <?php foreach($years as $year):?>
                        <option value="<?php echo $year->year;?>"><?php echo $year->year;?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="col-md-4">
                  <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                  <a href="<?php echo base_url(); ?>reportes/informes/" class="btn btn-danger">Restablecer</a>
              </div>
          </div>
          </form>
         <table id="example" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>N° de Informe</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>N° de orden</th>
                    <th>Tipo de orden</th>
                    <th>Opciones</th>
                </tr>
            </thead>
             <tbody>
                <?php if(!empty($informes)):?>
                    <?php foreach($informes as $item):?>
                        <tr>
                            <td><?=$item->cod_IT;?></td>
                            <td><?=$item->descrip_IT;?></td>
                            <td><?=$item->fecha_IT;?></td>
                            <td><?=$item->num_orden;?></td>
                            <td><?=$item->solicitud;?></td>
                            <td>
                              <a href="<?php echo base_url();?>reportes/informes/ver/<?=$item->cod_IT;?>" class="btn btn-primary"><i class="fa fa-file-text"></i> Ver Informe</a>
                            </td>
                        </tr>
                   <?php endforeach;?>
                <?php endif;?>
                </tbody>
                 </table>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
