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
    echo '<link rel="stylesheet" href="' . RUTA_CSS . 'bootstrap.css">
    <link rel="stylesheet" href="' . RUTA_CSS . 'fichasdocentes.css">
    <link rel="shortcut icon" type="image/x-icon" href="' . RUTA_IMGS . 'LogoUniversidad.png">
    <script type="text/javascript" src="' . RUTA_JS . 'codigo.js"></script>
    <script src="' . RUTA_JS . 'jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="' . RUTA_JS . 'tinymce.min.js"></script>';
    ?>
    <title>Gestion Docente: Programa asignatura</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center align-items-center">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {

                if (isset($_GET['IdAsignatura']) || isset($_GET['IdModAsignatura'])) {
                    if (isset($_GET['IdAsignatura'])) {
                        $name = 'IdAsignatura';
                    } else {
                        $name = 'IdModAsignatura';
                    }

                    if ($_SESSION['asignaturas'][$_GET['IdGrado']][$_GET[$name]]['coordinacion'] == true || (isset($_SESSION['asignaturas'][$_GET['IdGrado']][$_GET[$name]]['permisos']) && $_SESSION['asignaturas'][$_GET['IdGrado']][$_GET[$name]]['permisos']->getPermisoPrograma() == true)) {
                        $controller = new es\ucm\ControllerImplements();
                        $context = new es\ucm\Context(FIND_CONFIGURACION, htmlspecialchars(trim(strip_tags($_GET[$name]))));
                        $contextConfiguacion = $controller->action($context);

                        if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && ($contextConfiguacion->getData()->getConocimientosPrevios() == 1 || $contextConfiguacion->getData()->getBreveDescripcion() == 1 || $contextConfiguacion->getData()->getProgramaDetallado() == 1)) {
            ?>
                            <div class="col-md-6 col-12">
                                <div class="card ">
                                    <div class="card-header text-center">
                                        <h2>Crear/Modificar borrador programa asignatura</h2>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $access = new es\ucm\FormProgramaAsignatura('idProgramaAsignatura');
                                        $datosIniciales = array();

                                        if (isset($_GET['IdAsignatura'])) {
                                            $context = new es\ucm\Context(FIND_PROGRAMA_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET[$name]))));
                                        } else {
                                            $context = new es\ucm\Context(FIND_MODPROGRAMA_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET[$name]))));
                                        }
                                        $contextPrograma = $controller->action($context);

                                        if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK || FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                            if ($contextPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                $datosIniciales['idPrograma'] = $contextPrograma->getData()->getIdPrograma();
                                            }
                                            $datosIniciales['conocimientosPrevios'] = $contextPrograma->getData()->getConocimientosPrevios();
                                            $datosIniciales['conocimientosPreviosI'] = $contextPrograma->getData()->getConocimientosPreviosI();
                                            $datosIniciales['breveDescripcion'] = $contextPrograma->getData()->getBreveDescripcion();
                                            $datosIniciales['breveDescripcionI'] = $contextPrograma->getData()->getBreveDescripcionI();
                                            $datosIniciales['programaTeorico'] = $contextPrograma->getData()->getProgramaTeorico();
                                            $datosIniciales['programaTeoricoI'] = $contextPrograma->getData()->getProgramaTeoricoI();
                                            $datosIniciales['programaSeminarios'] = $contextPrograma->getData()->getProgramaSeminarios();
                                            $datosIniciales['programaSeminariosI'] = $contextPrograma->getData()->getProgramaSeminariosI();
                                            $datosIniciales['programaLaboratorio'] = $contextPrograma->getData()->getProgramaLaboratorio();
                                            $datosIniciales['programaLaboratorioI'] = $contextPrograma->getData()->getProgramaLaboratorioI();
                                            $datosIniciales['idAsignatura'] = $_GET[$name];
                                            $datosIniciales['idGrado'] =$_GET['IdGrado'];
                                            $access->gestionaModificacion($datosIniciales);
                                        } else {
                                            $datosIniciales['idAsignatura'] = $_GET[$name];
                                            $datosIniciales['idGrado'] =$_GET['IdGrado'];
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
                     <h5 class="text-center">La asignatura seleccionada no ha sido creada correctamente o no contiene este apartado. Contacta con el administrador</h5>
                     </div>
                     </div>';
                        }
                    } else {
                        echo '
                 <div class="col-md-6 col-12">
                 <div class="alert alert-danger" role="alert">
                 <h2 class="card-title text-center">ACCESO DENEGADO</h2>
                 <h5 class="text-center">No tienes permisos suficientes para esta apartado</h5>
                 </div>
                 </div>';
                    }
                } else {
                    echo '
            <div class="col-md-6 col-12">
            <div class="alert alert-danger" role="alert">
            <h2 class="card-title text-center">ACCESO DENEGADO</h2>
            <h5 class="text-center">No se ha podido obtener la asignatura</h5>
            </div>
            </div>';
                }
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
            selector: '#conocimientosPrevios',
            plugins: ['link image lists table'],
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
            menubar: false,
        });
        tinymce.init({
            selector: '#conocimientosPreviosI',
            plugins: ['link image lists table'],
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
            menubar: false,
        });
        tinymce.init({
            selector: '#breveDescripcion',
            plugins: ['link image lists table'],
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
            menubar: false,
        });
        tinymce.init({
            selector: '#breveDescripcionI',
            plugins: ['link image lists table'],
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
            menubar: false,
        });
        tinymce.init({
            selector: '#programaDetallado',
            plugins: ['link image lists table'],
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
            menubar: false,
        });
        tinymce.init({
            selector: '#programaDetalladoI',
            plugins: ['link image lists table'],
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
            menubar: false,
        });
    </script>
</body>

</html>