<?php
//si se presiono el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
    
    if (isset($_POST['descripcion'])){$nombre = $_POST['descripcion'];} else{$nombre="";}
    if (isset($_POST['cantidad'])){$cantidad = $_POST['cantidad'];} else{$cantidad="";}
    if (isset($_POST['precio'])){$precio = $_POST['precio'];} else{$precio="";}
    if (isset($_POST['grupos_id'])){$grupos_id = $_POST['grupos_id'];} else{$grupos_id="";}
    if (isset($_POST['idproducto'])){$idproducto = $_POST['idproducto'];} else{$idproducto="";}
    
    
    if(!empty($nombre)){
        if(!empty($cantidad)){
            if(!empty($precio)){
                $datosValidos=true;
            }else {Session::addMensajeError("El Campo precio es requerido...");$datosValidos=false;}
        
        }else {Session::addMensajeError("El Campo cantidad es requerido...");$datosValidos=false;}
        
    }else {Session::addMensajeError("El Campo descripcion es requerido...");$datosValidos=false;}
    
    
    if($datosValidos){
        $prod= new Productos();
        if($prod->upd($idproducto, $nombre, $cantidad, $precio,$grupos_id)==1){
            Session::addMensajeOk("El Producto se Guardo Correctamente");
            header("location:admin-productos.php");
            exit();
        }//if($prod->upd($idproducto, $descripcion, $cantidad, $precio,$grupos_id)==1)
    }//if($datosValidos)
}else{
    if(isset($_REQUEST['id'])){
        $producto=trim($_REQUEST['id']);   
        if(!empty($producto)){
            $prodDB= new Productos();
            $p=$prodDB->getById($producto);
            if($p==NULL){                
                Session::addMensajeError("No se encontro el Producto!!!");
                header("location:admin-productos.php");
                exit();
            }//if($u!=NULL){
        }//if(!empty($usuario)){
    }//if(isset($_REQUEST['usuario'])){
}//if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar")


//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:admin-productos.php");
    exit();
}


$cpDB=new CategoriasProductos();
$grupos=$cpDB->getAll();
?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
      <form action="?op=edit" method="post">
        <fieldset>
            <legend>Editar Producto</legend>
            <div class="form-group">
                <label for="descripcion">DESCRIPCION</label>            
                <input class="form-control" type="text" name="descripcion" id="descripcion" value="<?php echo $p['descripcion']?>" />
            </div>
            <div class="form-group">
                <label for="cantidad">CANTIDAD</label>                
                <input class="form-control" type="text" name="cantidad" id="cantidad" value="<?php echo $p['cantidad']?>" />
            </div>
            <div class="form-group">
                <label for="precio">PRECIO</label>                
                <input class="form-control" type="text" name="precio" id="precio" value="<?php echo $p['precio']?>" />
            </div>
            <input class="form-control" type="hidden" name="idproducto" id="idproducto" value="<?php echo $p['id']?>" />
            <div class="form-group">
                <label for="grupos_id">CATEGORIA</label>
                <select name="grupos_id" id="grupos_id" class="form-control" selected="<?php echo $p['categorias_productos_id']?>">
                    <?php HTML::options($grupos,'id','nombre') ?>
                </select>
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
