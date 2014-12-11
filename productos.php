<?php  
include 'config.php';
Session::start();
$titulo="Listado de Productos";

$prod= new Productos();
$cat_prod = new CategoriasProductos();
$categorias = $cat_prod->getAll();


if(isset($_POST['btnCategorias']) && $_POST['btnCategorias'] == "Filtrar"){
    $datosValidos=true;
    
    if(isset($_POST['cbCategorias'])){
        $idcat = trim($_POST['cbCategorias']);
        
    }else{
        Session::addMensajeError("Seleccione una categoria!!!");
        $datosValidos=false;
        $idcat = "";  
    }
    if($datosValidos){
        if($idcat<>"0"){$productos = $prod->getByCategoria($idcat);echo $idcat;}
        //if($idcat<>"0"){$productos = $prod->getAll();}
        else $productos = $prod->getAll();
    }else{$productos = $prod->getAll();}
}else{$productos = $prod->getAll();}

?>
<?php ob_start() ?>
    <h1>Listado de Productos</h1>
    <div class="row" style="width: 300px; float: left">
        <form action="productos.php" method="post">
          <fieldset>
             <label id="etCategorias" name="etCategorias" for="cbCategorias"><i>Categorias: </i></label>
                <select name="cbCategorias" id="cbCategorias" class="form-control">
                    <option value="0">TODAS LAS CATEGORIAS</option>
                    <?php HTML::options($categorias,'id','nombre',0) ?>
                </select>
                <input type="submit" id="btnCategorias" name="btnCategorias" value="Filtrar"></input> 
              
              
          </fieldset>  
            
            
        </form>
    </div>
       
    <table class='table table-hover table-striped'>
        <thead>
            <tr>
                <th>Descripcion</th>
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
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>