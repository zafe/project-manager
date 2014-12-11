<!DOCTYPE html>
<html>
  <head>
    <title>
        <?php 
            if(isset($titulo)){
                echo $titulo;
            }  else {
                echo "Catalogo de Productos";
            }                
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS de Bootstrap -->    
    <!--link href="css/bootstrap.min.css" rel="stylesheet" media="screen"-->
    <link href="css/bootstrap-theme-united.min.css" rel="stylesheet" media="screen">

    <!-- CSS adicional con mis configuraciones -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet" media="screen"> 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- CUERPO -->
    <div id="wrap"> 
            <!-- Fixed navbar -->
            <div class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php"><img src="../img/glyphicons/png/glyphicons-21-home.png"/><b></b></a>
                </div>
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="proyectos.php">Proyectos</a></li>
                    <?php if(Session::isValid()) : ?>
                    <!--li><a href="ventas.php">Ventas</a></li-->
                    <li><a href="tareas.php">Tareas</a></li>
                    
                    <li class="dropdown"> 
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Administraci&oacute;n 
                        <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                        
                       <?php if(Session::isSuperAdmin()) : ?> 
                        <a class="dropdown-header" href="admin-usuarios.php">Administraci&oacute;n de Usuarios</a>                  
                       </ul>
                        <li><a href="equipos.php">Equipos</a></li>
                        <?php endif ?>
                    </li>     
                    <?php endif ?>
                  </ul>
                    <div class="nav navbar-nav navbar-text navbar-right" >
                      <?php if(Session::isValid()) : ?>                        
                        Usuario <b><?php echo $_SESSION["usuario"]; ?></b>&nbsp;<a href="logout.php" class="btn btn-default btn-xs" role="button">Cerrar Sesi&oacute;n</a>
                      <?php else :?>
                      <a href="login.php" class="btn btn-default btn-xs" role="button">Iniciar Sesi&oacute;n</a>
                      <?php endif ?>
                    </div>
                  
                </div><!--/.nav-collapse -->
              </div>
            </div><!-- Fixed navbar -->
            
            
            <!-- Contenido -->            
            <div class="container">
                <?php if(Session::hayMensajes()) :?>
                <div class="row">
                    <?php if( Session::hayMensajesError() ) :?>
                    <div class='alert alert-danger'>
                        <ul>
                            <?php foreach (Session::getMensajesError() as $m): ?>
                            <li><?php echo $m ?>  </li>
                            <?php endforeach ?>
                        </ul>
                    </div>                
                    <?php endif ?>
                    <?php if( Session::hayMensajesOk() ) :?>
                    <div class='alert alert-success'>
                        <ul>
                            <?php foreach (Session::getMensajesOk() as $m): ?>
                            <li><?php echo $m ?>  </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php endif ?>
                </div>
                <?php Session::clearMensajes() ?>
                <?php endif ?>
                <?php 
                if(isset($contenido)){
                    echo $contenido;
                }
                ?>
            </div><!-- Contenido -->
    </div><!-- CUERPO --> 
     <div id="footer">
      <div class="container">
          <p class="text-muted credit">Trabajo Pr&aacute;ctico Final</p>
      </div>
    </div>
  </body>
</html>