<?php

class Proyectos extends MySQLDB{
    
    public function getAll(){
        return $this->query("SELECT * FROM Proyecto ORDER BY idProyecto");
    }
    
    public function getById($id){
        $id = mysql_real_escape_string($id, $this->link);
        return $this->update("SELECT * FROM Proyecto WHERE idProyecto = $id");
    }
    
    public function add($nombre, $fechaInicio, $fechaFin){
        return $this->update("INSERT INTO Proyecto (nombre,fecha_creacion,fecha_final) VALUES ('$nombre','$fechaInicio','$fechaFin')");
    }
    
    public function deleteById($id){
        $id = mysql_real_escape_string($id, $this->link);
        return $this->update("DELETE FROM Proyecto where idProyecto = $id");
    }
    
}
