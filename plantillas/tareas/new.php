<?php

//Obtengo los equipos para llenar el combo
$eqDB = new EquipoTrabajo();
$equipos = $eqDB ->getEquiposVigentes();

//Obtengo los proyectos para llenar el combo
$proDB = new Proyectos();
$proyectos = $proDB->getAll();



if(isset($_POST['txtDescripcion'])){$nombre = $_POST['txtDescripcion'];}  else {$nombre="";}
if(isset($_POST['cbProyecto'])){$fechaInicio = $_POST['cbProyecto'];}  else {$fechaInicio="";}
if(isset($_POST['cbEquipo'])){$fechaFin = $_POST['cbEquipo'];}  else {$fechaFin="";}


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
        $proyectosDB = new Tareas();
        if($proyectosDB->add($fechaFin, $nombre, $fechaInicio)==1){
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
            <legend>Nueva Tarea</legend>
            <div class="form-group">
                <label for="txtDescripcion">Descripci&oacute;n</label>
                <input class="form-control" type="text" name="txtDescripcion" id="txtDescripcion"  />
            </div>
            <div class="form-group">
                <label for="cbProyecto">Proyecto</label>
                    <select name="cbProyecto" id="cbProyecto" class="form-control">
                        <?php HTML::options($proyectos,'idProyecto','nombre') ?>
                    </select>
            </div>
            <div class="form-group">
                <label for="cbEquipo">Equipo</label>
                <select name="cbEquipo" id="cbEquipo" class="form-control">
                        <?php HTML::options($equipos,'idEquipo','nombre') ?>
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