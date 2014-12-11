<?php


if(isset($_POST['txtNombUsr'])){$usuario = $_POST['txtNombUsr'];} else {$usuario="";}
if(isset($_POST['txtApellido'])){$apellidos = $_POST['txtApellido'];} else{ $apellidos ="";}
if(isset($_POST['txtNombre'])){$nombres = $_POST['txtNombre'];}else{$nombres ="";}
if(isset($_POST['txtDNI'])){$dni = $_POST['txtDNI'];} else{$dni="";}
if(isset($_POST['txtSueldo'])){$sueldo = $_POST['txtSueldo'];}  else {$sueldo="";}
if(isset($_POST['txtPassword'])){$pass = $_POST['txtPassword'];}  else {$pass="";}
if(isset($_POST['txtPassword2'])){$pass2 = $_POST['txtPassword2'];}  else {$pass2="";}


//si se presiono el boton de guardar
if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar"){
    $datosValidos=true;
    //validar campo usuario requerido
    if(isset($_POST['txtNombUsr']) && !empty($usuario)){
        $usuario=trim($_POST['txtNombUsr']);
    }else{
        Session::addMensajeError("El Campo usuario es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['usuario']) && !empty($usuario))
    
    //validar campo apellidos requerido
    if(isset($_POST['txtApellido']) && !empty($apellidos)){
        $apellidos=trim($_POST['txtApellido']);
    }else{
        Session::addMensajeError("El Campo apellidos es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['apellidos']) && !empty($apellidos))
    //
    //validar campo nombres requerido
    if(isset($_POST['txtNombre']) && !empty($nombres)){
        $nombres=trim($_POST['txtNombre']);
    }else{
        Session::addMensajeError("El Campo nombres es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['nombres']) && !empty($nombres))
    //
    //validar campo dni requerido
    if(isset($_POST['txtDNI']) && !empty($dni)){
        $dni=trim($_POST['txtDNI']);
    }else{
        Session::addMensajeError("El Campo DNI es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['nombres']) && !empty($nombres))
    //
    //validar campo pass requerido
    if(isset($_POST['txtPassword']) && !empty($pass)){
        $pass=trim($_POST['txtPassword']);
    }else{
        Session::addMensajeError("El Campo PASSWORD es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['pass']) && !empty($pass))
        
    
    //validar campo pass2 requerido
    if(isset($_POST['txtPassword2']) && !empty($pass2)){
        $pass2=trim($_POST['txtPassword2']);
    }else{
        Session::addMensajeError("El Campo PASSWORD2 es requerido!!!");
        $datosValidos=false;
    }//if(isset($_POST['pass2']) && !empty($pass2))
    
    if($pass<>$pass2){
        Session::addMensajeError("Las PASSWORDS NO COINCIDEN!!!");
        $datosValidos=false;
    }//if($pass<>$pass2)
    
    
    if($datosValidos){
        $usr= new Usuarios();
        if($usr->addUsuario($usuario, $apellidos, $nombres, $pass, $dni, $sueldo)==1){
            Session::addMensajeOk("El Nuevo Usuario se Guardo Correctamente");
            header("location:admin-usuarios.php");
            exit();
        }//if($usr->add($usuario, $apellidos, $nombres, $pass)==1)
    }//if($datosValidos)
}//if(isset($_POST['btn-guardar']) && $_POST['btn-guardar'] == "Guardar")


//si se presiona el boton de cancelar
if(isset($_POST['btn-cancelar']) && $_POST['btn-cancelar'] == "Cancelar"){
    header("location:admin-usuarios.php");
    exit();
}



?>
<?php ob_start() ?>
<div class="row">
    <div class="well col-md-4 col-md-offset-4">
    <form action="?op=new" method="post">
        <fieldset>
            <legend>Nuevo Usuario</legend>
            <div class="form-group">
                <label for="txtNombUsr">NOMBRE DE USUARIO</label>
                <input class="form-control" type="text" name="txtNombUsr" id="txtNombUsr"  />
            </div>
            <div class="form-group">
                <label for="txtApellido">APELLIDOS</label>
                <input class="form-control" type="text" name="txtApellido" id="txtApellido" />
            </div>
            <div class="form-group">
                <label for="txtNombre">NOMBRES</label>
                <input class="form-control" type="text" name="txtNombre" id="txtNombre" />
            </div>
            <div class="form-group">
                <label for="txtDNI">DNI</label>
                <input class="form-control" type="text" name="txtDNI" id="txtDNI" />
            </div>
            <div class="form-group">
                <label for="txtSueldo">SUELDO</label>
                <input class="form-control" type="text" name="txtSueldo" id="txtSueldo" />
            </div>
            <div class="form-group">
                <label for="txtPassword">PASSWORD</label>
                <input class="form-control" type="password" name="txtPassword" id="txtPassword" />
            </div>
            <div class="form-group">
                <label for="txtPassword2">PASSWORD2</label>
                <input class="form-control" type="password" name="txtPassword2" id="txtPassword2" />
            </div>
            <!--div class="form-group">
                <label for="file">FOTO</label>
                <input name="file" type="file" > 
                <input name="btn-subir" type="submit" value="Cargar">
            </div-->
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
