<?php  
include 'config.php';
Session::start();
Session::proteger();
$titulo="PRODS: Ventas";
if(isset($_REQUEST['op'])){
    switch ($_REQUEST['op']){
        case "list":            
            include 'plantillas/ventas/list.php';
            break;
        case "cierre":
            include 'plantillas/ventas/cierre.php';
            break;
        case "confirmar":
            include 'plantillas/ventas/principal.php';
            break;
        default :
            include 'plantillas/usuarios/list.php';
            break;
    }
}else{
    unset($_SESSION['venta']);
    include 'plantillas/ventas/principal.php';
}
?>