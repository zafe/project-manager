<?php
//si se presiono el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
    
    if (isset($_POST['nombre'])){$nombre = $_POST['nombre'];} else{$nombre="";}
    if (isset($_POST['id'])){$id = $_POST['id'];} else{$id="";}
    
    
    if(!empty($nombre)){
        $datosValidos = true;
    }else {Session::addMensajeError("El Campo nombre es requerido...");$datosValidos=false;}
    
    
    if($datosValidos){
        $cat= new CategoriasProductos();
        if($cat->upd($nombre, $id)==1){
            Session::addMensajeOk("La Categoria se Modifico Correctamente");
            header("location:admin-categorias.php");
            exit();
        }//if($prod->upd($idproducto, $descripcion, $cantidad, $precio,$grupos_id)==1)
    }//if($datosValidos)
}else{
    if(isset($_REQUEST['id'])){
        $id=trim($_REQUEST['id']);   
        if(!empty($id)){
            $cpDB= new CategoriasProductos();
            $p=$cpDB->getById($id);
            if($p==NULL){                
                Session::addMensajeError("No se encontro el Producto!!!");
                header("location:admin-categorias.php");
                exit();
            }//if($p!=NULL){
        }//if(!empty($id)){
    }//if(isset($_REQUEST['id'])){
}//if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar")


//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:admin-categorias.php");
    exit();
}




?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
      <form action="?op=edit" method="post">
        <fieldset>
            <legend>Editar Categor&iacute;a</legend>
            <div class="form-group">
                <label for="nombre">NOMBRE</label>            
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $p['nombre']?>" />
                <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $p['id']?>" />
            </div>

            <div class="form-group">
                <input class="form-control" type="submit" name="btn-guardar" value="Guardar"/>
                <input class="form-control" type="submit" name="btn-cancelar" value="Cancelar"/>
            </div>
        </fieldset>
    </form>
    </div>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>
