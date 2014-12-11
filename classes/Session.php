<?php

/**
 * Description of Session
 *
 * @author rmartinez
 */
class Session {
    public static function start(){
        session_start();
    }
    
    public static function isValid(){
        return isset($_SESSION["auth"]);
    }
    public static function isSuperAdmin(){
        return isset($_SESSION["superadmin"]);
    }
    
    public static function autenticar($usr,$pas){
        //return ($usr=="admin" && $pas=="1234");
        $u= new Usuarios();
        return $u->autenticar($usr, $pas);
    }
    
    public static function destroy(){
        session_destroy();
    }
    
    public static function proteger(){
        if(! self::isValid() ){
            header("location:login.php");
            exit();
        }
    }
    public static function hayMensajes(){
        return isset($_SESSION['mensajes']);
    }
    public static function clearMensajes(){
        unset($_SESSION['mensajes']);
    }
    public static function hayMensajesOk(){
        return isset($_SESSION['mensajes']['ok']) && count($_SESSION['mensajes']['ok']) > 0;
    }
    public static function hayMensajesError(){
        return isset($_SESSION['mensajes']['error'])&& count($_SESSION['mensajes']['error']) > 0;
    }
    public static function addMensajeOk($msg){
        $_SESSION['mensajes']['ok'][]=$msg;
    }
    public static function addMensajeError($msg){
        $_SESSION['mensajes']['error'][]=$msg;
    }
    public static function getMensajesOk(){
        return $_SESSION['mensajes']['ok'];
    }
    public static function getMensajesError(){
        return $_SESSION['mensajes']['error'];
    }
}

?>
