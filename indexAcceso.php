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
                    $contextConfiguracion = $controller->action($context);


                    if ($teorico->getEvent() === FIND_TEORICO_OK && $problema->getEvent() === FIND_PROBLEMA_OK && $laboratorio->getEvent() === FIND_LABORATORIO_OK && $contextConfiguracion->getEvent() === FIND_CONFIGURACION_OK) {

                        $context = new es\ucm\Context(FIND_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $asignatura = $controller->action($context);

<<<<<<< Updated upstream
=======
                        $context = new es\ucm\Context(FIND_MATERIA, $asignatura->getData()->getIdMateria());
                        $materia = $controller->action($context);

                        $context = new es\ucm\Context(FIND_MODULO, $materia->getData()->getIdModulo());
                        $modulo = $controller->action($context);

                        $context = new es\ucm\Context(FIND_PROFESOR, $asignatura->getData()->getCoordinadorAsignatura());
                        $CoordinadorAsignatura = $controller->action($context);


>>>>>>> Stashed changes
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


                        $context = new es\ucm\Context(COMPARACION,htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                        $contextComparacion = $controller->action($context);

                        $verPrograma = true;
                        $verCompetencias = true;
                        $verMetodologia = true;
                        $verBibliografia = true;
                        $verGrupoLab = true;
                        $verEvaluacion = true;

<<<<<<< Updated upstream
                        if ($contextConfiguracion->getData()->getConocimientosPrevios() == 0 && $contextConfiguracion->getData()->getBreveDescripcion() == 0 && $contextConfiguracion->getData()->getProgramaDetallado() == 0) $verPrograma = false;

=======
                        if ($contextConfiguracion->getData()->getConocimientosPrevios() == 0 && $contextConfiguracion->getData()->getBreveDescripcion() == 0 && $contextConfiguracion->getData()->getProgramaTeorico() == 0 && $contextConfiguracion->getData()->getProgramaSeminarios() == 0 && $contextConfiguracion->getData()->getProgramaLaboratorio() == 0) $verPrograma = false;
>>>>>>> Stashed changes
                        if ($contextConfiguracion->getData()->getComGenerales() == 0 && $contextConfiguracion->getData()->getComEspecificas() == 0 && $contextConfiguracion->getData()->getComBasicas() == 0 && $contextConfiguracion->getData()->getResultadosAprendizaje() == 0) $verCompetencias = false;
                        if ($contextConfiguracion->getData()->getMetodologia() == 0) $verMetodologia = false;

                        if ($contextConfiguracion->getData()->getCitasBibliograficas() == 0 && $contextConfiguracion->getData()->getRecursosInternet() == 0) $verBibliografia = false;
<<<<<<< Updated upstream

                        if ($contextConfiguracion->getData()->getRealizacionExamenes() == 0 && $contextConfiguracion->getData()->getCalificacionFinal() == 0 && $contextConfiguracion->getData()->getRealizacionActividades() == 0 && $contextConfiguracion->getData()->getRealizacionLaboratorio() == 0) $verEvaluacion = false;
=======
                        if ($contextConfiguracion->getData()->getGrupoLaboratorio() == 0) $verGrupoLab = false;
                        if ($contextConfiguracion->getData()->getRealizacionExamenes() == 0 && $contextConfiguracion->getData()->getRealizacionActividades() == 0 && $contextConfiguracion->getData()->getRealizacionLaboratorio() == 0 && $contextConfiguracion->getData()->getCalificacionFinal() == 0) $verEvaluacion = false;
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
                                        <?php if(strpos($asignatura->getData()->getCoordinadores(),$_SESSION['idUsuario'])!==false){?>
=======
                                        <?php if (strpos($asignatura->getData()->getCoordinadorAsignatura(), $_SESSION['idUsuario']) !== false) { ?>
>>>>>>> Stashed changes
                                            <a class="nav-item nav-link" id="nav-coordinacion-tab" data-toggle="tab" href="#nav-coordinacion" role="tab" aria-controls="nav-coordinacion" aria-selected="false">Coordinación</a>
                                        <?php }?>
                                        
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
<<<<<<< Updated upstream
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
=======
                                                            <th scope="col">Principal:</th>
                                                            <td><?php echo $CoordinadorAsignatura->getData()->getNombre(); ?></td>
                                                            <th scope="col" colspan="2">Departamento:</th>
                                                            <td colspan="2"><?php echo $CoordinadorAsignatura->getData()->getDepartamento(); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Facultad:</th>
                                                            <td><?php echo $CoordinadorAsignatura->getData()->getFacultad(); ?></td>
                                                            <th scope="col">Despacho:</th>
                                                            <td><?php echo $CoordinadorAsignatura->getData()->getDespacho(); ?></td>
                                                            <th scope="col">Email:</th>
                                                            <td><?php echo $CoordinadorAsignatura->getData()->getEmail(); ?></td>
>>>>>>> Stashed changes
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
                                                    <?php if ($contextConfiguracion->getData()->getConocimientosPrevios() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <?php if($contextComparacion->getData()['conocimientosPrevios'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Conocimientos previos
                                                                    </button>
                                                                    <?php } else{?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Conocimientos previos
                                                                    </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['conocimientosPrevios'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModPrograma->getData()->getConocimientosPrevios().'</b>';
                                                                                    else
                                                                                    echo $contextModPrograma->getData()->getConocimientosPrevios();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
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
                                                                    <?php if($contextComparacion->getData()['conocimientosPreviosI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Conocimientos previos (Inglés)
                                                                    </button>
                                                                    <?php } else{?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Conocimientos previos (Inglés)
                                                                    </button>
                                                                    <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        
                                                                    <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                  if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['conocimientosPreviosI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModPrograma->getData()->getConocimientosPreviosI().'</b>';
                                                                                    else
                                                                                    echo $contextModPrograma->getData()->getConocimientosPreviosI();
                                                                                }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
                                                    <?php if ($contextConfiguracion->getData()->getBreveDescripcion() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                    
                                                               <?php
                                                               if($contextComparacion->getData()['BreveDescripcion'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Breve descripción
                                                                    </button>
                                                               <?php } else{?>
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Breve descripción
                                                                    </button>
                                                               <?php }?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['BreveDescripcion'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModPrograma->getData()->getBreveDescripcion().'</b>';
                                                                                    else
                                                                                    echo $contextModPrograma->getData()->getBreveDescripcion();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
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
                                                                    <?php if($contextComparacion->getData()['BreveDescripcionI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        Breve descripción (Inglés)
                                                                    </button>
                                                               <?php } else{?>
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        Breve descripción (Inglés)
                                                                    </button>
                                                               <?php }?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                  if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                      if($contextComparacion->getData()['BreveDescripcionI'])
                                                                                      echo '<b style="font-size: 18px">'.$contextModPrograma->getData()->getBreveDescripcionI().'</b>';
                                                                                      else
                                                                                      echo $contextModPrograma->getData()->getBreveDescripcionI();
                                                                                  }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
                                                    <?php if ($contextConfiguracion->getData()->getProgramaDetallado() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['ProgramaDetallado'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                        Programa detallado
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Programa detallado
                                                                    </button>
                                                                <?php }?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['ProgramaDetallado'])
                                                                                        echo '<b style="font-size: 18px">'.$contextModPrograma->getData()->getProgramaDetallado().'</b>';
                                                                                    else
                                                                                    echo $contextModPrograma->getData()->getProgramaDetallado();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
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
                                                                    <?php if($contextComparacion->getData()['ProgramaDetalladoI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                                        Programa detallado (Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                        Programa detallado (Inglés)
                                                                    </button>
                                                                <?php }?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['ProgramaDetalladoI'])
                                                                                        echo '<b style="font-size: 18px">'.$contextModPrograma->getData()->getProgramaDetalladoI().'</b>';
                                                                                    else
                                                                                    echo $contextModPrograma->getData()->getProgramaDetalladoI();
                                                                                }
                                                                                ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($verCompetencias) { ?>
                                            <!--Pestaña competencia asignatura-->
                                            <div class="tab-pane fade" id="nav-comp-asignatura" role="tabpanel" aria-labelledby="nav-comp-asignatura-tab">
                                                <div class="accordion" id="accordionCompetencia">

                                                    <!-- Pestaña generales -->
                                                    <?php if ($contextConfiguracion->getData()->getComGenerales() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['ComGenerales'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Generales
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Generales
                                                                    </button>
                                                                <?php }?>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                     if($contextComparacion->getData()['ComGenerales'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModCompetencias->getData()->getGenerales().'</b>';
                                                                                    else
                                                                                    echo $contextModCompetencias->getData()->getGenerales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
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
                                                                    <?php if($contextComparacion->getData()['ComGeneralesI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Generales (Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Generales (Inglés)
                                                                    </button>
                                                                <?php }?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                     if($contextComparacion->getData()['ComGeneralesI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModCompetencias->getData()->getGeneralesI().'</b>';
                                                                                    else
                                                                                    echo $contextModCompetencias->getData()->getGeneralesI();
                                                                                }
                                                                                ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
<<<<<<< Updated upstream

                                                    <!-- Pestaña especificas -->
                                                    <?php if ($contextConfiguracion->getData()->getComEspecificas() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['ComEspecificas'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                        Específicas
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Específicas
                                                                    </button>
                                                                <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['ComEspecificas'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModCompetencias->getData()->getEspecificas().'</b>';
                                                                                    else
                                                                                    echo $contextModCompetencias->getData()->getEspecificas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
=======
                                                </div>

                                                <?php if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 6) { ?>
                                                    <div class="text-right">
                                                        
                                                        <a href="programaAsignatura.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                Crear Nuevo Borrador
                                                            </button>
                                                        </a>
                                                        <?php if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) { ?>
                                                            <a href="programaAsignatura.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                <button type="button" class="btn btn-warning" id="btn-form">
                                                                    Modificar Borrador
                                                                </button>
                                                            </a>
                                                            <a href="borrarProgramaAsignatura.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
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
                                                    <?php if ($contextConfiguracion->getData()->getComGenerales() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComGenerales'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                            Generales
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                            Generales
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['ComGenerales'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getGenerales() . '</b>';
                                                                                        else
                                                                                            echo $contextModCompetencias->getData()->getGenerales();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
>>>>>>> Stashed changes
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
                                                                    <?php if($contextComparacion->getData()['ComEspecificasI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                        Específicas (Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        Específicas (Inglés)
                                                                    </button>
                                                                <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['ComEspecificasI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModCompetencias->getData()->getEspecificasI().'</b>';
                                                                                    else
                                                                                    echo $contextModCompetencias->getData()->getEspecificasI();
                                                                                }
                                                                                ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
                                                    <?php if ($contextConfiguracion->getData()->getComBasicas() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['ComBasicas'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                        Básicas y transversales
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Básicas y transversales
                                                                    </button>
                                                                <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['ComBasicas'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModCompetencias->getData()->getBasicasYTransversales().'</b>';
                                                                                    else
                                                                                    echo $contextModCompetencias->getData()->getBasicasYTransversales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
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
                                                                    <?php if($contextComparacion->getData()['ComBasicasI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                                        Básicas y transversales(Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                        Básicas y transversales (Inglés)
                                                                    </button>
                                                                <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                   if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['ComBasicasI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModCompetencias->getData()->getBasicasYTransversalesI().'</b>';
                                                                                    else
                                                                                    echo $contextModCompetencias->getData()->getBasicasYTransversalesI();
                                                                                }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
                                                    <?php if ($contextConfiguracion->getData()->getResultadosAprendizaje() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['ResultadosAprendizaje'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                                        Resultados de aprendizaje
                                                                    </button>
                                                                <?php } else {?>
																
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        Resultados de aprendizaje
                                                                    </button>
                                                                <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['ResultadosAprendizaje'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModCompetencias->getData()->getResultadosAprendizaje().'</b>';
                                                                                    else
                                                                                    echo $contextModCompetencias->getData()->getResultadosAprendizaje();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
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
                                                                    <?php if($contextComparacion->getData()['ResultadosAprendizajeI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                                        Resultados de aprendizaje (Inglés)
                                                                    </button>
                                                                <?php } else {?>
																
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                        Resultados de aprendizaje (Inglés)
                                                                    </button>
                                                                <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if($contextComparacion->getData()['ResultadosAprendizajeI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModCompetencias->getData()->getResultadosAprendizajeI().'</b>';
                                                                                    else
                                                                                    echo $contextModCompetencias->getData()->getResultadosAprendizajeI();
                                                                                }
                                                                                ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
                                                            <?php if($contextComparacion->getData()['Metodologia'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Metodología
                                                                    </button>
                                                                <?php } else {?>
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Metodología
                                                                </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 4) { ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) {
                                                                                if($contextComparacion->getData()['Metodologia'])
                                                                                echo '<b style="font-size: 18px">'.$contextModMetodologia->getData()->getMetodologia().'</b>';
                                                                                else
                                                                                echo $contextModMetodologia->getData()->getMetodologia();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                        <?php } ?>
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
                                                                <?php if($contextComparacion->getData()['MetodologiaI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Metodología (Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                    Metodología (Inglés)
                                                                </button>
                                                                <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                            <?php
                                                                            if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) {
                                                                                if($contextComparacion->getData()['MetodologiaI'])
                                                                                echo '<b style="font-size: 18px">'.$contextModMetodoloa->getData()->getMetodologiaI().'</b>';
                                                                                else
                                                                                echo $contextModMetodologia->getData()->getMetodologiaI();
                                                                            }
                                                                            ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
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
                                             
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <!--Pestaña bibliografia-->
                                        <?php if ($verBibliografia) { ?>
                                            <div class="tab-pane fade" id="nav-bibliografia" role="tabpanel" aria-labelledby="nav-bibliografia-tab">
                                                <div class="accordion" id="accordionBibliografia">

                                                    <!-- Pestaña citas bibliograficas -->
                                                    <?php if ($contextConfiguracion->getData()->getCitasBibliograficas() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['CitasBibliograficas'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Citas bibliográficas
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Citas bibliográficas
                                                                    </button>
                                                                <?php } ?>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) {
                                                                                    
																if($contextComparacion->getData()['CitasBibliograficas'])
                                                                echo '<b style="font-size: 18px">'.$contextModBibliografia->getData()->getCitasBibliograficas().'</b>';
                                                                else
                                                                echo $contextModBibliografia->getData()->getCitasBibliograficas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
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
                                                    <?php if ($contextConfiguracion->getData()->getRecursosInternet() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['RecursosInternet'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Recursos en internet
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Recursos en internet
                                                                    </button>
                                                                <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 4) { ?>
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
                                                                            <?php } ?>
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
<<<<<<< Updated upstream
                                                                                                    foreach ($contextModHorarioLaboratorio->getData() as $horario) {
                                                                                                        echo '<tr scope="row">
=======
                                                                                                    $modNumeroHorarios = count($contextModHorarioLaboratorio->getData()) + 1;
                                                                                                    echo '<td rowspan="' . $modNumeroHorarios . '" >
                                                                                                        <table class="table table-sm table-bordered">
                                                                                                                <tr>
                                                                                                                <th scope="col">Profesor</th>
                                                                                                                <th scope="col">Fechas</th>
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
                                                                                                            <td>' . $modGrupoLaboratorioProfesor->getFechas() . '</td>';
                                                                                                                if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() >= 6) {
                                                                                                                    echo '<td> <a href="grupoLaboratorioProfesor.php?EmailProfesor=' . $modGrupoLaboratorioProfesor->getEmailProfesor() . '&IdAsignatura=' . $asignatura->getData()->getIdAsignatura() . '&IdGrupoLaboratorio=' . $grupo->getIdGrupoLab() . '">
                                                                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                            Modificar Profesor
                                                                                                            </button>
                                                                                                            </a>
                                                                                                            <a href="borrarGrupoLaboratorioProfesor.php?EmailProfesor=' . $modGrupoLaboratorioProfesor->getEmailProfesor() . '&IdAsignatura=' . $asignatura->getData()->getIdAsignatura() . '&IdGrupoLaboratorio=' . $grupo->getIdGrupoLab() . '">
                                                                                                            <button type="button" class="btn btn-danger" id="btn-form">
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
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                                                                                                    foreach ($contextHorarioLaboratorio->getData() as $horario) {
                                                                                                        echo '<tr scope="row">
=======
                                                                                                    $numeroHorarios = count($contextHorarioLaboratorio->getData()) + 1;
                                                                                                    echo '<td rowspan="' . $numeroHorarios . '" >
                                                                                                        <table class="table table-sm table-bordered">
                                                                                                                <tr>
                                                                                                                <th scope="col">Profesor</th>
                                                                                                                <th scope="col">Fechas</th>
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
                                                                                                            <td>' . $grupoLaboratorioProfesor->getFechas() . '</td>';
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
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                                                                                                foreach ($contextModHorarioClase->getData() as $horario) {
                                                                                                    echo '<tr scope="row">
=======
                                                                                                $modNumeroHorarios = count($contextModHorarioClase->getData()) + 1;
                                                                                                echo '<td rowspan="' . $modNumeroHorarios . '" >
                                                                                                        <table class="table table-sm table-bordered">
                                                                                                                <tr>
                                                                                                                <th scope="col">Profesor</th>
                                                                                                                <th scope="col">Tipo</th>
                                                                                                                <th scope="col">Fechas</th>
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
                                                                                                            <td>' . $modGrupoClaseProfesor->getFechas() . '</td>';
                                                                                                            if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() >= 6) {
                                                                                                                echo '<td> <a href="grupoClaseProfesor.php?EmailProfesor=' . $modGrupoClaseProfesor->getEmailProfesor() . '&IdAsignatura=' . $asignatura->getData()->getIdAsignatura() . '&IdGrupoClase=' . $grupo->getIdGrupoClase() . '">
                                                                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                            Modificar Profesor
                                                                                                            </button>
                                                                                                            </a>
                                                                                                            <a href="borrarGrupoClaseProfesor.php?EmailProfesor=' . $modGrupoClaseProfesor->getEmailProfesor() . '&IdAsignatura=' . $asignatura->getData()->getIdAsignatura() . '&IdGrupoClase=' . $grupo->getIdGrupoClase() . '">
                                                                                                            <button type="button" class="btn btn-danger" id="btn-form">
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
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                                                                                                foreach ($contextHorarioClase->getData() as $horario) {
                                                                                                    echo '<tr scope="row">
                                                                                            <td>' . $horario->getAula() . '</td>
                                                                                            <td>' . $horario->getDia() . '</td>
                                                                                            <td>' . $horario->getHoraInicio() . '</td>
                                                                                            <td>' . $horario->getHoraFin() . '</td>
                                                                                            </tr>';
=======
                                                                                                $numeroHorarios = count($contextHorarioClase->getData()) + 1;
                                                                                                echo '<td rowspan="' . $numeroHorarios . '" >
                                                                                                        <table class="table table-sm table-bordered">
                                                                                                                <tr>
                                                                                                                <th scope="col">Profesor</th>
                                                                                                                <th scope="col">Tipo</th>
                                                                                                                <th scope="col">Fechas</th>
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
                                                                                                            <td>' . $grupoClaseProfesor->getFechas() . '</td>';
                                                                                                            echo '</tr>';
                                                                                                        }
                                                                                                    }
>>>>>>> Stashed changes
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
                                                    
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <!--Pestaña evaluacion-->
                                        <?php if ($verEvaluacion) { ?>
                                            <div class="tab-pane fade" id="nav-evaluacion" role="tabpanel" aria-labelledby="nav-evaluacion-tab">
                                                <div class="accordion" id="accordionEvaluacion">

                                                    <!-- Pestaña realizacion examenes -->
                                                    <?php if ($contextConfiguracion->getData()->getRealizacionExamenes() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['RealizacionExamenes'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Realización exámenes
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Realización exámenes
                                                                    </button>
                                                                <?php } ?>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if($contextComparacion->getData()['RealizacionExamenes'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModEvaluacion->getData()->getRealizacionExamenes().'</b>';
                                                                                    else
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
                                                                        <?php } ?>
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
                                                                <?php if($contextComparacion->getData()['RealizacionExamenesI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Realización exámenes (Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Realización exámenes(Inglés)
                                                                    </button>
                                                                <?php } ?>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if($contextComparacion->getData()['RealizacionExamenesI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModEvaluacion->getData()->getRealizacionExamenesI().'</b>';
                                                                                    else
                                                                                    echo $contextModEvaluacion->getData()->getRealizacionExamenesI();
                                                                                }
                                                                                ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
                                                    <?php if ($contextConfiguracion->getData()->getCalificacionFinal() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['CalificacionFinal'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                        Calificación final
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Calificación final
                                                                    </button>
                                                                <?php }?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if($contextComparacion->getData()['CalificacionFinal'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModEvaluacion->getData()->getCalificacionFinal().'</b>';
                                                                                    else
                                                                                    echo $contextModEvaluacion->getData()->getCalificacionFinal();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                            <?php } ?>
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
                                                                    <?php if($contextComparacion->getData()['CalificacionFinalI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                        Calificación final (Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        Calificación final (Inglés)
                                                                    </button>
                                                                <?php }?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if($contextComparacion->getData()['CalificacionFinalI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModEvaluacion->getData()->getCalificacionFinalI().'</b>';
                                                                                    else
                                                                                    echo $contextModEvaluacion->getData()->getCalificacionFinalI();
                                                                                }
                                                                                ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php } ?>
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
                                                    <?php if ($contextConfiguracion->getData()->getRealizacionActividades() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['RealizacionActividades'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                        Realización actividades
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Realización actividades
                                                                    </button>
                                                                <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if($contextComparacion->getData()['RealizacionActividades'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModEvaluacion->getData()->getRealizacionActividades().'</b>';
                                                                                    else
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
                                                                        <?php } ?>
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
                                                                    <?php if($contextComparacion->getData()['RealizacionActividadesI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                                        Realización actividades (Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                        Realización actividades (Inglés)
                                                                    </button>
                                                                <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
<<<<<<< Updated upstream
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>2
=======
                                                                        <div class="card">
                                                                            <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">Borrador</h5>
                                                                                        <p class="card-text">
                                                                                            <?php
                                                                                            if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                                if ($contextComparacion->getData()['RealizacionLaboratorioI'])
                                                                                                    echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionLaboratorioI() . '</b>';
                                                                                                else
                                                                                                    echo $contextModEvaluacion->getData()->getRealizacionLaboratorioI();
                                                                                            }
                                                                                            ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Consolidado</h5>
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

                                                    <!-- Pestaña calificacion final  ordinaria -->
                                                    <?php if ($contextConfiguracion->getData()->getCalificacionFinal() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['CalificacionFinal'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                                            Calificación final ordinaria
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                            Calificación final ordinaria
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
>>>>>>> Stashed changes
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
<<<<<<< Updated upstream
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if($contextComparacion->getData()['RealizacionActividadesI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModEvaluacion->getData()->getRealizacionActividadesI().'</b>';
                                                                                    else
                                                                                    echo $contextModEvaluacion->getData()->getRealizacionActividadesI();
                                                                                }
                                                                                ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                                <?php }?>
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
                                                    <?php if ($contextConfiguracion->getData()->getRealizacionLaboratorio() == 1) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeven">
                                                                <h2 class="mb-0">
                                                                <?php if($contextComparacion->getData()['RealizacionLaboratorio'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                                        Realización Laboratorio
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        Realización laboratorio
                                                                    </button>
                                                                <?php }?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionEvaluacion">
                                                                <div class="card-body">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if($contextComparacion->getData()['RealizacionLaboratorio'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModEvaluacion->getData()->getRealizacionLaboratorio().'</b>';
                                                                                    else
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
                                                                        <?php } ?>
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
=======
                                                                                    <?php
                                                                                    if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                        if ($contextComparacion->getData()['CalificacionFinal'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getCalificacionFinal() . '</b>';
                                                                                        else
                                                                                            echo $contextModEvaluacion->getData()->getCalificacionFinal();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
                                                                                    echo $contextEvaluacion->getData()->getCalificacionFinal();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
>>>>>>> Stashed changes
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

<<<<<<< Updated upstream
                                                        <!-- Pestaña realizacion laboratorio (inglés) -->
=======
                                                        <!-- Pestaña calificacion final ordinaria (inglés) -->
>>>>>>> Stashed changes
                                                        <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingEight">
                                                                    <h2 class="mb-0">
<<<<<<< Updated upstream
                                                                    <?php if($contextComparacion->getData()['RealizacionLaboratorioI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4){?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                                        Realización Laboratorio (Inglés)
                                                                    </button>
                                                                <?php } else {?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                        Realización laboratorio (Inglés)
                                                                    </button>
                                                                <?php }?>
=======
                                                                        <?php if ($contextComparacion->getData()['CalificacionFinalI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                                                Calificación final ordinaria (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                                Calificación final ordinaria (Inglés)
                                                                            </button>
                                                                        <?php } ?>
>>>>>>> Stashed changes
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
<<<<<<< Updated upstream
                                                                        <div class="card">
                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
=======
                                                                        <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
>>>>>>> Stashed changes
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">Borrador</h5>
                                                                                    <p class="card-text">
<<<<<<< Updated upstream
                                                                                    <?php
                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                    if($contextComparacion->getData()['RealizacionLaboratorioI'])
                                                                                    echo '<b style="font-size: 18px">'.$contextModEvaluacion->getData()->getRealizacionLaboratorioI().'</b>';
                                                                                    else
                                                                                    echo $contextModEvaluacion->getData()->getRealizacionLaboratorioI();
                                                                                }
                                                                                ?>
=======
                                                                                        <?php
                                                                                        if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                            if ($contextComparacion->getData()['CalificacionFinalI'])
                                                                                                echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getCalificacionFinalI() . '</b>';
                                                                                            else
                                                                                                echo $contextModEvaluacion->getData()->getCalificacionFinalI();
                                                                                        }
                                                                                        ?>
>>>>>>> Stashed changes
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                                    <?php } ?>
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Definitivo</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
<<<<<<< Updated upstream
                                                                                        echo $contextEvaluacion->getData()->getRealizacionLaboratorioI();
=======
                                                                                        echo $contextEvaluacion->getData()->getCalificacionFinalI();
>>>>>>> Stashed changes
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
                                                        
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                        <!--Coordinacion-->
<<<<<<< Updated upstream
                                        <?php if(strpos($asignatura->getData()->getCoordinadores(),$_SESSION['idUsuario'])!==false){?>
=======
                                        <?php if (strpos($asignatura->getData()->getCoordinadorAsignatura(), $_SESSION['idUsuario']) !== false) { ?>
>>>>>>> Stashed changes
                                            <div class="tab-pane fade" id="nav-coordinacion" role="tabpanel" aria-labelledby="nav-coordinacion-tab">
                                                <div class="accordion" id="accordionCoordinacion">
                                                <div class="card-header" id="headingOne">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                              Configuración
                                                        </button>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionEvaluacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                             <div class="card">
                                                                                <div class="card-body">
                                                                                    <p class="card-text">
                                                                                        <?php 
                                                                                        if($contextConfiguracion->getData()->getConocimientosPrevios()){
                                                                                            echo '<p>✔️<b>Conocimientos Previos</b></p>';
                                                                                            
                                                                                        }
                                                                                         else{
                                                                                            echo '<p>❌Conocimientos Previos</p>';
                                                                                        }
                                                                                        
                                                                                        if($contextConfiguracion->getData()->getBreveDescripcion()){
                                                                                            echo '<p>✔️<b>Breve Descripción</b></p>';
                                                                                                
                                                                                        }
                                                                                         else{
                                                                                            echo '<p>❌Breve Descripción</p>';
                                                                                        }


                                                                                        if($contextConfiguracion->getData()->getProgramaDetallado()){
                                                                                            echo '<p>✔️<b>Programa Detallado</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Programa Detallado</p>';
                                                                                        }
                                                                                                

                                                                                        if($contextConfiguracion->getData()->getComGenerales()){
                                                                                            echo '<p>✔️<b>Generales</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Generales</p>';
                                                                                        }

                                                                                        if($contextConfiguracion->getData()->getComEspecificas()){
                                                                                            echo '<p>✔️<b>Específicas</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Específicas</p>';
                                                                                        }

                                                                                        if($contextConfiguracion->getData()->getComBasicas()){
                                                                                            echo '<p>✔️<b>Básicas y Transversales</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Básicas y Transversales</p>';
                                                                                        }

                                                                                        if($contextConfiguracion->getData()->getResultadosAprendizaje()){
                                                                                            echo '<p>✔️<b>Resultados Aprendizaje</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Resultados aprendizaje</p>';
                                                                                        }

                                                                                        if($contextConfiguracion->getData()->getMetodologia()){
                                                                                            echo '<p>✔️<b>Metodología</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Metodología</p>';
                                                                                        }
                                                                                        if($contextConfiguracion->getData()->getCitasBibliograficas()){
                                                                                            echo '<p>✔️<b>Citas Bibliográficas</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Citas Bibliográficas</p>';
                                                                                        }

                                                                                        if($contextConfiguracion->getData()->getRecursosInternet()){
                                                                                            echo '<p>✔️<b>Recursos en Internet</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Recursos en Internet</p>';
                                                                                        }

<<<<<<< Updated upstream
                                                                                        if($contextConfiguracion->getData()->getRealizacionExamenes()){
                                                                                            echo '<p>✔️<b>Realización de Exámenes</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Realización de Exámenes</p>';
                                                                                        }
                                                                                        if($contextConfiguracion->getData()->getCalificacionFinal()){
                                                                                            echo '<p>✔️<b>Calificación Final</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Calificación Final</p>';
                                                                                        }
=======
                                                                            if ($contextConfiguracion->getData()->getRealizacionExamenes()) {
                                                                                echo '<p>✔️<b>Realización de Exámenes</b></p>';
                                                                            } else {
                                                                                echo '<p>❌Realización de Exámenes</p>';
                                                                            }
                                                                            if ($contextConfiguracion->getData()->getCalificacionFinal()) {
                                                                                echo '<p>✔️<b>Calificación Final Ordinaria</b></p>';
                                                                            } else {
                                                                                echo '<p>❌Calificación Final Ordinaria</p>';
                                                                            }
>>>>>>> Stashed changes

                                                                                        if($contextConfiguracion->getData()->getRealizacionActividades()){
                                                                                            echo '<p>✔️<b>Realización de Activiades</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Realización de Actividades</p>';
                                                                                        }

                                                                                        if($contextConfiguracion->getData()->getRealizacionLaboratorio()){
                                                                                            echo '<p>✔️<b>Realización de Laboratorio</b></p>';
                                                                                                    
                                                                                        }
                                                                                        else{
                                                                                            echo '<p>❌Realización de Laboratorio</p>';
                                                                                        }
                                                                                            ?>
                                                                                        <div class="text-right">
                                                                                        <a href="configuracion.php?idAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                Modificar Configuración
                                                                                            </button>
                                                                                        </a>
                                                                                        </div>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                                  
                                                
                                                <!--Permisos-->
                                                <div class="card-header" id="headingTwo">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                              Permisos
                                                        </button>
                                                         </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionCoordinacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                             <div class="card">
                                                                                <div class="card-body">
                                                                                <?php 

                                                                                $context = new es\ucm\Context(FIND_PERMISOS, $asignatura->getData()->getIdAsignatura());
                                                                                $permisos= $controller->action($context);
                                                                                foreach ($permisos->getData() as $permiso){
                                                                                    $context = new es\ucm\Context(FIND_PROFESOR, $permiso->getEmailProfesor());
                                                                                    $profesor = $controller->action($context);
                                                                                    echo '<div><h5>'.$profesor->getData()->getNombre().'</h5>
                                                                                <a href="permisos.php?emailProfesor='.$permiso->getEmailProfesor().'&idAsignatura='.$permiso->getIdAsignatura().'">
                                                                                <button type="button" class="btn btn-primary" id="btn-form">
                                                                                Modificar Permisos
                                                                                </button>
                                                                                </a></div>';
                                                                                echo '<div class="table-responsive text-center">
                                                                                <table class="table table-sm table-hover table-borderless">
                                                                                    <thead>
                                                                                        <tr>
                                                                                        <th scope="col">Programa</th>
                                                                                            <th scope="col">Competencias</th>
                                                                                            <th scope="col">Metodología</th>
                                                                                            <th scope="col">Bibliografía</th>
                                                                                            <th scope="col">Grupo Laboratorio</th>
                                                                                            <th scope="col">Grupo Clase</th>
                                                                                            <th scope="col">Evaluación</th>
                                                                                        </tr>
                                                                                    </thead> <tbody><tr scope="row">';
                                                                                    if($permiso->getPermisoPrograma() === '0'){
                                                                                        echo '<td>❌</td>';
                                                                                    }elseif($permiso->getPermisoPrograma() === '1'){
                                                                                        echo '<td>Administración</td>';
                                                                                    }elseif($permiso->getPermisoPrograma() === '2'){
                                                                                        echo '<td>Modificación</td>';
                                                                                    }elseif($permiso->getPermisoPrograma() === '3'){
                                                                                        echo '<td>Administración y Modificación </td>';
                                                                                    }elseif($permiso->getPermisoPrograma() === '4'){
                                                                                        echo '<td>Lectura</td>';
                                                                                    }elseif($permiso->getPermisoPrograma() === '5'){
                                                                                        echo '<td>Lectura y Administración</td>';
                                                                                    }elseif($permiso->getPermisoPrograma() === '6'){
                                                                                        echo '<td>Lectura y Modificacion</td>';
                                                                                    }elseif($permiso->getPermisoPrograma() === '7'){
                                                                                        echo '<td>Todos</td>';
                                                                                    }
                                                                                    if($permiso->getPermisoCompetencias() === '0'){
                                                                                        echo '<td>❌</td>';
                                                                                    }elseif($permiso->getPermisoCompetencias() === '1'){
                                                                                        echo '<td>Administración</td>';
                                                                                    }elseif($permiso->getPermisoCompetencias() === '2'){
                                                                                        echo '<td>Modificación</td>';
                                                                                    }elseif($permiso->getPermisoCompetencias() === '3'){
                                                                                        echo '<td>Administración y Modificación </td>';
                                                                                    }elseif($permiso->getPermisoCompetencias() === '4'){
                                                                                        echo '<td>Lectura</td>';
                                                                                    }elseif($permiso->getPermisoCompetencias() === '5'){
                                                                                        echo '<td>Lectura y Administración</td>';
                                                                                    }elseif($permiso->getPermisoCompetencias() === '6'){
                                                                                        echo '<td>Lectura y Modificacion</td>';
                                                                                    }elseif($permiso->getPermisoCompetencias() === '7'){
                                                                                        echo '<td>Todos</td>';
                                                                                    }
                                                                                    if($permiso->getPermisoMetodologia() === '0'){
                                                                                        echo '<td>❌</td>';
                                                                                    }elseif($permiso->getPermisoMetodologia() === '1'){
                                                                                        echo '<td>Administración</td>';
                                                                                    }elseif($permiso->getPermisoMetodologia() === '2'){
                                                                                        echo '<td>Modificación</td>';
                                                                                    }elseif($permiso->getPermisoMetodologia() === '3'){
                                                                                        echo '<td>Administración y Modificación </td>';
                                                                                    }elseif($permiso->getPermisoMetodologia() === '4'){
                                                                                        echo '<td>Lectura</td>';
                                                                                    }elseif($permiso->getPermisoMetodologia() === '5'){
                                                                                        echo '<td>Lectura y Administración</td>';
                                                                                    }elseif($permiso->getPermisoMetodologia() === '6'){
                                                                                        echo '<td>Lectura y Modificacion</td>';
                                                                                    }elseif($permiso->getPermisoMetodologia() === '7'){
                                                                                        echo '<td>Todos</td>';
                                                                                    }
                                                                                    if($permiso->getPermisoBibliografia() === '0'){
                                                                                        echo '<td>❌</td>';
                                                                                    }elseif($permiso->getPermisoBibliografia() === '1'){
                                                                                        echo '<td>Administración</td>';
                                                                                    }elseif($permiso->getPermisoBibliografia() === '2'){
                                                                                        echo '<td>Modificación</td>';
                                                                                    }elseif($permiso->getPermisoBibliografia() === '3'){
                                                                                        echo '<td>Administración y Modificación </td>';
                                                                                    }elseif($permiso->getPermisoBibliografia() === '4'){
                                                                                        echo '<td>Lectura</td>';
                                                                                    }elseif($permiso->getPermisoBibliografia() === '5'){
                                                                                        echo '<td>Lectura y Administración</td>';
                                                                                    }elseif($permiso->getPermisoBibliografia() === '6'){
                                                                                        echo '<td>Lectura y Modificacion</td>';
                                                                                    }elseif($permiso->getPermisoBibliografia() === '7'){
                                                                                        echo '<td>Todos</td>';
                                                                                    }
                                                                                    if($permiso->getPermisoGrupoLaboratorio() === '0'){
                                                                                        echo '<td>❌</td>';
                                                                                    }elseif($permiso->getPermisoGrupoLaboratorio() === '1'){
                                                                                        echo '<td>Administración</td>';
                                                                                    }elseif($permiso->getPermisoGrupoLaboratorio() === '2'){
                                                                                        echo '<td>Modificación</td>';
                                                                                    }elseif($permiso->getPermisoGrupoLaboratorio() === '3'){
                                                                                        echo '<td>Administración y Modificación </td>';
                                                                                    }elseif($permiso->getPermisoGrupoLaboratorio() === '4'){
                                                                                        echo '<td>Lectura</td>';
                                                                                    }elseif($permiso->getPermisoGrupoLaboratorio() === '5'){
                                                                                        echo '<td>Lectura y Administración</td>';
                                                                                    }elseif($permiso->getPermisoGrupoLaboratorio() === '6'){
                                                                                        echo '<td>Lectura y Modificacion</td>';
                                                                                    }elseif($permiso->getPermisoGrupoLaboratorio() === '7'){
                                                                                        echo '<td>Todos</td>';
                                                                                    }
                                                                                    if($permiso->getPermisoGrupoClase() === '0'){
                                                                                        echo '<td>❌</td>';
                                                                                    }elseif($permiso->getPermisoGrupoClase() === '1'){
                                                                                        echo '<td>Administración</td>';
                                                                                    }elseif($permiso->getPermisoGrupoClase() === '2'){
                                                                                        echo '<td>Modificación</td>';
                                                                                    }elseif($permiso->getPermisoGrupoClase() === '3'){
                                                                                        echo '<td>Administración y Modificación </td>';
                                                                                    }elseif($permiso->getPermisoGrupoClase() === '4'){
                                                                                        echo '<td>Lectura</td>';
                                                                                    }elseif($permiso->getPermisoGrupoClase() === '5'){
                                                                                        echo '<td>Lectura y Administración</td>';
                                                                                    }elseif($permiso->getPermisoGrupoClase() === '6'){
                                                                                        echo '<td>Lectura y Modificacion</td>';
                                                                                    }elseif($permiso->getPermisoGrupoClase() === '7'){
                                                                                        echo '<td>Todos</td>';
                                                                                    }
                                                                                    if($permiso->getPermisoEvaluacion() === '0'){
                                                                                        echo '<td>❌</td>';
                                                                                    }elseif($permiso->getPermisoEvaluacion() === '1'){
                                                                                        echo '<td>Administración</td>';
                                                                                    }elseif($permiso->getPermisoEvaluacion() === '2'){
                                                                                        echo '<td>Modificación</td>';
                                                                                    }elseif($permiso->getPermisoEvaluacion() === '3'){
                                                                                        echo '<td>Administración y Modificación </td>';
                                                                                    }elseif($permiso->getPermisoEvaluacion() === '4'){
                                                                                        echo '<td>Lectura</td>';
                                                                                    }elseif($permiso->getPermisoEvaluacion() === '5'){
                                                                                        echo '<td>Lectura y Administración</td>';
                                                                                    }elseif($permiso->getPermisoEvaluacion() === '6'){
                                                                                        echo '<td>Lectura y Modificacion</td>';
                                                                                    }elseif($permiso->getPermisoEvaluacion() === '7'){
                                                                                        echo '<td>Todos</td>';
                                                                                    }
                                                                                    
                                                                                    
                                                                                    echo'</tr>                                                                     }
                                                                                      
                                                                                   </tbody>
                                                                                   </table>
                                                                                   </div>';
                                                                                }?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>







                                                                    <!--getionprofesores-->
                                                
                                                
                                                
                                                
                                                    <div class="card-header" id="headingThree">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                              Gestión Profesores
                                                        </button>
                                                         </h2>
                                                                </div>
                                                                <div id="collapseThree" class="collapse" aria-labelledby="headingS" data-parent="#accordionCoordinacion">
                                                                    <div class="card-body">
                                                                        <div class="card">
                                                                             <div class="card">
                                                                                <div class="card-body">
                                                                                <?php 

                                                                    $context = new es\ucm\Context(FIND_PERMISOS, $asignatura->getData()->getIdAsignatura());
                                                                    $permisos= $controller->action($context);
                                                                
                                                                    echo '<div><h5>Profesores de la asignatura '.$asignatura->getData()->getNombreAsignatura().'</h5>
                                                                    <a href="addProfesor.php?idAsignatura='.$permiso->getIdAsignatura().'">
                                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                                Añadir Profesor
                                                                            </button>
                                                                        </a>
                                                                    </div>';
                                                                    foreach ($permisos->getData() as $permiso){
                                                                    $context = new es\ucm\Context(FIND_PROFESOR, $permiso->getEmailProfesor());
                                                                    $profesor = $controller->action($context);
                                                                    echo'<p>'.$profesor->getData()->getNombre().' - '.$permiso->getEmailProfesor().'
                                                                    <a href="eliminarProfesor.php?emailProfesor='.$permiso->getEmailProfesor().'&idAsignatura='.$permiso->getIdAsignatura().'">
                                                                            <button type="button" class="btn btn-danger" id="btn-form">
                                                                                -
                                                                            </button>
                                                                        </a></p>';
                                                                    
                                                                
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
                                                                
                                                                         
                                                </div>
                                                
                                                
                                            
                                               <!-- <div class="text-right">
                                                <a href="verificacion.php?idAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                    <button type="button" class="btn btn-suscess" id="btn-form">
                                                    Validar datos
                                                    </button>
                                                    </a>
                                                </div>  -->
                                            </div>
                                          
                                                                                                             
                                                    </div>
                                            <?php }?>
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