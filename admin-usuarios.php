<?php  
include 'config.php';
Session::start();
Session::proteger();
$titulo="PRODS: Administraci&oacute;n de Usuarios";
if(isset($_REQUEST['op'])){
    switch ($_REQUEST['op']){
        case "list":            
            include 'plantillas/usuarios/list.php';
            break;
        case "new":
            include 'plantillas/usuarios/new.php';
            break;
        case "edit":
            include 'plantillas/usuarios/edit.php';
            break;
        case "del":
            include 'plantillas/usuarios/del.php';
            break;
        case "asignacion":
            include 'plantillas/usuarios/asignacion.php';
            break;
        case "asignar_grupo":
            include 'plantillas/usuarios/asignar_grupo.php';
            break;
        default :
            include 'plantillas/usuarios/list.php';
            break;
    }
}else{
    include 'plantillas/usuarios/list.php';
}
?>