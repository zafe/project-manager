<?php

if(isset($_REQUEST['id_equipo'])){
        $id_equipo=trim($_REQUEST['id_equipo']);   
        if(!empty($id_equipo)){
            $equiposDB = new EquipoTrabajo();
            $eq = $equiposDB->getById($id_equipo);
            if($eq==NULL){                
                Session::addMensajeError("No se encontro el Equipo de Trabajo!!!");
                header("location:equipos.php");
                exit();
            }else{
                $count = $equiposDB->countUsuariosById($id_equipo);
                if($count==NULL){                
                Session::addMensajeError("No se pudo contar la cantidad de usuarios!");
                header("location:equipos.php");
                exit();
                }
                $users = $equiposDB->getUsuariosById($id_equipo);
                if($users==NULL){                
                    Session::addMensajeError("No se pudo obtener a los usuarios!");
                    header("location:equipos.php");
                    exit();
                }
                
            }
            
        }
    
            
    }
?>
<?php ob_start() ?>
<div class="container">
    <div class="well col-md-4 col-md-offset-4">
    <fieldset>
            <legend>Equipo de Trabajo:  <?php echo $eq['nombre']?></legend>
            <legend>Fecha de Alta:  <?php echo $eq['fecha_alta']?></legend>
            <legend>Cantidad de Usuarios:  <?php echo $count['count']?></legend>
            <div class="panel panel-default">
                <div class="panel-heading">Usuarios</div>
                <div class="panel-body">
                </div>

                <table class="table">
                  <thead>
                        <tr>
                            
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Miembro desde</th>
                            <th></th>
                        </tr>            
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?php echo $u['nomb_usr'] ?></td>
                            <td><?php echo $u['ApNomb'] ?></td>
                            <td><?php echo $u['rol'] ?></td>
                            <td><?php echo $u['fecha_asig'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <p>
            <h3>ERROR: </h3><br>
                Esta pantalla realiza varias consultas SQL de una misma clase<br>
                Las consultas estan bien pero al parecer solo se cargan los resultados de la ultima
            </p>

            
    </fieldset>

    </div>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>        
    