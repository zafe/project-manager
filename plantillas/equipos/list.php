<?php

$equiposDB = new EquipoTrabajo();
$listaEquipos = $equiposDB ->getAll();
?>
<?php ob_start() ?>
<div class='row'>
    <h1>Listado de Equipos de Trabajo</h1>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>

                <th>Nombre</th>
                <th>Fecha de Creaci&oacute;n</th>
                <th>Fecha de Baja</th>
                <th></th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach ($listaEquipos as $p): ?>
            <tr>
                <td><?php echo $p["nombre"] ?></td>
                <td><?php echo $p['fecha_alta'] ?></td>
                <td><?php echo $p['fecha_baja'] ?></td>
                <td>
                    <a href='?op=info&id_equipo=<?php echo $p['idEquipo'] ?>' >Ver</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>


