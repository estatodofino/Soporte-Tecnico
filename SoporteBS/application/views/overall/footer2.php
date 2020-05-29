        <footer class="main-footer">
          <div class="container footer" style="text-align: center;" >
                <p>Ubicación: Bloque C, planta Alta, Oficina C-91.<br>
                Correo  electrónico: <a> Endersona24@gmail.com</a><br>
                          LUZ Derechos reservados ® </p>
          </div>
        </footer>
    </div>
    <!-- ./wrapper --> 

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/Chart.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>js/tables.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var base_url= "<?php echo base_url();?>";
        var tecnici = $('#nomTc').val();
        var  orders = $('#inOrdes').val();

             $.post(base_url+"admin/Soporte/get_user_ci/"+tecnici,
              function (data) {
                   var obj = JSON.parse(data);
                     $('#tecNom').append(
                        '<tr>'+
                          '<th>'+obj.tecnico+'</th>'+
                       ' </tr>'
                       );
              });
              $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: "Listado de Informes Técnicos",
                    exportOptions: {
                        columns: [ 0, 1,2, 3, 4]
                    },
                },
                {
                    extend: 'pdfHtml5',
                    title: "Listado de Informes Técnicos",
                    exportOptions: {
                        columns: [ 0, 1,2, 3, 4 ]
                    }

                }
            ],

            language: {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });
        $('#example_2').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          {
              extend: 'excelHtml5',
              title: "Listado de Informes Técnicos",
              exportOptions: {
                  columns: [ 0, 1,2, 3, 4]
              },
          },
          {
              extend: 'pdfHtml5',
              title: "Listado de Ordenes de servicio",
              exportOptions: {
                  columns: [ 0, 1,2, 3, 4 ]
              }

          }
      ],

      language: {
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "zeroRecords": "No se encontraron resultados en su busqueda",
          "searchPlaceholder": "Buscar registros",
          "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
          "infoEmpty": "No existen registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "search": "Buscar:",
          "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
          },
      }
  });
  $('#example_3').DataTable( {
dom: 'Bfrtip',
buttons: [
    {
        extend: 'excelHtml5',
        title: "Listado de Informes Técnicos",
        exportOptions: {
            columns: [ 0, 1,2, 3, 4]
        },
    },
    {
        extend: 'pdfHtml5',
        title: "Listado de Usuarios",
        exportOptions: {
            columns: [ 0, 1,2, 3, 4 ]
        }

    }
],

language: {
    "lengthMenu": "Mostrar _MENU_ registros por pagina",
    "zeroRecords": "No se encontraron resultados en su busqueda",
    "searchPlaceholder": "Buscar registros",
    "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
    "infoEmpty": "No existen registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
}
});
    $(document).on("click",".btn-view-correo",function(){
            valor_id = $("#id_correo").val();
            $.ajax({
                url: base_url + "admin/mensajes/view_mail",
                type:"POST",
                dataType:"html",
                data:{id:valor_id},
                success:function(data){
                    $("#modal-default .modal-body").html(data);
                }
            });
        });
        $("#dependencia").on("change", function()
         {
          //obtenemos la id de la dependencia seleccionada
          var dependenciaSelected = $( "#dependencia option:selected").attr("value");
           $('#usuario').html("");
            //hacemos la petición via get contra admin/usuarios/getAjaxUser pasando la dependencia
            $.get("<?php echo base_url('admin/usuarios/getAjaxUser') ?>", {"dependencia":dependenciaSelected}, function(data)
            {
              var c = JSON.parse(data);
              $.each(c,function(i,item){
                $('#usuario').append('<option value="'+item.ci_usuario+'">'+item.usuario+'</option>');
              });
            });
            });
          $.post(base_url+"admin/equipos/get_marcas",
               function(data){
                var d = JSON.parse(data);
                $.each(d,function(i,item){
                  $('#marca').append('<option value="'+item.cod_marca+'">'+item.marca+'</option>');
              });
           });

            $(document).on("click",".btn_newmarca", function () {
             // body...
             var textoMarca = $("#newmarca").val();
              var textoCodigo = $("#cod_marca").val();

              if (textoCodigo !="")  {
                if (textoMarca !="") {
                  $.ajax({
                          url: base_url + "admin/equipos/save_marca",
                          type:"POST",
                          dataType:"html",
                          data:{codigo:textoCodigo,marca:textoMarca},
                          success:function(data){
                             alert("se guardo la marca");
                             window.location.reload();
                          }, error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error al guardar');
                            }
                      });
              }else {
              alert('Ingrese el nombre de la marca');
              };
              }else {
              alert('Error ');
              };
           });

            $(".eliminar_dependencia").each(function() {
                 var href = $(this).attr('href');
                 $(this).attr('href', 'javascript:void(0)');
                 $(this).click(function() {
                    if (confirm("¿Seguro desea eliminar esta Dependencia?")) {
                      $.ajax({
                          url: href,
                          type:"POST",
                          success:function(resp){
                            alert("Se ha eliminado satisfactoriamente");
                              window.location.reload();
                          }
                      });
                    }
                 });
              });

              $(".btn-remove-user").each(function() {
                   var href = $(this).attr('href');
                   $(this).attr('href', 'javascript:void(0)');
                   $(this).click(function() {
                      if (confirm("¿Seguro desea eliminar este usuario?")) {
                        $.ajax({
                            url: href,
                            type:"POST",
                            success:function(resp){
                                //http://localhost/ventas_ci/mantenimiento/productos
                                alert("Se ha eliminado satisfactoriamente");
                                window.location.reload();
                            }
                        });
                      }
                   });
                });

              $(".btn-remove").on("click", function(e){
                e.preventDefault();
                var ruta = $(this).attr("href");
                $(this).attr('href', 'javascript:void(0)');
                   $(this).click(function() {
                      if (confirm("¿Seguro desea eliminar este equipo?")) {
                        $.ajax({
                           url: ruta,
                            type:"POST",
                            success:function(resp){
                            alert("se elimino satisfactoriamente");
                            location.reload();
                            }
                          });
                         }
                       });
                    });

              $(".btn-remove_orden").on("click", function(e){
                e.preventDefault();
                var ruta = $(this).attr("href");
               // alert(ruta);
                $(this).attr('href', 'javascript:void(0)');
                   $(this).click(function() {
                      if (confirm("¿Seguro desea eliminar esta orden?")) {
                        $.ajax({
                           url: ruta,
                            type:"POST",
                            success:function(resp){
                            alert("se elimino satisfactoriamente");
                            window.location.reload();
                            }
                          });
                         }
                       });
                    });

              $(".btn-view-ordenes").on("click",function () {
                var dato = $(this).val();
                $.ajax({
                    url: base_url + "admin/Soporte/view_orden",
                    type:"POST",
                    dataType:"html",
                    data:{id:dato},
                    success:function(data){
                        $("#modal-default .modal-body").html(data);
                    }
                });
               });

            $(".btn-change-state").on("click", function(){
                var idorden = $("#ordenid").val();
                var estado = "En proceso";
                //alert(idorden);
                $.ajax({
                    url: base_url+"tech/Soporte/change_orden",
                    type:"POST",
                    dataType:"html",
                    data:{id:idorden,estado:estado},
                    success:function(resp){
                        //http://localhost/ventas_ci/mantenimiento/productos
                        window.location.reload();
                    }
                });
            });
            $(".btn-change-state-pro").on("click", function(){
                var idorden = $("#ordenid").val();
                  var estado = "Cerrada";
                $.ajax({
                    url: base_url+"tech/Soporte/change_orden",
                    type:"POST",
                    dataType:"html",
                    data:{id:idorden,estado:estado},
                    success:function(resp){
                        //http://localhost/ventas_ci/mantenimiento/productos
                        window.location.reload();
                    }
                });
            });
            $(".btn-change-state-clo").on("click", function(){
                var idorden = $("#ordenid").val();
                var estado = "Cerrada";
                  $.ajax({
                      url: base_url+"admin/Soporte/change_orden",
                      type:"POST",
                      dataType:"html",
                      data:{id:idorden,estado:estado},
                      success:function(resp){
                          //http://localhost/ventas_ci/mantenimiento/productos
                          window.location.reload();
                      }
                  });
            });
            $(document).on("click",".btn-view-orden",function(){
                valor_id = $(this).val();
                $.ajax({
                    url: base_url + "admin/Soporte/edit_orden",
                    type:"POST",
                    dataType:"html",
                    data:{id:valor_id},
                    success:function(data){
                        $("#modal-default .modal-body").html(data);
                    }
                });
            });
            $('#table_id').DataTable(
              {
                "language":{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "<icon class='fa fa-search fa-fw'></icon>",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
                },
                "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                }
              });
              $('#table_id_2').DataTable(
              {
                "language":{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron equipos <a href='"+base_url+"admin/equipos/add_equipo' class='btn btn-info btn_new_equipo'>Agregar equipo?</a>",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "<icon class='fa fa-search fa-fw'></icon>",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
                },
                "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                }
              });

     $("#tipo").on("change",function(){
        option = $('#idorden').val();

        if (option != "") {
            $("#numero").val(generarnumero(option));
        }
        else{
            $("#idorden").val(null);
            $("#numero").val(null);
        }
      })
     $(document).on("click",".btn_new_equipo", function () {
       // body...
       alert(href);
     });

    $(document).on("click",".btn-equipo",function() {
    var textoBusqueda = $("#numequipo").val();

     if (textoBusqueda != "") {
        $.post(base_url+"admin/Equipos/get_equipo_by/", {valorBusqueda: textoBusqueda}, function(data) {
           var d = JSON.parse(data);
            $("#tbequipos tbody").html('');
            html = "<tr>";
            html += "<td><input type='hidden' name='equiNum' value='"+d.num_bien+"'>"+d.num_bien+"</td>";
            html += "<td>"+d.marca+"</td>";
            html += "<td>"+d.modelo_bien+"</td>";
            html += "<td>"+d.nombres+"</td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-equip'><span class='fa fa-trash'></span></button></td>";
            html += "</tr>";
            $("#tbequipos tbody").append(html);
            $(".btn-equipo").val(data);
            $("#numequipo").val(null);
        });
     } else {
        alert('Ingrese el numero del equipo');
        };
        });
    //consultar equipo en ordenes de servicio
    $("#tipoco").on("change",function(){
       tipo = $('#tipoco').val();
       equip = $('#numero_so').val();
       if (tipo =="Software") {
          $("#soft").html(
            '<div>'+
            '<a class="btn btn-danger btn-fack" data-toggle="modal" data-target="#modal-orden"><span class="fa fa-plus"></span>Nuevo Componente</a>'+
            '<a href="'+base_url+'admin/componentes/add/'+equip+'" class="btn btn-info"><span class="fa fa-share"></span> Regresar</a>'+
            '</div>'
          );
       }
     });
     $(".btn-fack").on("click", function(){
       alert("BORRALO");
     });
    //ver la informacion de los usuarios en un modal.
    $(".btn-view-usuario").on("click", function(){
    var id = $(this).val();
    $.ajax({
        url: base_url + "reportes/usuarios/view",
        type:"POST",
        data:{idusuario:id},
        success:function(resp){
            $("#modal-default .modal-body").html(resp);
            //alert(resp);
        }

    });

});
    $(document).on("click",".btn-tipicos",function(){
      var tipo_componente = $("#tipico").val();
      if (tipo_componente!="") {
        $.ajax({
        url: base_url + "admin/Componentes/add_tipo",
        type:"POST",
        data:{tipico:tipo_componente},
        success:function(resp){
           alert("Se guardo satisfactoriamente");
          window.location.reload();
        }

    });
      }else{
        alert("el campo no puede ir vacio");
      }
    });

    $(document).on("click",".btn-nombreCompo",function(){
      var nom_componente = $("#numbreCompo").val();
      var cod_componente = $("#control_compo").val();
      var tipoSelected = $( "#tipoco option:selected").attr("value");

        if (nom_componente!="") {
          $.ajax({
            url: base_url + "admin/Componentes/add_componente",
            type:"POST",
            data:{nombre:nom_componente,codigo:cod_componente,tipo:tipoSelected},
            success:function(resp){
               alert("Se guardo satisfactoriamente");
              window.location.reload();
            },
        error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error al guardar');
            }

    });
      }else{
        alert("el campo 'nombre Componente' no puede ir vacio");
      }
    });


    $("#tipoco").on("change", function()
         {
          //obtenemos la id de la dependencia seleccionada
          var tipoSelected = $( "#tipoco option:selected").attr("value");
           $('#nombreCompo').html("");
            //hacemos la petición via get contra admin/componentes/getAjaxComponentes pasando la dependencia
            $.get("<?php echo base_url('admin/componentes/getAjaxComponentes') ?>", {"tipo":tipoSelected}, function(data)
            {
              var c = JSON.parse(data);
              if (c != false) {
              $.each(c,function(i,item){
                $('#nombreCompo').append('<option value="'+item.cod_componente+'">'+item.nom_componente+'</option>');
              });
              }else{
                alert("Debe ingresar un nuevo nombre para el componente");
              }
            });
            });

    //consultar equipo
    $(document).on("click",".btn-equip",function() {
    var textoBusqueda = $("#numequipo").val();

     if (textoBusqueda != "") {
        $.post(base_url+"admin/Equipos/get_equipo_id/", {valorBusqueda: textoBusqueda}, function(data) {
            var datos = JSON.parse(data);
            $("#consequip").html('');
           if (datos != false){
              alert("Se ha encontrado un resultado");
              $("#consequip").append(
              '  <table id="tbequipos" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">'+
                '<thead>'+
                    '<tr style="text-align: center;">'+
                        '<th>Codigo del equipo</th>'+
                        '<th>Marca</th>'+
                        '<th>Condicion</th>'+
                        '<th>Usuario</th>'+
                        '<th>Opciones</th>'+
                    '</tr>'+
                '</thead>'+
                '<tbody>'+
                '<tr><td><input type="hidden" name="equiNum" value="'+datos[0].num_bien+'">'+datos[0].num_bien+'</td>'+
                '<td>'+datos[0].marca+'</td>'+
                '<td>'+datos[0].condicion_bien+'</td>'+
                '<td>'+datos[0].nombres+'</td>'+
                '<td><button type="button" class="btn btn-danger btn-remove-equip"><span class="fa fa-trash">Limpiar</span></button>'+
                '<a href="'+base_url+'admin/Equipos/ver/'+datos[0].num_bien+'" class="btn btn-info btn-views-equip" value="'+datos[0].num_bien+'"><span class="fa fa-search">ver</span></a>'+
                '</td>'+
               '</tr></tbody></table>' );

            $("#numequipo").val(null);
           }else{
            alert("NO Se ha encontrado resultado");
            $("#consequip").append("<div>El equipo no existe <a>desea agregarlo?</a></div>");

            $("#numequipo").val(null);
           }

        });
     } else {
        alert('Ingrese el numero del equipo');
        };
        });
    //consultar equipo
        //consultar ordenes de servicios
    $(document).on("click",".btn-corden",function() {
    var textoBusqueda = $("#corden").val();

     if (textoBusqueda != "") {
        $.post(base_url+"admin/Soporte/get_orden_id/", {valorOrden: textoBusqueda}, function(data) {
           var d = JSON.parse(data);
            $("#tbordenes tbody").html('');
            html = "<tr>";
            html += "<td><input type='hidden' name='numOrden' value='"+d.num_orden+"'>"+d.num_orden+"</td>";
            html += "<td>"+d.solicitante+"</td>";
            html += "<td>"+d.fecha_solicitud+"</td>";
            html += "<td>"+d.estatus_orden+"</td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-equip'><span class='fa fa-trash'></span></button></td>";
            html += "</tr>";
            $("#tbordenes tbody").append(html);

            $("#corden").val(null);
        });
     } else {
        alert('Ingrese el numero de orden');
        };
        });
    //para eliminar el equipo consultado
     $(document).on("click",".btn-remove-equip", function(){
        $(this).closest("tr").remove();
        $("#consequip").html("");
    });
     //Agregar Equipos a las ordenes
     $(document).on("click",".btn-check",function(){
        equipo = $(this).val();
        infoequipo = equipo.split("*");
        $("#equipoNum").val(infoequipo[0]);
        $("#marca").val(infoequipo[1]);
        $("#idmarca").val(infoequipo[2]);
        $("#modelo").val(infoequipo[3]);
        $("#modal-default").modal("hide");
    });
     $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print({
            title:"Orden de Servicios"
        });
    });
      })
function generarnumero(numero){
    if (numero>= 99999 && numero< 999999) {
        return Number(numero)+1;
    }
    if (numero>= 9999 && numero< 99999) {
        return "0" + (Number(numero)+1);
    }
    if (numero>= 999 && numero< 9999) {
        return "00" + (Number(numero)+1);
    }
    if (numero>= 99 && numero< 999) {
        return "000" + (Number(numero)+1);
    }
    if (numero>= 9 && numero< 99) {
        return "0000" + (Number(numero)+1);
    }
    if (numero < 9 ){
        return "00000" + (Number(numero)+1);
    }
}


    </script>
</body>
</html>
