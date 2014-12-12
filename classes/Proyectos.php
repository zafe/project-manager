<?php

class Proyectos extends MySQLDB{
    
    public function getAll(){
        return $this->query("SELECT * FROM Proyecto ORDER BY idProyecto");
    }
    
    public function add($nombre, $fechaInicio, $fechaFin){
        return $this->update("INSERT INTO Proyecto (nombre,fecha_creacion,fecha_final) VALUES ('$nombre','$fechaInicio','$fechaFin')");
    }
    
}
