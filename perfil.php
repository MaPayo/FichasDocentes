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
    <title>Gestión Docente: Perfil</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['admin']) && $_SESSION['admin'] == false) {
                $controller = new es\ucm\ControllerImplements();
                $context = new es\ucm\Context(FIND_PROFESOR, $_SESSION['idUsuario']);
                $contextProfesor = $controller->action($context);
                if ($contextProfesor->getEvent() === FIND_PROFESOR_OK) {
            ?>
                    <div class="col-xl-6 col-lg-8 col-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2>Perfil de <strong><?php echo $contextProfesor->getData()->getNombre() ?></strong></h2>
                            </div>
                            <div class="card-body text-center">
                                <?php
                                echo '

                            <table class="table table-hover">
                            <tbody>

                            <tr>
                            <th scope="row">CORREO ELECTRÓNICO</th>
                            <td>' . $contextProfesor->getData()->getEmail() . '</td>
                            </tr>
                            <tr>
                            <th scope="row">DEPARTAMENTO</th>
                            <td>' . $contextProfesor->getData()->getDepartamento() . '</td>
                            </tr>
                            <tr>
                            <th scope="row">DESPACHO</th>
                            <td>' . $contextProfesor->getData()->getDespacho() . '</td>
                            </tr>
                            <tr>
                            <th scope="row">FACULTAD</th>
                            <td>' . $contextProfesor->getData()->getFacultad() . '</td>
                            </tr>
                            <tr>
                            <th scope="row">TUTORÍAS</th>
                            <td>' . $contextProfesor->getData()->getTutoria() . '</td>
                            </tr>
                            </tbody>
                            </table>
                            ';
                                ?>
                                <div class="text-center">
                                    <a href="index.php"><button class="btn btn-secondary" id="btn-form" type="button">Volver a Inicio</button></a>
                                    <a href="info.php"><button class="btn btn-primary" id="btn-form" type="button">Cambiar Información</button></a>
                                    <a href="password.php"><button class="btn btn-primary" id="btn-form" type="button">Cambiar Contraseña</button></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['modificado'])) {
                    ?>
                        <div class="modal text-center" tabindex="-1" role="dialog" id="feedback">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Información</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="text-center">Se ha modificado correctamente</h4>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo '
                <div class="col-md-6 col-12">
                <div class="alert alert-danger" role="alert">
                <h2 class="card-title text-center">ACCESO DENEGADO</h2>
                <h5 class="text-center">No se ha podido obtener la información del usuario</h5>
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
    <?php
    if (isset($_GET['modificado'])) {
    ?>
        <script>
            $('#feedback').modal('show')
        </script>
    <?php
    }
    ?>
</body>

</html>