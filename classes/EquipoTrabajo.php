<?php


/**
 * Description of EquipoTrabajo
 *
 * @author Raúl Martinez
 */

class EquipoTrabajo extends MySQLDB{

    /**
     * 
     * Obtengo todos los equipos de trabajo
     */
    
  public function getAll(){
        return $this->query("SELECT * FROM EquipoTrabajo ORDER BY idEquipo");
    }
    
    /**
     * Obtengo el id y el nombre de un equipo
     * Para ser vigentes los equipos no deben tener una fecha de baja
     */
    public function getEquiposVigentes(){
        return $this->query("SELECT idEquipo, nombre FROM EquipoTrabajo"
                . " WHERE fecha_baja IS NULL");
    }
    
    /**
     * Obtengo todos los datos de un equipo por su id
     */
    public function getById($id){
        return $this->query("SELECT * FROM EquipoTrabajo WHERE idEquipo = $id");
    }
    
    /**
     * Cuenta la cantidad de usuarios que tiene el equipo
     */
    public function countUsuariosById($id){
        return $this->query("SELECT count(asig.idUsuario) AS count 
                                FROM EquipoTrabajo eq
                                JOIN AsignacionUS asig ON (asig.idEquipo = eq.idEquipo) 
                            WHERE eq.idEquipo = $id");
    }
    
    /**
     * Lista los usuarios que pertenecen al equipo 
     */
    public function getUsuariosById($id){
        return $this->query("SELECT u.nomb_usr,
                                    concat_ws(' ', u.nombre, u.apellido) AS ApNomb,
                                    asig.rol,
                                    asig.fecha_asig
                                FROM EquipoTrabajo eq
                                JOIN AsignacionUS asig ON (asig.idEquipo = eq.idEquipo)
                                JOIN Usuario u ON (asig.idUsuario = u.idUsuario)
                            WHERE eq.idEquipo = $id");
    }
    
}
