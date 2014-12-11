<?php
//si se presiono el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
    $datosValidos=true;
    //validar campo usuario requerido
    if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
        $usuario=trim($_POST['usuario']);
    }else{
        Session::addMensajeError("El Campo usuario es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['usuario']))
    
    //validar campo apellidos requerido
    if(isset($_POST['apellidos']) && !empty($_POST['apellidos'])){
        $apellidos=trim($_POST['apellidos']);
    }else{
        Session::addMensajeError("El Campo apellidos es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['apellidos']))
    //
    //validar campo nombres requerido
    if(isset($_POST['nombres']) && !empty($_POST['nombres'])){
        $nombres=trim($_POST['nombres']);
    }else{
        Session::addMensajeError("El Campo nombres es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['nombres']))
    //
    //validar campo pass requerido
    if(isset($_POST['pass']) && !empty($_POST['pass'])){
        $pass=trim($_POST['pass']);
    }else{
        Session::addMensajeError("El Campo PASSWORD es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['pass']))
    //
    //validar campo grupos_id requerido
    if(isset($_POST['grupos_id']) && !empty($_POST['grupos_id'])){
        $grupos_id=trim($_POST['grupos_id']);
    }else{
        Session::addMensajeError("El Campo <b>NIVEL</b> es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['pass']))
    
    //validar campo pass2 requerido
    if(isset($_POST['pass2']) && !empty($_POST['pass2'])){
        $pass2=trim($_POST['pass2']);
    }else{
        Session::addMensajeError("El Campo PASSWORD2 es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['pass2']))
    
    if($pass<>$pass2){
        Session::addMensajeError("Las PASSWORDS NO COINCIDEN!!!");
        $datosValidos=false;
    }//if($pass<>$pass2)
    
    
    if($datosValidos){
        $usr= new Usuarios();
        if($usr->upd($usuario, $apellidos, $nombres, $pass,$grupos_id)==1){
            Session::addMensajeOk("El Nuevo Usuario se Guardo Correctamente");
            header("location:admin-usuarios.php");
            exit();
        }//if($usr->add($usuario, $apellidos, $nombres, $pass)==1)
    }//if($datosValidos)
}else{
    if(isset($_REQUEST['usuario'])){
        $usuario=trim($_REQUEST['usuario']);   
        if(!empty($usuario)){
            $usrDB= new Usuarios();
            $u=$usrDB->getById($usuario);
            if($u==NULL){                
                Session::addMensajeError("No se encontro el Usuario!!!");
                header("location:admin-usuarios.php");
                exit();
            }//if($u!=NULL){
        }//if(!empty($usuario)){
    }//if(isset($_REQUEST['usuario'])){
}//if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar")


//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:admin-usuarios.php");
    exit();
}

//$grupDB=new Grupos();
//$grupos=$grupDB->getAll();


?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
    <form action="?op=edit" method="post">
        <fieldset>
            <legend>Editar usuario <?php echo $u['nomb_usr'] ?></legend>            
            <input class="form-control" type="hidden" name="usuario" id="usuario" value="<?php echo $u['nomb_usr'] ?>" />
            <div class="thumbnails">
                    <a href="#" class="thumbnail">
                    <img src="<?php echo $u['url_imagen'] ?>" alt="imagen_usuario">
            </div>
            </ul>
            <div class="form-group">
                <label for="apellidos">APELLIDOS</label>
                <input class="form-control" type="text" name="apellidos" id="apellidos" value="<?php echo $u['apellido'] ?>" />
            </div>
            <div class="form-group">
                <label for="nombres">NOMBRES</label>
                <input class="form-control" type="text" name="nombres" id="nombres" value="<?php echo $u['nombre'] ?>" />
            </div>
            <div class="form-group">
                <label for="txtDNI">DNI</label>
                <input class="form-control" type="text" name="txtDNI" id="txtDNI" value ="<?php echo $u['dni'] ?>" />
            </div>
            <div class="form-group">
                <label for="txtSueldo">SUELDO</label>
                <input class="form-control" type="text" name="txtSueldo" id="txtSueldo" value="<?php echo $u['sueldo'] ?>" />
            </div>
            <div class="form-group">
                <label for="pass">PASSWORD</label>
                <input class="form-control" type="password" name="pass" id="pass"  />
            </div>
            <div class="form-group">
                <label for="pass2">PASSWORD2</label>
                <input class="form-control" type="password" name="pass2" id="pass2"  />
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="btn-guardar" value="Guardar"/>
                <input class="form-control" type="submit" name="btn-cancelar" value="Cancelar"/>
            </div>
        </fieldset>
    </form>
    </div>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>
