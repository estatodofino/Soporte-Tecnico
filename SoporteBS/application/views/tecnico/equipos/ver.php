
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Equipos
        <small>Ver</small>
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
              <b>Tipo de Equipo: </b><?=$equipo->tipos;?><br>
              <address>
                <strong>Codigo del Equipo: </strong><?=$equipo->num_bien;?><br>
                <strong>Marca: </strong><?=$equipo->marca;?><br>
                <strong>Modelo: </strong><?=$equipo->modelo_bien;?><br>
                <strong>color: </strong><?=$equipo->color_bien;?><br>
                <strong>Descripcion: </strong><?=$equipo->descrip_bien;?><br>
                <strong>Condicion: </strong><?=$equipo->condicion_bien;?><br>
                <strong>Usuario: </strong><?=$equipo->nombres;?> <?=$equipo->apellidos;?><br>
              </address>
            </div>
            <div class="col-sm-6 invoice-col">
              <?php if($equipo->tipos=="computador" || $equipo->tipos=="redes"): ?>
                <a class="btn btn-info" href="<?php echo base_url();?>admin/componentes/add/<?=$equipo->num_bien;?>"><i class="fa fa-plus"></i>Agregar Componente</a>
              <?php endif ?>
            </div>
            <br>
            <div class="col-xs-12 table-responsive">
              <?php if(!empty($componentes)): ?>
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Serial del Componente</th>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Capacidad</th>
                  <th>Marca</th>
                  <th>Opcion</th>
                </tr>
                </thead>
                <tbody>

                    <?php foreach($componentes as $item): ?>
                     <tr>
                      <td><?=$item->serial_componente;?></td>
                      <td><?=$item->nom_componente;?></td>
                      <td><?=$item->tipo_componente;?></td>
                      <td><?=$item->capacidad;?></td>
                      <td><?=$item->marca;?></td>
                      <?php if ($item->tipo_componente!="Software") {
                        echo '  <td>
                            <a href="<?php echo base_url();?>admin/componentes/ver/<?=$item->serial_componente;?>" class="btn btn-info"><i class="fa fa-search"></i></a>
                            <a href="<?php echo base_url();?>admin/componentes/editar/<?=$item->serial_componente;?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                          </td>';
                      }else{?>
                        <td>
                            <a href="<?php echo base_url();?>admin/componentes/ver/<?=$item->serial_componente;?>" class="btn btn-info"><i class="fa fa-search"></i></a>
                            <a href="<?php echo base_url();?>admin/componentes/editar_so/<?=$item->serial_componente;?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                          </td>
                    <?php  }?>
                    </tr>
                  <?php endforeach;?>
                  <?php endif ?>

                  <?php if(empty($componentes)):?>
                    <div class="callout callout-warning">
                     <h4><p>No posee componentes ingresados a este equipo!</p></h4></div>
                    <?php endif;?>
                    </tbody>
                  </table>
                </div>
            <!-- /.col -->
                </div>
                 </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Componente</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="codigoC">Codigo del componente:</label>
                  <input type="text" name="codigoC" id="codigoC" class="form-control" placeholder="Ingrese un codigo para el componente">
                </div>
               <div class="form-group">
                  <label for="serialC">serial del componente:</label>
                  <input type="text" name="serialC" id="serialC" class="form-control" placeholder="Ingrese el serial del Componente">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre del componente:</label>
                  <input type="text" name="" id="" class="form-control" placeholder="Ingrese el nombre del Componente">
                </div>
                <div class="form-group">
                <label for="capacidadC">Capacidad:</label>
                <input type="text" name="capacidadC" id="capacidadC" class="form-control" placeholder="Ingrese capacidad del Componente">
                </div>
                <div class="form-group">
                  <label for="condicionC">Condicion del componente:</label>
                  <select name="condicionC" id="condicionC" class="form-control">
                     <option>::Seleccione</option>
                      <option value="Bueno">Bueno</option>
                      <option value="Regular">Regular</option>
                      <option value="Dañado">Dañado</option>
                      <option value="En reparacion">En reparacion</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="marcaC">Marca del componente:</label>
                  <select name="marcaC" id="marcaC" class="form-control">
                  <option>::Seleccione</option>
                  <?php foreach($marcas as $marca):?>
                  <option value="<?php echo $marca->cod_marca?>"><?php echo $marca->marca;?></option>
                  <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="descripcionC">Descripcion:</label>
                  <input type="text" class="form-control" id="descripcionC" name="descripcionC" placeholder="Ingrese una breve Descripcion">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="save()" class="btn btn-primary">Guardar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
