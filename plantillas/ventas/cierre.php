<?php
include '../../config.php';
Session::start();

$v = new Ventas();
$venta=$_REQUEST['id_venta'];


$total=$v->getTotalVenta($venta);
?>
<?php ob_start() ?>
<script type="text/javascript">
    function calcular(total){
        var total;
        var pago = document.getElementById('txtPago').value;
        var vuelto = pago - total;
        if(vuelto>0){
            alert("El vuelto correspondiente es: "+vuelto);
        }
        
    }

</script>

<div class="container" style="width: auto; height: 100px">
    <div class="jumbotron">
        <h1>Venta Generada!</h1>
        <p>El monto total es: $<?php echo $total; ?></p>
    </div>
    <div class="container">
        <label for="txtPago">Ingresar el pago: </label>
        <input type="text" id="txtPago" name="txtPago" />
        <input type="button" id="btnPago" name="btnPago" onclick="calcular(<?php echo $total;?>);" value="Calcular Vuelto"/>
    </div>

</div>
<?php $contenido = ob_get_clean() ?>
<?php include '../../plantillas/base.php' ?>
 