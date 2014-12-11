<?php
include '../config.php';
Session::start();
if(isset($_REQUEST['producto'])){$producto=$_REQUEST['producto'];}else{$producto="";}
if(isset($_REQUEST['cantidad'])){$cantidad=$_REQUEST['cantidad'];}else{$cantidad="";}    

$pDB = new Productos();
$prod = $pDB->getById($producto);

$subtotal=$prod['precio']*$cantidad;
$descripcion=$prod['descripcion'];
$_SESSION['venta'][$producto]['id']=$producto;
$_SESSION['venta'][$producto]['descripcion']=$descripcion;
$_SESSION['venta'][$producto]['cantidad']=$cantidad;
$_SESSION['venta'][$producto]['subtotal']=$subtotal;

?>
<table  name='tablaDetalle'class='table table-hover table-striped'>
          <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>            
                </thead>
                <tbody>
<?php
foreach ($_SESSION['venta']as $fila){
?>
    <tr>    
    <td><?php echo $fila['descripcion'] ?></td>
    <td><?php echo $fila['cantidad'] ?></td>
    <td><?php echo $fila['subtotal']?></td>
    </tr>
<?php
}
?>
               </tbody>
                        </table>

