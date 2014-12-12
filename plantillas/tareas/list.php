<?php

$proyectosDB = new Tareas();
$listaTareas = $proyectosDB ->getTareas();
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
                <th>Proyecto</th>
                <th>Equipo</th>
                <th></th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach ($listaTareas as $t): ?>
            <tr>
                <td><?php echo $t["descripcion"] ?></td>
                <td><?php echo $t['estado_descrip'] ?></td>
                <td><?php echo $t['fecha_inicio'] ?></td>
                <td><?php echo $t['nombre_proyecto'] ?></td>
                <td><?php echo $t['nombre_equipo'] ?></td>    
                <td>
                    <a href='?op=edit&tarea=<?php echo $t['idTarea'] ?>' >editar</a> |
                    <a href='?op=del&tarea=<?php echo $t['idTarea'] ?>' onclick="confirm('Esta seguro de Eliminar?')">eliminar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>
