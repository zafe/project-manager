<?php

include 'config.php';

Session::start();
Session::proteger();
$titulo="PRODS: Tareas";
if(isset($_REQUEST['op'])){
    switch ($_REQUEST['op']){
        case "list":            
            include 'plantillas/tareas/list.php';
            break;
        case "new":
            include 'plantillas/tareas/new.php';
            break;
        case "new_subtarea":
            include 'plantillas/tareas/new_subtarea.php';
            break;
        case "mis_tareas":
            include 'plantillas/tareas/mis_tareas.php';
            break;
        case "subtareas":
            include 'plantillas/tareas/subtareas.php';
            break;
        case "new_movimiento":
            include 'plantillas/movimientos/new_movimiento.php';
            break;
        default :
            include 'plantillas/tareas/list.php';
            break;
    }
}else{
    unset($_SESSION['tarea']);
    include 'plantillas/tareas/principal.php';
}
?>

