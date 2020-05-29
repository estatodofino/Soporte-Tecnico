<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Informes de Gestion
        <small>por Año</small>
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
                  <a href="<?php echo base_url(); ?>reportes/informes/gestion_years" class="btn btn-danger">Restablecer</a>
              </div>
          </div>
          </form>
          <label style="font-size:20px;" for="row">Soporte Tecnico</label>
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Reparacion</span>
                  <span class="info-box-number"><?=$cantReparacion;?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-wrench"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Mantenimiento</span>
                  <span class="info-box-number"><?=$cantMantenimiento;?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-arrow-down"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Actualizacion de </span>
                  <span class="info-box-text">antivirus </span>
                  <span class="info-box-number"><?=$cantActualizacion;?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-desktop"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Instalacion de </span>
                  <span class="info-box-text">equipos o programas</span>
                  <span class="info-box-number"><?=$cantInstalacion;?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- Small boxes (Stat box) -->
          <label style="font-size:20px;" for="row">Redes</label>
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?=$cantRedes;?></h3>

                  <p style="font-size:20px;">Redes</p>
                </div>
                <div class="icon">
                  <i class="fa fa-feed"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?=$cantOrdenes;?></h3>

                  <p style="font-size:20px;">Ordenes de servicio</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
            </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
