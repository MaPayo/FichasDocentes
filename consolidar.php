<?php

namespace es\ucm;

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
  <title>Gestión Docente: Consolidar la asignatura</title>
</head>

<body>
  <div class="container-fluid">
    <?php
    require_once('includes/Presentacion/Vistas/html/cabecera.php');
    ?>
    <div class="row justify-content-center align-items-center">
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
        if (isset($_GET['IdAsignatura']) && isset($_GET['IdGrado'])) {
          $IdAsignatura = htmlspecialchars(trim(strip_tags($_GET['IdAsignatura'])));
          $IdGrado = htmlspecialchars(trim(strip_tags($_GET['IdGrado'])));

          $controller = new ControllerImplements();
          $context = new Context(FIND_ASIGNATURA, $IdAsignatura);
          $contextAsignatura = $controller->action($context);

          if ($contextAsignatura->getEvent() === FIND_ASIGNATURA_OK && isset($_SESSION['asignaturas'][$IdGrado][$IdAsignatura]['coordinacion']) && $_SESSION['asignaturas'][$IdGrado][$IdAsignatura]['coordinacion'] == true) {


            $context = new Context(FIND_MODPROGRAMA_ASIGNATURA, $IdAsignatura);
            $contextModPrograma = $controller->action($context);
            $context = new Context(FIND_PROGRAMA_ASIGNATURA, $IdAsignatura);
            $contextPrograma = $controller->action($context);
            if ($contextModPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK & $contextPrograma->getEvent() === FIND_PROGRAMA_ASIGNATURA_OK) {

              $programa = new ProgramaAsignatura(
                $contextPrograma->getData()->getIdPrograma(),
                $contextModPrograma->getData()->getConocimientosPrevios(),
                $contextModPrograma->getData()->getConocimientosPreviosI(),
                $contextModPrograma->getData()->getBreveDescripcion(),
                $contextModPrograma->getData()->getBreveDescripcionI(),
                $contextModPrograma->getData()->getProgramaTeorico(),
                $contextModPrograma->getData()->getProgramaTeoricoI(),
                $contextModPrograma->getData()->getProgramaSeminarios(),
                $contextModPrograma->getData()->getProgramaSeminariosI(),
                $contextModPrograma->getData()->getProgramaLaboratorio(),
                $contextModPrograma->getData()->getProgramaLaboratorioI(),
                $IdAsignatura
              );

              $context = new Context(UPDATE_PROGRAMA_ASIGNATURA, $programa);
              $contextPrograma = $controller->action($context);
              $context = new Context(DELETE_MODPROGRAMA_ASIGNATURA, $IdAsignatura);
              $contextPrograma = $controller->action($context);
            }

            $context = new Context(FIND_MODCOMPETENCIAS_ASIGNATURA, $IdAsignatura);
            $contextModCompetencias = $controller->action($context);
            $context = new Context(FIND_COMPETENCIAS_ASIGNATURA, $IdAsignatura);
            $contextCompetencias = $controller->action($context);
            if ($contextModCompetencias->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK & $contextCompetencias->getEvent() === FIND_COMPETENCIAS_ASIGNATURA_OK) {
              $competencia = new CompetenciaAsignatura(
                $contextCompetencias->getData()->getIdCompetencia(),
                $contextModCompetencias->getData()->getGenerales(),
                $contextModCompetencias->getData()->getGeneralesI(),
                $contextModCompetencias->getData()->getEspecificas(),
                $contextModCompetencias->getData()->getEspecificasI(),
                $contextModCompetencias->getData()->getBasicasYTransversales(),
                $contextModCompetencias->getData()->getBasicasYTransversalesI(),
                $contextModCompetencias->getData()->getResultadosAprendizaje(),
                $contextModCompetencias->getData()->getResultadosAprendizajeI(),
                $IdAsignatura
              );

              $context = new Context(UPDATE_COMPETENCIAS_ASIGNATURA, $competencia);
              $contextCompetencias = $controller->action($context);
              $context = new Context(DELETE_MODCOMPETENCIAS_ASIGNATURA, $IdAsignatura);
              $contextCompetencias = $controller->action($context);
            }

            $context = new Context(FIND_MODMETODOLOGIA, $IdAsignatura);
            $contextModMetodologia = $controller->action($context);
            $context = new Context(FIND_METODOLOGIA, $IdAsignatura);
            $contextMetodologia = $controller->action($context);
            if ($contextModMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK & $contextMetodologia->getEvent() === FIND_METODOLOGIA_OK) {
              $metodologia = new Metodologia(
                $contextMetodologia->getData()->getIdMetodologia(),
                $contextModMetodologia->getData()->getMetodologia(),
                $contextModMetodologia->getData()->getMetodologiaI(),
                $IdAsignatura
              );

              $context = new Context(UPDATE_METODOLOGIA, $metodologia);
              $contextMetodologia = $controller->action($context);
              $context = new Context(DELETE_MODMETODOLOGIA, $IdAsignatura);
              $contextMetodologia = $controller->action($context);
            }

            $context = new Context(FIND_MODBIBLIOGRAFIA, $IdAsignatura);
            $contextModBibliografia = $controller->action($context);
            $context = new Context(FIND_BIBLIOGRAFIA, $IdAsignatura);
            $contextBibliografia = $controller->action($context);
            if ($contextModBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK & $contextBibliografia->getEvent() === FIND_BIBLIOGRAFIA_OK) {
              $bibliografia = new Bibliografia(
                $contextBibliografia->getData()->getIdBibliografia(),
                $contextModBibliografia->getData()->getCitasBibliograficas(),
                $contextModBibliografia->getData()->getRecursosInternet(),
                $IdAsignatura
              );
              $context = new Context(UPDATE_BIBLIOGRAFIA, $bibliografia);
              $contextBibliografia = $controller->action($context);
              $context = new Context(DELETE_MODBIBLIOGRAFIA, $IdAsignatura);
              $contextBibliografia = $controller->action($context);
            }


            $context = new Context(LIST_MODGRUPO_LABORATORIO, $IdAsignatura);
            $contextLaboratorio = $controller->action($context);
            if ($contextLaboratorio->getEvent() === LIST_MODGRUPO_LABORATORIO_OK) {

              $context = new Context(LIST_GRUPO_LABORATORIO, $IdAsignatura);
              $deletelab = $controller->action($context);
              if ($deletelab->getEvent() === LIST_GRUPO_LABORATORIO_OK) {

                foreach ($deletelab->getData() as $lab) {

                  $context = new Context(LIST_HORARIO_LABORATORIO, $lab->getIdGrupoLab());
                  $deletehor = $controller->action($context);
                  if ($deletehor->getEvent() === LIST_HORARIO_LABORATORIO_OK) {
                    foreach ($deletehor->getData() as $hor) {
                      $context = new Context(DELETE_HORARIO_LABORATORIO, $hor->getIdHorarioLab());
                      $delete = $controller->action($context);
                    }
                  }

                  $context = new Context(LIST_GRUPO_LABORATORIO_PROFESOR, $lab->getIdGrupoLab());
                  $deleteprof = $controller->action($context);
                  if ($deleteprof->getEvent() === LIST_GRUPO_LABORATORIO_PROFESOR_OK) {
                    foreach ($deleteprof->getData() as $prof) {
                      $arrayGrupoLaboratorioProfesor = array();
                      $arrayGrupoLaboratorioProfesor['idGrupoLaboratorio'] = $prof->getIdGrupoLab();
                      $arrayGrupoLaboratorioProfesor['emailProfesor'] = $prof->getEmailProfesor();
                      $context = new Context(DELETE_GRUPO_LABORATORIO_PROFESOR, $arrayGrupoLaboratorioProfesor);
                      $delete = $controller->action($context);
                    }
                  }

                  $context = new Context(DELETE_GRUPO_LABORATORIO, $lab->getIdGrupoLab());
                  $delete = $controller->action($context);
                }
              }

              foreach ($contextLaboratorio->getData() as $modlab) {
                $laboratorio = new GrupoLaboratorio(
                  $modlab->getIdGrupoLab(),
                  $modlab->getLetra(),
                  $modlab->getIdioma(),
                  $IdAsignatura
                );
                $context = new Context(CREATE_GRUPO_LABORATORIO, $laboratorio);
                $update = $controller->action($context);

                $context = new Context(LIST_MODHORARIO_LABORATORIO, $modlab->getIdGrupoLab());
                $updatehor = $controller->action($context);
                if ($updatehor->getEvent() === LIST_MODHORARIO_LABORATORIO_OK) {
                  foreach ($updatehor->getData() as $hor) {
                    $context = new Context(CREATE_HORARIO_LABORATORIO, $hor);
                    $update = $controller->action($context);
                    $context = new Context(DELETE_MODHORARIO_LABORATORIO, $hor->getIdHorarioLab());
                    $delete = $controller->action($context);
                  }
                }

                $context = new Context(LIST_MODGRUPO_LABORATORIO_PROFESOR, $modlab->getIdGrupoLab());
                $updateprof = $controller->action($context);
                if ($updateprof->getEvent() === LIST_MODGRUPO_LABORATORIO_PROFESOR_OK) {
                  foreach ($updateprof->getData() as $prof) {
                    $context = new Context(CREATE_GRUPO_LABORATORIO_PROFESOR, $prof);
                    $update = $controller->action($context);
                    $arrayGrupoLaboratorioProfesor = array();
                    $arrayGrupoLaboratorioProfesor['idGrupoLaboratorio'] = $prof->getIdGrupoLab();
                    $arrayGrupoLaboratorioProfesor['emailProfesor'] = $prof->getEmailProfesor();
                    $context = new Context(DELETE_MODGRUPO_LABORATORIO_PROFESOR, $arrayGrupoLaboratorioProfesor);
                    $delete = $controller->action($context);
                  }
                }

                $context = new Context(DELETE_MODGRUPO_LABORATORIO, $modlab->getIdGrupoLab());
                $delete = $controller->action($context);
              }
            }




            $context = new Context(LIST_MODGRUPO_CLASE, $IdAsignatura);
            $contextClase = $controller->action($context);
            if ($contextClase->getEvent() === LIST_MODGRUPO_CLASE_OK) {

              $context = new Context(LIST_GRUPO_CLASE, $IdAsignatura);
              $deleteclase = $controller->action($context);
              if ($deleteclase->getEvent() === LIST_GRUPO_CLASE_OK) {

                foreach ($deleteclase->getData() as $clase) {

                  $context = new Context(LIST_HORARIO_CLASE, $clase->getIdGrupoClase());
                  $deletehor = $controller->action($context);
                  if ($deletehor->getEvent() === LIST_HORARIO_CLASE_OK) {
                    foreach ($deletehor->getData() as $hor) {
                      $context = new Context(DELETE_HORARIO_CLASE, $hor->getIdHorarioClase());
                      $delete = $controller->action($context);
                    }
                  }

                  $context = new Context(LIST_GRUPO_CLASE_PROFESOR, $clase->getIdGrupoClase());
                  $deleteprof = $controller->action($context);
                  if ($deleteprof->getEvent() === LIST_GRUPO_CLASE_PROFESOR_OK) {
                    foreach ($deleteprof->getData() as $prof) {
                      $arrayGrupoClaseProfesor = array();
                      $arrayGrupoClaseProfesor['idGrupoClase'] = $prof->getIdGrupoClase();
                      $arrayGrupoClaseProfesor['emailProfesor'] = $prof->getEmailProfesor();
                      $context = new Context(DELETE_GRUPO_CLASE_PROFESOR, $arrayGrupoClaseProfesor);
                      $delete = $controller->action($context);
                    }
                  }

                  $context = new Context(DELETE_GRUPO_CLASE, $clase->getIdGrupoClase());
                  $delete = $controller->action($context);
                }
              }

              foreach ($contextClase->getData() as $modclase) {
                $clase = new GrupoClase(
                  $modclase->getIdGrupoClase(),
                  $modclase->getLetra(),
                  $modclase->getIdioma(),
                  $IdAsignatura
                );
                $context = new Context(CREATE_GRUPO_CLASE, $clase);
                $update = $controller->action($context);

                $context = new Context(LIST_MODHORARIO_CLASE, $modclase->getIdGrupoClase());
                $updatehor = $controller->action($context);
                if ($updatehor->getEvent() === LIST_MODHORARIO_CLASE_OK) {
                  foreach ($updatehor->getData() as $hor) {
                    $context = new Context(CREATE_HORARIO_CLASE, $hor);
                    $update = $controller->action($context);
                    $context = new Context(DELETE_MODHORARIO_CLASE, $hor->getIdHorarioClase());
                    $delete = $controller->action($context);
                  }
                }

                $context = new Context(LIST_MODGRUPO_CLASE_PROFESOR, $modclase->getIdGrupoClase());
                $updateprof = $controller->action($context);
                if ($updateprof->getEvent() === LIST_MODGRUPO_CLASE_PROFESOR_OK) {
                  foreach ($updateprof->getData() as $prof) {
                    $context = new Context(CREATE_GRUPO_CLASE_PROFESOR, $prof);
                    $update = $controller->action($context);
                    $arrayGrupoClaseProfesor = array();
                    $arrayGrupoClaseProfesor['idGrupoClase'] = $prof->getIdGrupoClase();
                    $arrayGrupoClaseProfesor['emailProfesor'] = $prof->getEmailProfesor();
                    $context = new Context(DELETE_MODGRUPO_CLASE_PROFESOR, $arrayGrupoClaseProfesor);
                    $delete = $controller->action($context);
                  }
                }

                $context = new Context(DELETE_MODGRUPO_CLASE, $modclase->getIdGrupoClase());
                $delete = $controller->action($context);
              }
            }



            $context = new Context(FIND_MODEVALUACION, $IdAsignatura);
            $contextModEvaluacion = $controller->action($context);
            $context = new Context(FIND_EVALUACION, $IdAsignatura);
            $contextEvaluacion = $controller->action($context);
            if ($contextModEvaluacion->getEvent() === FIND_MODEVALUACION_OK & $contextEvaluacion->getEvent() === FIND_EVALUACION_OK) {
              $evaluacion = new Evaluacion(
                $contextEvaluacion->getData()->getIdEvaluacion(),
                $contextModEvaluacion->getData()->getRealizacionExamenes(),
                $contextModEvaluacion->getData()->getRealizacionExamenesI(),
                $contextModEvaluacion->getData()->getPesoExamenes(),
                $contextModEvaluacion->getData()->getRealizacionActividades(),
                $contextModEvaluacion->getData()->getRealizacionActividadesI(),
                $contextModEvaluacion->getData()->getPesoActividades(),
                $contextModEvaluacion->getData()->getRealizacionLaboratorio(),
                $contextModEvaluacion->getData()->getRealizacionLaboratorioI(),
                $contextModEvaluacion->getData()->getPesoLaboratorio(),
                $contextModEvaluacion->getData()->getCalificacionFinal(),
                $contextModEvaluacion->getData()->getCalificacionFinalI(),
                $IdAsignatura
              );
              $context = new Context(UPDATE_EVALUACION, $evaluacion);
              $contextEvaluacion = $controller->action($context);
              $context = new Context(DELETE_MODEVALUACION, $IdAsignatura);
              $contextEvaluacion = $controller->action($context);
            }


            $asignatura = new Asignatura(
              $contextAsignatura->getData()->getIdAsignatura(),
              $contextAsignatura->getData()->getNombreAsignatura(),
              $contextAsignatura->getData()->getAbreviatura(),
              $contextAsignatura->getData()->getCurso(),
              $contextAsignatura->getData()->getSemestre(),
              $contextAsignatura->getData()->getNombreAsignaturaIngles(),
              $contextAsignatura->getData()->getCreditos(),
              $contextAsignatura->getData()->getCoordinadorAsignatura(),
              "C",
              $contextAsignatura->getData()->getActivo(),
              $contextAsignatura->getData()->getIdMateria()
            );

            $context = new Context(UPDATE_ASIGNATURA, $asignatura);
            $res = $controller->action($context);

            if ($res->getEvent() === UPDATE_ASIGNATURA_OK) {
              header('Location: indexAcceso.php?IdGrado=' . $IdGrado . '&IdAsignatura=' . $IdAsignatura . '&modificado=y');
            } else {
              header('Location: indexAcceso.php?IdGrado=' . $IdGrado . '&IdAsignatura=' . $IdAsignatura . '&modificado=n');
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
          <h5 class="text-center">No se ha podido obtener la información necesaria para realizar la operación</h5>
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
</body>

</html>