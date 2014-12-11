<?php
include '../config.php';

error_log(var_dump($_REQUEST,true));
if(isset($_REQUEST['cat'])){ $cat=$_REQUEST['cat']; }else $cat="";

$prod = new Productos();

if($cat=="0"){
    $res=$prod->getAll();
}else{
$res=$prod->getByCategoria($cat);    
}


?>
<?php
 foreach ($res as $fila){ ?>
  <option value="<?php echo $fila['id']; ?>"><?php echo $fila['descripcion']; ?></option>  
<?php

}
?>