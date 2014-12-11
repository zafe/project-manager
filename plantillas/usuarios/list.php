<?php 
$usr= new Usuarios();
$usuarios = $usr->getAll();
?>
<?php ob_start() ?>
<div class='row'>
    <h1>Administraci&oacute;n de Usuarios</h1>
    <a href="?op=new" class="btn btn-default btn-sm" role="button">Nuevo</a>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>
                <th></th>
                <th>Usuario</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Acciones</th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td>
                     <div class="col-sm-6 col-md-3">
                         <a href="?op=asignacion&usuario=<?php echo $u["nomb_usr"] ?>" class="thumbnail">
                         <img src="./<?php echo $u["imagen"] ?>" alt="imagen_usuario">
                         </a>
                    </div>
                </td>
                <td><?php echo $u['nomb_usr'] ?></td>
                <td><?php echo $u['apellido'] ?></td>
                <td><?php echo $u['nombre'] ?></td>
                <td>
                    <a href='?op=edit&usuario=<?php echo $u['nomb_usr'] ?>' >editar</a> |
                    <a href='?op=del&usuario=<?php echo $u['nomb_usr'] ?>' onclick="confirm('Esta seguro de Eliminar?')">eliminar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>