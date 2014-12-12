<?php
if(isset($_REQUEST['tarea'])){
    $idTarea=trim($_REQUEST['tarea']);   
    if(!empty($idTarea)){
        $tareaDB = new Tareas();
        $t=$tareaDB->getById($idTarea);
        if($t!=NULL){
            if($tareaDB->deleteById($idTarea)==1){
                Session::addMensajeOk("Se Elimino la tarea Correctamente!!!");
            }else{
                Session::addMensajeError("ERROR al eliminar la tarea!!!");
            }//if($usrDB->delById($usuario)==1){
        }else{
            Session::addMensajeError("La tarea no Existe!!!");
        }//if($u!=NULL){
    }//if(!empty($usuario)){
}//if(isset($_REQUEST['usuario'])){
header("location:tareas.php");
exit();