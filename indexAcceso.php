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
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center">
            <?php

            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            ?>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Listado de asignaturas por Grado</h2>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <?php
                                $context = new es\ucm\Context(LIST_GRADO, "");
                                $controller = new es\ucm\ControllerImplements();
                                $grados = $controller->action($context);

                                foreach ($_SESSION['permisos'] as $tupla) {
                                    $context = new es\ucm\Context(FIND_ASIGNATURA, unserialize($tupla)->getIdAsignatura());
                                    $controller = new es\ucm\ControllerImplements();
                                    $asigna = $controller->action($context);
                                    $asignaturas[] = $asigna->getData();
                                }

                                foreach ($grados->getData() as $grado) {
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

                <?php
                if (isset($_GET['IdAsignatura']) && isset($_SESSION['permisos'][$_GET['IdAsignatura']])) {
                    $controller = new es\ucm\ControllerImplements();

                    $context = new es\ucm\Context(FIND_TEORICO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $teorico = $controller->action($context);

                    $context = new es\ucm\Context(FIND_PROBLEMA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $problema = $controller->action($context);

                    $context = new es\ucm\Context(FIND_LABORATORIO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $laboratorio = $controller->action($context);

                    $context = new es\ucm\Context(FIND_CONFIGURACION, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $contextConfiguacion = $controller->action($context);


                    if ($teorico->getEvent() === FIND_TEORICO_OK && $problema->getEvent() === FIND_PROBLEMA_OK && $laboratorio->getEvent() === FIND_LABORATORIO_OK && $contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK) {

                        $context = new es\ucm\Context(FIND_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $asignatura = $controller->action($context);

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

                        $verPrograma = true;
                        $verCompetencias = true;
                        $verMetodologia = true;
                        $verBibliografia = true;
                        $verGrupoLab = true;
                        $verEvaluacion = true;

                        if ($contextConfiguacion->getData()->getConocimientosPrevios() == 0 && $contextConfiguacion->getData()->getBreveDescripcion() == 0 && $contextConfiguacion->getData()->getProgramaDetallado() == 0) $verPrograma = false;

                        if ($contextConfiguacion->getData()->getComGenerales() == 0 && $contextConfiguacion->getData()->getComEspecificas() == 0 && $contextConfiguacion->getData()->getComBasicas() == 0 && $contextConfiguacion->getData()->getResultadosAprendizaje() == 0) $verCompetencias = false;
                        if ($contextConfiguacion->getData()->getMetodologia() == 0) $verMetodologia = false;

                        if ($contextConfiguacion->getData()->getCitasBibliograficas() == 0 && $contextConfiguacion->getData()->getRecursosInternet() == 0) $verBibliografia = false;

                        if ($contextConfiguacion->getData()->getGrupoLaboratorio() == 0) $verGrupoLab = false;

                        if ($contextConfiguacion->getData()->getRealizacionExamenes() == 0 && $contextConfiguacion->getData()->getCalificacionFinal() == 0 && $contextConfiguacion->getData()->getRealizacionActividades() == 0 && $contextConfiguacion->getData()->getRealizacionLaboratorio() == 0) $verEvaluacion = false;
                ?>

                        <div class="col-md-8 col-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <?php
                                    echo '<h2>Información docente de <b>' . $asignatura->getData()->getNombreAsignatura() . '</b></h2>';
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
                                            <a class="nav-item nav-link" id="nav-grupo-laboratorio-tab" data-toggle="tab" href="#nav-grupo-laboratorio" role="tab" aria-controls="nav-grupo-laboratorio" aria-selected="false">Grupo laboratorio</a>

                                        <?php } ?>
                                        <a class="nav-item nav-link" id="nav-grupo-clase-tab" data-toggle="tab" href="#nav-grupo-clase" role="tab" aria-controls="nav-grupo-clase" aria-selected="false">Grupo clase</a>

                                        <?php if ($verEvaluacion) { ?>
                                            <a class="nav-item nav-link" id="nav-evaluacion-tab" data-toggle="tab" href="#nav-evaluacion" role="tab" aria-controls="nav-evaluacion" aria-selected="false">Evaluación</a>
                                        <?php } ?>
                                    </nav>

                                    <div class="tab-content" id="nav-tabContent">

                                        <!--Pestaña informacion asignatura-->
                                        <div class="tab-pane fade show active" id="nav-info-asignatura" role="tabpanel" aria-labelledby="nav-info-asignatura-tab">
                                            <?php
                                            echo 'Nombre asignatura: ' . $asignatura->getData()->getNombreAsignatura() . '<br />
                                            Nombre asignatura en ingles: ' . $asignatura->getData()->getNombreAsignaturaIngles() . '<br />
                                            Materia: <br />
                                            Modulo: <br />
                                            Caracter: <br />
                                            Curso: ' . $asignatura->getData()->getCurso() . '<br />
                                            Semestre: ' . $asignatura->getData()->getSemestre() . '<br />
                                            Creditos: ' . $asignatura->getData()->getCreditos() . '<br />
                                            Coordinadores: ' . $asignatura->getData()->getCoordinadores() . '.<br />';
                                            ?>
                                            Reparto de creditos:
                                            <div class="table-responsive text-center">
                                                <table class="table table-sm table-hover table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"> </th>
                                                            <th scope="col">Créditos</th>
                                                            <th scope="col">Presencial</th>
                                                            <th scope="col">Horas Totales</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Teóricos</th>
                                                            <?php
                                                            $horasTotales = ($teorico->getData()->getCreditos() * 25 * $teorico->getData()->getPresencial()) / 100; //corregir
                                                            echo '<td>' . $teorico->getData()->getCreditos() . '</td>
                                                    <td>' . $teorico->getData()->getPresencial() . '%</td>
                                                    <td>' . $horasTotales . '</td>';
                                                            ?>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Problemas</th>
                                                            <?php
                                                            $horasTotales = ($problema->getData()->getCreditos() * 25 * $problema->getData()->getPresencial()) / 100; //corregir
                                                            echo '<td>' . $problema->getData()->getCreditos() . '</td>
                                                    <td>' . $problema->getData()->getPresencial() . '%</td>
                                                    <td>' . $horasTotales . '</td>'
                                                            ?>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Laboratorio</th>
                                                            <?php
                                                            $horasTotales = ($laboratorio->getData()->getCreditos() * 25 * $laboratorio->getData()->getPresencial()) / 100; //corregir
                                                            echo '<td>' . $laboratorio->getData()->getCreditos() . '</td>
                                                    <td>' . $laboratorio->getData()->getPresencial() . '%</td>
                                                    <td>' . $horasTotales . '</td>'
                                                            ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <?php if ($verPrograma) { ?>
                                            <!--Pestaña programa asignatura-->
                                            <div class="tab-pane fade" id="nav-prog-asignatura" role="tabpanel" aria-labelledby="nav-prog-asignatura-tab">
                                                <div class="accordion" id="accordionProgram">

                                                    <!--Pestaña conocimientos previos -->
                                                    <?php if ($contextConfiguacion->getData()->getConocimientosPrevios() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Conocimientos previos
                                                                    </button>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextModPrograma->getData()->getConocimientosPrevios();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getConocimientosPrevios();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Pestaña conocimientos previos (ingles) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>

                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                            Conocimientos previos (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextModPrograma->getData()->getConocimientosPreviosI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextPrograma->getData()->getConocimientosPreviosI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!--Pestaña breve descripcion -->
                                                    <?php if ($contextConfiguacion->getData()->getBreveDescripcion() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Breve descripción
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextModPrograma->getData()->getBreveDescripcion();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getBreveDescripcion();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Pestaña breve descripcion (ingles) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingFour">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                            Breve descripción (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextModPrograma->getData()->getBreveDescripcionI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextPrograma->getData()->getBreveDescripcionI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <!--Pestaña programa detallado -->
                                                    <?php if ($contextConfiguacion->getData()->getProgramaDetallado() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Programa detallado
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextModPrograma->getData()->getProgramaDetallado();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getProgramaDetallado();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Pestaña programa detallado (ingles) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingSix">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                            Programa detallado (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextModPrograma->getData()->getProgramaDetalladoI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                        echo $contextPrograma->getData()->getProgramaDetalladoI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>

                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 6) { ?>
                                                    <div class="text-right">
                                                        <?php if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) { ?>
                                                            <a href="programaAsignatura.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                        <a href="programaAsignatura.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() == 7) { ?>

                                                            <a>
                                                                <button type="button" class="btn btn-success" id="btn-form">
                                                                    Verificar Programa
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
                                                    <?php if ($contextConfiguacion->getData()->getComGenerales() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Generales
                                                                    </button>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextModCompetencias->getData()->getGenerales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getGenerales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña generales (inglés) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                            Generales (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextModCompetencias->getData()->getGeneralesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextCompetencias->getData()->getGeneralesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña especificas -->
                                                    <?php if ($contextConfiguacion->getData()->getComEspecificas() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Específicas
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextModCompetencias->getData()->getEspecificas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getEspecificas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña especificas (inglés) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingFour">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                            Específica (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextModCompetencias->getData()->getEspecificasI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextCompetencias->getData()->getEspecificasI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña basicas y transversales -->
                                                    <?php if ($contextConfiguacion->getData()->getComBasicas() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Básicas y transversales
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextModCompetencias->getData()->getBasicasYTransversales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getBasicasYTransversales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña basicas y transversales (inglés) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingSix">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                            Básicas y transversales (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextModCompetencias->getData()->getBasicasYTransversalesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextCompetencias->getData()->getBasicasYTransversalesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña resultados de aprendizaje -->
                                                    <?php if ($contextConfiguacion->getData()->getResultadosAprendizaje() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        Resultados de aprendizaje
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextModCompetencias->getData()->getResultadosAprendizaje();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getResultadosAprendizaje();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña resultados de aprendizaje (inglés) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingEight">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                            Resultados de aprendizaje (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextModCompetencias->getData()->getResultadosAprendizajeI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                        echo $contextCompetencias->getData()->getResultadosAprendizajeI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>

                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 6) { ?>
                                                    <div class="text-right">
                                                        <?php if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) { ?>
                                                            <a href="competenciasAsignatura.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                        <a href="competenciasAsignatura.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() == 7) { ?>

                                                            <a>
                                                                <button type="button" class="btn btn-success" id="btn-form">
                                                                    Verificar Competencias
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
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Metodología
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) {
                                                                                echo $contextModMetodologia->getData()->getMetodologia();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Definitivo</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextMetodologia->getEvent() === FIND_METODOLOGIA_OK) {
                                                                                echo $contextMetodologia->getData()->getMetodologia();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Pestaña metodologia (inglés) -->
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Metodología (Inglés)
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) {
                                                                                    echo $contextModMetodologia->getData()->getMetodologiaI();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextMetodologia->getEvent() === FIND_METODOLOGIA_OK) {
                                                                                    echo $contextMetodologia->getData()->getMetodologiaI();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 6) { ?>
                                                    <div class="text-right">
                                                        <?php if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) { ?>
                                                            <a href="metodologia.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                        <a href="metodologia.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() == 7) { ?>

                                                            <a>
                                                                <button type="button" class="btn btn-success" id="btn-form">
                                                                    Verificar Metodología
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
                                                    <?php if ($contextConfiguacion->getData()->getCitasBibliograficas() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Citas bibliográficas
                                                                    </button>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) {
                                                                                    echo $contextModBibliografia->getData()->getCitasBibliograficas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextBibliografia->getEvent() === FIND_BIBLIOGRAFIA_OK) {
                                                                                    echo $contextBibliografia->getData()->getCitasBibliograficas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <!-- Pestaña recursos en internet -->
                                                    <?php if ($contextConfiguacion->getData()->getRecursosInternet() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Recursos en internet
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) {
                                                                                    echo $contextModBibliografia->getData()->getRecursosInternet();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextBibliografia->getEvent() === FIND_BIBLIOGRAFIA_OK) {
                                                                                    echo $contextBibliografia->getData()->getRecursosInternet();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 6) { ?>
                                                    <div class="text-right">
                                                        <?php if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) { ?>
                                                            <a href="bibliografia.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                        <a href="bibliografia.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() == 7) { ?>

                                                            <a>
                                                                <button type="button" class="btn btn-success" id="btn-form">
                                                                    Verificar Bibliografía
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <!--Pestaña grupo laboratorio-->
                                        <?php if ($verGrupoLab) { ?>
                                            <div class="tab-pane fade" id="nav-grupo-laboratorio" role="tabpanel" aria-labelledby="nav-grupo-laboratorio-tab">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Borrador</h5>
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
                                                                                        if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoLaboratorio() >= 6) { ?>
                                                                                            <a href="grupoLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                    Modificar Grupo
                                                                                                </button>
                                                                                            </a>
                                                                                            <a href="grupoLaboratorioProfesor.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                    Añadir Profesor
                                                                                                </button>
                                                                                            </a>
                                                                                            <a href="horarioLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $grupo->getIdAsignatura(); ?>">
                                                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                    Crear Nuevo Horario
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
                                                                                    <strong>Profesor/es:</strong>
                                                                                    <?php
                                                                                    $context = new es\ucm\Context(LIST_MODGRUPO_LABORATORIO_PROFESOR, $grupo->getIdGrupoLab());
                                                                                    $contextModGrupoLaboratorioProfesor = $controller->action($context);
                                                                                    if ($contextModGrupoLaboratorioProfesor->getEvent() === LIST_MODGRUPO_LABORATORIO_PROFESOR_OK) {
                                                                                        foreach ($contextModGrupoLaboratorioProfesor->getData() as $modGrupoLaboratorioProfesor) {
                                                                                            $context = new es\ucm\Context(FIND_PROFESOR, $modGrupoLaboratorioProfesor->getEmailProfesor());
                                                                                            $contextProfesor = $controller->action($context);
                                                                                            if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                                                                                                echo $contextProfesor->getData()->getNombre() . " ";
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    $context = new es\ucm\Context(LIST_MODHORARIO_LABORATORIO, $grupo->getIdGrupoLab());
                                                                                    $contextModHorarioLaboratorio = $controller->action($context);
                                                                                    if ($contextModHorarioLaboratorio->getEvent() === LIST_MODHORARIO_LABORATORIO_OK) { ?>
                                                                                        <div class="table-responsive text-center">
                                                                                            <table class="table table-sm table-hover table-borderless">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th scope="col">Laboratorio</th>
                                                                                                        <th scope="col">Dia</th>
                                                                                                        <th scope="col">Hora Inicio</th>
                                                                                                        <th scope="col">Hora Fin</th>
                                                                                                        <th scope="col"></th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($contextModHorarioLaboratorio->getData() as $horario) {
                                                                                                        echo '<tr scope="row">
                                                                                                <td>' . $horario->getLaboratorio() . '</td>
                                                                                                <td>' . $horario->getDia() . '</td>
                                                                                                <td>' . $horario->getHoraInicio() . '</td>
                                                                                                <td>' . $horario->getHoraFin() . '</td>';
                                                                                                        if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoLaboratorio() >= 6) {
                                                                                                            echo '<td> <a href="horarioLaboratorio.php?IdHorarioLaboratorio=' . $horario->getIdHorarioLab() . '&IdAsignatura=' . $grupo->getIdAsignatura() . '">
                                                                                                    <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                    Modificar Horario
                                                                                                    </button>
                                                                                                    </a></td>';
                                                                                                        }
                                                                                                        echo '</tr>';
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
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
                                                        <h5 class="card-title">Definitivo</h5>
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
                                                                                    <strong>Profesor/es:</strong>
                                                                                    <?php
                                                                                    $context = new es\ucm\Context(LIST_GRUPO_LABORATORIO_PROFESOR, $grupo->getIdGrupoLab());
                                                                                    $contextGrupoLaboratorioProfesor = $controller->action($context);
                                                                                    if ($contextGrupoLaboratorioProfesor->getEvent() === LIST_GRUPO_LABORATORIO_PROFESOR_OK) {
                                                                                        foreach ($contextGrupoLaboratorioProfesor->getData() as $grupoLaboratorioProfesor) {
                                                                                            $context = new es\ucm\Context(FIND_PROFESOR, $grupoLaboratorioProfesor->getEmailProfesor());
                                                                                            $contextProfesor = $controller->action($context);
                                                                                            if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                                                                                                echo $contextProfesor->getData()->getNombre() . " ";
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    $context = new es\ucm\Context(LIST_HORARIO_LABORATORIO, $grupo->getIdGrupoLab());
                                                                                    $contextHorarioLaboratorio = $controller->action($context);
                                                                                    if ($contextHorarioLaboratorio->getEvent() === LIST_HORARIO_LABORATORIO_OK) { ?>
                                                                                        <div class="table-responsive text-center">
                                                                                            <table class="table table-sm table-hover table-borderless">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th scope="col">Laboratorio</th>
                                                                                                        <th scope="col">Dia</th>
                                                                                                        <th scope="col">Hora Inicio</th>
                                                                                                        <th scope="col">Hora Fin</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    foreach ($contextHorarioLaboratorio->getData() as $horario) {
                                                                                                        echo '<tr scope="row">
                                                                                                <td>' . $horario->getLaboratorio() . '</td>
                                                                                                <td>' . $horario->getDia() . '</td>
                                                                                                <td>' . $horario->getHoraInicio() . '</td>
                                                                                                <td>' . $horario->getHoraFin() . '</td>
                                                                                                </tr>';
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
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

                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoLaboratorio() >= 6) { ?>
                                                    <div class="text-right">
                                                        <?php if ($contextModGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_OK && $contextModGrupoLaboratorioProfesor->getEvent() === FIND_MODGRUPO_LABORATORIO_PROFESOR_OK) { ?>
                                                            <a href="grupoLaboratorio.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                        <a href="grupoLaboratorio.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoLaboratorio() == 7) { ?>

                                                            <a>
                                                                <button type="button" class="btn btn-success" id="btn-form">
                                                                    Verificar Grupos
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <!--Pestaña grupo clase-->
                                        <div class="tab-pane fade" id="nav-grupo-clase" role="tabpanel" aria-labelledby="nav-grupo-clase-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Borrador</h5>
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
                                                                                    if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() >= 6) { ?>
                                                                                        <a href="grupoClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                Modificar Grupo
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="grupoClaseProfesor.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                Añadir Profesor
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="horarioClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $grupo->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                Crear Nuevo Horario
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
                                                                                <strong>Profesor/es:</strong>
                                                                                <?php
                                                                                $context = new es\ucm\Context(LIST_MODGRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
                                                                                $contextModGrupoClaseProfesor = $controller->action($context);
                                                                                if ($contextModGrupoClaseProfesor->getEvent() === LIST_MODGRUPO_CLASE_PROFESOR_OK) {
                                                                                    foreach ($contextModGrupoClaseProfesor->getData() as $modGrupoClaseProfesor) {
                                                                                        $context = new es\ucm\Context(FIND_PROFESOR, $modGrupoClaseProfesor->getEmailProfesor());
                                                                                        $contextProfesor = $controller->action($context);
                                                                                        if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                                                                                            echo $contextProfesor->getData()->getNombre() . " ";
                                                                                        }
                                                                                    }
                                                                                }
                                                                                $context = new es\ucm\Context(LIST_MODHORARIO_CLASE, $grupo->getIdGrupoClase());
                                                                                $contextModHorarioClase = $controller->action($context);
                                                                                if ($contextModHorarioClase->getEvent() === LIST_MODHORARIO_CLASE_OK) { ?>
                                                                                    <div class="table-responsive text-center">
                                                                                        <table class="table table-sm table-hover table-borderless">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Aula</th>
                                                                                                    <th scope="col">Dia</th>
                                                                                                    <th scope="col">Hora Inicio</th>
                                                                                                    <th scope="col">Hora Fin</th>
                                                                                                    <th scope="col"></th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                foreach ($contextModHorarioClase->getData() as $horario) {
                                                                                                    echo '<tr scope="row">
                                                                                            <td>' . $horario->getAula() . '</td>
                                                                                            <td>' . $horario->getDia() . '</td>
                                                                                            <td>' . $horario->getHoraInicio() . '</td>
                                                                                            <td>' . $horario->getHoraFin() . '</td>';
                                                                                                    if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() >= 6) {
                                                                                                        echo '<td> <a href="horarioClase.php?IdHorarioClase=' . $horario->getIdHorarioClase() . '&IdAsignatura=' . $grupo->getIdAsignatura() . '">
                                                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                Modificar Horario
                                                                                                </button>
                                                                                                </a></td>';
                                                                                                    }
                                                                                                    echo '</tr>';
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
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
                                                    <h5 class="card-title">Definitivo</h5>
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
                                                                                <strong>Profesor/es:</strong>
                                                                                <?php
                                                                                $context = new es\ucm\Context(LIST_GRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
                                                                                $contextGrupoClaseProfesor = $controller->action($context);
                                                                                if ($contextGrupoClaseProfesor->getEvent() === LIST_GRUPO_CLASE_PROFESOR_OK) {
                                                                                    foreach ($contextGrupoClaseProfesor->getData() as $grupoClaseProfesor) {
                                                                                        $context = new es\ucm\Context(FIND_PROFESOR, $grupoClaseProfesor->getEmailProfesor());
                                                                                        $contextProfesor = $controller->action($context);
                                                                                        if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                                                                                            echo $contextProfesor->getData()->getNombre() . " ";
                                                                                        }
                                                                                    }
                                                                                }
                                                                                $context = new es\ucm\Context(LIST_HORARIO_CLASE, $grupo->getIdGrupoClase());
                                                                                $contextHorarioClase = $controller->action($context);
                                                                                if ($contextHorarioClase->getEvent() === LIST_HORARIO_CLASE_OK) { ?>
                                                                                    <div class="table-responsive text-center">
                                                                                        <table class="table table-sm table-hover table-borderless">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Aula</th>
                                                                                                    <th scope="col">Dia</th>
                                                                                                    <th scope="col">Hora Inicio</th>
                                                                                                    <th scope="col">Hora Fin</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                foreach ($contextHorarioClase->getData() as $horario) {
                                                                                                    echo '<tr scope="row">
                                                                                            <td>' . $horario->getAula() . '</td>
                                                                                            <td>' . $horario->getDia() . '</td>
                                                                                            <td>' . $horario->getHoraInicio() . '</td>
                                                                                            <td>' . $horario->getHoraFin() . '</td>
                                                                                            </tr>';
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
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

                                            <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() >= 6) { ?>
                                                <div class="text-right">
                                                    <?php if ($contextModGrupoClase->getEvent() === FIND_MODGRUPO_CLASE_OK && $contextModGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_OK) { ?>
                                                        <a href="grupoClase.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                Modificar Borrador
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                    <a href="grupoClase.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                        <button type="button" class="btn btn-primary" id="btn-form">
                                                            Crear Nuevo Borrador
                                                        </button>
                                                    </a>
                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() == 7) { ?>

                                                        <a>
                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                Verificar Grupos
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <!--Pestaña evaluacion-->
                                        <?php if ($verEvaluacion) { ?>
                                            <div class="tab-pane fade" id="nav-evaluacion" role="tabpanel" aria-labelledby="nav-evaluacion-tab">
                                                <div class="accordion" id="accordionEvaluacion">

                                                    <!-- Pestaña realizacion examenes -->
                                                    <?php if ($contextConfiguacion->getData()->getRealizacionExamenes() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Realización exámenes
                                                                    </button>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    echo $contextModEvaluacion->getData()->getRealizacionExamenes();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <?php
                                                                            if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                echo "Peso: " . $contextModEvaluacion->getData()->getPesoExamenes() . "%";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
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
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña realizacion examenes (inglés) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                            Realización exámenes (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                        echo $contextModEvaluacion->getData()->getRealizacionExamenesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                        echo $contextEvaluacion->getData()->getRealizacionExamenesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña calificacion final -->
                                                    <?php if ($contextConfiguacion->getData()->getCalificacionFinal() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Calificación final
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    echo $contextModEvaluacion->getData()->getCalificacionFinal();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                    echo $contextEvaluacion->getData()->getCalificacionFinal();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña calificacion final (inglés) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingFour">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                            Calificación final (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                        echo $contextModEvaluacion->getData()->getCalificacionFinalI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                        echo $contextEvaluacion->getData()->getCalificacionFinalI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña realizacion actividades -->
                                                    <?php if ($contextConfiguacion->getData()->getRealizacionActividades() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Realización actividades
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    echo $contextModEvaluacion->getData()->getRealizacionActividades();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <?php
                                                                            if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                echo "Peso: " . $contextModEvaluacion->getData()->getPesoActividades() . "%";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
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
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña realizacion actividades (inglés) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingSix">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                            Realización actividades (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                        echo $contextModEvaluacion->getData()->getRealizacionActividadesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                        echo $contextEvaluacion->getData()->getRealizacionActividadesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- Pestaña realizacion laboratorio -->
                                                    <?php if ($contextConfiguacion->getData()->getRealizacionLaboratorio() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        Realización laboratorio
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    echo $contextModEvaluacion->getData()->getRealizacionLaboratorio();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <?php
                                                                            if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                echo "Peso: " . $contextModEvaluacion->getData()->getPesoLaboratorio() . "%";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Definitivo</h5>
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
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pestaña realizacion laboratorio (inglés) -->
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingEight">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                            Realización laboratorio (Inglés)
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">Borrador</h5>
                                                                                    <p class="card-text">
                                                                                        <?php
                                                                                        if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                            echo $contextModEvaluacion->getData()->getRealizacionLaboratorioI();
                                                                                        }
                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                        echo $contextEvaluacion->getData()->getRealizacionLaboratorioI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>

                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 6) { ?>
                                                    <div class="text-right">
                                                        <?php if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) { ?>
                                                            <a href="evaluacion.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                        <a href="evaluacion.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() == 7) { ?>

                                                            <a>
                                                                <button type="button" class="btn btn-success" id="btn-form">
                                                                    Verificar Evaluación
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- Feecback -->
                        <?php
                        if (isset($_GET['anadido']) || isset($_GET['modificado'])) {
                        ?>
                            <div class="modal" tabindex="-1" role="dialog" id="feedback">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Informacion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            if (isset($_GET['anadido']) && $_GET['anadido'] === "y") {
                                                echo '<div class="alert alert-success" role="alert">
                                                        <h5 class="text-center">Se ha añadido correctamente</h5>
                                                    </div>';
                                            } elseif (isset($_GET['anadido']) && $_GET['anadido'] === "n") {
                                                echo '<div class="alert alert-danger" role="alert">
                                                        <h5 class="text-center">Se ha producido un error de insercion en el borrador</h5>
                                                     </div>';
                                            } elseif (isset($_GET['modificado']) && $_GET['modificado'] === "y") {
                                                echo '<div class="alert alert-success" role="alert">
                                                        <h5 class="text-center">Se ha modificado correctamente</h5>
                                                    </div>';
                                            } elseif (isset($_GET['modificado']) && $_GET['modificado'] === "n") {
                                                echo '<div class="alert alert-danger" role="alert">
                                                        <h5 class="text-center">Se ha producido un error de modificacion en el borrador</h5>
                                                    </div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
            <?php
                    } else {
                        echo '
             <div class="col-md-6 col-12">
             <div class="alert alert-danger" role="alert">
             <h2 class="card-title text-center">ACCESO DENEGADO</h2>
             <h5 class="text-center">La asignatura seleccionada no ha sido creada correctamente. Contacta con el administrador</h5>
             </div>
             </div>';
                    }
                } else {
                    echo '
        <div class="col-md-6 col-12">
        <div class="alert alert-danger" role="alert">
        <h2 class="card-title text-center">ACCESO DENEGADO</h2>
        <h5 class="text-center">No tienes permisos sobre la asignatura introducida. Elige una en el Listado</h5>
        </div>
        </div>';
                }
            } else {
                echo '
    <div class="col-md-6 col-12">
    <div class="alert alert-danger" role="alert">
    <h2 class="card-title text-center">ACCESO DENEGADO</h2>
    <h5 class="text-center">Inicia sesión con un usuario</h5>
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
    if (isset($_GET['anadido']) || isset($_GET['modificado'])) {
    ?>
        <script>
            $('#feedback').modal('show')
        </script>
    <?php
    }
    ?>
</body>

</html>