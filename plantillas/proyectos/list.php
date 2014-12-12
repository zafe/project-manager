<?php

$proyectoDB = new Proyectos();
$listaProyectos = $proyectoDB ->getAll();
?>
<?php ob_start() ?>
<div class='row'>
    <h1>Listado de Proyectos</h1>
    <p><a href="?op=new" class="btn btn-primary" role="button">Nuevo Proyecto</a>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>

                <th>Nombre</th>
                <th>Fecha de Creaci&oacute;n</th>
                <th>Fecha de Finalizaci&oacute;n</th>
                <th>Cambios</th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach ($listaProyectos as $p): ?>
            <tr>
                <td><?php echo $p["nombre"] ?></td>
                <td><?php echo $p['fecha_creacion'] ?></td>
                <td><?php echo $p['fecha_final'] ?></td>
                <td> <a href="?op=del&id=<?php echo $p["idProyecto"] ?>" class="glyphicon glyphicon-trash"> Eliminar</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>

