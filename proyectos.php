<?php

include 'config.php';

Session::start();
Session::proteger();
$titulo="PRODS: Proyectos";
if(isset($_REQUEST['op'])){
    switch ($_REQUEST['op']){
        case "list":            
            include 'plantillas/proyectos/list.php';
            break;
        case "new":
            include 'plantillas/proyectos/new.php';
            break;
        case "del":
            include 'plantillas/proyectos/del.php';
            break;
        default :
            include 'plantillas/proyectos/list.php';
            break;
    }
}else{
    unset($_SESSION['proyecto']);
    include 'plantillas/proyectos/list.php';
}
?>