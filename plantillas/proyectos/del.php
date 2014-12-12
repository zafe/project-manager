<?php
if(isset($_REQUEST['id'])){
    $id=trim($_REQUEST['id']);   
    if(!empty($id)){
        $projectDB= new Proyectos();
        $p=$projectDB->getById($id);
        if($p!=NULL){
            if($projectDB->deleteById($id)==1){
                Session::addMensajeOk("Se Elimino el Proyecto Correctamente!!!");
            }else{
                Session::addMensajeError("ERROR al eliminar el Proyecto!!!");
            }//if($usrDB->delById($usuario)==1){
        }else{
            Session::addMensajeError("El Proyecto no Existe!!!");
        }//if($u!=NULL){
    }//if(!empty($usuario)){
}//if(isset($_REQUEST['usuario'])){
header("location:proyectos.php");
exit();