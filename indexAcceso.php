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

<<<<<<< HEAD
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
=======
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                ?>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Listado de asignaturas por Grado</h2>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionListaAsignaturasPorGrado">
                                <?php

<<<<<<< HEAD
=======
                               // foreach ($_SESSION['permisos'] as $tupla) {
                                 //   $context = new es\ucm\Context(FIND_ASIGNATURA, unserialize($tupla)->getIdAsignatura());
                                   // $asigna = $controller->action($context);
                                   // $asignaturas[] = $asigna->getData();
                                //}
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                $controller = new es\ucm\ControllerImplements();

                                foreach ($_SESSION['asignaturas'] as $codGrado => $grado) {
                                    $card = '';
                                    $context = new es\ucm\Context(FIND_GRADO, $codGrado);
<<<<<<< HEAD
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
                                        $card = $card . '<p><a href="indexAcceso.php?IdGrado='.$codGrado.'&IdAsignatura=' . $codAsig . '">' . $as->getData()->getNombreAsignatura() . '</a></p>';
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

                    $context = new es\ucm\Context(FIND_MATERIA, $contextAsignatura->getData()->getIdMateria());
                    $contextMateria = $controller->action($context);

                    $context = new es\ucm\Context(FIND_MODULO, $contextMateria->getData()->getIdModulo());
                    $contextModulo = $controller->action($context);

                    $context = new es\ucm\Context(FIND_GRADO, htmlspecialchars(trim(strip_tags($_GET['IdGrado']))));
                    $contextGrado = $controller->action($context);

                    $context = new es\ucm\Context(FIND_CONFIGURACION, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $contextConfiguracion = $controller->action($context);


                    if ($contextAsignatura->getEvent() === FIND_ASIGNATURA_OK && $contextMateria->getEvent() === FIND_MATERIA_OK && $contextModulo->getEvent() === FIND_MODULO_OK && $contextGrado->getEvent() === FIND_GRADO_OK && $contextConfiguracion->getEvent() === FIND_CONFIGURACION_OK) {

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
=======
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
                                          $card = $card . '<p><a href="indexAcceso.php?IdGrado='.$codGrado.'&IdAsignatura=' . $codAsig . '">' . $as->getData()->getNombreAsignatura() . '</a></p>';
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

                    $context = new es\ucm\Context(FIND_MATERIA, $asignatura->getData()->getIdMateria());
                    $materia = $controller->action($context);

                    $context = new es\ucm\Context(FIND_MODULO, $materia->getData()->getIdModulo());
                    $modulo = $controller->action($context);

                    $context = new es\ucm\Context(FIND_PROFESOR, $asignatura->getData()->getCoordinadorAsignatura());
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

                    if ($contextConfiguracion->getData()->getConocimientosPrevios() == 0 && $contextConfiguracion->getData()->getBreveDescripcion() == 0 && $contextConfiguracion->getData()->getProgramaTeorico() == 0 && $contextConfiguracion->getData()->getProgramaSeminarios() == 0 && $contextConfiguracion->getData()->getProgramaLaboratorio() == 0) $verPrograma = false;
                    if ($contextConfiguracion->getData()->getComGenerales() == 0 && $contextConfiguracion->getData()->getComEspecificas() == 0 && $contextConfiguracion->getData()->getComBasicas() == 0 && $contextConfiguracion->getData()->getResultadosAprendizaje() == 0) $verCompetencias = false;
                    if ($contextConfiguracion->getData()->getMetodologia() == 0) $verMetodologia = false;
                    if ($contextConfiguracion->getData()->getCitasBibliograficas() == 0 && $contextConfiguracion->getData()->getRecursosInternet() == 0) $verBibliografia = false;
                    if ($contextConfiguracion->getData()->getGrupoLaboratorio() == 0) $verGrupoLab = false;
                    if ($contextConfiguracion->getData()->getRealizacionExamenes() == 0 && $contextConfiguracion->getData()->getRealizacionActividades() == 0 && $contextConfiguracion->getData()->getRealizacionLaboratorio() == 0 && $contextConfiguracion->getData()->getCalificacionFinal() == 0) $verEvaluacion = false;
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

                                    <?php if (strpos($asignatura->getData()->getCoordinadorAsignatura(), $_SESSION['idUsuario']) !== false) { ?>
                                        <a class="nav-item nav-link" id="nav-coordinacion-tab" data-toggle="tab" href="#nav-coordinacion" role="tab" aria-controls="nav-coordinacion" aria-selected="false">Coordinación</a>
                                    <?php } ?>

                                </nav>

                                <div class="tab-content" id="nav-tabContent">

                                    <!--Pestaña informacion asignatura-->
                                    <div class="tab-pane fade show active" id="nav-info-asignatura" role="tabpanel" aria-labelledby="nav-info-asignatura-tab">
                                        <div class="table-responsive text-center">
                                            <table class="table table-sm table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">Asignatura:</th>
                                                        <td><?php echo $asignatura->getData()->getNombreAsignatura(); ?></td>
                                                        <th scope="col">Abreviatura:</th>
                                                        <td><?php echo $asignatura->getData()->getAbreviatura(); ?></td>
                                                        <th scope="col">Código:</th>
                                                        <td><?php echo $asignatura->getData()->getIdAsignatura(); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Módulo:</th>
                                                        <td colspan="2"><?php echo $modulo->getData()->getNombreModulo(); ?></td>
                                                        <th scope="col">Materia:</th>
                                                        <td colspan="2"><?php echo $materia->getData()->getNombreMateria(); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Carácter:</th>
                                                        <td><?php echo $materia->getData()->getCaracter(); ?></td>
                                                        <th scope="col">Curso:</th>
                                                        <td><?php echo $asignatura->getData()->getCurso(); ?></td>
                                                        <th scope="col">Semestre:</th>
                                                        <td><?php echo $asignatura->getData()->getSemestre(); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br />
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
                                                        <th scope="row">Créditos (ECTS):</th>
                                                        <td><?php echo $asignatura->getData()->getCreditos(); ?></td>
                                                        <td><?php echo $teorico->getData()->getCreditos(); ?></td>
                                                        <td><?php echo $problema->getData()->getCreditos(); ?></td>
                                                        <td><?php echo $laboratorio->getData()->getCreditos(); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Presencialidad:</th>
                                                        <td>-</td>
                                                        <td><?php echo $teorico->getData()->getPresencial(); ?>%</td>
                                                        <td><?php echo $problema->getData()->getPresencial(); ?>%</td>
                                                        <td><?php echo $laboratorio->getData()->getPresencial(); ?>%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Horas totales:</th>
                                                        <td>-</td>
                                                        <td><?php echo ($teorico->getData()->getCreditos() * 25 * $teorico->getData()->getPresencial()) / 100; ?></td>
                                                        <td><?php echo ($problema->getData()->getCreditos() * 25 * $problema->getData()->getPresencial()) / 100; ?></td>
                                                        <td><?php echo ($laboratorio->getData()->getCreditos() * 25 * $laboratorio->getData()->getPresencial()) / 100; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br />
                                        <div class="table-responsive text-center">
                                            <table class="table table-sm table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" colspan="6">Coordinadores</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
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
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7

                                    <?php if ($verPrograma) { ?>
                                        <!--Pestaña programa asignatura-->
                                        <div class="tab-pane fade" id="nav-prog-asignatura" role="tabpanel" aria-labelledby="nav-prog-asignatura-tab">
                                            <div class="accordion" id="accordionProgram">

<<<<<<< HEAD
                        if ($contextConfiguracion->getData()->getConocimientosPrevios() == false && $contextConfiguracion->getData()->getBreveDescripcion() == false && $contextConfiguracion->getData()->getProgramaTeorico() == false && $contextConfiguracion->getData()->getProgramaSeminarios() == false && $contextConfiguracion->getData()->getProgramaLaboratorio() == false) $verPrograma = false;
                        if ($contextConfiguracion->getData()->getComGenerales() == false && $contextConfiguracion->getData()->getComEspecificas() == false && $contextConfiguracion->getData()->getComBasicas() == false && $contextConfiguracion->getData()->getResultadosAprendizaje() == false) $verCompetencias = false;
                        if ($contextConfiguracion->getData()->getMetodologia() == false) $verMetodologia = false;
                        if ($contextConfiguracion->getData()->getCitasBibliograficas() == false && $contextConfiguracion->getData()->getRecursosInternet() == false) $verBibliografia = false;
                        if ($contextConfiguracion->getData()->getGrupoLaboratorio() == false) $verGrupoLab = false;
                        if ($contextConfiguracion->getData()->getRealizacionExamenes() == false && $contextConfiguracion->getData()->getRealizacionActividades() == false && $contextConfiguracion->getData()->getRealizacionLaboratorio() == false && $contextConfiguracion->getData()->getCalificacionFinal() == false) $verEvaluacion = false;
                        ?>

                        <div class="col-md-8 col-12">
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
                                            <a class="nav-item nav-link" id="nav-grupo-contextLaboratorio-tab" data-toggle="tab" href="#nav-grupo-contextLaboratorio" role="tab" aria-controls="nav-grupo-contextLaboratorio" aria-selected="false">Grupo contextLaboratorio</a>

                                        <?php } ?>
                                        <a class="nav-item nav-link" id="nav-grupo-clase-tab" data-toggle="tab" href="#nav-grupo-clase" role="tab" aria-controls="nav-grupo-clase" aria-selected="false">Grupo clase</a>

                                        <?php if ($verEvaluacion) { ?>
                                            <a class="nav-item nav-link" id="nav-evaluacion-tab" data-toggle="tab" href="#nav-evaluacion" role="tab" aria-controls="nav-evaluacion" aria-selected="false">Evaluación</a>
                                        <?php } ?>

                                        <?php if ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true){ ?>
                                            <a class="nav-item nav-link" id="nav-coordinacion-tab" data-toggle="tab" href="#nav-coordinacion" role="tab" aria-controls="nav-coordinacion" aria-selected="false">Coordinación</a>
                                        <?php } ?>

                                    </nav>

                                    <div class="tab-content" id="nav-tabContent">

                                        <!--Pestaña informacion asignatura-->
                                        <div class="tab-pane fade show active" id="nav-info-asignatura" role="tabpanel" aria-labelledby="nav-info-asignatura-tab">
                                            <div class="table-responsive text-center">
                                                <table class="table table-sm table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="col">Asignatura:</th>
                                                            <td><?php echo $contextAsignatura->getData()->getNombreAsignatura(); ?></td>
                                                            <th scope="col">Abreviatura:</th>
                                                            <td><?php echo $contextAsignatura->getData()->getAbreviatura(); ?></td>
                                                            <th scope="col">Código:</th>
                                                            <td><?php echo $contextAsignatura->getData()->getIdAsignatura(); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Módulo:</th>
                                                            <td colspan="2"><?php echo $contextModulo->getData()->getNombreModulo(); ?></td>
                                                            <th scope="col">Materia:</th>
                                                            <td colspan="2"><?php echo $contextMateria->getData()->getNombreMateria(); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Carácter:</th>
                                                            <td><?php echo $contextMateria->getData()->getCaracter(); ?></td>
                                                            <th scope="col">Curso:</th>
                                                            <td><?php echo $contextAsignatura->getData()->getCurso(); ?></td>
                                                            <th scope="col">Semestre:</th>
                                                            <td><?php echo $contextAsignatura->getData()->getSemestre(); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if($contextTeorico->getEvent() === FIND_TEORICO_OK && $contextLaboratorio->getEvent() === FIND_LABORATORIO_OK && $contextProblema->getEvent() === FIND_PROBLEMA_OK){?>
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
                                                            <th scope="row">Créditos (ECTS):</th>
                                                            <td><?php echo $contextAsignatura->getData()->getCreditos(); ?></td>
                                                            <td><?php echo $contextTeorico->getData()->getCreditos(); ?></td>
                                                            <td><?php echo $contextProblema->getData()->getCreditos(); ?></td>
                                                            <td><?php echo $contextLaboratorio->getData()->getCreditos(); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Presencialidad:</th>
                                                            <td>-</td>
                                                            <td><?php echo $contextTeorico->getData()->getPresencial(); ?>%</td>
                                                            <td><?php echo $contextProblema->getData()->getPresencial(); ?>%</td>
                                                            <td><?php echo $contextLaboratorio->getData()->getPresencial(); ?>%</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Horas totales:</th>
                                                            <td>-</td>
                                                            <td><?php echo ($contextTeorico->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextTeorico->getData()->getPresencial()) / 100; ?></td>
                                                            <td><?php echo ($contextProblema->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextProblema->getData()->getPresencial()) / 100; ?></td>
                                                            <td><?php echo ($contextLaboratorio->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextLaboratorio->getData()->getPresencial()) / 100; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } else{
                                                echo'<div class="alert alert-danger" role="alert">
                                                         NO EXISTE LA INFORMACIÓN DE TEÓRICO, PROBLEMA O LABORATORIO
                                                    </div>';
                                            }
                                            if($CoordinadorAsignatura->getEvent() === FIND_PROFESOR_OK){?>
                                            <div class="table-responsive text-center">
                                                <table class="table table-sm table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" colspan="6">Coordinadores</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
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
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } else{
                                            echo'<div class="alert alert-danger" role="alert">
                                                NO EXISTE LA INFORMACIÓN DEL COORDINADOR DE ASIGNATURA
                                                </div>';
                                        }
                                        ?>
                                        </div>
=======
                                                <!--Pestaña conocimientos previos -->
                                                <?php if ($contextConfiguracion->getData()->getConocimientosPrevios() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['conocimientosPrevios'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Conocimientos previos
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Conocimientos previos
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionProgram">
                                                            <div class="card-body">
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['conocimientosPrevios'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getConocimientosPrevios() . '</b>';
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
                                                                        <h5 class="card-title">Consolidado</h5>
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
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7

                                                    <!--Pestaña conocimientos previos (ingles) -->
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>

<<<<<<< HEAD
                                                    <!--Pestaña conocimientos previos -->
                                                    <?php if ($contextConfiguracion->getData()->getConocimientosPrevios() == true) { ?>
=======
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
<<<<<<< HEAD
                                                                    <?php if ($contextComparacion->getData()['conocimientosPrevios']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                            Conocimientos previos
=======
                                                                    <?php if ($contextComparacion->getData()['conocimientosPreviosI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Conocimientos previos (Inglés)
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Conocimientos previos (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionProgram">
                                                                <div class="card-body">
<<<<<<< HEAD
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['conocimientosPrevios'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getConocimientosPrevios() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getConocimientosPrevios();
                                                                                }
                                                                                ?>
                                                                            </p>
=======
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>

                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['conocimientosPreviosI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getConocimientosPreviosI() . '</b>';
                                                                                        else
                                                                                            echo $contextModPrograma->getData()->getConocimientosPreviosI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </div>
                                                                    </div>

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
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

<<<<<<< HEAD
                                                        <!--Pestaña conocimientos previos (ingles) -->
                                                        <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>

                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                    <h2 class="mb-0">
                                                                        <?php if ($contextComparacion->getData()['conocimientosPreviosI']) { ?>
                                                                            <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                                Conocimientos previos (Inglés)
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                                Conocimientos previos (Inglés)
                                                                            </button>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionProgram">
                                                                    <div class="card-body">
                                                                     <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['conocimientosPreviosI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getConocimientosPreviosI() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getConocimientosPreviosI();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getConocimientosPreviosI();
=======
                                                <!--Pestaña breve descripcion -->
                                                <?php if ($contextConfiguracion->getData()->getBreveDescripcion() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h2 class="mb-0">

                                                                <?php
                                                                if ($contextComparacion->getData()['BreveDescripcion'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Breve descripción
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Breve descripción
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionProgram">
                                                            <div class="card-body">
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['BreveDescripcion'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getBreveDescripcion() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getBreveDescripcion();
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
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
                                                                            if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                echo $contextPrograma->getData()->getBreveDescripcion();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
<<<<<<< HEAD
                                                    <?php } ?>
                                                <?php } ?>

                                                <!--Pestaña breve descripcion -->
                                                <?php if ($contextConfiguracion->getData()->getBreveDescripcion() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h2 class="mb-0">

                                                                <?php
                                                                if ($contextComparacion->getData()['BreveDescripcion']) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Breve descripción
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Breve descripción
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionProgram">
                                                            <div class="card-body">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                if ($contextComparacion->getData()['BreveDescripcion'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getBreveDescripcion() . '</b>';
                                                                                else
                                                                                    echo $contextModPrograma->getData()->getBreveDescripcion();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
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
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFour">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['BreveDescripcionI']) { ?>
=======
                                                    </div>

                                                    <!--Pestaña breve descripcion (ingles) -->
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFour">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['BreveDescripcionI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                            Breve descripción (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                            Breve descripción (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionProgram">
                                                                <div class="card-body">
<<<<<<< HEAD
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['BreveDescripcionI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getBreveDescripcionI() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getBreveDescripcionI();
                                                                                }
                                                                                ?>
                                                                            </p>
=======
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['BreveDescripcionI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getBreveDescripcionI() . '</b>';
                                                                                        else
                                                                                            echo $contextModPrograma->getData()->getBreveDescripcionI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </div>
                                                                    </div>

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
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
<<<<<<< HEAD

                                                <!--Pestaña programa Teorico -->
                                                <?php if ($contextConfiguracion->getData()->getProgramaTeorico() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingFive">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ProgramaTeorico']) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                        Programa teórico
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Programa teórico
=======
                                                <!--Pestaña programa teorico -->
                                                <?php if ($contextConfiguracion->getData()->getProgramaTeorico() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingFive">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ProgramaTeorico'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                        Programa teorico
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Programa teorico
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionProgram">
                                                            <div class="card-body">
<<<<<<< HEAD
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                if ($contextComparacion->getData()['ProgramaTeorico'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaTeorico() . '</b>';
                                                                                else
                                                                                    echo $contextModPrograma->getData()->getProgramaTeorico();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                echo $contextPrograma->getData()->getProgramaTeorico();
                                                                            }
                                                                            ?>
                                                                        </p>
=======
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ProgramaTeorico'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaTeorico() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getProgramaTeorico();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                echo $contextPrograma->getData()->getProgramaTeorico();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

<<<<<<< HEAD
                                                    <!--Pestaña programa Teorico (ingles) -->
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSix">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaTeoricoI']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                                            Programa teórico (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                            Programa teórico (Inglés)
=======
                                                    <!--Pestaña programa teorico (ingles) -->
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSix">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaTeoricoI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                                            Programa teorico (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                            Programa teorico (Inglés)
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionProgram">
                                                                <div class="card-body">
<<<<<<< HEAD
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ProgramaTeoricoI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaTeoricoI() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getProgramaTeoricoI();
                                                                                }
                                                                                ?>
                                                                            </p>
=======
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['ProgramaTeoricoI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaTeoricoI() . '</b>';
                                                                                        else
                                                                                            echo $contextModPrograma->getData()->getProgramaTeoricoI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </div>
                                                                    </div>

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getProgramaTeoricoI();
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

                                                <!--Pestaña programa seminarios-->
<<<<<<< HEAD
                                                <?php if ($contextConfiguracion->getData()->getProgramaSeminarios() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingSeven">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ProgramaTeorico']) { ?>
=======
                                                <?php if ($contextConfiguracion->getData()->getProgramaSeminarios() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingSeven">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ProgramaTeorico'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                                        Programa seminarios
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        Programa seminarios
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionProgram">
                                                            <div class="card-body">
<<<<<<< HEAD
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                if ($contextComparacion->getData()['ProgramaTeorico'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaSeminarios() . '</b>';
                                                                                else
                                                                                    echo $contextModPrograma->getData()->getProgramaSeminarios();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                echo $contextPrograma->getData()->getProgramaSeminarios();
                                                                            }
                                                                            ?>
                                                                        </p>
=======
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ProgramaTeorico'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaSeminarios() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getProgramaSeminarios();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                echo $contextPrograma->getData()->getProgramaSeminarios();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Pestaña programa seminarios (ingles) -->
<<<<<<< HEAD
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingEight">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaTeoricoI']) { ?>
=======
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingEight">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaTeoricoI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                                            Programa seminarios (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                            Programa seminarios (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionProgram">
                                                                <div class="card-body">
<<<<<<< HEAD
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ProgramaTeoricoI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaSeminariosI() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getProgramaSeminariosI();
                                                                                }
                                                                                ?>
                                                                            </p>
=======
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['ProgramaTeoricoI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaSeminariosI() . '</b>';
                                                                                        else
                                                                                            echo $contextModPrograma->getData()->getProgramaSeminariosI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </div>
                                                                    </div>

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getProgramaSeminariosI();
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
<<<<<<< HEAD
                                                <!--Pestaña programa Laboratorio-->
                                                <?php if ($contextConfiguracion->getData()->getProgramaLaboratorio() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingNine">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ProgramaTeorico']) { ?>
=======
                                                <!--Pestaña programa laboratorio-->
                                                <?php if ($contextConfiguracion->getData()->getProgramaLaboratorio() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingNine">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ProgramaTeorico'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                                                        Programa laboratorio
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                                        Programa laboratorio
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionProgram">
                                                            <div class="card-body">
<<<<<<< HEAD
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                if ($contextComparacion->getData()['ProgramaTeorico'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaLaboratorio() . '</b>';
                                                                                else
                                                                                    echo $contextModPrograma->getData()->getProgramaLaboratorio();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                echo $contextPrograma->getData()->getProgramaLaboratorio();
                                                                            }
                                                                            ?>
                                                                        </p>
=======
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ProgramaTeorico'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaLaboratorio() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getProgramaLaboratorio();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                echo $contextPrograma->getData()->getProgramaLaboratorio();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

<<<<<<< HEAD
                                                    <!--Pestaña programa Laboratorio (ingles) -->
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTen">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaTeoricoI']) { ?>
=======
                                                    <!--Pestaña programa laboratorio (ingles) -->
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTen">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ProgramaTeoricoI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                                                            Programa laboratorio (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                                            Programa laboratorio (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionProgram">
                                                                <div class="card-body">
<<<<<<< HEAD
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ProgramaTeoricoI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaLaboratorioI() . '</b>';
                                                                                    else
                                                                                        echo $contextModPrograma->getData()->getProgramaLaboratorioI();
                                                                                }
                                                                                ?>
                                                                            </p>
=======
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['ProgramaTeoricoI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModPrograma->getData()->getProgramaLaboratorioI() . '</b>';
                                                                                        else
                                                                                            echo $contextModPrograma->getData()->getProgramaLaboratorioI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </div>
                                                                    </div>

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {
                                                                                    echo $contextPrograma->getData()->getProgramaLaboratorioI();
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

<<<<<<< HEAD
                                            <?php if ($contextAsignatura->getData()->getEstado()=== "B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoPrograma() == true)) { ?>
                                                <div class="text-right">

                                                    <a href="programaAsignatura.php?IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
=======
                                            <?php if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoPrograma() >= 6) { ?>
                                                <div class="text-right">

                                                    <a href="programaAsignatura.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                            Crear Nuevo Borrador
                                                        </button>
                                                    </a>
                                                    <?php if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) { ?>
<<<<<<< HEAD
                                                        <a href="programaAsignatura.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
=======
                                                        <a href="programaAsignatura.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                Modificar Borrador
                                                            </button>
                                                        </a>
<<<<<<< HEAD
                                                        <a href="borrarProgramaAsignatura.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
=======
                                                        <a href="borrarProgramaAsignatura.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
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
<<<<<<< HEAD
                                                <?php if ($contextConfiguracion->getData()->getComGenerales() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ComGenerales']) { ?>
=======
                                                <?php if ($contextConfiguracion->getData()->getComGenerales() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ComGenerales'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
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
<<<<<<< HEAD
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

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                echo $contextCompetencias->getData()->getGenerales();
                                                                            }
                                                                            ?>
                                                                        </p>
=======
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
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
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
<<<<<<< HEAD
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComGeneralesI']) { ?>
=======
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComGeneralesI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Generales (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                            Generales (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
<<<<<<< HEAD
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ComGeneralesI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getGeneralesI() . '</b>';
                                                                                    else
                                                                                        echo $contextModCompetencias->getData()->getGeneralesI();
                                                                                }
                                                                                ?>
                                                                            </p>
=======
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['ComGeneralesI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getGeneralesI() . '</b>';
                                                                                        else
                                                                                            echo $contextModCompetencias->getData()->getGeneralesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </div>
                                                                    </div>

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
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
<<<<<<< HEAD
                                                <?php if ($contextConfiguracion->getData()->getComEspecificas() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ComEspecificas']) { ?>
=======
                                                <?php if ($contextConfiguracion->getData()->getComEspecificas() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ComEspecificas'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                        Específicas
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Específicas
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionCompetencia">
                                                            <div class="card-body">
<<<<<<< HEAD
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                if ($contextComparacion->getData()['ComEspecificas'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getEspecificas() . '</b>';
                                                                                else
                                                                                    echo $contextModCompetencias->getData()->getEspecificas();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                echo $contextCompetencias->getData()->getEspecificas();
                                                                            }
                                                                            ?>
                                                                        </p>
=======
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ComEspecificas'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getEspecificas() . '</b>';
                                                                                    else
                                                                                        echo $contextModCompetencias->getData()->getEspecificas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
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
<<<<<<< HEAD
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFour">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComEspecificasI'] ) { ?>
=======
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFour">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComEspecificasI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                            Específicas (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                            Específicas (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
<<<<<<< HEAD
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ComEspecificasI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getEspecificasI() . '</b>';
                                                                                    else
                                                                                        echo $contextModCompetencias->getData()->getEspecificasI();
                                                                                }
                                                                                ?>
                                                                            </p>
=======
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['ComEspecificasI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getEspecificasI() . '</b>';
                                                                                        else
                                                                                            echo $contextModCompetencias->getData()->getEspecificasI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        </div>
                                                                    </div>

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
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
<<<<<<< HEAD
                                                <?php if ($contextConfiguracion->getData()->getComBasicas() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingFive">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ComBasicas']) { ?>
=======
                                                <?php if ($contextConfiguracion->getData()->getComBasicas() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingFive">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ComBasicas'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                        Básicas y transversales
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                        Básicas y transversales
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionCompetencia">
                                                            <div class="card-body">
<<<<<<< HEAD
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                if ($contextComparacion->getData()['ComBasicas'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getBasicasYTransversales() . '</b>';
                                                                                else
                                                                                    echo $contextModCompetencias->getData()->getBasicasYTransversales();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                echo $contextCompetencias->getData()->getBasicasYTransversales();
                                                                            }
                                                                            ?>
                                                                        </p>
=======
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ComBasicas'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getBasicasYTransversales() . '</b>';
                                                                                    else
                                                                                        echo $contextModCompetencias->getData()->getBasicasYTransversales();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
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
<<<<<<< HEAD
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSix">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComBasicasI']) { ?>
=======
                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSix">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ComBasicasI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                                            Básicas y transversales(Inglés)
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                            Básicas y transversales (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
<<<<<<< HEAD
=======
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['ComBasicasI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getBasicasYTransversalesI() . '</b>';
                                                                                        else
                                                                                            echo $contextModCompetencias->getData()->getBasicasYTransversalesI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
<<<<<<< HEAD
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ComBasicasI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getBasicasYTransversalesI() . '</b>';
                                                                                    else
                                                                                        echo $contextModCompetencias->getData()->getBasicasYTransversalesI();
=======
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                    echo $contextCompetencias->getData()->getBasicasYTransversalesI();
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
<<<<<<< HEAD

=======
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
                                                                <?php if ($contextComparacion->getData()['ResultadosAprendizaje'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                                        Resultados de aprendizaje
                                                                    </button>
                                                                <?php } else { ?>

                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        Resultados de aprendizaje
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionCompetencia">
                                                            <div class="card-body">
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ResultadosAprendizaje'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getResultadosAprendizaje() . '</b>';
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
                                                                        <h5 class="card-title">Consolidado</h5>
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
                                                                    <?php if ($contextComparacion->getData()['ResultadosAprendizajeI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                                            Resultados de aprendizaje (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>

                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                            Resultados de aprendizaje (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 4) { ?>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Borrador</h5>
                                                                                <p class="card-text">
                                                                                    <?php
                                                                                    if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                        if ($contextComparacion->getData()['ResultadosAprendizajeI'])
                                                                                            echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getResultadosAprendizajeI() . '</b>';
                                                                                        else
                                                                                            echo $contextModCompetencias->getData()->getResultadosAprendizajeI();
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
<<<<<<< HEAD
                                                                                    echo $contextCompetencias->getData()->getBasicasYTransversalesI();
=======
                                                                                    echo $contextCompetencias->getData()->getResultadosAprendizajeI();
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
<<<<<<< HEAD
                                                    <?php } ?>
                                                <?php } ?>

                                                <!-- Pestaña resultados de aprendizaje -->
                                                <?php if ($contextConfiguracion->getData()->getResultadosAprendizaje() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingSeven">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['ResultadosAprendizaje']) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                                        Resultados de aprendizaje
                                                                    </button>
                                                                <?php } else { ?>

                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                        Resultados de aprendizaje
=======
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>

                                            <?php if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoCompetencias() >= 6) { ?>
                                                <div class="text-right">

                                                    <a href="competenciasAsignatura.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                            Crear Nuevo Borrador
                                                        </button>
                                                    </a>
                                                    <?php if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) { ?>
                                                        <a href="competenciasAsignatura.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                Modificar Borrador
                                                            </button>
                                                        </a>
                                                        <a href="borrarCompetenciasAsignatura.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-danger" id="btn-form">
                                                                Eliminar Borrador
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
                                                            <?php if ($contextComparacion->getData()['Metodologia'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 4) { ?>
                                                                <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Metodología
                                                                </button>
                                                            <?php } else { ?>
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Metodología
                                                                </button>
                                                            <?php } ?>
                                                        </h2>
                                                    </div>

                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionMetodologia">
                                                        <div class="card-body">
                                                            <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 4) { ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) {
                                                                                if ($contextComparacion->getData()['Metodologia'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModMetodologia->getData()->getMetodologia() . '</b>';
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
                                                                    <h5 class="card-title">Consolidado</h5>
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
                                                                <?php if ($contextComparacion->getData()['MetodologiaI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 4) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Metodología (Inglés)
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Metodología (Inglés)
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
<<<<<<< HEAD
                                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionCompetencia">
                                                            <div class="card-body">
=======
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionMetodologia">
                                                            <div class="card-body">
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) {
                                                                                    if ($contextComparacion->getData()['MetodologiaI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModMetodoloa->getData()->getMetodologiaI() . '</b>';
                                                                                    else
                                                                                        echo $contextModMetodologia->getData()->getMetodologiaI();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
<<<<<<< HEAD
                                                                            if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                if ($contextComparacion->getData()['ResultadosAprendizaje'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getResultadosAprendizaje() . '</b>';
                                                                                else
                                                                                    echo $contextModCompetencias->getData()->getResultadosAprendizaje();
=======
                                                                            if ($contextMetodologia->getEvent() === FIND_METODOLOGIA_OK) {
                                                                                echo $contextMetodologia->getData()->getMetodologiaI();
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
<<<<<<< HEAD

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
                                                                                echo $contextCompetencias->getData()->getResultadosAprendizaje();
                                                                            }
                                                                            ?>
                                                                        </p>
=======
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <?php if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoMetodologia() >= 6) { ?>
                                                <div class="text-right">

                                                    <a href="metodologia.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                            Crear Nuevo Borrador
                                                        </button>
                                                    </a>
                                                    <?php if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) { ?>
                                                        <a href="metodologia.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                Modificar Borrador
                                                            </button>
                                                        </a>
                                                        <a href="borrarMetodologia.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
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
                                                <?php if ($contextConfiguracion->getData()->getCitasBibliograficas() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['CitasBibliograficas'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 4) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Citas bibliográficas
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Citas bibliográficas
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionBibliografia">
                                                            <div class="card-body">
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 4) { ?>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
                                                                                if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) {

                                                                                    if ($contextComparacion->getData()['CitasBibliograficas'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModBibliografia->getData()->getCitasBibliograficas() . '</b>';
                                                                                    else
                                                                                        echo $contextModBibliografia->getData()->getCitasBibliograficas();
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
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
<<<<<<< HEAD

                                                    <!-- Pestaña resultados de aprendizaje (inglés) -->
                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingEight">
                                                                <h2 class="mb-0">
                                                                    <?php if ($contextComparacion->getData()['ResultadosAprendizajeI']) { ?>
                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                                            Resultados de aprendizaje (Inglés)
                                                                        </button>
                                                                    <?php } else { ?>

                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                            Resultados de aprendizaje (Inglés)
                                                                        </button>
                                                                    <?php } ?>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionCompetencia">
                                                                <div class="card-body">
=======
                                                <?php } ?>

                                                <!-- Pestaña recursos en internet -->
                                                <?php if ($contextConfiguracion->getData()->getRecursosInternet() == 1) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['RecursosInternet'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 4) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Recursos en internet
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Recursos en internet
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionBibliografia">
                                                            <div class="card-body">
                                                                <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 4) { ?>
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Borrador</h5>
                                                                            <p class="card-text">
                                                                                <?php
<<<<<<< HEAD
                                                                                if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {
                                                                                    if ($contextComparacion->getData()['ResultadosAprendizajeI'])
                                                                                        echo '<b style="font-size: 18px">' . $contextModCompetencias->getData()->getResultadosAprendizajeI() . '</b>';
                                                                                    else
                                                                                        echo $contextModCompetencias->getData()->getResultadosAprendizajeI();
=======
                                                                                if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) {
                                                                                    echo $contextModBibliografia->getData()->getRecursosInternet();
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
<<<<<<< HEAD

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Consolidado</h5>
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

                                            <?php if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoCompetencias() == true)) { ?>
                                                <div class="text-right">

                                                    <a href="competenciasAsignatura.php?IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                            Crear Nuevo Borrador
                                                        </button>
                                                    </a>
                                                    <?php if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) { ?>
                                                        <a href="competenciasAsignatura.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                Modificar Borrador
                                                            </button>
                                                        </a>
                                                        <a href="borrarCompetenciasAsignatura.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-danger" id="btn-form">
                                                                Eliminar Borrador
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
                                                            <?php if ($contextComparacion->getData()['Metodologia']){ ?>
                                                                <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Metodología
                                                                </button>
                                                            <?php } else { ?>
                                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Metodología
                                                                </button>
                                                            <?php } ?>
                                                        </h2>
                                                    </div>

                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionMetodologia">
                                                        <div class="card-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Borrador</h5>
                                                                    <p class="card-text">
                                                                        <?php
                                                                        if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) {
                                                                            if ($contextComparacion->getData()['Metodologia'])
                                                                                echo '<b style="font-size: 18px">' . $contextModMetodologia->getData()->getMetodologia() . '</b>';
                                                                            else
                                                                                echo $contextModMetodologia->getData()->getMetodologia();
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Consolidado</h5>
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
                                                <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['MetodologiaI']) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Metodología (Inglés)
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Metodología (Inglés)
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionMetodologia">
                                                            <div class="card-body">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) {
                                                                                if ($contextComparacion->getData()['MetodologiaI'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModMetodoloa->getData()->getMetodologiaI() . '</b>';
                                                                                else
                                                                                    echo $contextModMetodologia->getData()->getMetodologiaI();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
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

                                            <?php if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoMetodologia() == true)) { ?>
                                                <div class="text-right">

                                                    <a href="metodologia.php?IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                            Crear Nuevo Borrador
                                                        </button>
                                                    </a>
                                                    <?php if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK) { ?>
                                                        <a href="metodologia.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                Modificar Borrador
                                                            </button>
                                                        </a>
                                                        <a href="borrarMetodologia.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
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
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Citas bibliográficas
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Citas bibliográficas
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionBibliografia">
                                                            <div class="card-body">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Borrador</h5>
                                                                        <p class="card-text">
                                                                            <?php
                                                                            if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) {

                                                                                if ($contextComparacion->getData()['CitasBibliograficas'])
                                                                                    echo '<b style="font-size: 18px">' . $contextModBibliografia->getData()->getCitasBibliograficas() . '</b>';
                                                                                else
                                                                                    echo $contextModBibliografia->getData()->getCitasBibliograficas();
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
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
                                                <?php if ($contextConfiguracion->getData()->getRecursosInternet() == true) { ?>
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h2 class="mb-0">
                                                                <?php if ($contextComparacion->getData()['RecursosInternet'] ) { ?>
                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                        Recursos en internet
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Recursos en internet
                                                                    </button>
                                                                <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionBibliografia">
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
                                                                        <h5 class="card-title">Consolidado</h5>
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

                                            <?php if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoBibliografia() == true)) { ?>
                                                <div class="text-right">

                                                    <a href="bibliografia.php?IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                            Crear Nuevo Borrador
                                                        </button>
                                                    </a>
                                                    <?php if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) { ?>
                                                        <a href="bibliografia.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                Modificar Borrador
                                                            </button>
                                                        </a>
                                                        <a href="borrarBibliografia.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-danger" id="btn-form">
                                                                Borrar Borrador
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                    <!--Pestaña grupo contextLaboratorio-->
                                    <?php if ($verGrupoLab) { ?>
                                        <div class="tab-pane fade" id="nav-grupo-contextLaboratorio" role="tabpanel" aria-labelledby="nav-grupo-contextLaboratorio-tab">
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
                                                                                    if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoLaboratorio() == true)) { ?>
                                                                                        <a href="horarioLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $grupo->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                                                Crear Nuevo Horario
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="grupoLaboratorioProfesor.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                                                Añadir Profesor
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="grupoLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                Modificar Grupo
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="borrarGrupoLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-danger" id="btn-form">
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
=======
                                                                <?php } ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Consolidado</h5>
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

                                            <?php if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoBibliografia() >= 6) { ?>
                                                <div class="text-right">

                                                    <a href="bibliografia.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                            Crear Nuevo Borrador
                                                        </button>
                                                    </a>
                                                    <?php if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) { ?>
                                                        <a href="bibliografia.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                Modificar Borrador
                                                            </button>
                                                        </a>
                                                        <a href="borrarBibliografia.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                            <button type="button" class="btn btn-danger" id="btn-form">
                                                                Borrar Borrador
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
                                                                                    if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoLaboratorio() >= 6) { ?>
                                                                                        <a href="horarioLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $grupo->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                                                Crear Nuevo Horario
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="grupoLaboratorioProfesor.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-success" id="btn-form">
                                                                                                Añadir Profesor
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="grupoLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                Modificar Grupo
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="borrarGrupoLaboratorio.php?IdGrupoLaboratorio=<?php echo $grupo->getIdGrupoLab(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-danger" id="btn-form">
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
                                                                                                                <td>' . $modGrupoLaboratorioProfesor->getFechaInicio() . '</td>
                                                                                                                td>' . $modGrupoLaboratorioProfesor->getFechaFin() . '</td>';
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
                                                                                                        <td>' . $horario->getLaboratorio() . '</td>
                                                                                                        <td>' . $horario->getDia() . '</td>
                                                                                                        <td>' . $horario->getHoraInicio() . '-' . $horario->getHoraFin() . '</td>';

                                                                                                        if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoLaboratorio() >= 6) {
                                                                                                            echo '<td> <a href="horarioLaboratorio.php?IdHorarioLaboratorio=' . $horario->getIdHorarioLab() . '&IdAsignatura=' . $grupo->getIdAsignatura() . '">
                                                                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                            Modificar Horario
                                                                                                            </button>
                                                                                                            </a>
                                                                                                            <a href="borrarHorarioLaboratorio.php?IdHorarioLaboratorio=' . $horario->getIdHorarioLab() . '&IdAsignatura=' . $grupo->getIdAsignatura() . '">
                                                                                                            <button type="button" class="btn btn-danger" id="btn-form">
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
                                                            <h5 class="card-title">Consolidado</h5>
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
                                                                                                                        <td>' . $grupoLaboratorioProfesor->getFechaInicio() . '</td>
                                                                                                                        <td>' . $grupoLaboratorioProfesor->getFechaFin() . '</td>';
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

                                                            <?php if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoLaboratorio() >= 6) { ?>
                                                                <div class="text-right">
                                                                    <?php if ($contextModGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_OK && $contextModGrupoLaboratorioProfesor->getEvent() === FIND_MODGRUPO_LABORATORIO_PROFESOR_OK) { ?>
                                                                        <a href="grupoLaboratorio.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                                Modificar Borrador
                                                                            </button>
                                                                        </a>
                                                                    <?php } ?>
                                                                    <a href="grupoLaboratorio.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
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
                                                                                                if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() >= 6) { ?>
                                                                                                    <a href="horarioClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                                                                            Crear Nuevo Horario
                                                                                                        </button>
                                                                                                    </a>
                                                                                                    <a href="grupoClaseProfesor.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                                                                            Añadir Profesor
                                                                                                        </button>
                                                                                                    </a>
                                                                                                    <a href="grupoClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                                        <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                            Modificar Grupo
                                                                                                        </button>
                                                                                                    </a>
                                                                                                    <a href="borrarGrupoClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                                        <button type="button" class="btn btn-danger" id="btn-form">
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
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7

                                                                                            <?php

<<<<<<< HEAD
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
                                                                                                                <td>' . $modGrupoLaboratorioProfesor->getFechaInicio() . '</td>
                                                                                                                td>' . $modGrupoLaboratorioProfesor->getFechaFin() . '</td>';
                                                                                                                if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) {
                                                                                                                    echo '<td> <a href="grupoLaboratorioProfesor.php?EmailProfesor=' . $modGrupoLaboratorioProfesor->getEmailProfesor() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '&IdGrupoLaboratorio=' . $grupo->getIdGrupoLab() . '">
                                                                                                                    <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                                    Modificar Profesor
                                                                                                                    </button>
                                                                                                                    </a>
                                                                                                                    <a href="borrarGrupoLaboratorioProfesor.php?EmailProfesor=' . $modGrupoLaboratorioProfesor->getEmailProfesor() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '&IdGrupoLaboratorio=' . $grupo->getIdGrupoLab() . '">
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
                                                                                                        <td>' . $horario->getLaboratorio() . '</td>
                                                                                                        <td>' . $horario->getDia() . '</td>
                                                                                                        <td>' . $horario->getHoraInicio() . '-' . $horario->getHoraFin() . '</td>';

                                                                                                        if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoLaboratorio() == true)) {
                                                                                                            echo '<td> <a href="horarioLaboratorio.php?IdHorarioLaboratorio=' . $horario->getIdHorarioLab() . '&IdAsignatura=' . $grupo->getIdAsignatura() . '">
                                                                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                            Modificar Horario
                                                                                                            </button>
                                                                                                            </a>
                                                                                                            <a href="borrarHorarioLaboratorio.php?IdHorarioLaboratorio=' . $horario->getIdHorarioLab() . '&IdAsignatura=' . $grupo->getIdAsignatura() . '">
                                                                                                            <button type="button" class="btn btn-danger" id="btn-form">
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
                                                            <h5 class="card-title">Consolidado</h5>
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
                                                                                                                        <td>' . $grupoLaboratorioProfesor->getFechaInicio() . '</td>
                                                                                                                        <td>' . $grupoLaboratorioProfesor->getFechaFin() . '</td>';
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

                                                            <?php if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoLaboratorio() == true)) { ?>
                                                                <div class="text-right">
                                                                    <?php if ($contextModGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_OK && $contextModGrupoLaboratorioProfesor->getEvent() === FIND_MODGRUPO_LABORATORIO_PROFESOR_OK) { ?>
                                                                        <a href="grupoLaboratorio.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                            <button type="button" class="btn btn-primary" id="btn-form">
                                                                                Modificar Borrador
                                                                            </button>
                                                                        </a>
                                                                    <?php } ?>
                                                                    <a href="grupoLaboratorio.php?IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
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
                                                                                                if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) { ?>
                                                                                                    <a href="horarioClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                                                                            Crear Nuevo Horario
                                                                                                        </button>
                                                                                                    </a>
                                                                                                    <a href="grupoClaseProfesor.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                                                                            Añadir Profesor
                                                                                                        </button>
                                                                                                    </a>
                                                                                                    <a href="grupoClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                        <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                            Modificar Grupo
                                                                                                        </button>
                                                                                                    </a>
                                                                                                    <a href="borrarGrupoClase.php?IdGrupoClase=<?php echo $grupo->getIdGrupoClase(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                                        <button type="button" class="btn btn-danger" id="btn-form">
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
                                                                                                                            <td>' . $modGrupoClaseProfesor->getFechaInicio() . '</td>
                                                                                                                            <td>' . $modGrupoClaseProfesor->getFechaFin() . '</td>';
                                                                                                                            if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) {
                                                                                                                                echo '<td> <a href="grupoClaseProfesor.php?EmailProfesor=' . $modGrupoClaseProfesor->getEmailProfesor() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '&IdGrupoClase=' . $grupo->getIdGrupoClase() . '">
                                                                                                                                <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                                                Modificar Profesor
                                                                                                                                </button>
                                                                                                                                </a>
                                                                                                                                <a href="borrarGrupoClaseProfesor.php?EmailProfesor=' . $modGrupoClaseProfesor->getEmailProfesor() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '&IdGrupoClase=' . $grupo->getIdGrupoClase() . '">
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
                                                                                                                    <td>' . $horario->getAula() . '</td>
                                                                                                                    <td>' . $horario->getDia() . '</td>
                                                                                                                    <td>' . $horario->getHoraInicio() . '-' . $horario->getHoraFin() . '</td>';
                                                                                                                    if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) {
                                                                                                                        echo '<td> <a href="horarioClase.php?IdHorarioClase=' . $horario->getIdHorarioClase() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '">
                                                                                                                        <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                                        Modificar Horario
                                                                                                                        </button>
                                                                                                                        </a>
                                                                                                                        <a href="borrarHorarioClase.php?IdHorarioClase=' . $horario->getIdHorarioClase() . '&IdAsignatura=' . $contextAsignatura->getData()->getIdAsignatura() . '">
                                                                                                                        <button type="button" class="btn btn-danger" id="btn-form">
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

=======
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
                                                                                                                            <td>' . $modGrupoClaseProfesor->getFechaInicio() . '</td>
                                                                                                                            <td>' . $modGrupoClaseProfesor->getFechaFin() . '</td>';
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
                                                                                                                    <td>' . $horario->getAula() . '</td>
                                                                                                                    <td>' . $horario->getDia() . '</td>
                                                                                                                    <td>' . $horario->getHoraInicio() . '-' . $horario->getHoraFin() . '</td>';
                                                                                                                    if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() >= 6) {
                                                                                                                        echo '<td> <a href="horarioClase.php?IdHorarioClase=' . $horario->getIdHorarioClase() . '&IdAsignatura=' . $asignatura->getData()->getIdAsignatura() . '">
                                                                                                                        <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                                        Modificar Horario
                                                                                                                        </button>
                                                                                                                        </a>
                                                                                                                        <a href="borrarHorarioClase.php?IdHorarioClase=' . $horario->getIdHorarioClase() . '&IdAsignatura=' . $asignatura->getData()->getIdAsignatura() . '">
                                                                                                                        <button type="button" class="btn btn-danger" id="btn-form">
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

>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
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
                                                                        <h5 class="card-title">Consolidado</h5>
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
                                                                                                                                    <td>' . $grupoClaseProfesor->getFechaInicio() . '</td>
                                                                                                                                    <td>' . $grupoClaseProfesor->getFechaFin() . '</td>';
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

<<<<<<< HEAD
                                                                        <?php if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoGrupoClase() == true)) { ?>
                                                                            <div class="text-right">
                                                                                <?php if ($contextModGrupoClase->getEvent() === FIND_MODGRUPO_CLASE_OK && $contextModGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_OK) { ?>
                                                                                    <a href="grupoClase.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
=======
                                                                        <?php if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoGrupoClase() >= 6) { ?>
                                                                            <div class="text-right">
                                                                                <?php if ($contextModGrupoClase->getEvent() === FIND_MODGRUPO_CLASE_OK && $contextModGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_OK) { ?>
                                                                                    <a href="grupoClase.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                                                            Modificar Borrador
                                                                                        </button>
                                                                                    </a>
                                                                                <?php } ?>
<<<<<<< HEAD
                                                                                <a href="grupoClase.php?IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
=======
                                                                                <a href="grupoClase.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                                    <button type="button" class="btn btn-success" id="btn-form">
                                                                                        Crear Nuevo Borrador Grupo
                                                                                    </button>
                                                                                </a>

                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
<<<<<<< HEAD

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
                                                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                        Realización exámenes
                                                                                                    </button>
                                                                                                <?php } else { ?>
                                                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                        Realización exámenes
                                                                                                    </button>
                                                                                                <?php } ?>
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
                                                                                                                if ($contextComparacion->getData()['RealizacionExamenes'])
                                                                                                                    echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionExamenes() . '</b>';
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

                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        <h5 class="card-title">Consolidado</h5>
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
                                                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                                                        <div class="card">
                                                                                            <div class="card-header" id="headingTwo">
                                                                                                <?php if ($contextComparacion->getData()['RealizacionExamenesI']) { ?>
                                                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                                                        Realización exámenes (Inglés)
                                                                                                    </button>
                                                                                                <?php } else { ?>
                                                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                                                        Realización exámenes (Inglés)
                                                                                                    </button>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionEvaluacion">
                                                                                                <div class="card-body">
                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <h5 class="card-title">Borrador</h5>
                                                                                                            <p class="card-text">
                                                                                                                <?php
                                                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                                                    if ($contextComparacion->getData()['RealizacionExamenesI'])
                                                                                                                        echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionExamenesI() . '</b>';
                                                                                                                    else
                                                                                                                        echo $contextModEvaluacion->getData()->getRealizacionExamenesI();
                                                                                                                }
                                                                                                                ?>
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <h5 class="card-title">Consolidado</h5>
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

                                                                                <!-- Pestaña realizacion actividades -->
                                                                                <?php if ($contextConfiguracion->getData()->getRealizacionActividades() == true) { ?>
                                                                                    <div class="card">
                                                                                        <div class="card-header" id="headingThree">
                                                                                            <h2 class="mb-0">
                                                                                                <?php if ($contextComparacion->getData()['RealizacionActividades']) { ?>
                                                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                                                        Realización actividades
                                                                                                    </button>
                                                                                                <?php } else { ?>
                                                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                                        Realización actividades
                                                                                                    </button>
                                                                                                <?php } ?>
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
                                                                                                                if ($contextComparacion->getData()['RealizacionActividades'])
                                                                                                                    echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionActividades() . '</b>';
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

                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        <h5 class="card-title">Consolidado</h5>
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
                                                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                                                        <div class="card">
                                                                                            <div class="card-header" id="headingFour">
                                                                                                <h2 class="mb-0">
                                                                                                    <?php if ($contextComparacion->getData()['RealizacionActividadesI']) { ?>
                                                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                                                            Realización actividades (Inglés)
                                                                                                        </button>
                                                                                                    <?php } else { ?>
                                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                                                            Realización actividades (Inglés)
                                                                                                        </button>
                                                                                                    <?php } ?>
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
                                                                                                                    if ($contextComparacion->getData()['RealizacionActividadesI'])
                                                                                                                        echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionActividadesI() . '</b>';
                                                                                                                    else
                                                                                                                        echo $contextModEvaluacion->getData()->getRealizacionActividadesI();
                                                                                                                }
                                                                                                                ?>
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <h5 class="card-title">Consolidado</h5>
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

                                                                                <!-- Pestaña realizacion contextLaboratorio -->
                                                                                <?php if ($contextConfiguracion->getData()->getRealizacionLaboratorio() == true) { ?>
                                                                                    <div class="card">
                                                                                        <div class="card-header" id="headingFive">
                                                                                            <h2 class="mb-0">
                                                                                                <?php if ($contextComparacion->getData()['RealizacionLaboratorio']) { ?>
                                                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                                                        Realización Laboratorio
                                                                                                    </button>
                                                                                                <?php } else { ?>
                                                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                                                        Realización contextLaboratorio
                                                                                                    </button>
                                                                                                <?php } ?>
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
                                                                                                                if ($contextComparacion->getData()['RealizacionLaboratorio'])
                                                                                                                    echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionLaboratorio() . '</b>';
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

                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        <h5 class="card-title">Consolidado</h5>
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

                                                                                    <!-- Pestaña realizacion contextLaboratorio (inglés) -->
                                                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                                                        <div class="card">
                                                                                            <div class="card-header" id="headingSix">
                                                                                                <h2 class="mb-0">
                                                                                                    <?php if ($contextComparacion->getData()['RealizacionLaboratorioI']) { ?>
                                                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                                                                            Realización Laboratorio (Inglés)
                                                                                                        </button>
                                                                                                    <?php } else { ?>
                                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                                                            Realización contextLaboratorio (Inglés)
                                                                                                        </button>
                                                                                                    <?php } ?>
                                                                                                </h2>
                                                                                            </div>
                                                                                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionEvaluacion">
                                                                                                <div class="card-body">
                                                                                                    <div class="card">
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
                                                                                <?php if ($contextConfiguracion->getData()->getCalificacionFinal() == true) { ?>
                                                                                    <div class="card">
                                                                                        <div class="card-header" id="headingSeven">
                                                                                            <h2 class="mb-0">
                                                                                                <?php if ($contextComparacion->getData()['CalificacionFinal']) { ?>
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
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        <h5 class="card-title">Borrador</h5>
                                                                                                        <p class="card-text">
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
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Pestaña calificacion final ordinaria (inglés) -->
                                                                                    <?php if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                                                        <div class="card">
                                                                                            <div class="card-header" id="headingEight">
                                                                                                <h2 class="mb-0">
                                                                                                    <?php if ($contextComparacion->getData()['CalificacionFinalI']) { ?>
                                                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                                                                            Calificación final ordinaria (Inglés)
                                                                                                        </button>
                                                                                                    <?php } else { ?>
                                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                                                            Calificación final ordinaria (Inglés)
                                                                                                        </button>
                                                                                                    <?php } ?>
                                                                                                </h2>
                                                                                            </div>
                                                                                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionEvaluacion">
                                                                                                <div class="card-body">
                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <h5 class="card-title">Borrador</h5>
                                                                                                            <p class="card-text">
                                                                                                                <?php
                                                                                                                if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                                                    if ($contextComparacion->getData()['CalificacionFinalI'])
                                                                                                                        echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getCalificacionFinalI() . '</b>';
                                                                                                                    else
                                                                                                                        echo $contextModEvaluacion->getData()->getCalificacionFinalI();
                                                                                                                }
                                                                                                                ?>
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <h5 class="card-title">Consolidado</h5>
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
                                                                            </div>

                                                                            <?php if ($contextAsignatura->getData()->getEstado()==="B" && ($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['coordinacion'] == true || unserialize($_SESSION['asignaturas'][$contextGrado->getData()->getCodigoGrado()][$contextAsignatura->getData()->getIdAsignatura()]['permisos'])->getPermisoEvaluacion() == true)) { ?>
                                                                                <div class="text-right">

                                                                                    <a href="evaluacion.php?IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                                                            Crear Nuevo Borrador
                                                                                        </button>
                                                                                    </a>
                                                                                    <?php if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) { ?>
                                                                                        <a href="evaluacion.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                Modificar Borrador
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="borrarEvaluacion.php?IdModAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
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
                                                                                <div class="card-header" id="headingOne">
                                                                                    <h2 class="mb-0">
                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                                            Configuración
                                                                                        </button>
                                                                                    </h2>
                                                                                </div>
                                                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCoordinacion">
                                                                                    <div class="card-body">
                                                                                        <div class="card">
                                                                                            <div class="card">
                                                                                                <div class="card-body">
                                                                                                    <p class="card-text">
                                                                                                        <?php
                                                                                                        if ($contextConfiguracion->getData()->getConocimientosPrevios()) {
                                                                                                            echo '<p>✔️<b>Conocimientos Previos</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Conocimientos Previos</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getBreveDescripcion()) {
                                                                                                            echo '<p>✔️<b>Breve Descripción</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Breve Descripción</p>';
                                                                                                        }


                                                                                                        if ($contextConfiguracion->getData()->getProgramaTeorico()) {
                                                                                                            echo '<p>✔️<b>Programa Teorico</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Programa Teorico</p>';
                                                                                                        }
=======

                                                                    <!--Pestaña evaluacion-->
                                                                    <?php if ($verEvaluacion) { ?>
                                                                        <div class="tab-pane fade" id="nav-evaluacion" role="tabpanel" aria-labelledby="nav-evaluacion-tab">
                                                                            <div class="accordion" id="accordionEvaluacion">

                                                                                <!-- Pestaña realizacion examenes -->
                                                                                <?php if ($contextConfiguracion->getData()->getRealizacionExamenes() == 1) { ?>
                                                                                    <div class="card">
                                                                                        <div class="card-header" id="headingOne">
                                                                                            <h2 class="mb-0">
                                                                                                <?php if ($contextComparacion->getData()['RealizacionExamenes'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                        Realización exámenes
                                                                                                    </button>
                                                                                                <?php } else { ?>
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
                                                                                                                    if ($contextComparacion->getData()['RealizacionExamenes'])
                                                                                                                        echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionExamenes() . '</b>';
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
                                                                                                        <h5 class="card-title">Consolidado</h5>
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
                                                                                                <?php if ($contextComparacion->getData()['RealizacionExamenesI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                                                        Realización exámenes (Inglés)
                                                                                                    </button>
                                                                                                <?php } else { ?>
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
                                                                                                                        if ($contextComparacion->getData()['RealizacionExamenesI'])
                                                                                                                            echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionExamenesI() . '</b>';
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
                                                                                                            <h5 class="card-title">Consolidado</h5>
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

                                                                                <!-- Pestaña realizacion actividades -->
                                                                                <?php if ($contextConfiguracion->getData()->getRealizacionActividades() == 1) { ?>
                                                                                    <div class="card">
                                                                                        <div class="card-header" id="headingThree">
                                                                                            <h2 class="mb-0">
                                                                                                <?php if ($contextComparacion->getData()['RealizacionActividades'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                                                        Realización actividades
                                                                                                    </button>
                                                                                                <?php } else { ?>
                                                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                                        Realización actividades
                                                                                                    </button>
                                                                                                <?php } ?>
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
                                                                                                                    if ($contextComparacion->getData()['RealizacionActividades'])
                                                                                                                        echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionActividades() . '</b>';
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
                                                                                                        <h5 class="card-title">Consolidado</h5>
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
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7

                                                                                    <!-- Pestaña realizacion actividades (inglés) -->
                                                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                                                        <div class="card">
                                                                                            <div class="card-header" id="headingFour">
                                                                                                <h2 class="mb-0">
                                                                                                    <?php if ($contextComparacion->getData()['RealizacionActividadesI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                                                            Realización actividades (Inglés)
                                                                                                        </button>
                                                                                                    <?php } else { ?>
                                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                                                            Realización actividades (Inglés)
                                                                                                        </button>
                                                                                                    <?php } ?>
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
                                                                                                                        if ($contextComparacion->getData()['RealizacionActividadesI'])
                                                                                                                            echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionActividadesI() . '</b>';
                                                                                                                        else
                                                                                                                            echo $contextModEvaluacion->getData()->getRealizacionActividadesI();
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
                                                                                        <div class="card-header" id="headingFive">
                                                                                            <h2 class="mb-0">
                                                                                                <?php if ($contextComparacion->getData()['RealizacionLaboratorio'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                                    <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                                                        Realización Laboratorio
                                                                                                    </button>
                                                                                                <?php } else { ?>
                                                                                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                                                        Realización laboratorio
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
                                                                                                                    if ($contextComparacion->getData()['RealizacionLaboratorio'])
                                                                                                                        echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getRealizacionLaboratorio() . '</b>';
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
                                                                                                        <h5 class="card-title">Consolidado</h5>
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

<<<<<<< HEAD
                                                                                                        if ($contextConfiguracion->getData()->getComGenerales()) {
                                                                                                            echo '<p>✔️<b>Generales</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Generales</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getComEspecificas()) {
                                                                                                            echo '<p>✔️<b>Específicas</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Específicas</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getComBasicas()) {
                                                                                                            echo '<p>✔️<b>Básicas y Transversales</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Básicas y Transversales</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getResultadosAprendizaje()) {
                                                                                                            echo '<p>✔️<b>Resultados Aprendizaje</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Resultados aprendizaje</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getMetodologia()) {
                                                                                                            echo '<p>✔️<b>Metodología</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Metodología</p>';
                                                                                                        }
                                                                                                        if ($contextConfiguracion->getData()->getCitasBibliograficas()) {
                                                                                                            echo '<p>✔️<b>Citas Bibliográficas</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Citas Bibliográficas</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getRecursosInternet()) {
                                                                                                            echo '<p>✔️<b>Recursos en Internet</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Recursos en Internet</p>';
                                                                                                        }

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

                                                                                                        if ($contextConfiguracion->getData()->getRealizacionActividades()) {
                                                                                                            echo '<p>✔️<b>Realización de Activiades</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Realización de Actividades</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getRealizacionLaboratorio()) {
                                                                                                            echo '<p>✔️<b>Realización de Laboratorio</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Realización de Laboratorio</p>';
                                                                                                        }
                                                                                                        ?>
                                                                                                        <div class="text-right">
                                                                                                            <a href="configuracion.php?idAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
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

                                                                                                    $context = new es\ucm\Context(FIND_PERMISOS, $contextAsignatura->getData()->getIdAsignatura());
                                                                                                    $permisos = $controller->action($context);
                                                                                                    foreach ($permisos->getData() as $permiso) {
                                                                                                        $context = new es\ucm\Context(FIND_PROFESOR, $permiso->getEmailProfesor());
                                                                                                        $profesor = $controller->action($context);
                                                                                                        echo '<div><h5>' . $profesor->getData()->getNombre() . '</h5>
                                                                                                        <a href="permisos.php?emailProfesor=' . $permiso->getEmailProfesor() . '&idAsignatura=' . $permiso->getIdAsignatura() . '">
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
                                                                                                        if ($permiso->getPermisoPrograma() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoCompetencias() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoMetodologia() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoBibliografia() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoGrupoLaboratorio() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoGrupoClase() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoEvaluacion() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }


                                                                                                        echo '</tr> 
                                                                                                        </tbody>
                                                                                                        </table>
                                                                                                        </div>';
                                                                                                    } ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
=======
                                                                                    <!-- Pestaña realizacion laboratorio (inglés) -->
                                                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                                                        <div class="card">
                                                                                            <div class="card-header" id="headingSix">
                                                                                                <h2 class="mb-0">
                                                                                                    <?php if ($contextComparacion->getData()['RealizacionLaboratorioI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                                                                            Realización Laboratorio (Inglés)
                                                                                                        </button>
                                                                                                    <?php } else { ?>
                                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                                                            Realización laboratorio (Inglés)
                                                                                                        </button>
                                                                                                    <?php } ?>
                                                                                                </h2>
                                                                                            </div>
                                                                                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionEvaluacion">
                                                                                                <div class="card-body">
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
                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <h5 class="card-title">Borrador</h5>
                                                                                                            <p class="card-text">
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
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Pestaña calificacion final ordinaria (inglés) -->
                                                                                    <?php if (!is_null($asignatura->getData()->getNombreAsignaturaIngles())) { ?>
                                                                                        <div class="card">
                                                                                            <div class="card-header" id="headingEight">
                                                                                                <h2 class="mb-0">
                                                                                                    <?php if ($contextComparacion->getData()['CalificacionFinalI'] && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                                        <button class="btn btn-link text-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                                                                            Calificación final ordinaria (Inglés)
                                                                                                        </button>
                                                                                                    <?php } else { ?>
                                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                                                            Calificación final ordinaria (Inglés)
                                                                                                        </button>
                                                                                                    <?php } ?>
                                                                                                </h2>
                                                                                            </div>
                                                                                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionEvaluacion">
                                                                                                <div class="card-body">
                                                                                                    <?php if (unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 4) { ?>
                                                                                                        <div class="card">
                                                                                                            <div class="card-body">
                                                                                                                <h5 class="card-title">Borrador</h5>
                                                                                                                <p class="card-text">
                                                                                                                    <?php
                                                                                                                    if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                                                                                        if ($contextComparacion->getData()['CalificacionFinalI'])
                                                                                                                            echo '<b style="font-size: 18px">' . $contextModEvaluacion->getData()->getCalificacionFinalI() . '</b>';
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
                                                                                                            <h5 class="card-title">Consolidado</h5>
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
                                                                            </div>

                                                                            <?php if ($asignatura->getData()->getEstado()==="B" && unserialize($_SESSION['permisos'][$asignatura->getData()->getIdAsignatura()])->getPermisoEvaluacion() >= 6) { ?>
                                                                                <div class="text-right">

                                                                                    <a href="evaluacion.php?IdAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                        <button type="button" class="btn btn-success" id="btn-form">
                                                                                            Crear Nuevo Borrador
                                                                                        </button>
                                                                                    </a>
                                                                                    <?php if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK) { ?>
                                                                                        <a href="evaluacion.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
                                                                                            <button type="button" class="btn btn-warning" id="btn-form">
                                                                                                Modificar Borrador
                                                                                            </button>
                                                                                        </a>
                                                                                        <a href="borrarEvaluacion.php?IdModAsignatura=<?php echo $asignatura->getData()->getIdAsignatura(); ?>">
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
                                                                    <?php if (strpos($asignatura->getData()->getCoordinadorAsignatura(), $_SESSION['idUsuario']) !== false) { ?>
                                                                        <div class="tab-pane fade" id="nav-coordinacion" role="tabpanel" aria-labelledby="nav-coordinacion-tab">
                                                                            <div class="accordion" id="accordionCoordinacion">
                                                                                <div class="card-header" id="headingOne">
                                                                                    <h2 class="mb-0">
                                                                                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                                            Configuración
                                                                                        </button>
                                                                                    </h2>
                                                                                </div>
                                                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCoordinacion">
                                                                                    <div class="card-body">
                                                                                        <div class="card">
                                                                                            <div class="card">
                                                                                                <div class="card-body">
                                                                                                    <p class="card-text">
                                                                                                        <?php
                                                                                                        if ($contextConfiguracion->getData()->getConocimientosPrevios()) {
                                                                                                            echo '<p>✔️<b>Conocimientos Previos</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Conocimientos Previos</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getBreveDescripcion()) {
                                                                                                            echo '<p>✔️<b>Breve Descripción</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Breve Descripción</p>';
                                                                                                        }


                                                                                                        if ($contextConfiguracion->getData()->getProgramaTeorico()) {
                                                                                                            echo '<p>✔️<b>Programa Teorico</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Programa Teorico</p>';
                                                                                                        }


                                                                                                        if ($contextConfiguracion->getData()->getComGenerales()) {
                                                                                                            echo '<p>✔️<b>Generales</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Generales</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getComEspecificas()) {
                                                                                                            echo '<p>✔️<b>Específicas</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Específicas</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getComBasicas()) {
                                                                                                            echo '<p>✔️<b>Básicas y Transversales</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Básicas y Transversales</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getResultadosAprendizaje()) {
                                                                                                            echo '<p>✔️<b>Resultados Aprendizaje</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Resultados aprendizaje</p>';
                                                                                                        }

                                                                                                        if ($contextConfiguracion->getData()->getMetodologia()) {
                                                                                                            echo '<p>✔️<b>Metodología</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Metodología</p>';
                                                                                                        }
                                                                                                        if ($contextConfiguracion->getData()->getCitasBibliograficas()) {
                                                                                                            echo '<p>✔️<b>Citas Bibliográficas</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Citas Bibliográficas</p>';
                                                                                                        }
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7

                                                                                                        if ($contextConfiguracion->getData()->getRecursosInternet()) {
                                                                                                            echo '<p>✔️<b>Recursos en Internet</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Recursos en Internet</p>';
                                                                                                        }

<<<<<<< HEAD
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

                                                                                                        if ($contextConfiguracion->getData()->getRealizacionActividades()) {
                                                                                                            echo '<p>✔️<b>Realización de Activiades</b></p>';
                                                                                                        } else {
                                                                                                            echo '<p>❌Realización de Actividades</p>';
                                                                                                        }
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7

                                                                                                        if ($contextConfiguracion->getData()->getRealizacionLaboratorio()) {
                                                                                                            echo '<p>✔️<b>Realización de Laboratorio</b></p>';
                                                                                                        } else {
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
                                                                                                    $permisos = $controller->action($context);
                                                                                                    foreach ($permisos->getData() as $permiso) {
                                                                                                        $context = new es\ucm\Context(FIND_PROFESOR, $permiso->getEmailProfesor());
                                                                                                        $profesor = $controller->action($context);
                                                                                                        echo '<div><h5>' . $profesor->getData()->getNombre() . '</h5>
                                                                                                        <a href="permisos.php?emailProfesor=' . $permiso->getEmailProfesor() . '&idAsignatura=' . $permiso->getIdAsignatura() . '">
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
                                                                                                        if ($permiso->getPermisoPrograma() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoPrograma() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoCompetencias() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoCompetencias() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoMetodologia() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoMetodologia() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoBibliografia() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoBibliografia() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoGrupoLaboratorio() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoLaboratorio() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoGrupoClase() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoGrupoClase() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }
                                                                                                        if ($permiso->getPermisoEvaluacion() === '0') {
                                                                                                            echo '<td>❌</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '1') {
                                                                                                            echo '<td>Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '2') {
                                                                                                            echo '<td>Modificación</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '3') {
                                                                                                            echo '<td>Administración y Modificación </td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '4') {
                                                                                                            echo '<td>Lectura</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '5') {
                                                                                                            echo '<td>Lectura y Administración</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '6') {
                                                                                                            echo '<td>Lectura y Modificacion</td>';
                                                                                                        } elseif ($permiso->getPermisoEvaluacion() === '7') {
                                                                                                            echo '<td>Todos</td>';
                                                                                                        }

                                                                                <!--getionprofesores-->

                                                                                                        echo '</tr> 
                                                                                                        </tbody>
                                                                                                        </table>
                                                                                                        </div>';
                                                                                                    } ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>



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

                                                                                                    $context = new es\ucm\Context(FIND_PERMISOS, $contextAsignatura->getData()->getIdAsignatura());
                                                                                                    $permisos = $controller->action($context);

<<<<<<< HEAD
                                                                                                    echo '<div><h5>Profesores de la asignatura ' . $contextAsignatura->getData()->getNombreAsignatura() . '</h5>
                                                                                                    <a href="addProfesor.php?idAsignatura=' . $permiso->getIdAsignatura() . '">
                                                                                                    <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                    Añadir Profesor
                                                                                                    </button>
                                                                                                    </a>
                                                                                                    </div>';
                                                                                                    foreach ($permisos->getData() as $permiso) {
                                                                                                        $context = new es\ucm\Context(FIND_PROFESOR, $permiso->getEmailProfesor());
                                                                                                        $profesor = $controller->action($context);
                                                                                                        echo '<p>' . $profesor->getData()->getNombre() . ' - ' . $permiso->getEmailProfesor() . '
                                                                                                        <a href="eliminarProfesor.php?emailProfesor=' . $permiso->getEmailProfesor() . '&idAsignatura=' . $permiso->getIdAsignatura() . '">
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
=======


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
>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7

                                                                                                    $context = new es\ucm\Context(FIND_PERMISOS, $asignatura->getData()->getIdAsignatura());
                                                                                                    $permisos = $controller->action($context);

                                                                                                    echo '<div><h5>Profesores de la asignatura ' . $asignatura->getData()->getNombreAsignatura() . '</h5>
                                                                                                    <a href="addProfesor.php?idAsignatura=' . $permiso->getIdAsignatura() . '">
                                                                                                    <button type="button" class="btn btn-primary" id="btn-form">
                                                                                                    Añadir Profesor
                                                                                                    </button>
                                                                                                    </a>
                                                                                                    </div>';
                                                                                                    foreach ($permisos->getData() as $permiso) {
                                                                                                        $context = new es\ucm\Context(FIND_PROFESOR, $permiso->getEmailProfesor());
                                                                                                        $profesor = $controller->action($context);
                                                                                                        echo '<p>' . $profesor->getData()->getNombre() . ' - ' . $permiso->getEmailProfesor() . '
                                                                                                        <a href="eliminarProfesor.php?emailProfesor=' . $permiso->getEmailProfesor() . '&idAsignatura=' . $permiso->getIdAsignatura() . '">
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

<<<<<<< HEAD
=======

                                                                        </div>
                                                                    </div>


>>>>>>> efe7b7f1c9ba2851e2735cddfc08d753fa690bb7
                                                                </div>



                                <!-- <div class="text-right">
                                                <a href="verificacion.php?idAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                                                    <button type="button" class="btn btn-suscess" id="btn-form">
                                                    Validar datos
                                                    </button>
                                                    </a>
                                                </div>  -->
                                            </div>


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
                                        } elseif (isset($_GET['eliminado']) && $_GET['eliminado'] === "y") {
                                            echo '<div class="alert alert-success" role="alert">
                                            <h5 class="text-center">Se ha eliminado correctamente</h5>
                                            </div>';
                                        } elseif (isset($_GET['eliminado']) && $_GET['eliminado'] === "n") {
                                            echo '<div class="alert alert-danger" role="alert">
                                            <h5 class="text-center">Se ha producido un error de eliminacion en el borrador</h5>
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