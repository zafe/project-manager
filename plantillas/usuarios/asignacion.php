<?php

    $usrDB= new Usuarios();

    if(isset($_REQUEST['usuario'])){
        $usuario=trim($_REQUEST['usuario']);   
        if(!empty($usuario)){
            
            $u=$usrDB->getById($usuario);
            $equipos = $usrDB->getEquiposByNomb_Usr($_REQUEST['usuario']);
            if($u==NULL){                
                Session::addMensajeError("No se encontro el Usuario!!!");
                header("location:admin-usuarios.php");
                exit();
            }
        }
    }


?>

<?php ob_start() ?>
<div class="row">
    <div class="panel panel-default">
    <form action="?op=asignacion" method="post">
        <fieldset>
            <legend>Asignaciones del Usuario</legend>
            <label><?php echo $u['nombre'] ?> <?php echo $u['apellido'] ?></label>
            <div class="form-group">
                <label>Nombre de Usuario:</label>    <?php echo $u['nomb_usr'] ?>
            </div>
            <div class="form-group">
                <label>Fecha de Alta:</label>    <?php echo $u['fecha_alta'] ?>
            </div>
            <h3>Equipos a los que pertenece: </h3>
            <ul>
                <?php foreach ($equipos as $eq): ?>
                <li><?php echo $eq['nombre'] ?></li>
                 <?php endforeach ?>
 
            </ul>
            <a href='?op=asignar_grupo&id_usuario=<?php echo $u['idUsuario'] ?>' >Agregar Equipo</a>
            <h3>Tareas por finalizar: </h3>
            
            
            
            
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

