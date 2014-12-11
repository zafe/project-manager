<?php

if(isset($_REQUEST['id_tarea'])){$id_tarea=$_REQUEST['id_tarea'];}else $id_tarea = "";



if(isset($_POST['txtDescripcion'])){$descripcion = $_POST['txtDescripcion'];}  else {$descripcion="";}
if(isset($_POST['txtInicio'])){$inicio = $_POST['txtInicio'];}  else {$inicio="";}
if(isset($_POST['txtFin'])){$fin = $_POST['txtFin'];}  else {$fin="";}


//si se presiono el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
    $datosValidos=true;
    //validar campo usuario requerido
    if(isset($_POST['txtDescripcion']) && !empty($descripcion)){
        $descripcion=trim($_POST['txtDescripcion']);
    }else{
        Session::addMensajeError("El Campo descripcion es requerido!!!");
        $datosValidos=false;
    }
    
    if($datosValidos){
        $tareasDB = new Subtareas();
        if($tareasDB->add($id_tarea, $descripcion, $inicio, $fin)==1){
            Session::addMensajeOk("Una nueva SubTarea se Guardo Correctamente");
            header("location:tareas/subtareas.php");
            exit();
        }
    }
}

//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:tareas/subtareas.php");
    exit();
}

?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
    <form action="?op=new_subtarea" method="post">
        <fieldset>
            <legend>Nueva Sub-Tarea</legend>
            <div class="form-group">
                <label for="txtDescripcion">Descripci&oacute;n</label>
                <input class="form-control" type="text" name="txtDescripcion" id="txtDescripcion"  />
            </div>
            <div class="form-group">
                <label for="txtInicio">Fecha de Inicio</label>
                <input class="form-control" type="text" name="txtInicio" id="txtInicio"  />
            </div>
            <div class="form-group">
                <label for="txtFin">Fecha de Finalizaci&oacute;n</label>
                <input class="form-control" type="text" name="txtFin" id="txtFin"  />
            </div>       
            <div class="form-group">
                <input class="form-control" type="submit" name="btn-guardar" value="Guardar"/>
                <input class="form-control" type="submit" name="btn-cancelar" value="Cancelar"/>
            </div>
        </fieldset>
    </form>
        No recibe el valor del parametro id_tarea y hace que falle la consulta
    </div>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>