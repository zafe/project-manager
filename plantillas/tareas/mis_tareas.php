<?php
if(isset($_REQUEST['id_usuario'])){$id_usuario=$_REQUEST['id_usuario'];}else $id_usuario = "";

$proyectosDB = new AsignacionTarea();
$listaTareas = $proyectosDB ->getTareasAsignadas($id_usuario);
?>
<?php ob_start() ?>
<div class='row'>
    <h1>Listado de Tareas</h1>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>

                <th>Descripci&oacute;n</th>
                <th>Estado</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Proyecto</th>
                <th>Inicio del Proyecto</th>
                <th>Final del Proyecto</th>
                <th></th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach ($listaTareas as $t): ?>
            <tr>
                <td><?php echo $t["descripcion"] ?></td>
                <td><?php echo $t['estado_descrip'] ?></td>
                <td><?php echo $t['fecha_inicio'] ?></td>
                <td><?php echo $t['fecha_fin'] ?></td>
                <td><?php echo $t['nombre_proyecto'] ?></td>
                <td><?php echo $t['inicio_proyecto'] ?></td>
                <td><?php echo $t['final_proyecto'] ?></td>
                <td>
                    <a href="?op=subtareas&id_tarea=<?php echo $t['idTarea'] ?>" >Subtareas</a>
                    
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>
