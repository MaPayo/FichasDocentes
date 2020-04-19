<?php
require_once('includes/config.php');
require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    echo '<link href="' . RUTA_CSS . 'estilos.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="' . RUTA_CSS . 'bootstrap.css">
    <link rel="stylesheet" href="' . RUTA_CSS . 'fichasdocentes.css">
    <link rel="shortcut icon" type="image/x-icon" href="' . RUTA_IMGS . 'LogoUniversidad.png">
    <script type="text/javascript" src="' . RUTA_JS . 'codigo.js"></script>
    <script src="' . RUTA_JS . 'jquery-3.4.1.min.js" type="text/javascript"></script>';
    ?>
    <title>Gestion Docente: Panel de control</title>
</head>
<body>
<div class="container-fluid">
        <?php
       // require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        </div>
<?php
/*Se comprueba que la persona esta registrada */
//if(isset($_SESSION['login']) && $_SESSION['login'] === true){
    
    //Creo aqui el controlador
    $controller = new es\ucm\ControllerImplements();

    //Informacion de los grados (basico para todo lo que vendra despues)
    $context = new es\ucm\Context(LIST_GRADO, "");
    $grados = $controller->action($context);
//}
?>
<div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Listado de asignaturas por Grado</h2>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <?php
                            foreach ($_SESSION['permisos'] as $tupla) {
                                    $context = new es\ucm\Context(FIND_ASIGNATURA, unserialize($tupla)->getIdAsignatura());
                                    $controller = new es\ucm\ControllerImplements();
                                    $asigna = $controller->action($context);
                                    $asignaturas[] = $asigna;
                                }

                                foreach ($grados as $grado) {
                                    $card = '';
                                    $i = true;
                                    foreach ($asignaturas as $asig) {
                                        $codGrado = (int) ($asig->getIdMateria() / 100);
                                        if ($codGrado == $grado->getCodigoGrado()) {
                                            if ($i == true) {
                                                $card = $card . ' <div class="card">
                                            <div class="card-header" id="heading' . $grado->getCodigoGrado() . '">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapse' . $grado->getCodigoGrado() . '" aria-expanded="true" aria-controls="collapse' . $grado->getCodigoGrado() . '">' . $grado->getNombreGrado() . '</button>
                                            </h2>
                                            </div>

                                            <div id="collapse' . $grado->getCodigoGrado() . '" class="collapse show" aria-labelledby="heading' . $grado->getCodigoGrado() . '" data-parent="#accordionExample">
                                            <div class="card-body">
                                            <p><a href="indexAcceso.php?IdAsignatura=' . $asig->getIdAsignatura() . '">' . $asig->getNombreAsignatura() . '</a></p>';
                                                $i = false;
                                            } else {
                                                $card = $card . '<p><a href="indexAcceso.php?IdAsignatura=' . $asig->getIdAsignatura() . '">' . $asig->getNombreAsignatura() . '</a></p>';
                                            }
                                        }
                                    }
                                    if (!$i) {
                                        $card = $card . '</div>
                                    </div>
                                    </div>';
                                    }
                                    echo $card;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                
</body>

</html>