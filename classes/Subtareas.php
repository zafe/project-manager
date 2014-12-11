<?php

/**
 * Description of Subtareas
 * 
 * Una subtareas son tareas que se generan dentro de otra
 * Cada tarea de un proyecto tiene una o mas subtareas
 * A cada subtarea se le asigna un responsable que es quien la realiza
 * Sobre cada subtarea se realizan los movimientos
 * Cuando todas las subtareas de una tarea estan terminadas se termina la tarea
 *
 * @author Raúl Martinez
 */
class Subtareas extends MySQLDB{
    
    /*
     * Obtengo las subtareas de una tarea determinada
     * Ademas obtengo la descripcion de la tarea para mostrar en la tabla
     * y los estados que se guardan con valor numerico en la tabla
     */ 
    public function getFromTarea($id_tarea) {
        return $this->query("SELECT sub.*,
                                    t.descripcion AS desc_tarea,
                                    CASE sub.estado
                                    	WHEN 1 THEN 'Creada'
                                        WHEN 2 THEN 'En curso'
                                        WHEN 3 THEN 'Pausada'
                                        WHEN 4 THEN 'Terminada'
                                        WHEN 5 THEN 'Cancelada'
                                    END AS estado_descrip
                FROM Subtarea  sub
                JOIN Tarea t ON (sub.idTarea = t.idTarea)
                WHERE sub.idTarea=$id_tarea");
    }
    

    /*
     *  Inserto una Subtarea
     */
    public function addSt($id_tarea, $descripcion, $estado, $fecha_inicio, $fecha_fin){
        $id_tarea=mysql_real_escape_string($id_tarea,$this->link);
        $descripcion=mysql_real_escape_string($descripcion,$this->link);
        $estado=mysql_real_escape_string($estado,$this->link);
        $fecha_inicio=mysql_real_escape_string($fecha_inicio,$this->link);
        $fecha_fin=mysql_real_escape_string($fecha_fin,$this->link);
        

        return $this->update("INSERT INTO Subtarea (idTarea, descripcion, estado, fecha_inicio, fecha_fin)
                             VALUES ($id_tarea,'$descripcion',$estado,'$fecha_inicio', '$fecha_fin')");
    }
    
    /*
     *  Inserto una Subtarea
     */
    public function add($id_tarea, $descripcion, $fecha_inicio, $fecha_fin){
        $id_tarea=mysql_real_escape_string($id_tarea,$this->link);
        $descripcion=mysql_real_escape_string($descripcion,$this->link);
        $fecha_inicio=mysql_real_escape_string($fecha_inicio,$this->link);
        $fecha_fin=mysql_real_escape_string($fecha_fin,$this->link);
        

        return $this->update("INSERT INTO Subtarea (idTarea, descripcion, estado, fecha_inicio, fecha_fin)
                             VALUES ($id_tarea,'$descripcion', 1, '$fecha_inicio', '$fecha_fin')");
    }
}
