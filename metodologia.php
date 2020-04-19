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
    <script src="' . RUTA_JS . 'jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="' . RUTA_JS . 'tinymce.min.js"></script>';
    ?>
    <title>Gestion Docente: Metodologia</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center align-items-center">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            ?>
                <div class="col-md-6 col-12">
                    <div class="card ">
                        <div class="card-header text-center">
                            <h2>Crear/Modificar borrador metodologia</h2>
                        </div>
                        <div class="card-body">
                            <?php
                            $access = new es\ucm\FormMetodologia('idMetodologia');
                            $controller = new es\ucm\ControllerImplements();
                            $datosIniciales= array();
                            if(isset($_GET['IdAsignatura'])){
                                $context = new es\ucm\Context(FIND_METODOLOGIA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                            }elseif(isset($_GET['IdModAsignatura'])){
                                $context = new es\ucm\Context(FIND_MODMETODOLOGIA, htmlspecialchars(trim(strip_tags($_GET['IdModAsignatura']))));
                            }
                            $contextMetodologia = $controller->action($context);
                            if($contextMetodologia->getEvent() === FIND_METODOLOGIA_OK || FIND_MODMETODOLOGIA_OK){
                                if($contextMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK){
                                    $datosIniciales['idMetodologia']=$contextMetodologia->getData()->getIdMetodologia();
                                }
                                $datosIniciales['metodologia']=$contextMetodologia->getData()->getMetodologia();
                                $datosIniciales['metodologiaI']=$contextMetodologia->getData()->getMetodologiaI();
                                $datosIniciales['idAsignatura']=$contextMetodologia->getData()->getIdAsignatura();
                                $access->gestionaModificacion($datosIniciales);
                            }elseif($contextMetodologia->getEvent() === FIND_METODOLOGIA_FAIL || FIND_MODMETODOLOGIA_FAIL){
                                $datosIniciales['idAsignatura']=$contextEvaluacion->getData()->getIdAsignatura();
                                $access->gestionaModificacion($datosIniciales);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                echo '
                <div class="col-md-6 col-12">
                <div class="alert alert-danger" role="alert">
                <h2 class="card-title text-center">ACCESO DENEGADO</h2>
                <h5 class="text-center">Inicia sesión con un usuario que pueda acceder a este contenido</h5>
                </div>
                </div>';
            }
            ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        tinymce.init({
            selector: '#metodologia',
            plugins: ['link image lists table'],
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
            menubar: false,
        });
        tinymce.init({
            selector: '#metodologiaI',
            plugins: ['link image lists table'],
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
            menubar: false,
        });
    </script>
</body>

</html>