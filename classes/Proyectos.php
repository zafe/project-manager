<?php


/**
 * Description of Proyectos
 *
 * @author Raúl Martinez
 */
class Proyectos extends MySQLDB{
    
    public function getAll(){
        return $this->query("SELECT * FROM Proyecto ORDER BY idProyecto");
    }
}
