<?php


/**
 * Description of AsignacionTarea
 * 
 * Esta tabla relaciona una tarea con el usuario
 *
 * @author Raúl Martinez
 */
class AsignacionTarea extends MySQLDB{
    
    
    public function getTareasAsignadas($id_usuario) {
        
        return $this->query("SELECT t.*,
                                    date_format(t.fecha_inicio, '%d-%m-%Y') AS fecha_inicio,
                                    date_format(t.fecha_fin, '%d-%m-%Y') AS fecha_fin,
                                    CASE t.estado
                                    	WHEN 1 THEN 'Creada'
                                        WHEN 2 THEN 'En curso'
                                        WHEN 3 THEN 'Pausada'
                                        WHEN 4 THEN 'Terminada'
                                        WHEN 5 THEN 'Cancelada'
                                    END AS estado_descrip,
                                    p.nombre AS nombre_proyecto, 
                                    date_format(p.fecha_creacion, '%d-%m-%Y') AS inicio_proyecto, 
                                    date_format(p.fecha_final, '%d-%m-%Y') AS final_proyecto 
                            FROM Tarea t 
                            JOIN AsignacionTarea asig ON (t.idTarea = asig.idTarea) 
                            JOIN Proyecto p ON (t.idProyecto = p.idProyecto) 
                            WHERE asig.idUsuario = $id_usuario 
                            ORDER BY t.idProyecto, t.idTarea");
    }
    
}
