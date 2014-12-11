<?php

/**
 * Description of Entregas
 *
 * @author Raúl Martinez
 */
class Entregas extends MySQLDB{
    
    /*
     * Obtiene todas las entregas
     */
    public function getAll() {
        return $this-> query("SELECT * FROM Entrega");
    } 
    
    
    /*
     * Inserta una entrega
     */
    public function add($proyecto,$descripcion,$observaciones,$fecha_plazo,$fecha_entrega){
        $proyecto=mysql_real_escape_string($proyecto,$this->link);
        $descripcion=mysql_real_escape_string($descripcion,$this->link);
        $observaciones=mysql_real_escape_string($observaciones,$this->link);
        $fecha_plazo=mysql_real_escape_string($fecha_plazo,$this->link);
        $fecha_entrega=mysql_real_escape_string($fecha_entrega,$this->link);

        return $this->update("INSERT INTO Entrega(idProyecto, descripcion, observaciones, fecha_plazo_final, fecha_entrega) 
                VALUES($proyecto, '$descripcion', '$observaciones', '$fecha_plazo', '$fecha_entrega')");
    }
}
