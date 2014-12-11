<?php

if(isset($_REQUEST['id_usuario'])){
    $id_usuario = $_REQUEST['id_usuario'];
    $asigDB = new AsignacionUs();
    $equipos = $asigDB->getEquiposNoAsignados($id_usuario);
}else{$id_usuario = "";}



//si se presiono el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
    $datosValidos=true;
    if(isset($_POST['cbEquipo'])){$id_equipo = $_POST['cbEquipo'];} else {$id_equipo="";}
    if(isset($_POST['cbRol'])){$rol = $_POST['cbRol'];} else{ $rol ="";}
        
    
    if($datosValidos){
        if($asigDB->add($id_equipo, $id_usuario, $rol)==1){
            Session::addMensajeOk("El Nuevo Usuario se Guardo Correctamente");
            header("location:asignacion.php");
            exit();
        }
    }
}


//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:admin-usuarios.php");
    exit();
}



?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
    <form action="?op=asignar_grupo" method="post">
        <fieldset>
            <legend>Agregar a Equipo de Trabajo</legend>
            <div class="form-group">
                <label for="cbEquipos">EQUIPOS DE TRABAJO</label>
                <select name="cbEquipos" id="cbEquipos" class="form-control">
                        <?php HTML::options($equipos,'idEquipo','nombre') ?>
                    </select>
            </div>
            <div class="form-group">
                <label for="cbRol">ROL</label>
                <select name="cbRol" id="cbRol" class="form-control">
                    <option value="Administrador">Administrador</option>
                    <option value="Programador" selected="selected">Programador</option>
                    <option value="Tester">Tester</option>
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

