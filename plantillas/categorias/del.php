<?php
if(isset($_REQUEST['id'])){
    $categoria=trim($_REQUEST['id']);   
    if(!empty($categoria)){
        $catDB= new CategoriasProductos();
        $p=$catDB->getById($categoria);
        if($p!=NULL){
            if($catDB->delById($categoria)==1){
                Session::addMensajeOk("Se Elimino la Categoria Correctamente!!!");
            }else{
                Session::addMensajeError("ERROR al eliminar la Categoria!!!");
            }//if($prodDB->delById($producto)==1){
        }else{
            Session::addMensajeError("La Categoria no Existe!!!");
        }//if($p!=NULL){
    }//if(!empty($categoria)){
}//if(isset($_REQUEST['id'])){
header("location:admin-categorias.php");
exit();