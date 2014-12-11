<?php

if(isset($_REQUEST['id_tarea'])){$id_tarea=$_REQUEST['id_tarea'];}else $id_tarea = "";

$sub = new Subtareas();
$subtareas = $sub->getFromTarea($id_tarea);

?>
<?php ob_start() ?>
<div class='row'>
    <h1>Subtareas</h1>
    <a href="?op=new_subtarea&id_tarea = <?php echo $_REQUEST['id_tarea'] ?>" class="btn btn-default btn-sm" role="button">Nueva Subtarea</a>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>
                <th>Tarea</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Responsable</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th></th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach ($subtareas as $s): ?>
            <tr>
                <td><?php echo $s['desc_tarea'] ?></td>
                <td><?php echo $s['descripcion'] ?></td>
                <td><?php echo $s['estado_descrip'] ?></td>
                <td><?php if(isset($s['responsable'])){echo $s['responsable'];} ?></td>
                <td><?php echo $s['fecha_inicio'] ?></td>
                <td><?php echo $s['fecha_fin'] ?></td>
                <td>
                    <a href='?op=new_movimiento&id_subtarea=<?php echo $s['idSubtarea'] ?>' >Actualizar</a>
                    
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>

