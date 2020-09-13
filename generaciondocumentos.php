<?php
require_once('includes/config.php');
require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
     echo '<link rel="stylesheet" href="' . RUTA_CSS . 'bootstrap.css">
     <link rel="stylesheet" href="' . RUTA_CSS . 'fichasdocentes.css">
     <link rel="shortcut icon" type="image/x-icon" href="' . RUTA_IMGS . 'LogoUniversidad.png">
     <script type="text/javascript" src="' . RUTA_JS . 'codigo.js"></script>
     <script src="' . RUTA_JS . 'jquery-3.4.1.min.js" type="text/javascript"></script>
     <script src="' . RUTA_JS . 'tinymce.min.js"></script>';
    ?>
    <title>Gestión Docente: Generación Fichas Docentes</title>

</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center align-items-center">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['admin']) && $_SESSION['admin'] == false) {
            ?>
                    <div class="col-xl-6 col-lg-8 col-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2>Generación de las fichas docentes</h2>
                            </div>
                            <div class="card-body text-center">

                                <?php 
                                $access = new es\ucm\FormGeneracion('idGeneracion');
                                $datosIniciales = array();
                                $datosIniciales['email']=  htmlspecialchars(trim(strip_tags($_SESSION['idUsuario'])));
                                $access->gestionaModificacion($datosIniciales);
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php

                
            }
        else {
            echo '
            <div class="col-md-6 col-12">
            <div class="alert alert-danger" role="alert">
            <h2 class="card-title text-center">ACCESO DENEGADO</h2>
            <h5 class="text-center">Inicia sesión con un usuario que pueda acceder a este contenido</h5>
            </div>
            </div>';
        } ?>
        </div>
    </div>


</body>

</html>