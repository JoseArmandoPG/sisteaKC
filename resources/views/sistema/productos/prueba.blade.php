<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script>
    
</head>
<body>

    <input type="text" name="precio" id="precio" value="">Precio
    <input type="text" name="iva" id="iva" value="">IVA
    <input type="text" name="total" id="total" value="">Total
    <script type="text/javascript">
    $(document).ready(function(){

        $("#precio").keyup(function(){
            var precio = $("#precio").val();
            var iva=parseFloat((parseInt(precio))*.16).toFixed(2);
            $("#iva").val(iva);
            //var ivaT = $("#iva").val();
            //var precioT = $("#precio").val();
            //var tot=parseFloat(paserInt(precioT)+parseInt(ivaT));
            $("#total").val(parseInt(precio)+parseInt(iva));
            //$('#total').attr("value", $("#precio").val() +  $("#iva").val());
        });
    }); 
</script>
</body>
</html>