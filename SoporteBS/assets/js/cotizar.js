
        $(document).ready(function () {
     
            $("#comprobantes").on("change",function(){
        option = $(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#idcomprobante").val(infocomprobante[0]);
            $("#igv").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
        }
        else{
            $("#idcomprobante").val(null);
            $("#igv").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }
        sumar();
    })
          $('#personas').keyup(function(){
            num = $(this).val();
            if (num != "") {
                if (num>70) {
                alert('Valor no valido');
                $(this).focus();
                $(this).select();
            }else{
                if (num<5)
             {
                $('#vehiculo').val('Camioneta');
            }else if(num>=5 && num<=11){
                $('#vehiculo').val('Minivan');
            }else if(num>=11 && num<=30){
                $('#vehiculo').val('Van');
            }else if(num>=30){
                $('#vehiculo').val('Bus');
            }
            }
            
            }else{
                //alert('esta vacio');
                $('#vehiculo').val(null);

            }
        });
          $(document).on("click",".btn-check",function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
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
    