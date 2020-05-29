<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Componente
        <small>ver</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
<?php if($this->session->flashdata("success")):?>
 <div class="callout callout-success">
  <button type="button" class="close" data-dismiss="callout" aria-hidden="true">&times;</button>
   <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p>
       </div>
            <?php endif;?>
     <div class="box box-solid">
            <div class="box-body">
             <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                  <b>Tipo de Componente: </b><?=$componente->tipo_componente;?><br>
                  <address>
                    <strong>Serial del componente: </strong><?=$componente->serial_compo;?><br>
                    <strong>Capacidad: </strong><?=$componente->capacidad;?> <br>
                    <strong>Marca: </strong><?=$componente->marca;?><br>
                    <strong>Descripcion: </strong><?=$componente->descrip_compo;?><br>
                    <strong>Condicion: </strong><?=$componente->estatus_compo;?><br>
                    <strong>Observacion: </strong><?=$componente->obser_compo;?><br>
                  </address>
                </div>
                <div class="col-sm-6 invoice-col">
                  <?php if ($componente->tipo_componente!="Software") {
                    echo '<a href="<?php echo base_url();?>admin/componentes/editar/<?=$componente->serial_compo;?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>';
                  }else{?>
                    <a href="<?php echo base_url();?>admin/componentes/editar_so/<?=$componente->serial_compo;?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <?php }?>
                </div>
                </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
