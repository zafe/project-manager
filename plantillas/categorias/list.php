<?php 
$cat= new CategoriasProductos();
$categorias = $cat->getAll();
?>
<?php ob_start() ?>
<div class='row'>
    <h1>Administraci&oacute;n de Categor&iacute;as</h1>
    <a href="?op=new" class="btn btn-default btn-sm" role="button">Nuevo</a>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>
                <th>Nombre</th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach ($categorias as $p): ?>
            <tr>
                <td><?php echo $p['nombre'] ?></td>
                <td>
                    <a href='?op=edit&id=<?php echo $p['id'] ?>' >editar</a> |
                    <a href='?op=del&id=<?php echo $p['id'] ?>' onclick="confirm('Esta seguro de Eliminar?')">eliminar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
    <a class="btn btn-primary btn-lg" role="button" href="admin-productos.php"> Ver Productos</a>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>