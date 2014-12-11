<?php 
$prod= new Productos();
$productos = $prod->getAll();
?>
<?php ob_start() ?>
<div class='row'>
    <h1>Administraci&oacute;n de Productos</h1>
    <a href="?op=new" class="btn btn-default btn-sm" role="button">Nuevo</a>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>
                <th>Descripci&oacuten</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Categoria</th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
            <tr>
                <td><?php echo $p['descripcion'] ?></td>
                <td><?php echo $p['cantidad'] ?></td>
                <td><?php echo $p['precio'] ?></td>
                <td><?php echo $p['nombre_categoria'] ?></td>
                <td>
                    <a  href='?op=edit&id=<?php echo $p['id'] ?>' ><b>editar</b></a> |
                    <a  href='?op=del&id=<?php echo $p['id'] ?>' onclick="confirm('Esta seguro de Eliminar?')"><b>eliminar</b></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a class="btn btn-primary btn-lg" role="button" href="admin-categorias.php"> Ver Categor&iacute;as</a>

    
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>