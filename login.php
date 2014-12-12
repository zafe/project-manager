<?php 
include "config.php";
Session::start();
if(isset($_POST['btn'])){
    $us=$_POST['usr'];
    $pas=$_POST['pas'];
    $p=Session::autenticar($us, $pas);
    if($p!=NULL){
        $_SESSION["auth"]=true;
        $_SESSION["usuario"]=$p['nomb_usr'];
        $_SESSION["idUsuario"]=$p['idUsuario'];
        $_SESSION["nombrecompleto"]=$p['apellido'].", ".$p['nombre'];
        if($p['idEquipo']==1){
            $_SESSION["superadmin"]=true;
        }
        header("location:index.php");
        exit();
    }else{
        Session::addMensajeError("El ususario o contrase&ntilde;a no son correctos");        
    }
}
?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
    <form action="login.php" method="post" class="form">
        <fieldset>
            <legend>Iniciar Sesi&oacute;n</legend>
            <div class="form-group">
                <label for="usr">USUARIO</label>
                <input class="form-control" type="text" name="usr" id="usr" />
            </div>
            <div class="form-group">
                <label for="pas">PASSWORD</label>
                <input class="form-control" type="password" name="pas" id="pas"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="btn" value="Iniciar"/>
            </div>
        </fieldset>
    </form>
    </div>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>