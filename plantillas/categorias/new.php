<?php


$cpDB=new CategoriasProductos();


if(isset($_POST['nombre'])){$nombre = $_POST['nombre'];}  else {$nombre="";}


//si se presiona el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
      
    if(!empty($nombre)){
        $datosValidos = true;
    }else {Session::addMensajeError("El Campo nombre es requerido...");$datosValidos=false;}
    
    if($datosValidos==true){
        if($cpDB->add($nombre)==1){
            Session::addMensajeOk("La Categor&iacute;a se Guardo Correctamente");
            header("location:admin-categorias.php");
             exit();
        }
   } 
}

//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:admin-categorias.php");
    exit();
}




?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
    <form action="?op=new" method="post">
        <fieldset>
            <legend>Nueva Categor&iacute;a</legend>
            <div class="form-group">
                <label for="nombre">NOMBRE</label>            
                <input class="form-control" type="text" name="nombre" id="nombre" />
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
