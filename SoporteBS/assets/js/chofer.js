 $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;
 
 
    function add_conductor()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
 
    function edit_conductor(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('conductor/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            //$('[name="id"]'(form)).val(data.id)(DB);
            $('[name="id"]').val(data.id);
            $('[name="datos"]').val(data.datos_s);
            $('[name="dni"]').val(data.dni);
            $('[name="telefono"]').val(data.telefono);
            $('[name="direccion"]').val(data.direccion);
 
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Conductor'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error no se obtuvo respuesta de ajax');
        }
    });
    }
 
 
 
    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('conductor/conductor_add')?>";
      }
      else
      {
        url = "<?php echo site_url('conductor/conductor_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
 
    function delete_conductor(id)
    {
      if(confirm('Estas seguro que deseas eliminar?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('conductor/conductor_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error eliminando data');
            }
        });
 
      }
    }
 