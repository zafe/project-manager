<?php
//include './config.php';
Session::start();

?>

<?php ob_start() ?>




<div class="container">
    <div class="jumbotron">
        <h1>Tareas</h1>
    </div>
    
</div>
<table>
    <tbody>
        <tr>
            <td style="width: 400px">
                <div class="col-xs-4" style=" width:400px; float: left">
                        <div class="col-sm-6 col-md-4" style="width: 100%">
                           <div class="thumbnail" style="width: 100%">
                               <img src="./img/300/icon-business-notepad.png" alt="...">
                                   <div class="caption" style="width: 100%">
                                       <h2>Nueva Tarea</h2>
                                       <p>Agregar una nueva tarea a un proyecto existente...</p>
                                       <p><a href="?op=new" class="btn btn-primary" role="button">Nueva Tarea</a>
                                   </div>
                           </div>
                       </div>
                </div>
            </td>
            <td style="width: 400px">
                <div class="col-xs-4" style=" width:400px; float: right">
                    <div class="col-sm-6 col-md-4" style="width: 100%">
                        <div class="thumbnail" style="width: 100%">
                            <img src="./img/300/unnamed.png" alt="...">
                            <div class="caption" style="width: 100%">
                                <h3>Ver Todas las Tareas</h3>
                                <p>Mostrar un listado de todas las tareas con su estado, equipo y persona responsable</p>
                                <p><a href="?op=list" class="btn btn-primary" role="button">Ver Tareas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td style="width: 400px">
                <div class="col-xs-4" style=" width:400px; float: right">
                    <div class="col-sm-6 col-md-4" style="width: 100%">
                        <div class="thumbnail" style="width: 100%">
                            <img src="./img/300/Icon_Asset.jpg" alt="...">
                            <div class="caption" style="width: 100%">
                                <h3>Mis Tareas!</h3>
                                <p>Trabajar en tareas pendientes de distintos proyectos, crear subtareas, realizar subtareas y mas</p>
                                <p><a href="?op=mis_tareas&id_usuario=1" class="btn btn-primary" role="button">Ver Tareas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
    <p><h3>ERROR:</h3></p>
    <p>
        El id_usuario del enlace de la seccion Mis Tareas esta cargado de forma estatica (id_usuario = 1)<br>
            Falta obtener el id usuario en la ventana actual y enviarlo como un parametro
    </p>    
    
</table>
    





<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>

