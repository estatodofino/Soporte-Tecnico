<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php if (!empty($this->session->userdata("id"))):?>
              <section class="content-header">
                  <h1>
                  Bienvenido!!
                  </h1> 
              </section>
          <?php elseif (empty($this->session->userdata("id"))):?>
              <section class="content-header">
                  <h1>
                  Coordinación de Telemática
                  </h1>
              </section>

          <?php endif;?>
            <!-- Main content -->
<section class="content">
  <?php if($this->session->flashdata("success")):?>
      <div class="alert callout callout-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
           </div>
      <?php endif;?>
      <div class="col-md-12">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Coordinación de Telemática</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p align="justify">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Visión</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p align="justify">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.col -->

  <div class="row">
      <div class="col-md-12">
      <div class="col-md-6">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Misión</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <p align="justify">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." </p>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Imágenes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?php echo base_url();?>assets/proy/images/babaner.jpg" alt="First slide">

                    <div class="carousel-caption">
                
                    </div>
                  </div>
                  <div class="item">
                     <img src="<?php echo base_url();?>assets/proy/images/pppp.jpg" alt="Second slide">

                    <div class="carousel-caption">
    
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url();?>assets/proy/images/8.jpg" alt="Third slide">

                    <div class="carousel-caption">
                     
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.col -->

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
