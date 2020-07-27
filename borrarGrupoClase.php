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
    <title>Gestion Docente: Grupo Clase</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center align-items-center">
         <?php
         if (isset($_SESSION['login']) && $_SESSION['login'] === true) {

            if(isset($_GET['IdAsignatura']) || (isset($_GET['IdGrupoClase']) && isset($_GET['IdAsignatura']))){

                if($_SESSION['asignaturas'][$_GET['IdGrado']][$_GET['IdAsignatura']]['coordinacion'] == true || (isset($_SESSION['asignaturas'][$_GET['IdGrado']][$_GET['IdAsignatura']]['permisos']) && $_SESSION['asignaturas'][$_GET['IdGrado']][$_GET['IdAsignatura']]['permisos']->getPermisoGrupoClase() == true )){
                    ?>
                    <div class="col-md-6 col-12">
                        <div class="card ">
                            <div class="card-header text-center">
                                <h2>Crear/Modificar borrador grupo clase</h2>
                            </div>
                            <div class="card-body">
                                <?php 
                                
                                $controller = new es\ucm\ControllerImplements();
                                
                                if (isset($_GET['IdGrupoClase'])) {
                                    $context = new es\ucm\Context(FIND_MODGRUPO_CLASE, htmlspecialchars(trim(strip_tags($_GET['IdGrupoClase']))));
                                    $contextModGrupoClase = $controller->action($context);
                                    if ($contextModGrupoClase->getEvent() === FIND_MODGRUPO_CLASE_OK) {
                                        $context = new es\ucm\Context(LIST_MODHORARIO_CLASE, htmlspecialchars(trim(strip_tags($_GET['IdGrupoClase']))));
                                        $contextHorariosClase = $controller->action($context);
                                        if ($contextHorariosClase->getEvent() === LIST_MODHORARIO_CLASE_OK) {
                                            foreach($contextHorariosClase->getData() as $horarioClase){
                                                $context = new es\ucm\Context(DELETE_MODHORARIO_CLASE, $horarioClase->getIdHorarioClase());
                                                $horarioClase = $controller->action($context);
                                            }
                                        }

                                        $context = new es\ucm\Context(LIST_MODGRUPO_CLASE_PROFESOR, htmlspecialchars(trim(strip_tags($_GET['IdGrupoClase']))));
                                        $contextGrupoClaseProfesor = $controller->action($context);
                                        if ($contextGrupoClaseProfesor->getEvent() === LIST_MODGRUPO_CLASE_PROFESOR_OK) {
                                            foreach($contextGrupoClaseProfesor->getData() as $grupoClaseProfesor){
                                                $arrayGrupoClaseProfesor = array();
                                                $arrayGrupoClaseProfesor['idGrupoClase'] = $grupoClaseProfesor->getIdGrupoClase();
                                                $arrayGrupoClaseProfesor['emailProfesor'] = $grupoClaseProfesor->getEmailProfesor();
                                                $context = new es\ucm\Context(DELETE_MODGRUPO_CLASE_PROFESOR, $arrayGrupoClaseProfesor);
                                                $contextHorarioClase = $controller->action($context);
                                            }
                                        }



                                        $context = new es\ucm\Context(FIND_MODGRUPO_CLASE, htmlspecialchars(trim(strip_tags($_GET['IdGrupoClase']))));
                                        $contextModGrupoClase = $controller->action($context);
                                        if ($contextModGrupoClase->getEvent() === FIND_MODGRUPO_CLASE_OK) {
                                            $context = new es\ucm\Context(DELETE_MODGRUPO_CLASE, htmlspecialchars(trim(strip_tags($_GET['IdGrupoClase']))));
                                            $contextModGrupoClase = $controller->action($context);
                                            if ($contextModGrupoClase->getEvent() === DELETE_MODGRUPO_CLASE_OK) {
                                                header('Location: indexAcceso.php?IdGrado='.$_GET['IdGrado'].'&IdAsignatura=' . $_GET['IdAsignatura'] . '&eliminado=y');
                                            } elseif ($contextModGrupoClase->getEvent() === DELETE_MODGRUPO_CLASE_FAIL) {
                                                header('Location: indexAcceso.php?IdGrado='.$_GET['IdGrado'].'&IdAsignatura=' . $_GET['IdAsignatura'] . '&eliminado=n');
                                            }
                                        }
                                    }
                                } 
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                   echo '
                   <div class="col-md-6 col-12">
                   <div class="alert alert-danger" role="alert">
                   <h2 class="card-title text-center">ACCESO DENEGADO</h2>
                   <h5 class="text-center">No tienes permisos suficientes para esta apartado</h5>
                   </div>
                   </div>';
               }
           }
           else {
            echo '
            <div class="col-md-6 col-12">
            <div class="alert alert-danger" role="alert">
            <h2 class="card-title text-center">ACCESO DENEGADO</h2>
            <h5 class="text-center">No se ha podido obtener la asignatura o el grupo</h5>
            </div>
            </div>';
        }
    }
    else {
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
</body>

</html>