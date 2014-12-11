<?php
include '../../config.php';
Session::start();

$cDB = new Clientes();
$clientes = $cDB ->llenarCombo();

$cat_prod = new CategoriasProductos();
$categorias = $cat_prod->getAll();

$prod = new Productos();
$productos = $prod->getAll();


if(isset($_POST['btnConfirmar'])){
    

    
    if(isset($_POST['cbClientes'])){$id_cliente=($_POST['cbClientes']); }else{$id_cliente="";}
    $usuario=$_SESSION['usuario'];
    //echo $usuario;
    $vDB = new Ventas();
    $venta = $vDB->insertCabeceraVenta($usuario, $id_cliente);
   
    //inserto el detalle de la venta
    
    if($venta != null){
        foreach ($_SESSION['venta'] as $d){
            $detalle_venta=$vDB->insertDetalleVenta($venta, $d['id'], $d['cantidad'], $d['subtotal']);

        }
        
        
    }
    
    if($detalle_venta != null){
        header("location:?id_venta=$venta&op=cierre");
        //Session::addMensajeOk("La Venta se Gener&oacute; Correctamente");
        exit();
        
    }
    
   
    
    
    

    
    
    
}







?>

<?php ob_start() ?>

<script type="text/javascript">

function getProductosByCategoria(str){
    
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("cbProducto").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","../prods_v3/ajax/getProductosByCat.php?cat="+str,true);
xmlhttp.send();
}




</script>

<script type="text/javascript">

function cargarDetalle(){
    
    var producto;
    var cantidad;
    
    producto=document.getElementById("cbProducto").value;
    cantidad=document.getElementById("txtCantidad").value;
    
    if(cantidad==null || cantidad==""){
        alert("Debe especificar la cantidad del producto requerida");
    }
    
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("tablaDetalle").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","../prods_v3/ajax/addDetalle.php?producto="+producto+"&cantidad="+cantidad,true);
xmlhttp.send();
}




</script>




<div class="container" style="width: auto; height: 100px">
    <div class="jumbotron">
        <h1>Nueva Venta</h1>
    </div>
    
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<form action="?op=confirmar" method="post">
<div class="container" style="height: auto; width: auto;">
    <script>getProductosByCategoria(0);</script>
    <div class="row" style="width: 300px; height: auto; float: left" >
        
          <fieldset>
             <label id="etCliente" name="etCliente" for="cbClientes"><i>Seleccionar Cliente: </i></label>
                <select name="cbClientes" id="cbClientes" class="form-control">
                    <?php HTML::options($clientes,'id','ap_nomb') ?>
                </select>
          </fieldset> 
          <fieldset>
             <label id="etCategoria" name="etCategoria" for="etCategoria"><i>Categoria de Producto: </i></label>
             <select name="cbCategoria" id="cbCategoria" class="form-control" onchange="getProductosByCategoria(this.value);">
                    <option value="0">TODAS LAS CATEGORIAS</option>
                    <?php HTML::options($categorias,'id','nombre',0) ?>
                </select>
          </fieldset>  
          <fieldset>
             <label id="etProducto" name="etProducto" for="etProducto"><i>Producto: </i></label>
                <select name="cbProducto" id="cbProducto" class="form-control">
                    <!--?php HTML::options($productos,'id','descripcion') ?-->
                </select>
          </fieldset>  
          <label id="etCantidad" name="etCantidad" for="txtCantidad"><i>Cantidad: </i></label>  
          <input class="form-control" type="text" name="txtCantidad" id="txtCantidad" /> <br> 
          <input class="form-control" type="button" name="btnAgregar" value="Agregar" onclick="cargarDetalle();"/> 
         
    
    </div>
         <div id='tablaDetalle'></div> 
    
</div>
    <br><input class="btn btn-primary btn-lg" type="submit" name="btnConfirmar" id="btnConfirmar" value="CONFIRMAR"/>
    </form>

<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>
