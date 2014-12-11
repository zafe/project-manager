<?php

/**
 * Description of Tareas
 * 
 * Un proyecto esta compuesto por varias tareas
 * Cuando todas las tareas del proyecto se terminan se da por terminado el proyecto
 * Cada tarea tiene un estado que se guarda en la bd como un valor numerico
 * Los valores para cada estado  son:
                                         1 = 'Creada'
                                         2 = 'En curso'
                                         3 = 'Pausada'
                                         4 = 'Terminada'
                                         5 = 'Cancelada'
 * Cada tarea tiene una fecha de inicio que es la fecha donde es creada
 * Tambien tiene una fecha de fin que es cuando se pasa el estado a terminada
 * Una subtarea puede estar asignada a muchas personas, estas se reparten las subtareas
 * 
 * @author Raúl Martinez
 */
class Tareas extends MySQLDB{
   
    
    public function getAll(){
        return $this->query("SELECT * FROM Tarea ORDER BY fecha_inicio");
    }
    
    /**
     * Obtengo todas las tareas, estado, quien es el equipo responsable y a que proyecto pertenece
     */
    public function getTareas(){
        return $this->query("SELECT t.*,
                                    eq.nombre AS nombre_equipo,
                                    pro.nombre AS nombre_proyecto,
                                    CASE t.estado
                                    	WHEN 1 THEN 'Creada'
                                        WHEN 2 THEN 'En curso'
                                        WHEN 3 THEN 'Pausada'
                                        WHEN 4 THEN 'Terminada'
                                        WHEN 5 THEN 'Cancelada'
                                    END AS estado_descrip
                                    FROM Tarea t
                                    JOIN Proyecto pro ON (pro.idProyecto = t.idProyecto)
                                    LEFT JOIN EquipoTrabajo eq ON (t.idEquipo = eq.idEquipo)
                                    LEFT JOIN AsignacionUs asig ON (asig.idEquipo = eq.idEquipo)");
    }
    
    
    /**
     * Inserto una tarea
     */
    public function add($equipo, $descripcion, $proyecto){
        $equipo=mysql_real_escape_string($equipo,$this->link);
        $descripcion=mysql_real_escape_string($descripcion,$this->link);
        $proyecto=mysql_real_escape_string($proyecto,$this->link);

        return $this->update("INSERT INTO Tarea (idEquipo, descripcion, estado, fecha_inicio, idProyecto)
                             VALUES ($equipo,'$descripcion',1 ,now(), $proyecto)");
    }
}
