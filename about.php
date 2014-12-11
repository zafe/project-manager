<?php  
include 'config.php';
Session::start();
$titulo="Acerca de";

?>
<?php ob_start() ?>
    <h1>Administraci&oacute;n de Recursos</h1>
    <h4> Trabajo Pr&aacute;ctico Final </h4>
    <p><i> Integrantes del grupo: </i></p>
    <table class='table table-hover table-striped'>
        <thead>
            <tr>
                <th></th>
                <th>Alumno</th>
                <th>Legajo</th>
                <th>Comisi&oacute;n</th>
                <th>Email</th>
            </tr>            
        </thead>
        <tbody>
            <tr>
                <td>
                     <div class="col-sm-6 col-md-3">
                         <a href="./img/rmartinez.jpg" class="thumbnail">
                         <img src="./img/rmartinez.jpg" alt="imagen_usuario">
                         </a>
                    </div>
                </td>
                <td>Ra&uacute;l A. Martinez</td>
                <td>34163</td>
                <td>4k3</td>
                <td>raul.martinez230@gmail.com</td>
            </tr>
            <tr>
                <td>
                     <div class="col-sm-6 col-md-3">
                         <a href="./img/erojas.jpg" class="thumbnail">
                         <img src="./img/erojas.jpg" alt="imagen_usuario">
                         </a>
                    </div>
                </td>
                <td>Esteban J. Rojas</td>
                <td>33182</td>
                <td>4k3</td>
                <td>javier_rojas50@hotmail.com</td>
            </tr>
            <tr>
                <td>
                     <div class="col-sm-6 col-md-3">
                         <a href="./img/fzafe.jpg" class="thumbnail">
                             <img src="./img/fzafe.jpg" alt="imagen_usuario">
                         </a>
                    </div>
                </td>
                <td>Omar Fernando Zafe</td>
                <td>38125</td>
                <td>4k3</td>
                <td>fernandozafe@gmail.com</td>
            </tr>
        </tbody>
    </table>
<?php $contenido = ob_get_clean() ?>
<?php include 'plantillas/base.php' ?>