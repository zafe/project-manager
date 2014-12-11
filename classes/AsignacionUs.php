<?php

/**
 * Description of AsignacionUs
 * 
 * Esta tabla relaciona el usuario con el equipo
 *
 * @author Raúl Martinez
 */
class AsignacionUs extends MySQLDB{
    
    /**
     * Creo la asignacion de un usuario a un equipo de trabajo
     * @param type $idEquipo
     * @param type $idUsuario
     * @param type $rol
     * @return type
     */
    public function add($idEquipo, $idUsuario, $rol){
        $idEquipo=mysql_real_escape_string($idEquipo,$this->link);
        $idUsuario=mysql_real_escape_string($idUsuario,$this->link);
        $rol=mysql_real_escape_string($rol,$this->link);
        
        return $this->update("INSERT INTO AsignacionUs (idEquipo, idUsuario, fecha_asig, rol) 
                            VALUES($idEquipo, $idUsuario, now(), '$rol')");
    }
    
    /**
     * Obtengo los equipos que el usuario no tiene asignados 
     * @param type $id_usuario
     * @return type
     */
    
    public function getEquiposNoAsignados($id_usuario) {
        
        return $this->query("SELECT * FROM EquipoTrabajo e
                            WHERE NOT e.idEquipo = (SELECT e.idEquipo FROM EquipoTrabajo e
                                                    JOIN AsignacionUs asig ON (asig.idEquipo= e.idEquipo)
                                                    WHERE asig.idUsuario = $id_usuario
                                                    )");
    }
    
}
