<?php
require_once('includes/config.php');
require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');

require_once('vendor/autoload.php');

use Jfcherng\Diff\Differ;
use Jfcherng\Diff\DiffHelper;
use Jfcherng\Diff\Factory\RendererFactory;
use Jfcherng\Diff\Renderer\RendererConstant;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    echo '<link rel="stylesheet" href="' . RUTA_CSS . 'bootstrap.css">
    <link rel="stylesheet" href="' . RUTA_CSS . 'fichasdocentes.css">
    <link rel="stylesheet" href="' . RUTA_CSS . 'diff-table.css">
    <link rel="shortcut icon" type="image/x-icon" href="' . RUTA_IMGS . 'LogoUniversidad.png">
    <script type="text/javascript" src="' . RUTA_JS . 'codigo.js"></script>
    <script src="' . RUTA_JS . 'jquery-3.4.1.min.js" type="text/javascript"></script>';
    ?>
    <title>Gestión Docente: Panel de control</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center">
            <?php

            if (isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['admin'] == false) {
                ?>
                <div class="col-xl-3 col-lg-4 col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Listado de asignaturas por Grado</h3>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionListaAsignaturasPorGrado">
                                <?php

                                $controller = new es\ucm\ControllerImplements();

                                foreach ($_SESSION['asignaturas'] as $codGrado => $grado) {
                                    $card = '';
                                    $context = new es\ucm\Context(FIND_GRADO, $codGrado);
                                    $grad = $controller->action($context);
                                    $card = $card . ' <div class="card">
                                    <div class="card-header" id="heading' . $codGrado . '">
                                    <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapse' . $codGrado . '" aria-expanded="true" aria-controls="collapse' . $codGrado . '">' . $grad->getData()->getNombreGrado() . '</button>
                                    </h2>
                                    </div>

                                    <div id="collapse' . $codGrado . '" class="collapse show" aria-labelledby="heading' . $codGrado . '" data-parent="#accordionListaAsignaturasPorGrado">
                                    <div class="card-body">';

                                    foreach ($_SESSION['asignaturas'][$codGrado] as $codAsig => $asignatura) {
                                        $context = new es\ucm\Context(FIND_ASIGNATURA, $codAsig);
                                        $as = $controller->action($context);
                                        if ($codAsig == $_GET['IdAsignatura']) {
                                            $card = $card . '<p><a class="text-primary" href="indexAcceso.php?IdGrado=' . $codGrado . '&IdAsignatura=' . $codAsig . '">' . $as->getData()->getNombreAsignatura() . '</a></p>';
                                        } else {
                                            $card = $card . '<p><a href="indexAcceso.php?IdGrado=' . $codGrado . '&IdAsignatura=' . $codAsig . '">' . $as->getData()->getNombreAsignatura() . '</a></p>';
                                        }
                                    }
                                    $card = $card . '</div>
                                    </div>
                                    </div>';

                                    echo $card;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_GET['IdAsignatura']) && isset($_GET['IdGrado']) && isset($_SESSION['asignaturas'][$_GET['IdGrado']][$_GET['IdAsignatura']])) {
                    $controller = new es\ucm\ControllerImplements();

                    $context = new es\ucm\Context(FIND_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $contextAsignatura = $controller->action($context);

                    $context = new es\ucm\Context(FIND_MODASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $contextModAsignatura = $controller->action($context);

                    $context = new es\ucm\Context(FIND_MATERIA, $contextAsignatura->getData()->getIdMateria());
                    $contextMateria = $controller->action($context);

                    $context = new es\ucm\Context(FIND_MODULO, $contextMateria->getData()->getIdModulo());
                    $contextModulo = $controller->action($context);

                    $context = new es\ucm\Context(FIND_GRADO, htmlspecialchars(trim(strip_tags($_GET['IdGrado']))));
                    $contextGrado = $controller->action($context);

                    $context = new es\ucm\Context(FIND_CONFIGURACION, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $contextConfiguracion = $controller->action($context);


                    if ($contextAsignatura->getEvent() === FIND_ASIGNATURA_OK && $contextModAsignatura->getEvent() === FIND_MODASIGNATURA_OK && $contextMateria->getEvent() === FIND_MATERIA_OK && $contextModulo->getEvent() === FIND_MODULO_OK && $contextGrado->getEvent() === FIND_GRADO_OK && $contextConfiguracion->getEvent() === FIND_CONFIGURACION_OK) {

                        $context = new es\ucm\Context(FIND_TEORICO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextTeorico = $controller->action($context);

                        $context = new es\ucm\Context(FIND_PROBLEMA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextProblema = $controller->action($context);

                        $context = new es\ucm\Context(FIND_LABORATORIO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextLaboratorio = $controller->action($context);

                        $context = new es\ucm\Context(FIND_PROFESOR, $contextAsignatura->getData()->getCoordinadorAsignatura());
                        $CoordinadorAsignatura = $controller->action($context);

                        $context = new es\ucm\Context(FIND_PROGRAMA_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextPrograma = $controller->action($context);
                        $context = new es\ucm\Context(FIND_MODPROGRAMA_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextModPrograma = $controller->action($context);

                        $context = new es\ucm\Context(FIND_COMPETENCIAS_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextCompetencias = $controller->action($context);
                        $context = new es\ucm\Context(FIND_MODCOMPETENCIAS_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextModCompetencias = $controller->action($context);

                        $context = new es\ucm\Context(FIND_METODOLOGIA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextMetodologia = $controller->action($context);
                        $context = new es\ucm\Context(FIND_MODMETODOLOGIA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextModMetodologia = $controller->action($context);

                        $context = new es\ucm\Context(FIND_BIBLIOGRAFIA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextBibliografia = $controller->action($context);
                        $context = new es\ucm\Context(FIND_MODBIBLIOGRAFIA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextModBibliografia = $controller->action($context);

                        $context = new es\ucm\Context(LIST_GRUPO_CLASE, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextGrupoClase = $controller->action($context);
                        $context = new es\ucm\Context(LIST_MODGRUPO_CLASE, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextModGrupoClase = $controller->action($context);

                        $context = new es\ucm\Context(LIST_GRUPO_LABORATORIO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextGrupoLaboratorio = $controller->action($context);
                        $context = new es\ucm\Context(LIST_MODGRUPO_LABORATORIO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextModGrupoLaboratorio = $controller->action($context);

                        $context = new es\ucm\Context(FIND_EVALUACION, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextEvaluacion = $controller->action($context);
                        $context = new es\ucm\Context(FIND_MODEVALUACION, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextModEvaluacion = $controller->action($context);


                        $context = new es\ucm\Context(COMPARACION, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextComparacion = $controller->action($context);

                        $verPrograma = true;
                        $verCompetencias = true;
                        $verMetodologia = true;
                        $verBibliografia = true;
                        $verGrupoLab = true;
                        $verEvaluacion = true;

                        if ($contextConfiguracion->getData()->getConocimientosPrevios() == false && $contextConfiguracion->getData()->getBreveDescripcion() == false && $contextConfiguracion->getData()->getProgramaTeorico() == false && $contextConfiguracion->getData()->getProgramaSeminarios() == false && $contextConfiguracion->getData()->getProgramaLaboratorio() == false) $verPrograma = false;
                        if ($contextConfiguracion->getData()->getComGenerales() == false && $contextConfiguracion->getData()->getComEspecificas() == false && $contextConfiguracion->getData()->getComBasicas() == false && $contextConfiguracion->getData()->getResultadosAprendizaje() == false) $verCompetencias = false;
                        if ($contextConfiguracion->getData()->getMetodologia() == false) $verMetodologia = false;
                        if ($contextConfiguracion->getData()->getCitasBibliograficas() == false && $contextConfiguracion->getData()->getRecursosInternet() == false) $verBibliografia = false;
                        if ($contextConfiguracion->getData()->getGrupoLaboratorio() == false) $verGrupoLab = false;
                        if ($contextConfiguracion->getData()->getRealizacionExamenes() == false && $contextConfiguracion->getData()->getRealizacionActividades() == false && $contextConfiguracion->getData()->getRealizacionLaboratorio() == false && $contextConfiguracion->getData()->getCalificacionFinal() == false) $verEvaluacion = false;

                        /*Configuración del php-diff */

                        $rendererName = 'Inline';
                        $rendererOptions = [
                            // how detailed the rendered HTML in-line diff is? (none, line, word, char)
                            'detailLevel' => 'char',
                            // renderer language: eng, cht, chs, jpn, ...
                            // or an array which has the same keys with a language file
                            'language' => 'eng',
                            // show line numbers in HTML renderers
                            'lineNumbers' => true,
                            // show a separator between different diff hunks in HTML renderers
                            'separateBlock' => true,
                            // the frontend HTML could use CSS "white-space: pre;" to visualize consecutive whitespaces
                            // but if you want to visualize them in the backend with "&nbsp;", you can set this to true
                            'spacesToNbsp' => false,
                            // HTML renderer tab width (negative = do not convert into spaces)
                            'tabSize' => 4,
                            // this option is currently only for the Combined renderer.
                            // it determines whether a replace-type block should be merged or not
                            // depending on the content changed ratio, which values between 0 and 1.
                            'mergeThreshold' => 0.8,
                            // this option is currently only for the Unified and the Context renderers.
                            // RendererConstant::CLI_COLOR_AUTO = colorize the output if possible (default)
                            // RendererConstant::CLI_COLOR_ENABLE = force to colorize the output
                            // RendererConstant::CLI_COLOR_DISABLE = force not to colorize the output
                            'cliColorization' => RendererConstant::CLI_COLOR_ENABLE,
                            // this option is currently only for the Json renderer.
                            // internally, ops (tags) are all int type but this is not good for human reading.
                            // set this to "true" to convert them into string form before outputting.
                            'outputTagAsString' => false,
                            // this option is currently only for the Json renderer.
                            // it controls how the output JSON is formatted.
                            // see availabe options on https://www.php.net/manual/en/function.json-encode.php
                            'jsonEncodeFlags' => \JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE,
                            // this option is currently effective when the "detailLevel" is "word"
                            // characters listed in this array can be used to make diff segments into a whole
                            // for example, making "<del>good</del>-<del>looking</del>" into "<del>good-looking</del>"
                            // this should bring better readability but set this to empty array if you do not want it
                            'wordGlues' => [' ', '-'],
                            // change this value to a string as the returned diff if the two input strings are identical
                            'resultForIdenticals' => null,
                            // extra HTML classes added to the DOM of the diff container
                            'wrapperClasses' => ['diff-wrapper'],
                        ];
                        $differOptions = [
                            // show how many neighbor lines
                            // Differ::CONTEXT_ALL can be used to show the whole file
                            'context' => 3,
                            // ignore case difference
                            'ignoreCase' => false,
                            // ignore whitespace difference
                            'ignoreWhitespace' => false,
                        ];

                        ?>

                        <div class="col-xl-9 col-lg-8 col-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <?php
                                    echo '<h2>Información docente de <b>' . $contextAsignatura->getData()->getNombreAsignatura() . '</b></h2>';
                                    ?>
                                </div>
                                <div class="card-body">
                                    <nav id="nav-asignatura" class="nav nav-pills nav-fill">

                                        <a class="nav-item nav-link active" id="nav-info-asignatura-tab" data-toggle="tab" href="#nav-info-asignatura" role="tab" aria-controls="nav-info-asignatura" aria-selected="true">Información</a>

                                        <?php if ($verPrograma) { ?>
                                            <a class="nav-item nav-link" id="nav-prog-asignatura-tab" data-toggle="tab" href="#nav-prog-asignatura" role="tab" aria-controls="nav-prog-asignatura" aria-selected="false">Programa</a>

                                        <?php }
                                        if ($verCompetencias) { ?>
                                            <a class="nav-item nav-link" id="nav-comp-asignatura-tab" data-toggle="tab" href="#nav-comp-asignatura" role="tab" aria-controls="nav-comp-asignatura" aria-selected="false">Competencias</a>

                                        <?php }
                                        if ($verMetodologia) { ?>
                                            <a class="nav-item nav-link" id="nav-metodologia-tab" data-toggle="tab" href="#nav-metodologia" role="tab" aria-controls="nav-metodologia" aria-selected="false">Metodología</a>

                                        <?php }
                                        if ($verBibliografia) { ?>
                                            <a class="nav-item nav-link" id="nav-bibliografia-tab" data-toggle="tab" href="#nav-bibliografia" role="tab" aria-controls="nav-bibliografia" aria-selected="false">Bibliografía</a>

                                        <?php }
                                        if ($verGrupoLab) { ?>
                                            <a class="nav-item nav-link" id="nav-grupo-Laboratorio-tab" data-toggle="tab" href="#nav-grupo-Laboratorio" role="tab" aria-controls="nav-grupo-Laboratorio" aria-selected="false">Grupos de laboratorio</a>

                                        <?php } ?>
                                        <a class="nav-item nav-link" id="nav-grupo-clase-tab" data-toggle="tab" href="#nav-grupo-clase" role="tab" aria-controls="nav-grupo-clase" aria-selected="false">Grupos de clase</a>

                                        <?php if ($verEvaluacion) { ?>
                                            <a class="nav-item nav-link" id="nav-evaluacion-tab" data-toggle="tab" href="#nav-evaluacion" role="tab" aria-controls="nav-evaluacion" aria-selected="false">Evaluación</a>
                                        <?php } ?>

                                        <?php if ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true) { ?>
                                            <a class="nav-item nav-link" id="nav-coordinacion-tab" data-toggle="tab" href="#nav-coordinacion" role="tab" aria-controls="nav-coordinacion" aria-selected="false">Coordinación</a>
                                        <?php } ?>

                                    </nav>

                                    <div class="tab-content" id="pills-tabContent">

                                        <!--Pestaña informacion asignatura-->
                                        <div class="tab-pane fade show active text-center" id="nav-info-asignatura" role="tabpanel" aria-labelledby="nav-info-asignatura-tab">


                                            <div class="table-responsive text-center">
                                                <table class="table table-sm table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="col">Asignatura</th>
                                                            <td><?php echo $contextAsignatura->getData()->getNombreAsignatura(); ?></td>
                                                            <th scope="col">Abreviatura</th>
                                                            <td><?php echo $contextAsignatura->getData()->getAbreviatura(); ?></td>
                                                            <th scope="col">Código</th>
                                                            <td><?php echo $contextAsignatura->getData()->getIdAsignatura(); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Módulo</th>
                                                            <td colspan="2"><?php echo $contextModulo->getData()->getNombreModulo(); ?></td>
                                                            <th scope="col">Materia</th>
                                                            <td colspan="2"><?php echo $contextMateria->getData()->getNombreMateria(); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Carácter</th>
                                                            <td><?php echo $contextMateria->getData()->getCaracter(); ?></td>
                                                            <th scope="col">Curso</th>
                                                            <td><?php echo $contextAsignatura->getData()->getCurso(); ?></td>
                                                            <th scope="col">Semestre</th>
                                                            <td><?php echo $contextAsignatura->getData()->getSemestre(); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($contextTeorico->getEvent() === FIND_TEORICO_OK && $contextLaboratorio->getEvent() === FIND_LABORATORIO_OK && $contextProblema->getEvent() === FIND_PROBLEMA_OK) { ?>
                                                <div class="table-responsive text-center">
                                                    <table class="table table-sm table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col"></th>
                                                                <th scope="col">Total</th>
                                                                <th scope="col">Teóricos</th>
                                                                <th scope="col">Problemas</th>
                                                                <th scope="col">Laboratorio</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Créditos (ECTS)</th>
                                                                <td><?php echo $contextAsignatura->getData()->getCreditos(); ?></td>
                                                                <td><?php echo $contextTeorico->getData()->getCreditos(); ?></td>
                                                                <td><?php echo $contextProblema->getData()->getCreditos(); ?></td>
                                                                <td><?php echo $contextLaboratorio->getData()->getCreditos(); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Presencialidad</th>
                                                                <td>-</td>
                                                                <td><?php echo $contextTeorico->getData()->getPresencial(); ?>%</td>
                                                                <td><?php echo $contextProblema->getData()->getPresencial(); ?>%</td>
                                                                <td><?php echo $contextLaboratorio->getData()->getPresencial(); ?>%</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Horas totales</th>
                                                                <td>-</td>
                                                                <td><?php echo ($contextTeorico->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextTeorico->getData()->getPresencial()) / 100; ?></td>
                                                                <td><?php echo ($contextProblema->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextProblema->getData()->getPresencial()) / 100; ?></td>
                                                                <td><?php echo ($contextLaboratorio->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextLaboratorio->getData()->getPresencial()) / 100; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php } else {
                                                echo '<div class="alert alert-danger" role="alert">
                                                <h4 class= "text-center">NO EXISTE LA INFORMACIÓN DE TEÓRICO, PROBLEMA O LABORATORIO</h4>
                                                </div>';
                                            }
                                            if ($CoordinadorAsignatura->getEvent() === FIND_PROFESOR_OK) { ?>
                                                <div class="table-responsive text-center">
                                                    <table class="table table-sm table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" colspan="6">Coordinador/a</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <td><?php echo $CoordinadorAsignatura->getData()->getNombre(); ?></td>
                                                                <th scope="col" colspan="2">Departamento</th>
                                                                <td colspan="2"><?php echo $CoordinadorAsignatura->getData()->getDepartamento(); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Facultad</th>
                                                                <td><?php echo $CoordinadorAsignatura->getData()->getFacultad(); ?></td>
                                                                <th scope="col">Despacho</th>
                                                                <td><?php echo $CoordinadorAsignatura->getData()->getDespacho(); ?></td>
                                                                <th scope="col">Email</th>
                                                                <td><?php echo $CoordinadorAsignatura->getData()->getEmail(); ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php } else {
                                                echo '<div class="alert alert-danger" role="alert">
                                                <h4 class= "text-center">NO EXISTE LA INFORMACIÓN DEL COORDINADOR DE ASIGNATURA</h4>
                                                </div>';
                                            } ?>


                                            <div class="table-responsive text-center">
                                                <table class="table table-sm table-bordered table-add">
                                                    <thead>
                                                        <th scope="col" colspan="4">Información adicional</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="col" colspan="2">Estado de la ficha</th>
                                                            <td colspan="2" <?php
                                                            if ($contextAsignatura->getData()->getEstado() == "B") {
                                                                echo 'class="text-primary"><strong>Borrador (Edición permitida)</strong>';
                                                            } elseif ($contextAsignatura->getData()->getEstado() == "V") {
                                                                echo 'class="text-primary">Validado (Edición bloqueada)';
                                                            } elseif ($contextAsignatura->getData()->getEstado() == "C") {
                                                                echo 'class="text-success">Consolidado (Información actualizada)';
                                                            }
                                                            ?> </td> 
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" colspan="1">Última modificación</th>
                                                            <td colspan="1">
                                                                <?php
                                                                if (!empty($contextModAsignatura->getData()->getFechaMod())) {


                                                                    $context = new es\ucm\Context(FIND_PROFESOR, $contextModAsignatura->getData()->getEmailMod());
                                                                    $contextModificacion = $controller->action($context);
                                                                    $date = strtotime($contextModAsignatura->getData()->getFechaMod());
                                                                    echo date("H:i , d-m-Y", $date);
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <th scope="col" colspan="1">Autor</th>
                                                            <td colspan="1">
                                                                <?php
                                                                if (!empty($contextModAsignatura->getData()->getEmailMod())) {
                                                                    echo $contextModificacion->getData()->getNombre();
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php
                                            if ($contextAsignatura->getData()->getCoordinadorAsignatura() == $_SESSION['idUsuario']) {

                                                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <h4 class= "text-center">Eres el coordinador de la asignatura</h4>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>';
                                            }
                                            if ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion']) {

                                                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <h4 class= "text-center">Eres el coordinador del grado</h4>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>';
                                            }
                                            ?>
                                            <?php
                                            if ($contextAsignatura->getData()->getEstado() == "B" && $contextAsignatura->getData()->getCoordinadorAsignatura() == $_SESSION['idUsuario']) {
                                                echo '<a href="validar.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '">
                                                <button type="button" class="btn btn-primary btn-lg" id="btn-form">
                                                Validar Asignatura
                                                </button>
                                                </a>';
                                            }
                                            if ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion']) {
                                                if ($contextAsignatura->getData()->getEstado() == "V") {
                                                    echo '<a href="consolidar.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '">
                                                    <button type="button" class="btn btn-success btn-lg" id="btn-form">
                                                    Consolidar Asignatura
                                                    </button>
                                                    </a>';
                                                }
                                                if ($contextAsignatura->getData()->getEstado() != "B") {
                                                    echo '<a href="borrador.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '">
                                                    <button type="button" class="btn btn-warning btn-lg" id="btn-form">
                                                    Permitir Edición
                                                    </button>
                                                    </a>';
                                                }
                                            } ?>
                                        </div>

                                        <?php if ($verPrograma) { ?>
                                            <!--Pestaña programa asignatura-->
                                            <div class="tab-pane fade" id="nav-prog-asignatura" role="tabpanel" aria-labelledby="nav-prog-asignatura-tab">
                                                <div class="accordion" id="accordionProgram">

                                                    <!--Pestaña conocimientos previos -->
                                                    <?php if ($contextConfiguracion->getData()->getConocimientosPrevios() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['conocimientosPrevios']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOneProg" aria-expanded="true" aria-controls="collapseOne">
                                                                            Conocimientos previos
                                                                        </button>
                                                                    <?php } else {

                                                                        ?><button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOneProg" aria-expanded="true" aria-controls="collapseOne">
                                                                            Conocimientos previos
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOneProg" class="collapse" aria-labelledby="headingOne" data-parent="#accordionProgram">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getConocimientosPrevios();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['conocimientosPrevios']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextPrograma->getData()->getConocimientosPrevios()), explode("\n", $contextModPrograma->getData()->getConocimientosPrevios()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Pestaña conocimientos previos (ingles) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>

                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['conocimientosPreviosI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoProg" aria-expanded="true" aria-controls="collapseTwo">
                                                                                Conocimientos previos (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoProg" aria-expanded="true" aria-controls="collapseTwo">
                                                                                Conocimientos previos (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTwoProg" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionProgram">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextPrograma->getData()->getConocimientosPreviosI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['conocimientosPreviosI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextPrograma->getData()->getConocimientosPreviosI()), explode("\n", $contextModPrograma->getData()->getConocimientosPreviosI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;
                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!--Pestaña breve descripcion -->
                                                    <?php if ($contextConfiguracion->getData()->getBreveDescripcion() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">

                                                                    <?php
                                                                    if ($contextComparacion->getData()['BreveDescripcion']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeProg" aria-expanded="false" aria-controls="collapseThree">
                                                                            Breve descripción
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeProg" aria-expanded="false" aria-controls="collapseThree">
                                                                            Breve descripción
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThreeProg" class="collapse" aria-labelledby="headingThree" data-parent="#accordionProgram">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getBreveDescripcion();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['BreveDescripcion']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextPrograma->getData()->getBreveDescripcion()), explode("\n", $contextModPrograma->getData()->getBreveDescripcion()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Pestaña breve descripcion (ingles) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingFour">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['BreveDescripcionI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFourProg" aria-expanded="false" aria-controls="collapseFour">
                                                                                Breve descripción (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFourProg" aria-expanded="false" aria-controls="collapseFour">
                                                                                Breve descripción (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFourProg" class="collapse" aria-labelledby="headingFour" data-parent="#accordionProgram">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextPrograma->getData()->getBreveDescripcionI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['BreveDescripcionI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextPrograma->getData()->getBreveDescripcionI()), explode("\n", $contextModPrograma->getData()->getBreveDescripcionI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!--Pestaña programa Teorico -->
                                                    <?php if ($contextConfiguracion->getData()->getProgramaTeorico() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaTeorico']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveProg" aria-expanded="true" aria-controls="collapseFive">
                                                                            Programa teórico
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveProg" aria-expanded="false" aria-controls="collapseFive">
                                                                            Programa teórico
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFiveProg" class="collapse" aria-labelledby="headingFive" data-parent="#accordionProgram">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getProgramaTeorico();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['ProgramaTeorico']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextPrograma->getData()->getProgramaTeorico()), explode("\n", $contextModPrograma->getData()->getProgramaTeorico()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Pestaña programa Teorico (ingles) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingSix">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['ProgramaTeoricoI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSixProg" aria-expanded="true" aria-controls="collapseSix">
                                                                                Programa teórico (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSixProg" aria-expanded="false" aria-controls="collapseSix">
                                                                                Programa teórico (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSixProg" class="collapse" aria-labelledby="headingSix" data-parent="#accordionProgram">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextPrograma->getData()->getProgramaTeoricoI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['ProgramaTeoricoI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextPrograma->getData()->getProgramaTeoricoI()), explode("\n", $contextModPrograma->getData()->getProgramaTeoricoI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!--Pestaña programa seminarios-->
                                                    <?php if ($contextConfiguracion->getData()->getProgramaSeminarios() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaSeminarios']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSevenProg" aria-expanded="true" aria-controls="collapseSeven">
                                                                            Programa de seminarios
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSevenProg" aria-expanded="false" aria-controls="collapseSeven">
                                                                            Programa de seminarios
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSevenProg" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionProgram">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getProgramaSeminarios();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['ProgramaSeminarios']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextPrograma->getData()->getProgramaSeminarios()), explode("\n", $contextModPrograma->getData()->getProgramaSeminarios()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Pestaña programa seminarios (ingles) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingEight">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['ProgramaSeminariosI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEightProg" aria-expanded="true" aria-controls="collapseEight">
                                                                                Programa seminarios (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEightProg" aria-expanded="false" aria-controls="collapseEight">
                                                                                Programa seminarios (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseEightProg" class="collapse" aria-labelledby="headingEight" data-parent="#accordionProgram">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextPrograma->getData()->getProgramaSeminariosI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['ProgramaSeminariosI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextPrograma->getData()->getProgramaSeminariosI()), explode("\n", $contextModPrograma->getData()->getProgramaSeminariosI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <!--Pestaña programa Laboratorio-->
                                                    <?php if ($contextConfiguracion->getData()->getProgramaLaboratorio() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingNine">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaLaboratorio']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseNineProg" aria-expanded="true" aria-controls="collapseNine">
                                                                            Programa de laboratorio
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseNineProg" aria-expanded="false" aria-controls="collapseNine">
                                                                            Programa de laboratorio
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseNineProg" class="collapse" aria-labelledby="headingNine" data-parent="#accordionProgram">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getProgramaLaboratorio();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['ProgramaLaboratorio']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextPrograma->getData()->getProgramaLaboratorio()), explode("\n", $contextModPrograma->getData()->getProgramaLaboratorio()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Pestaña programa Laboratorio (ingles) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTen">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['ProgramaLaboratorioI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTenProg" aria-expanded="true" aria-controls="collapseTen">
                                                                                Programa laboratorio (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTenProg" aria-expanded="false" aria-controls="collapseTen">
                                                                                Programa laboratorio (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTenProg" class="collapse" aria-labelledby="headingTen" data-parent="#accordionProgram">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextPrograma->getData()->getProgramaLaboratorioI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['ProgramaLaboratorioI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextPrograma->getData()->getProgramaLaboratorioI()), explode("\n", $contextModPrograma->getData()->getProgramaLaboratorioI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>

                                                <?php if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoPrograma() == true)) { ?>
                                                    <div class="text-center">

                                                        <a href="programaAsignatura.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) { ?>
                                                            <a href="programaAsignatura.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-warning" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                            <a href="borrarProgramaAsignatura.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-warning btn-danger" id="btn-form">
                                                                    Borrar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($verCompetencias) { ?>
                                            <!--Pestaña competencia asignatura-->
                                            <div class="tab-pane fade" id="nav-comp-asignatura" role="tabpanel" aria-labelledby="nav-comp-asignatura-tab">
                                                <div class="accordion" id="accordionCompetencia">

                                                    <!-- Pestaña generales -->
                                                    <?php if ($contextConfiguracion->getData()->getComGenerales() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComGenerales']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOneComp" aria-expanded="true" aria-controls="collapseOne">
                                                                            Generales
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOneComp" aria-expanded="true" aria-controls="collapseOne">
                                                                            Generales
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOneComp" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getGenerales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['ComGenerales']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextCompetencias->getData()->getGenerales()), explode("\n", $contextModCompetencias->getData()->getGenerales()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña generales (inglés) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['ComGeneralesI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoComp" aria-expanded="true" aria-controls="collapseTwo">
                                                                                Generales (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoComp" aria-expanded="true" aria-controls="collapseTwo">
                                                                                Generales (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTwoComp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionCompetencia">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextCompetencias->getData()->getGeneralesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['ComGeneralesI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextCompetencias->getData()->getGeneralesI()), explode("\n", $contextModCompetencias->getData()->getGeneralesI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña especificas -->
                                                    <?php if ($contextConfiguracion->getData()->getComEspecificas() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComEspecificas']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeComp" aria-expanded="true" aria-controls="collapseThree">
                                                                            Específicas
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeComp" aria-expanded="false" aria-controls="collapseThree">
                                                                            Específicas
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThreeComp" class="collapse" aria-labelledby="headingThree" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getEspecificas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['ComEspecificas']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextCompetencias->getData()->getEspecificas()), explode("\n", $contextModCompetencias->getData()->getEspecificas()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña especificas (inglés) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingFour">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['ComEspecificasI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFourComp" aria-expanded="true" aria-controls="collapseFour">
                                                                                Específicas (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFourComp" aria-expanded="false" aria-controls="collapseFour">
                                                                                Específicas (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFourComp" class="collapse" aria-labelledby="headingFour" data-parent="#accordionCompetencia">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextCompetencias->getData()->getEspecificasI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['ComEspecificasI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextCompetencias->getData()->getEspecificasI()), explode("\n", $contextModCompetencias->getData()->getEspecificasI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña basicas y transversales -->
                                                    <?php if ($contextConfiguracion->getData()->getComBasicas() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComBasicas']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveComp" aria-expanded="true" aria-controls="collapseFive">
                                                                            Básicas y transversales
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveComp" aria-expanded="false" aria-controls="collapseFive">
                                                                            Básicas y transversales
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFiveComp" class="collapse" aria-labelledby="headingFive" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getBasicasYTransversales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['ComBasicas']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextCompetencias->getData()->getBasicasYTransversales()), explode("\n", $contextModCompetencias->getData()->getBasicasYTransversales()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña basicas y transversales (inglés) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingSix">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['ComBasicasI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSixComp" aria-expanded="true" aria-controls="collapseSix">
                                                                                Básicas y transversales (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSixComp" aria-expanded="false" aria-controls="collapseSix">
                                                                                Básicas y transversales (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSixComp" class="collapse" aria-labelledby="headingSix" data-parent="#accordionCompetencia">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextCompetencias->getData()->getBasicasYTransversalesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['ComBasicasI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextCompetencias->getData()->getBasicasYTransversalesI()), explode("\n", $contextModCompetencias->getData()->getBasicasYTransversalesI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña resultados de aprendizaje -->
                                                    <?php if ($contextConfiguracion->getData()->getResultadosAprendizaje() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ResultadosAprendizaje']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSevenComp" aria-expanded="true" aria-controls="collapseSeven">
                                                                            Resultados del aprendizaje
                                                                        </button>
                                                                    <?php } else { ?>

                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSevenComp" aria-expanded="false" aria-controls="collapseSeven">
                                                                            Resultados del aprendizaje
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSevenComp" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getResultadosAprendizaje();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['ResultadosAprendizaje']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextCompetencias->getData()->getResultadosAprendizaje()), explode("\n", $contextModCompetencias->getData()->getResultadosAprendizaje()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña resultados de aprendizaje (inglés) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingEight">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['ResultadosAprendizajeI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEightComp" aria-expanded="true" aria-controls="collapseEight">
                                                                                Resultados del aprendizaje (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>

                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEightComp" aria-expanded="false" aria-controls="collapseEight">
                                                                                Resultados del aprendizaje (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseEightComp" class="collapse" aria-labelledby="headingEight" data-parent="#accordionCompetencia">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextCompetencias->getData()->getResultadosAprendizajeI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['ResultadosAprendizajeI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextCompetencias->getData()->getResultadosAprendizajeI()), explode("\n", $contextModCompetencias->getData()->getResultadosAprendizajeI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>

                                                <?php if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoCompetencias() == true)) { ?>
                                                    <div class="text-center">

                                                        <a href="competenciasAsignatura.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) { ?>
                                                            <a href="competenciasAsignatura.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-warning" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                            <a href="borrarCompetenciasAsignatura.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-danger" id="btn-form">
                                                                    Borrar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($verMetodologia) { ?>
                                            <!--Pestaña metodologia-->
                                            <div class="tab-pane fade" id="nav-metodologia" role="tabpanel" aria-labelledby="nav-metodologia-tab">
                                                <div class="accordion" id="accordionMetodologia">

                                                    <!-- Pestaña metodologia -->
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['Metodologia']) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOneMet" aria-expanded="true" aria-controls="collapseOne">
                                                                        Metodología
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOneMet" aria-expanded="true" aria-controls="collapseOne">
                                                                        Metodología
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOneMet" class="collapse" aria-labelledby="headingOne" data-parent="#accordionMetodologia">
                                                            <div class="card-body">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Consolidado</h4>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextMetodologia->getEvent() === FIND_METODOLOGIA_OK) {
                                                                                echo $contextMetodologia->getData()->getMetodologia();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <?php if ($contextComparacion->getData()['Metodologia']) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Comparación</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                $differ = new Differ(explode("\n", $contextMetodologia->getData()->getMetodologia()), explode("\n", $contextModMetodologia->getData()->getMetodologia()), $differOptions);
                                                                                $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                $result = $renderer->render($differ);
                                                                                echo $result;

                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                <?php }   ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Pestaña metodologia (inglés) -->
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['MetodologiaI']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoMet" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Metodología (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoMet" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Metodología (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwoMet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionMetodologia">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextMetodologia->getEvent() === FIND_METODOLOGIA_OK) {
                                                                                    echo $contextMetodologia->getData()->getMetodologiaI();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['MetodologiaI']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextMetodologia->getData()->getMetodologiaI()), explode("\n", $contextModMetodologia->getData()->getMetodologiaI()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <?php if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoMetodologia() == true)) { ?>
                                                    <div class="text-center">

                                                        <a href="metodologia.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) { ?>
                                                            <a href="metodologia.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-warning" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                            <a href="borrarMetodologia.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-danger" id="btn-form">
                                                                    Borrar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <!--Pestaña bibliografia-->
                                        <?php if ($verBibliografia) { ?>
                                            <div class="tab-pane fade" id="nav-bibliografia" role="tabpanel" aria-labelledby="nav-bibliografia-tab">
                                                <div class="accordion" id="accordionBibliografia">

                                                    <!-- Pestaña citas bibliograficas -->
                                                    <?php if ($contextConfiguracion->getData()->getCitasBibliograficas() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['CitasBibliograficas']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOneBib" aria-expanded="true" aria-controls="collapseOne">
                                                                            Citas bibliográficas
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOneBib" aria-expanded="true" aria-controls="collapseOne">
                                                                            Citas bibliográficas
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOneBib" class="collapse" aria-labelledby="headingOne" data-parent="#accordionBibliografia">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextBibliografia->getEvent() === FIND_BIBLIOGRAFIA_OK) {
                                                                                    echo $contextBibliografia->getData()->getCitasBibliograficas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['CitasBibliograficas']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextBibliografia->getData()->getCitasBibliograficas()), explode("\n", $contextModBibliografia->getData()->getCitasBibliograficas()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <!-- Pestaña recursos en internet -->
                                                    <?php if ($contextConfiguracion->getData()->getRecursosInternet() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['RecursosInternet']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoBib" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Recursos en internet
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoBib" aria-expanded="false" aria-controls="collapseTwo">
                                                                            Recursos en internet
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwoBib" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionBibliografia">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextBibliografia->getEvent() === FIND_BIBLIOGRAFIA_OK) {
                                                                                    echo $contextBibliografia->getData()->getRecursosInternet();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['RecursosInternet']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextBibliografia->getData()->getRecursosInternet()), explode("\n", $contextModBibliografia->getData()->getRecursosInternet()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <?php if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoBibliografia() == true)) { ?>
                                                    <div class="text-center">

                                                        <a href="bibliografia.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) { ?>
                                                            <a href="bibliografia.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-warning" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                            <a href="borrarBibliografia.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-danger" id="btn-form">
                                                                    Borrar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <!--Pestaña grupo Laboratorio-->
                                        <?php if ($verGrupoLab) { ?>
                                            <div class="tab-pane fade" id="nav-grupo-Laboratorio" role="tabpanel" aria-labelledby="nav-grupo-Laboratorio-tab">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Borrador</h4>
                                                        <p class="card-text">
                                                            <?php
                                                            if ($contextModGrupoLaboratorio->getEvent() === LIST_MODGRUPO_LABORATORIO_OK) {
                                                                foreach ($contextModGrupoLaboratorio->getData() as $grupo) { ?>
                                                                    <div class="accordion" id="accordionModGrupoLaboratorio">
                                                                        <div class="card">
                                                                            <div class="card-header" id="heading<?php echo $grupo->getIdGrupoLab() ?>">
                                                                                <h2 class="mb-0">
                                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $grupo->getIdGrupoLab() ?>" aria-expanded="true" aria-controls="collapse<?php echo $grupo->getIdGrupoLab() ?>">
                                                                                        <?php echo $grupo->getLetra();
                                                                                        if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoLaboratorio() == true)) { ?>
                                                                                            <a href="horarioLaboratorio.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $grupo->getIdAsignatura(); ?>">
                                                                                                <button type="button" class="btn btn-success btn-sm" id="btn-form">
                                                                                                    Crear Nuevo Horario
                                                                                                </button>
                                                                                            </a>
                                                                                            <a href="grupoLaboratorioProfesor.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                <button type="button" class="btn btn-success btn-sm" id="btn-form">
                                                                                                    Añadir Profesor
                                                                                                </button>
                                                                                            </a>
                                                                                            <a href="grupoLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                <button type="button" class="btn btn-warning btn-sm" id="btn-form">
                                                                                                    Modificar Grupo
                                                                                                </button>
                                                                                            </a>
                                                                                            <a href="borrarGrupoLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                <button type="button" class="btn btn-danger btn-sm" id="btn-form">
                                                                                                    Borrar Grupo
                                                                                                </button>
                                                                                            </a>

                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </button>
                                                                                </h2>
                                                                            </div>

                                                                            <div id="collapse<?php echo $grupo->getIdGrupoLab() ?>" class="collapse" aria-labelledby="heading<?php echo $grupo->getIdGrupoLab() ?>" data-parent="#accordionModGrupoLaboratorio">
                                                                                <div class="card-body">
                                                                                    <strong>Idioma:</strong> <?php echo $grupo->getIdioma(); ?><br />

                                                                                    <?php

                                                                                    $context = new es\ucm\Context(LIST_MODHORARIO_LABORATORIO, $grupo->getIdGrupoLab());
                                                                                    $contextModHorarioLaboratorio = $controller->action($context);
                                                                                    if ($contextModHorarioLaboratorio->getEvent() === LIST_MODHORARIO_LABORATORIO_OK) { ?>
                                                                                        <div class="table-responsive text-center">
                                                                                            <table class="table table-sm table-bordered">
                                                                                                <!--<thead>-->
                                                                                                    <tr>
                                                                                                        <th scope="col">Laboratorio</th>
                                                                                                        <th scope="col">Dia</th>
                                                                                                        <th scope="col">Hora Inicio</th>

                                                                                                        <th scope="col">Opciones</th>
                                                                                                        <?php
                                                                                                        $modNumeroHorarios = count($contextModHorarioLaboratorio->getData()) + 1;
                                                                                                        echo '<td rowspan="' . $modNumeroHorarios . '" >
                                                                                                        <table class="table table-sm table-bordered">
                                                                                                        <tr>
                                                                                                        <th scope="col">Profesor</th>
                                                                                                        <th scope="col">Fecha Inicio</th>
                                                                                                        <th scope="col">Fecha Fin</th>
                                                                                                        <th scope="col">Opciones</th>
                                                                                                        </tr>';
                                                                                                        $context = new es\ucm\Context(LIST_MODGRUPO_LABORATORIO_PROFESOR, $grupo->getIdGrupoLab());
                                                                                                        $contextModGrupoLaboratorioProfesor = $controller->action($context);
                                                                                                        if ($contextModGrupoLaboratorioProfesor->getEvent() === LIST_MODGRUPO_LABORATORIO_PROFESOR_OK) {
                                                                                                            foreach ($contextModGrupoLaboratorioProfesor->getData() as $modGrupoLaboratorioProfesor) {
                                                                                                                $context = new es\ucm\Context(FIND_PROFESOR, $modGrupoLaboratorioProfesor->getEmailProfesor());
                                                                                                                $contextProfesor = $controller->action($context);
                                                                                                                if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                                                                                                                    echo '<tr scope="row">
                                                                                                                    <td>' . $contextProfesor->getData()->getNombre() . '</td>
                                                                                                                    <td>' . date_format(date_create($modGrupoLaboratorioProfesor->getFechaInicio()),"d-m-Y") . '</td>
                                                                                                                    <td>' . date_format(date_create($modGrupoLaboratorioProfesor->getFechaFin()),"d-m-Y") . '</td>';
                                                                                                                    if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) {
                                                                                                                        echo '<td> <a href="grupoLaboratorioProfesor.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&EmailProfesor=' . $modGrupoLaboratorioProfesor->getEmailProfesor() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '&IdGrupoLaboratorio=' . $grupo->getIdGrupoLab() . '">
                                                                                                                        <button type="button" class="btn btn-warning btn-sm" id="btn-form">
                                                                                                                        Modificar Profesor
                                                                                                                        </button>
                                                                                                                        </a>
                                                                                                                        <a href="borrarGrupoLaboratorioProfesor.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&EmailProfesor=' . $modGrupoLaboratorioProfesor->getEmailProfesor() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '&IdGrupoLaboratorio=' . $grupo->getIdGrupoLab() . '">
                                                                                                                        <button type="button" class="btn btn-danger btn-sm" id="btn-form">
                                                                                                                        Borrar Profesor
                                                                                                                        </button>
                                                                                                                        </a></td>';
                                                                                                                    }
                                                                                                                    echo '</tr>';
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                        echo '</table>
                                                                                                        </td>';
                                                                                                        ?>
                                                                                                    </tr>
                                                                                                    <!--</thead>-->
                                                                                                    <!--<tbody>-->
                                                                                                        <?php
                                                                                                        foreach ($contextModHorarioLaboratorio->getData() as $horario) {
                                                                                                            echo '<tr scope="row">
                                                                                                            <td>' . $horario->getLaboratorio() . '</td>
                                                                                                            <td>' . $horario->getDia() . '</td>
                                                                                                            <td>' . $horario->getHoraInicio() . '-' . $horario->getHoraFin() . '</td>';

                                                                                                            if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoLaboratorio() == true)) {
                                                                                                                echo '<td> <a href="horarioLaboratorio.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&IdHorarioLaboratorio=' . $horario->getIdHorarioLab() . '&IdAsignatura=' . $grupo->getIdAsignatura() . '">
                                                                                                                <button type="button" class="btn btn-warning btn-sm" id="btn-form">
                                                                                                                Modificar Horario
                                                                                                                </button>
                                                                                                                </a>
                                                                                                                <a href="borrarHorarioLaboratorio.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&IdHorarioLaboratorio=' . $horario->getIdHorarioLab() . '&IdAsignatura=' . $grupo->getIdAsignatura() . '">
                                                                                                                <button type="button" class="btn btn-danger btn-sm" id="btn-form">
                                                                                                                Borrar Horario
                                                                                                                </button>
                                                                                                                </a></td>';
                                                                                                            }
                                                                                                            echo '</tr>';
                                                                                                        }
                                                                                                        ?>
                                                                                                        <!--</tbody>-->
                                                                                                    </table>
                                                                                                </div>

                                                                                            <?php }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Consolidado</h4>
                                                                <p class="card-text">
                                                                    <?php
                                                                    if ($contextGrupoLaboratorio->getEvent() === LIST_GRUPO_LABORATORIO_OK) {
                                                                        foreach ($contextGrupoLaboratorio->getData() as $grupo) { ?>
                                                                            <div class="accordion" id="accordionGrupoLaboratorio">
                                                                                <div class="card">
                                                                                    <div class="card-header" id="heading<?php echo $grupo->getIdGrupoLab() ?>">
                                                                                        <h2 class="mb-0">
                                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $grupo->getIdGrupoLab() ?>" aria-expanded="true" aria-controls="collapse<?php echo $grupo->getIdGrupoLab() ?>">
                                                                                                <?php echo $grupo->getLetra() ?>
                                                                                            </button>
                                                                                        </h2>
                                                                                    </div>

                                                                                    <div id="collapse<?php echo $grupo->getIdGrupoLab() ?>" class="collapse" aria-labelledby="heading<?php echo $grupo->getIdGrupoLab() ?>" data-parent="#accordionGrupoLaboratorio">
                                                                                        <div class="card-body">
                                                                                            <strong>Idioma:</strong> <?php echo $grupo->getIdioma(); ?><br />

                                                                                            <?php

                                                                                            $context = new es\ucm\Context(LIST_HORARIO_LABORATORIO, $grupo->getIdGrupoLab());
                                                                                            $contextHorarioLaboratorio = $controller->action($context);
                                                                                            if ($contextHorarioLaboratorio->getEvent() === LIST_HORARIO_LABORATORIO_OK) { ?>
                                                                                                <div class="table-responsive text-center">
                                                                                                    <table class="table table-sm table-hover table-bordered">
                                                                                                        <!--<thead>-->
                                                                                                            <tr>
                                                                                                                <th scope="col">Laboratorio</th>
                                                                                                                <th scope="col">Dia</th>
                                                                                                                <th scope="col">Hora</th>
                                                                                                                <?php
                                                                                                                $numeroHorarios = count($contextHorarioLaboratorio->getData()) + 1;
                                                                                                                echo '<td rowspan="' . $numeroHorarios . '" >
                                                                                                                <table class="table table-sm table-bordered">
                                                                                                                <tr>
                                                                                                                <th scope="col">Profesor</th>
                                                                                                                <th scope="col">Fecha Inicio</th>
                                                                                                                <th scope="col">Fecha Fin</th>
                                                                                                                </tr>';
                                                                                                                $context = new es\ucm\Context(LIST_GRUPO_LABORATORIO_PROFESOR, $grupo->getIdGrupoLab());
                                                                                                                $contextGrupoLaboratorioProfesor = $controller->action($context);
                                                                                                                if ($contextGrupoLaboratorioProfesor->getEvent() === LIST_GRUPO_LABORATORIO_PROFESOR_OK) {
                                                                                                                    foreach ($contextGrupoLaboratorioProfesor->getData() as $grupoLaboratorioProfesor) {
                                                                                                                        $context = new es\ucm\Context(FIND_PROFESOR, $grupoLaboratorioProfesor->getEmailProfesor());
                                                                                                                        $contextProfesor = $controller->action($context);
                                                                                                                        if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                                                                                                                            echo '<tr scope="row">
                                                                                                                            <td>' . $contextProfesor->getData()->getNombre() . '</td>
                                                                                                                            <td>' . date_format(date_create($grupoLaboratorioProfesor->getFechaInicio()),"d-m-Y") . '</td>
                                                                                                                            <td>' . date_format(date_create($grupoLaboratorioProfesor->getFechaFin()),"d-m-Y") . '</td>';
                                                                                                                            echo '</tr>';
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                                echo '</table>
                                                                                                                </td>';
                                                                                                                ?>
                                                                                                            </tr>
                                                                                                            <!--</thead>-->
                                                                                                            <!--<tbody>-->
                                                                                                                <?php
                                                                                                                foreach ($contextHorarioLaboratorio->getData() as $horario) {
                                                                                                                    echo '<tr scope="row">
                                                                                                                    <td>' . $horario->getLaboratorio() . '</td>
                                                                                                                    <td>' . $horario->getDia() . '</td>
                                                                                                                    <td>' . $horario->getHoraInicio() . '-' . $horario->getHoraFin() . '</td>

                                                                                                                    </tr>';
                                                                                                                }
                                                                                                                ?>
                                                                                                                <!--</tbody>-->
                                                                                                            </table>
                                                                                                        </div>

                                                                                                    <?php }
                                                                                                    ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php }
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <?php if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoLaboratorio() == true)) { ?>
                                                                    <div class="text-center">
                                                                        <?php if ($contextModGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_OK && $contextModGrupoLaboratorioProfesor->getEvent() === FIND_MODGRUPO_LABORATORIO_PROFESOR_OK) { ?>
                                                                            <a href="grupoLaboratorio.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                                    Modificar Borrador
                                                                                </button>
                                                                            </a>
                                                                        <?php } ?>
                                                                        <a href="grupoLaboratorio.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                                Crear Nuevo Borrador Grupo
                                                                            </button>
                                                                        </a>

                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>

                                                        <!--Pestaña grupo clase-->
                                                        <div class="tab-pane fade" id="nav-grupo-clase" role="tabpanel" aria-labelledby="nav-grupo-clase-tab">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Borrador</h4>
                                                                    <p class="card-text">
                                                                        <?php
                                                                        if ($contextModGrupoClase->getEvent() === LIST_MODGRUPO_CLASE_OK) {
                                                                            foreach ($contextModGrupoClase->getData() as $grupo) { ?>
                                                                                <div class="accordion" id="accordionModGrupoClase">
                                                                                    <div class="card">
                                                                                        <div class="card-header" id="heading<?php echo $grupo->getIdGrupoClase() ?>">
                                                                                            <h2 class="mb-0">
                                                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $grupo->getIdGrupoClase() ?>" aria-expanded="true" aria-controls="collapse<?php echo $grupo->getIdGrupoClase() ?>">
                                                                                                    <?php echo $grupo->getLetra();
                                                                                                    if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) { ?>
                                                                                                        <a href="horarioClase.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                            <button type="button" class="btn btn-success btn-sm" id="btn-form">
                                                                                                                Crear Nuevo Horario
                                                                                                            </button>
                                                                                                        </a>
                                                                                                        <a href="grupoClaseProfesor.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                            <button type="button" class="btn btn-success btn-sm" id="btn-form">
                                                                                                                Añadir Profesor
                                                                                                            </button>
                                                                                                        </a>
                                                                                                        <a href="grupoClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                            <button type="button" class="btn btn-warning btn-sm" id="btn-form">
                                                                                                                Modificar Grupo
                                                                                                            </button>
                                                                                                        </a>
                                                                                                        <a href="borrarGrupoClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                            <button type="button" class="btn btn-danger btn-sm" id="btn-form">
                                                                                                                Borrar Grupo
                                                                                                            </button>
                                                                                                        </a>

                                                                                                        <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </button>
                                                                                            </h2>
                                                                                        </div>

                                                                                        <div id="collapse<?php echo $grupo->getIdGrupoClase() ?>" class="collapse" aria-labelledby="heading<?php echo $grupo->getIdGrupoClase() ?>" data-parent="#accordionModGrupoClase">
                                                                                            <div class="card-body">
                                                                                                <strong>Idioma:</strong> <?php echo $grupo->getIdioma(); ?><br />

                                                                                                <?php

                                                                                                $context = new es\ucm\Context(LIST_MODHORARIO_CLASE, $grupo->getIdGrupoClase());
                                                                                                $contextModHorarioClase = $controller->action($context);
                                                                                                if ($contextModHorarioClase->getEvent() === LIST_MODHORARIO_CLASE_OK) { ?>
                                                                                                    <div class="table-responsive text-center">
                                                                                                        <table class="table table-sm table-bordered">
                                                                                                            <!--<thead>-->
                                                                                                                <tr>
                                                                                                                    <th scope="col">Aula</th>
                                                                                                                    <th scope="col">Dia</th>
                                                                                                                    <th scope="col">Hora</th>
                                                                                                                    <th scope="col">Opciones</th>
                                                                                                                    <?php
                                                                                                                    $modNumeroHorarios = count($contextModHorarioClase->getData()) + 1;
                                                                                                                    echo '<td rowspan="' . $modNumeroHorarios . '" >
                                                                                                                    <table class="table table-sm table-bordered">
                                                                                                                    <tr>
                                                                                                                    <th scope="col">Profesor</th>
                                                                                                                    <th scope="col">Tipo</th>
                                                                                                                    <th scope="col">Fecha Inicio</th>
                                                                                                                    <th scope="col">Fecha Fin</th>
                                                                                                                    <th scope="col">Opciones</th>
                                                                                                                    </tr>';
                                                                                                                    $context = new es\ucm\Context(LIST_MODGRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
                                                                                                                    $contextModGrupoClaseProfesor = $controller->action($context);
                                                                                                                    if ($contextModGrupoClaseProfesor->getEvent() === LIST_MODGRUPO_CLASE_PROFESOR_OK) {
                                                                                                                        foreach ($contextModGrupoClaseProfesor->getData() as $modGrupoClaseProfesor) {
                                                                                                                            $context = new es\ucm\Context(FIND_PROFESOR, $modGrupoClaseProfesor->getEmailProfesor());
                                                                                                                            $contextProfesor = $controller->action($context);
                                                                                                                            if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                                                                                                                                echo '<tr scope="row">
                                                                                                                                <td>' . $contextProfesor->getData()->getNombre() . '</td>
                                                                                                                                <td>' . $modGrupoClaseProfesor->getTipo() . '</td>
                                                                                                                                <td>' . date_format(date_create($modGrupoClaseProfesor->getFechaInicio()),"d-m-Y") . '</td>
                                                                                                                                <td>' . date_format(date_create($modGrupoClaseProfesor->getFechaFin()),"d-m-Y") . '</td>';
                                                                                                                                if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) {
                                                                                                                                    echo '<td> <a href="grupoClaseProfesor.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&EmailProfesor=' . $modGrupoClaseProfesor->getEmailProfesor() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '&IdGrupoClase=' . $grupo->getIdGrupoClase() . '">
                                                                                                                                    <button type="button" class="btn btn-warning btn-sm" id="btn-form">
                                                                                                                                    Modificar Profesor
                                                                                                                                    </button>
                                                                                                                                    </a>
                                                                                                                                    <a href="borrarGrupoClaseProfesor.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&EmailProfesor=' . $modGrupoClaseProfesor->getEmailProfesor() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '&IdGrupoClase=' . $grupo->getIdGrupoClase() . '">
                                                                                                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-form">
                                                                                                                                    Borrar Profesor
                                                                                                                                    </button>
                                                                                                                                    </a></td>';
                                                                                                                                }
                                                                                                                                echo '</tr>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                    echo '</table>
                                                                                                                    </td>';
                                                                                                                    ?>
                                                                                                                </tr>
                                                                                                                <!--</thead>-->
                                                                                                                <!--<tbody>-->
                                                                                                                    <?php
                                                                                                                    foreach ($contextModHorarioClase->getData() as $horario) {
                                                                                                                        echo '<tr scope="row">
                                                                                                                        <td>' . $horario->getAula() . '</td>
                                                                                                                        <td>' . $horario->getDia() . '</td>
                                                                                                                        <td>' . $horario->getHoraInicio() . '-' . $horario->getHoraFin() . '</td>';
                                                                                                                        if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) {
                                                                                                                            echo '<td> <a href="horarioClase.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&IdHorarioClase=' . $horario->getIdHorarioClase() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '">
                                                                                                                            <button type="button" class="btn btn-warning btn-sm" id="btn-form">
                                                                                                                            Modificar Horario
                                                                                                                            </button>
                                                                                                                            </a>
                                                                                                                            <a href="borrarHorarioClase.php?IdGrado=' . $contextGrado->getData()->getCodigoGrado() . '&IdHorarioClase=' . $horario->getIdHorarioClase() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '">
                                                                                                                            <button type="button" class="btn btn-danger btn-sm" id="btn-form">
                                                                                                                            Borrar Horario
                                                                                                                            </button>
                                                                                                                            </a></td>';
                                                                                                                        }
                                                                                                                        echo '</tr>';
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                    <!--</tbody>-->
                                                                                                                </table>
                                                                                                            </div>

                                                                                                        <?php }
                                                                                                        ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php }
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextGrupoClase->getEvent() === LIST_GRUPO_CLASE_OK) {
                                                                                    foreach ($contextGrupoClase->getData() as $grupo) { ?>
                                                                                        <div class="accordion" id="accordionGrupoClase">
                                                                                            <div class="card">
                                                                                                <div class="card-header" id="heading<?php echo $grupo->getIdGrupoClase() ?>">
                                                                                                    <h2 class="mb-0">
                                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $grupo->getIdGrupoClase() ?>" aria-expanded="true" aria-controls="collapse<?php echo $grupo->getIdGrupoClase() ?>">
                                                                                                            <?php echo $grupo->getLetra() ?>
                                                                                                        </button>
                                                                                                    </h2>
                                                                                                </div>

                                                                                                <div id="collapse<?php echo $grupo->getIdGrupoClase() ?>" class="collapse" aria-labelledby="heading<?php echo $grupo->getIdGrupoClase() ?>" data-parent="#accordionGrupoClase">
                                                                                                    <div class="card-body">
                                                                                                        <strong>Idioma:</strong> <?php echo $grupo->getIdioma(); ?><br />

                                                                                                        <?php

                                                                                                        $context = new es\ucm\Context(LIST_HORARIO_CLASE, $grupo->getIdGrupoClase());
                                                                                                        $contextHorarioClase = $controller->action($context);
                                                                                                        if ($contextHorarioClase->getEvent() === LIST_HORARIO_CLASE_OK) { ?>
                                                                                                            <div class="table-responsive text-center">
                                                                                                                <table class="table table-sm table-bordered">
                                                                                                                    <!--<thead> -->
                                                                                                                        <tr>
                                                                                                                            <th scope="col">Aula</th>
                                                                                                                            <th scope="col">Dia</th>
                                                                                                                            <th scope="col">Hora</th>
                                                                                                                            <?php
                                                                                                                            $numeroHorarios = count($contextHorarioClase->getData()) + 1;
                                                                                                                            echo '<td rowspan="' . $numeroHorarios . '" >
                                                                                                                            <table class="table table-sm table-bordered">
                                                                                                                            <tr>
                                                                                                                            <th scope="col">Profesor</th>
                                                                                                                            <th scope="col">Tipo</th>
                                                                                                                            <th scope="col">Fecha Inicio</th>
                                                                                                                            <th scope="col">Fecha Fin</th>
                                                                                                                            </tr>';
                                                                                                                            $context = new es\ucm\Context(LIST_GRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
                                                                                                                            $contextGrupoClaseProfesor = $controller->action($context);
                                                                                                                            if ($contextGrupoClaseProfesor->getEvent() === LIST_GRUPO_CLASE_PROFESOR_OK) {
                                                                                                                                foreach ($contextGrupoClaseProfesor->getData() as $grupoClaseProfesor) {
                                                                                                                                    $context = new es\ucm\Context(FIND_PROFESOR, $grupoClaseProfesor->getEmailProfesor());
                                                                                                                                    $contextProfesor = $controller->action($context);
                                                                                                                                    if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                                                                                                                                        echo '<tr scope="row">
                                                                                                                                        <td>' . $contextProfesor->getData()->getNombre() . '</td>
                                                                                                                                        <td>' . $grupoClaseProfesor->getTipo() . '</td>
                                                                                                                                        <td>' . date_format(date_create($grupoClaseProfesor->getFechaInicio()),"d-m-Y") . '</td>
                                                                                                                                        <td>' . date_format(date_create($grupoClaseProfesor->getFechaFin()),"d-m-Y") . '</td>';
                                                                                                                                        echo '</tr>';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                            echo '</table>
                                                                                                                            </td>';
                                                                                                                            ?>

                                                                                                                        </tr>
                                                                                                                        <!--</thead>-->
                                                                                                                        <!--<tbody>-->
                                                                                                                            <?php

                                                                                                                            foreach ($contextHorarioClase->getData() as $horario) {
                                                                                                                                echo '<tr scope="row">
                                                                                                                                <td>' . $horario->getAula() . '</td>
                                                                                                                                <td>' . $horario->getDia() . '</td>
                                                                                                                                <td>' . $horario->getHoraInicio() . '-' . $horario->getHoraFin() . '</td>
                                                                                                                                </tr>';
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                            <!--</tbody>-->
                                                                                                                        </table>
                                                                                                                    </div>

                                                                                                                <?php }
                                                                                                                ?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            <?php }
                                                                                        }
                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <?php if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) { ?>
                                                                                <div class="text-center">
                                                                                    <?php if ($contextModGrupoClase->getEvent() === FIND_MODGRUPO_CLASE_OK && $contextModGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_OK) { ?>
                                                                                        <a href="grupoClase.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                                                Modificar Borrador
                                                                                            </button>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                    <a href="grupoClase.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                                                            Crear Nuevo Borrador Grupo
                                                                                        </button>
                                                                                    </a>

                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>

                                                                        <!--Pestaña evaluacion-->
                                                                        <?php if ($verEvaluacion) { ?>
                                                                            <div class="tab-pane fade" id="nav-evaluacion" role="tabpanel" aria-labelledby="nav-evaluacion-tab">
                                                                                <div class="accordion" id="accordionEvaluacion">

                                                                                    <!-- Pestaña realizacion examenes -->
                                                                                    <?php if ($contextConfiguracion->getData()->getRealizacionExamenes() == true) { ?>
                                                                                        <div class="card">
                                                                                            <div class="card-header" id="headingOne">
                                                                                                <h2 class="mb-0">
                                                                                                    <?php if ($contextComparacion->getData()['RealizacionExamenes']) { ?>
                                                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOneEv" aria-expanded="true" aria-controls="collapseOne">
                                                                                                            Realización de los exámenes
                                                                                                        </button>
                                                                                                    <?php } else { ?>
                                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOneEv" aria-expanded="true" aria-controls="collapseOne">
                                                                                                            Realización de los exámenes
                                                                                                        </button>
                                                                                                    <?php } ?>
                                                                                                </h2>
                                                                                            </div>

                                                                                            <div id="collapseOneEv" class="collapse" aria-labelledby="headingOne" data-parent="#accordionEvaluacion">
                                                                                                <div class="card-body">
                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <h4 class="card-title">Consolidado</h4>
                                                                                                            <p class="card-text">
                                                                                                                <?php
                                                                                                                if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                                                    echo $contextEvaluacion->getData()->getRealizacionExamenes();
                                                                                                                }
                                                                                                                ?>
                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="card-footer">
                                                                                                            <?php
                                                                                                            if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                                                echo "Peso: " . $contextEvaluacion->getData()->getPesoExamenes() . "%";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <?php if ($contextComparacion->getData()['RealizacionExamenes']) { ?>
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <h4 class="card-title">Comparación</h4>
                                                                                                                <p class="card-text">
                                                                                                                    <?php
                                                                                                                    $differ = new Differ(explode("\n", $contextEvaluacion->getData()->getRealizacionExamenes()), explode("\n", $contextModEvaluacion->getData()->getRealizacionExamenes()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                            <div class="card-footer">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if ($contextModEvaluacion->getData()->getPesoExamenes() !== $contextEvaluacion->getData()->getPesoExamenes()) {
                                                                                        echo "Peso: <b>" . $contextModEvaluacion->getData()->getPesoExamenes() . "%</b>";
                                                                                    } else {
                                                                                        echo "Peso: " . $contextModEvaluacion->getData()->getPesoExamenes() . "%";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña realizacion examenes (inglés) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                    <?php if ($contextComparacion->getData()['RealizacionExamenesI']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoEv" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Realización de los exámenes (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoEv" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Realización de los exámenes (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </div>
                                                                <div id="collapseTwoEv" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                        echo $contextEvaluacion->getData()->getRealizacionExamenesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['RealizacionExamenesI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextEvaluacion->getData()->getRealizacionExamenesI()), explode("\n", $contextModEvaluacion->getData()->getRealizacionExamenesI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña realizacion actividades -->
                                                    <?php if ($contextConfiguracion->getData()->getRealizacionActividades() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['RealizacionActividades']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeEv" aria-expanded="true" aria-controls="collapseThree">
                                                                            Realización de las actividades
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeEv" aria-expanded="false" aria-controls="collapseThree">
                                                                            Realización de las actividades
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThreeEv" class="collapse" aria-labelledby="headingThree" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                    echo $contextEvaluacion->getData()->getRealizacionActividades();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <?php
                                                                            if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                echo "Peso: " . $contextEvaluacion->getData()->getPesoActividades() . "%";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['RealizacionActividades']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextEvaluacion->getData()->getRealizacionActividades()), explode("\n", $contextModEvaluacion->getData()->getRealizacionActividades()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                            <div class="card-footer">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if ($contextModEvaluacion->getData()->getPesoActividades() !== $contextEvaluacion->getData()->getPesoActividades()) {
                                                                                        echo "Peso: <b>" . $contextModEvaluacion->getData()->getPesoActividades() . "%</b>";
                                                                                    } else {
                                                                                        echo "Peso: " . $contextModEvaluacion->getData()->getPesoActividades() . "%";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña realizacion actividades (inglés) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingFour">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['RealizacionActividadesI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFourEv" aria-expanded="true" aria-controls="collapseFour">
                                                                                Realización de las actividades (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFourEv" aria-expanded="false" aria-controls="collapseFour">
                                                                                Realización de las actividades (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFourEv" class="collapse" aria-labelledby="headingFour" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                        echo $contextEvaluacion->getData()->getRealizacionActividadesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['RealizacionActividadesI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextEvaluacion->getData()->getRealizacionActividadesI()), explode("\n", $contextModEvaluacion->getData()->getRealizacionActividadesI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña realizacion Laboratorio -->
                                                    <?php if ($contextConfiguracion->getData()->getRealizacionLaboratorio() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['RealizacionLaboratorio']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveEv" aria-expanded="true" aria-controls="collapseFive">
                                                                            Realización del laboratorio
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveEv" aria-expanded="false" aria-controls="collapseFive">
                                                                            Realización del laboratorio
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFiveEv" class="collapse" aria-labelledby="headingFive" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                    echo $contextEvaluacion->getData()->getRealizacionLaboratorio();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <?php
                                                                            if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                echo "Peso: " . $contextEvaluacion->getData()->getPesoLaboratorio() . "%";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['RealizacionLaboratorio']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextEvaluacion->getData()->getRealizacionLaboratorio()), explode("\n", $contextModEvaluacion->getData()->getRealizacionLaboratorio()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                            <div class="card-footer">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if ($contextModEvaluacion->getData()->getPesoLaboratorio() !== $contextEvaluacion->getData()->getPesoLaboratorio()) {
                                                                                        echo "Peso: <b>" . $contextModEvaluacion->getData()->getPesoLaboratorio() . "%</b>";
                                                                                    } else {
                                                                                        echo "Peso: " . $contextModEvaluacion->getData()->getPesoLaboratorio() . "%";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php }   ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña realizacion Laboratorio (inglés) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingSix">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['RealizacionLaboratorioI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSixEv" aria-expanded="true" aria-controls="collapseSix">
                                                                                Realización del laboratorio (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSixEv" aria-expanded="false" aria-controls="collapseSix">
                                                                                Realización del laboratorio (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSixEv" class="collapse" aria-labelledby="headingSix" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                        echo $contextEvaluacion->getData()->getRealizacionLaboratorioI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['RealizacionLaboratorioI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextEvaluacion->getData()->getRealizacionLaboratorioI()), explode("\n", $contextModEvaluacion->getData()->getRealizacionLaboratorioI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php }   ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña calificacion final ordinaria -->
                                                    <?php if ($contextConfiguracion->getData()->getCalificacionFinal() == true) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['CalificacionFinal']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSevenEv" aria-expanded="true" aria-controls="collapseSeven">
                                                                            Calificación final
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSevenEv" aria-expanded="false" aria-controls="collapseSeven">
                                                                            Calificación final
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSevenEv" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Consolidado</h4>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                    echo $contextEvaluacion->getData()->getCalificacionFinal();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($contextComparacion->getData()['CalificacionFinal']) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Comparación</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    $differ = new Differ(explode("\n", $contextEvaluacion->getData()->getCalificacionFinal()), explode("\n", $contextModEvaluacion->getData()->getCalificacionFinal()), $differOptions);
                                                                                    $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                    $result = $renderer->render($differ);
                                                                                    echo $result;

                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña calificacion final ordinaria (inglés) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingEight">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['CalificacionFinalI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEightEv" aria-expanded="true" aria-controls="collapseEight">
                                                                                Calificación final (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEightEv" aria-expanded="false" aria-controls="collapseEight">
                                                                                Calificación final (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseEightEv" class="collapse" aria-labelledby="headingEight" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">Consolidado</h4>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                        echo $contextEvaluacion->getData()->getCalificacionFinalI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($contextComparacion->getData()['CalificacionFinalI']) { ?>
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h4 class="card-title">Comparación</h4>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        $differ = new Differ(explode("\n", $contextEvaluacion->getData()->getCalificacionFinalI()), explode("\n", $contextModEvaluacion->getData()->getCalificacionFinalI()), $differOptions);
                                                                                        $renderer = RendererFactory::make($rendererName, $rendererOptions); // or your own renderer object
                                                                                        $result = $renderer->render($differ);
                                                                                        echo $result;

                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>

                                                <?php if ($contextAsignatura->getData()->getEstado() === "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoEvaluacion() == true)) { ?>
                                                    <div class="text-center">

                                                        <a href="evaluacion.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) { ?>
                                                            <a href="evaluacion.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-warning" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                            <a href="borrarEvaluacion.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-danger" id="btn-form">
                                                                    Borrar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <!--Coordinacion-->
                                        <?php if ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true) { ?>
                                            <div class="tab-pane fade" id="nav-coordinacion" role="tabpanel" aria-labelledby="nav-coordinacion-tab">
                                                <div class="accordion" id="accordionCoordinacion">

                                                    <!--Configuración-->
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOneCor" aria-expanded="false" aria-controls="collapseOne">
                                                                    Configuración
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseOneCor" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCoordinacion">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover">
                                                                        <tbody>

                                                                            <tr>
                                                                                <th scope="row" class="text-center text-primary" colspan="2">PROGRAMA</th>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Conocimientos previos</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getConocimientosPrevios()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Breve descripción</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getBreveDescripcion()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Programa teórico</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getProgramaTeorico()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Programa de seminarios</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getProgramaSeminarios()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Programa de laboratorio</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getProgramaLaboratorio()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row" class="text-center text-primary" colspan="2">COMPETENCIAS</th>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Generales</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getComGenerales()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Específicas</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getComEspecificas()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Básicas y transversales</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getComBasicas()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Resultados del aprendizaje</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getResultadosAprendizaje()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row" class="text-center text-primary" colspan="2">METODOLOGÍA</th>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Metodología</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getMetodologia()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row" class="text-center text-primary" colspan="2">BIBLIOGRAFÍA</th>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Citas bibliográficas</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getCitasBibliograficas()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Recursos en internet</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getRecursosInternet()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row" class="text-center text-primary" colspan="2">GRUPO DE LABORATORIO</th>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Grupo de laboratorio</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getGrupoLaboratorio()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row" class="text-center text-primary" colspan="2">EVALUACIÓN</th>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Realización de los exámenes</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getRealizacionExamenes()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Realización de las actividades</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getRealizacionActividades()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Realización del laboratorio</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getRealizacionLaboratorio()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Calificación final</th>
                                                                                <td>
                                                                                    <?php if ($contextConfiguracion->getData()->getCalificacionFinal()) echo "✔";
                                                                                    else echo "❌"; ?>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <a href="configuracion.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado() ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                        <button type="button" class="btn btn-warning btn-lg" id="btn-form">
                                                                            Modificar Configuración
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!--gestionprofesores-->
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoCor" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Gestión del profesorado
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseTwoCor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionCoordinacion">
                                                            <div class="card-body">
                                                                <?php

                                                                $context = new es\ucm\Context(FIND_PERMISOS, $contextAsignatura->getData()->getIdAsignatura());
                                                                $permisos = $controller->action($context);
                                                                if ($permisos->getEvent() === FIND_PERMISOS_FAIL) {
                                                                    echo '<div class="alert alert-secondary" role="alert">
                                                                    <h4 class= "text-center">No existen profesores en la asignatura</h4>
                                                                    </div>';
                                                                }
                                                                else{ ?>

                                                                  <div class="table-responsive text-center">
                                                                      <table class="table table-hover">
                                                                        <thead class="text-primary">
                                                                          <tr>
                                                                            <th scope="col">PROFESOR</th>
                                                                            <th scope="col">PROGRAMA</th>
                                                                            <th scope="col">COMPETENCIAS</th>
                                                                            <th scope="col">METODOLOGÍA</th>
                                                                            <th scope="col">BIBLIOGRAFÍA</th>
                                                                            <th scope="col">LABORATORIO</th>
                                                                            <th scope="col">CLASE</th>
                                                                            <th scope="col">EVALUACIÓN</th>
                                                                            <th scope="col"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php 
                                                                        foreach ($permisos->getData() as $permiso) {
                                                                            $context = new es\ucm\Context(FIND_PROFESOR, $permiso->getEmailProfesor());
                                                                            $profesor = $controller->action($context);
                                                                            ?>
                                                                            <tr>
                                                                                <th scope="row"> <?php echo $profesor->getData()->getNombre() ?> </th>
                                                                                <td> <?php if($permiso->getPermisoPrograma()) echo '✏'; else echo '📄'; ?> </td>
                                                                                <td> <?php if($permiso->getPermisoCompetencias()) echo'✏'; else echo'📄'; ?> </td>
                                                                                <td> <?php if($permiso->getPermisoMetodologia()) echo'✏'; else echo'📄'; ?> </td>
                                                                                <td> <?php if($permiso->getPermisoBibliografia()) echo'✏'; else echo'📄'; ?> </td>
                                                                                <td> <?php if($permiso->getPermisoGrupoLaboratorio()) echo'✏'; else echo'📄'; ?> </td>
                                                                                <td> <?php if($permiso->getPermisoGrupoClase()) echo'✏'; else echo'📄'; ?> </td>
                                                                                <td><?php if($permiso->getPermisoEvaluacion()) echo'✏'; else echo'📄'; ?> </td>
                                                                                <?php
                                                                                echo'<td>
                                                                                <a href="permisos.php?IdGrado='.$contextGrado->getData()->getCodigoGrado().'&IdAsignatura='.$contextAsignatura->getData()->getIdAsignatura().'&EmailProfesor='.$profesor->getData()->getEmail().'"><button type="button" class="btn btn-warning btn-sm btn-block" id="btn-form">Editar</button>
                                                                                </a> 
                                                                                <a href="eliminarProfesor.php?IdGrado='.$contextGrado->getData()->getCodigoGrado().'&IdAsignatura='.$contextAsignatura->getData()->getIdAsignatura().'&EmailProfesor='.$permiso->getEmailProfesor().'">
                                                                                <button type="button" class="btn btn-danger btn-sm btn-block" id="btn-form">Eliminar</button>
                                                                                </a>
                                                                                </td>
                                                                                </tr>';

                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="text-center">
                                                                <a href="addProfesor.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado() ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura() ?>">
                                                                    <button type="button" class="btn btn-success btn-lg" id="btn-form">
                                                                        Añadir Profesor
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!--Verificacion porcentajes evaluacion-->
                                                <div class="card">
                                                    <div class="card-header" id="headingThree">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeCor" aria-expanded="false" aria-controls="collapseThree">
                                                                Rango de porcentajes de la evaluación
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseThreeCor" class="collapse" aria-labelledby="headingThree" data-parent="#accordionCoordinacion">
                                                        <div class="card-body">
                                                            <?php

                                                            $context = new es\ucm\Context(FIND_VERIFICA, $contextAsignatura->getData()->getIdAsignatura());
                                                            $contextVerifica = $controller->action($context);
                                                            if ($contextVerifica->getEvent() === FIND_VERIFICA_OK) {
                                                                ?>
                                                                <div class="table-responsive text-center">
                                                                    <table class="table table-sm table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col"></th>
                                                                                <th scope="col">Exámenes</th>
                                                                                <th scope="col">Actividades</th>
                                                                                <th scope="col">Laboratorio</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">Máximo</th>
                                                                                <td><?php echo $contextVerifica->getData()->getMaximoExamenes(); ?>%</td>
                                                                                <td><?php echo $contextVerifica->getData()->getMaximoActividades(); ?>%</td>
                                                                                <td><?php echo $contextVerifica->getData()->getMaximoLaboratorio(); ?>%</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Mínimo</th>
                                                                                <td><?php echo $contextVerifica->getData()->getMinimoExamenes(); ?>%</td>
                                                                                <td><?php echo $contextVerifica->getData()->getMinimoActividades(); ?>%</td>
                                                                                <td><?php echo $contextVerifica->getData()->getMinimoLaboratorio(); ?>%</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <a href="verifica.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado() ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura() ?>">
                                                                        <button type="button" class="btn btn-warning btn-lg" id="btn-form">
                                                                            Modificar Porcentajes
                                                                        </button>
                                                                    </a>
                                                                </div>

                                                                <?php
                                                            }


                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>



                        <!-- Feedback -->
                        <?php
                        if (isset($_GET['anadido']) || isset($_GET['modificado']) || isset($_GET['eliminado'])) {
                            ?>
                            <div class="modal text-center" tabindex="-1" role="dialog" id="feedback">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Información</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            if (isset($_GET['anadido']) && $_GET['anadido'] === "y") {
                                                echo '<div class="alert alert-success" role="alert">
                                                <h4 class="text-center">Se ha añadido correctamente</h4>
                                                </div>';
                                            } elseif (isset($_GET['anadido']) && $_GET['anadido'] === "n") {
                                                echo '<div class="alert alert-danger" role="alert">
                                                <h4 class="text-center">Se ha producido un error de inserción en el borrador</h4>
                                                </div>';
                                            } elseif (isset($_GET['modificado']) && $_GET['modificado'] === "y") {
                                                echo '<div class="alert alert-success" role="alert">
                                                <h4 class="text-center">Se ha modificado correctamente</h4>
                                                </div>';
                                            } elseif (isset($_GET['modificado']) && $_GET['modificado'] === "n") {
                                                echo '<div class="alert alert-danger" role="alert">
                                                <h4 class="text-center">Se ha producido un error de modificación en el borrador</h4>
                                                </div>';
                                            } elseif (isset($_GET['eliminado']) && $_GET['eliminado'] === "y") {
                                                echo '<div class="alert alert-success" role="alert">
                                                <h4 class="text-center">Se ha eliminado correctamente</h4>
                                                </div>';
                                            } elseif (isset($_GET['eliminado']) && $_GET['eliminado'] === "n") {
                                                echo '<div class="alert alert-danger" role="alert">
                                                <h4 class="text-center">Se ha producido un error de eliminación en el borrador</h4>
                                                </div>';
                                            }
                                            ?>
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
                        <h4 class="text-center">La asignatura seleccionada no ha sido creada correctamente. Contacta con el administrador</h4>
                        </div>
                        </div>';
                    }
                } else {
                    echo '
                    <div class="col-md-6 col-12">
                    <div class="alert alert-danger" role="alert">
                    <h2 class="card-title text-center">ACCESO DENEGADO</h2>
                    <h4 class="text-center">No tienes permisos sobre la asignatura introducida. Elige una en el Listado</h4>
                    </div>
                    </div>';
                }
            } else {
                echo '
                <div class="col-md-6 col-12">
                <div class="alert alert-danger" role="alert">
                <h2 class="card-title text-center">ACCESO DENEGADO</h2>
                <h4 class="text-center">Inicia sesión con un usuario Profesor</h4>
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
    if (isset($_GET['anadido']) || isset($_GET['modificado']) || isset($_GET['eliminado'])) {
        ?>
        <script>
            $('#feedback').modal('show')
        </script>
        <?php
    }
    ?>
</body>

</html>