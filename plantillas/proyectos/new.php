<?php

if(isset($_POST['txtNombre'])){$nombre = $_POST['txtDescripcion'];}  else {$nombre="";}
if(isset($_POST['cbProyecto'])){$proyecto = $_POST['cbProyecto'];}  else {$proyecto="";}
if(isset($_POST['cbEquipo'])){$equipo = $_POST['cbEquipo'];}  else {$equipo="";}


//si se presiono el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
    $datosValidos=true;
    //validar campo usuario requerido
    if(isset($_POST['txtDescripcion']) && !empty($nombre)){
        $nombre=trim($_POST['txtDescripcion']);
    }else{
        Session::addMensajeError("El Campo descripcion es requerido!!!");
        $datosValidos=false;
    }
    
    if($datosValidos){
        $tareasDB = new Tareas();
        if($tareasDB->add($equipo, $nombre, $proyecto)==1){
            Session::addMensajeOk("Una nueva Tarea se Guardo Correctamente");
            header("location:tareas.php");
            exit();
        }//if($usr->add($usuario, $apellidos, $nombres, $pass)==1)
    }//if($datosValidos)
}//if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar")


//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:tareas.php");
    exit();
}

?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
        <form action="?op=new" method="post">
        <fieldset>
            <legend>Nuevo Proyecto</legend>
            <div class="form-group">
                <label for="txtDescripcion">Descripci&oacute;n</label>
                <input class="form-control" type="text" name="txtNombre" id="txtNombre"  />
            </div>
            
            <div class="form-group">
                <label for="txtDescripcion">Fecha Inicio</label>
                <input class="form-control" type="text" name="txtfechaInicio" id="txtfechaInicio"  />
            </div>
            
            <div class="form-group">
                <label for="txtDescripcion">Fecha Fin</label>
                <input class="form-control" type="text" name="txtfechaFin" id="txtfechaFin"  />
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