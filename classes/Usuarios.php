<?php
/**
 * Description of Usuarios
 *
 * @author rmartinez
 */
class Usuarios extends MySQLDB {
    
    
    
    public function getAll(){
        return $this->query("SELECT u.nomb_usr,
                                    u.nombre,
                                    u.apellido,
                                    u.url_imagen as imagen
                                    FROM Usuario u 
                                    ORDER BY u.apellido");
    }
    
    
    /*
     * Obtengo todos los datos de la tabla Usuario
     * Además obtengo a que Equipos de Trabajo pertenece
     */
    
    public function getById($usuario){
        $usuario=mysql_real_escape_string($usuario,$this->link);
        $us=$this->query("SELECT u.idUsuario,
                                 u.nomb_usr, 
                                 u.fecha_alta, 
                                 u.fecha_baja,
                                 u.password,
                                 u.nombre,
                                 u.apellido,
                                 u.dni,
                                 u.sueldo,
                                 u.url_imagen,
                                 eq.idEquipo,
                                 eq.nombre AS Equipo
                FROM Usuario u 
                LEFT JOIN AsignacionUs asig on u.idUsuario = asig.idUsuario
                LEFT JOIN EquipoTrabajo eq on asig.idEquipo = asig.idEquipo
                WHERE u.nomb_usr='$usuario'");
        if(count($us) >= 1){
            return $us[0];
        }else{
            return null;
        }
    }
    
    /*
     * Elimino un usuario por su id
     */
    public function delById($usuario){
        $usuario=mysql_real_escape_string($usuario,$this->link);
        return $this->update("DELETE FROM Usuario WHERE idUsuario = ".$usuario);
    }
    
    
    /*
     * Elimino un usuario por su nombre de usuario
     */
    public function delByNomb_Usr($usuario){
        $usuario=mysql_real_escape_string($usuario,$this->link);
        return $this->update("DELETE FROM Usuario WHERE nomb_usr = '$usuario'");
    }
    
    public function upd($usuario,$apellidos,$nombres,$pass,$grupos_id){
        $usuario=mysql_real_escape_string($usuario,$this->link);
        $apellidos=mysql_real_escape_string($apellidos,$this->link);
        $nombres=mysql_real_escape_string($nombres,$this->link);
        $pass=mysql_real_escape_string($pass,$this->link);
        $grupos_id=mysql_real_escape_string($grupos_id,$this->link);
        //cifrar la clave
        $pass=crypt($pass);
        return $this->update("UPDATE usuarios SET apellidos='$apellidos',nombres='$nombres',pass='$pass',grupos_id=$grupos_id WHERE usuario='$usuario'");
    }
    
    
    /*
     *  Inserto un Usuario
     */
    public function addUsuario($nomb_usr, $apellido, $nombre, $pass, $dni, $sueldo){
        $nomb_usr=mysql_real_escape_string($nomb_usr,$this->link);
        $apellido=mysql_real_escape_string($apellido,$this->link);
        $nombre=mysql_real_escape_string($nombre,$this->link);
        $pass=mysql_real_escape_string($pass,$this->link);
        $dni=mysql_real_escape_string($dni,$this->link);
        $sueldo=mysql_real_escape_string($sueldo,$this->link);
        //cifrar la clave
        $pass=crypt($pass,'alvaro');
        return $this->update("INSERT INTO Usuario (nomb_usr, password, nombre, apellido, dni, sueldo)
                             VALUES ('$nomb_usr','$pass','$nombre','$apellido',$dni, $sueldo)");
    }
    
    public function autenticar($usr,$pass){
        $usr=mysql_real_escape_string($usr,$this->link);
        $pass=mysql_real_escape_string($pass,$this->link);
        $usuario=$this->getById($usr);
        if($usuario!=NULL){            
           $salt = crypt($pass, 'alvaro');
            //error_log($salt);
            //error_log($usuario['password']);
           if( $salt == $usuario['password']){
            return $usuario;
            }
        }
        return NULL;
    }
    
    /*
     * Obtengo todos los equipos a los que pertenece el Usuario
     * La comprobacion se hace por su nombre de usuario
     */
    public function getEquiposByNomb_Usr($nombre){
        return $this->query("SELECT e.nombre
                                    FROM EquipoTrabajo e
                                    JOIN AsignacionUs asig ON (e.idEquipo = asig.idEquipo)
                                    JOIN Usuario u ON (u.idUsuario = asig.idUsuario)
                                    WHERE u.nomb_usr = '$nombre'");
    }
}

?>
