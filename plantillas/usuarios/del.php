<?php
if(isset($_REQUEST['usuario'])){
    $nomb_usr=trim($_REQUEST['usuario']);   
    if(!empty($nomb_usr)){
        $userDB= new Usuarios();
        $p=$userDB->getById($nomb_usr);
        if($p!=NULL){
            if($userDB->delByNomb_Usr($nomb_usr)==1){
                Session::addMensajeOk("Se Elimino el Usuario Correctamente!!!");
            }else{
                Session::addMensajeError("ERROR al eliminar el Usuario!!!");
            }//if($usrDB->delById($usuario)==1){
        }else{
            Session::addMensajeError("El Ususario no Existe!!!");
        }//if($u!=NULL){
    }//if(!empty($usuario)){
}//if(isset($_REQUEST['usuario'])){
header("location:admin-usuarios.php");
exit();