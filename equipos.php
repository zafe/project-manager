<?php
include 'config.php';

Session::start();
Session::proteger();
$titulo="PRODS: Equipos";
if(isset($_REQUEST['op'])){
    switch ($_REQUEST['op']){
        case "list":            
            include 'plantillas/equipos/list.php';
            break;
        case "new":
            include 'plantillas/equipos/new.php';
            break;
        case "info":            
            include 'plantillas/equipos/info.php';
            break;
        default :
            include 'plantillas/equipos/list.php';
            break;
    }
}else{
    unset($_SESSION['equipos']);
    include 'plantillas/equipos/list.php';
}
?>
