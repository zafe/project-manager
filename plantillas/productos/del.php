<?php
if(isset($_REQUEST['id'])){
    $producto=trim($_REQUEST['id']);   
    if(!empty($producto)){
        $prodDB= new Productos();
        $p=$prodDB->getById($producto);
        if($p!=NULL){
            if($prodDB->delById($producto)==1){
                Session::addMensajeOk("Se Elimino el Producto Correctamente!!!");
            }else{
                Session::addMensajeError("ERROR al eliminar el Producto!!!");
            }//if($prodDB->delById($producto)==1){
        }else{
            Session::addMensajeError("El Producto no Existe!!!");
        }//if($p!=NULL){
    }//if(!empty($producto)){
}//if(isset($_REQUEST['id'])){
header("location:admin-productos.php");
exit();