<?php


$cpDB=new CategoriasProductos();
$grupos=$cpDB->getAll();

$prod= new Productos();

if(isset($_POST['descripcion'])){$nombre = $_POST['descripcion'];}  else {$nombre="";}
if(isset($_POST['cantidad'])){$cantidad = $_POST['cantidad'];}else{$cantidad="";}
if(isset($_POST['precio'])){$precio = $_POST['precio'];}else{$precio="";}
if(isset($_POST['grupos_id'])){$grupos_id = $_POST['grupos_id'];}else{$grupos_id="";}

//si se presiona el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
   

    
    if(!empty($nombre)){
        if(!empty($cantidad)){
            if(!empty($precio)){
                $datosValidos=true;
            }else {Session::addMensajeError("El Campo precio es requerido...");$datosValidos=false;}
        
        }else {Session::addMensajeError("El Campo cantidad es requerido...");$datosValidos=false;}
        
    }else {Session::addMensajeError("El Campo descripcion es requerido...");$datosValidos=false;}
    
    if($datosValidos==true){
        if($prod->add($nombre, $cantidad, $precio,$grupos_id)==1){
            Session::addMensajeOk("El Nuevo Producto se Guardo Correctamente");
            header("location:admin-productos.php");
             exit();
        }
   } 
}

//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:admin-productos.php");
    exit();
}




?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
    <form action="?op=new" method="post">
        <fieldset>
            <legend>Nuevo Producto</legend>
            <div class="form-group">
                <label for="descripcion">DESCRIPCION</label>            
                <input class="form-control" type="text" name="descripcion" id="descripcion" />
            </div>
            <div class="form-group">
                <label for="cantidad">CANTIDAD</label>                
                <input class="form-control" type="text" name="cantidad" id="cantidad"  />
            </div>
            <div class="form-group">
                <label for="precio">PRECIO</label>                
                <input class="form-control" type="text" name="precio" id="precio"  />
            </div>
            <div class="form-group">
                <label for="grupos_id">CATEGORIA</label>
                <select name="grupos_id" id="grupos_id" class="form-control">
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
