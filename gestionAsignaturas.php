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
  <title>Gestión Docente: Panel de control</title>
</head>

<body>

  <div class="container-fluid">
    <?php
    require_once('includes/Presentacion/Vistas/html/cabecera_admin.php');
    ?>
    <div class="row justify-content-center">
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
      ?>
        <div class="col-md-3 col-12">
          <div class="card">
            <div class="card-header text-center">
              <h3>Listado de asignaturas por Grado</h3>
            </div>
            <div class="card-body">
              <div class="accordion" id="accordionListaAsignaturasPorGrado">
                <?php
                $controller = new es\ucm\ControllerImplements();
                $context = new es\ucm\Context(LIST_GRADO, null);
                $grados = $controller->action($context);
                foreach ($grados->getData() as $grado) {
                  $card = '';
                  $card = $card . ' <div class="card">
                              <div class="card-header" id="heading' . $grado->getCodigoGrado() . '">
                              <h2 class="mb-0">
                              <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapse' . $grado->getCodigoGrado() . '" aria-expanded="true" aria-controls="collapse' . $grado->getCodigoGrado() . '">' . $grado->getNombreGrado() . '</button>
                              </h2>
                              </div>

                              <div id="collapse' . $grado->getCodigoGrado() . '" class="collapse show" aria-labelledby="heading' . $grado->getCodigoGrado() . '" data-parent="#accordionListaAsignaturasPorGrado">
                              <div class="card-body">';
                  $context = new es\ucm\Context(LIST_MODULO, $grado->getCodigoGrado());
                  $modulos = $controller->action($context);
                  if ($modulos->getEvent() === LIST_MODULO_OK)
                    foreach ($modulos->getData() as $modulo) {
                      $context = new es\ucm\Context(LIST_MATERIA, $modulo->getIdModulo());
                      $materias = $controller->action($context);
                      if ($materias->getEvent() === LIST_MATERIA_OK)
                        foreach ($materias->getData() as $materia) {
                          $context = new es\ucm\Context(LIST_ASIGNATURA, $materia->getIdMateria());
                          $asignaturas = $controller->action($context);
                          if ($asignaturas->getEvent() === LIST_ASIGNATURA_OK)
                            foreach ($asignaturas->getData() as $asignatura) {
                              if($asignatura->getActivo())
                              $card = $card . '<p><a href="gestionAsignaturas.php?IdGrado=' . $grado->getCodigoGrado() . '&IdAsignatura=' . $asignatura->getIdAsignatura() . '">' . $asignatura->getNombreAsignatura() . '</a></p>';
                            }
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
        if (isset($_GET['IdAsignatura']) && isset($_GET['IdGrado'])) {
          $context = new es\ucm\Context(FIND_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
          $contextAsignatura = $controller->action($context);
          if ($contextAsignatura->getEvent() === FIND_ASIGNATURA_OK) {

            $context = new es\ucm\Context(FIND_MATERIA, $contextAsignatura->getData()->getIdMateria());
            $contextMateria = $controller->action($context);

            $context = new es\ucm\Context(FIND_MODULO, $contextMateria->getData()->getIdModulo());
            $contextModulo = $controller->action($context);

            $context = new es\ucm\Context(FIND_GRADO, htmlspecialchars(trim(strip_tags($_GET['IdGrado']))));
            $contextGrado = $controller->action($context);

            $context = new es\ucm\Context(FIND_TEORICO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
            $contextTeorico = $controller->action($context);

            $context = new es\ucm\Context(FIND_PROBLEMA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
            $contextProblema = $controller->action($context);

            $context = new es\ucm\Context(FIND_LABORATORIO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
            $contextLaboratorio = $controller->action($context);

            $context = new es\ucm\Context(FIND_PROFESOR, $contextAsignatura->getData()->getCoordinadorAsignatura());
            $CoordinadorAsignatura = $controller->action($context);
        ?>
            <div class="col-md-9 col-12">
              <div class="card">
                <div class="card-header text-center">
                  <?php
                  echo '<h2>Información docente de <b>' . $contextAsignatura->getData()->getNombreAsignatura() . '</b></h2>';
                  ?>
                </div>
                <div class="card-body">
                  <nav id="nav-asignatura" class="nav nav-pills nav-fill">

                    <a class="nav-item nav-link active" id="nav-info-asignatura-tab" data-toggle="tab" href="#nav-info-asignatura" role="tab" aria-controls="nav-info-asignatura" aria-selected="true">Información</a>

                    <a class="nav-item nav-link active" id="nav-teorico-tab" data-toggle="tab" href="#nav-teorico" role="tab" aria-controls="nav-teorico" aria-selected="true">Teórico</a>

                    <a class="nav-item nav-link active" id="nav-problema-tab" data-toggle="tab" href="#nav-problema" role="tab" aria-controls="nav-problema" aria-selected="true">Problema</a>

                    <a class="nav-item nav-link active" id="nav-laboratorio-tab" data-toggle="tab" href="#nav-laboratorio" role="tab" aria-controls="nav-teorico" aria-selected="true">Laboratorio</a>

                    </nav>
                  <div class="tab-content" id="nav-tabContent">
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
                            <tr><th scope="col">Asignatura (Inglés):</th>
                              <td><?php echo $contextAsignatura->getData()->getNombreAsignaturaIngles(); ?></td> 
                              <th scope="row">Créditos (ECTS):</th>
                              <td><?php echo $contextAsignatura->getData()->getCreditos(); ?></td></tr>
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
                        <?php
                        if ($CoordinadorAsignatura->getEvent() === FIND_PROFESOR_OK) { ?>
                          <table class="table table-sm table-bordered">
                            <thead>
                              <tr>
                                <th scope="col" colspan="6">Coordinador/a</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="col">Nombre:</th>
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
                        
                      <?php }
                      ?>
                        <div class="text-right">

                          <a href="asignatura.php?idGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&idAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>&idMateria=<?php echo $contextMateria->getData()->getIdMateria();?> ">
                            <button type="button" class="btn btn-warning" id="btn-form">
                              Modificar Información Asignatura
                            </button>
                          </a>
                          <a href="borrarAsignatura.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                            <button type="button" class="btn btn-danger" id="btn-form">
                              Eliminar Asignatura
                            </button>
                          </a>
                        </div>
                        
                      </div>
                    </div>
                    <div class="tab-pane fade show active" id="nav-teorico" role="tabpanel" aria-labelledby="nav-teorico-tab">
                      <?php if ($contextTeorico->getEvent() === FIND_TEORICO_OK) { ?>
                        <div class="table-responsive text-center">
                          <table class="table table-sm table-bordered">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Teóricos</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Créditos (ECTS):</th>
                                <td><?php echo $contextTeorico->getData()->getCreditos(); ?></td>

                              </tr>
                              <tr>
                                <th scope="row">Presencialidad:</th>
                                <td><?php echo $contextTeorico->getData()->getPresencial(); ?>%</td>

                              </tr>
                              <tr>
                                <th scope="row">Horas totales:</th>
                                <td><?php echo ($contextTeorico->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextTeorico->getData()->getPresencial()) / 100; ?></td>
                              </tr>
                            </tbody>
                          </table>

                          <div class="text-right">

                            <a href="teorico.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                              <button type="button" class="btn btn-warning" id="btn-form">
                                Modificar Información Teorico
                              </button>
                            </a>
                            <a href="borrarTeorico.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                              <button type="button" class="btn btn-danger" id="btn-form">
                                Eliminar Teorico
                              </button>
                            </a>
                          </div>
                        </div>
                      <?php } else { ?>
                        <div class="text-right">

                          <a href="teorico.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                            <button type="button" class="btn btn-success" id="btn-form">
                              Crear Teorico
                            </button>
                          </a>

                        </div>

                      <?php }
                      ?>
                    </div>
                    <div class="tab-pane fade show active" id="nav-problema" role="tabpanel" aria-labelledby="nav-problema-tab">
                      <?php if ($contextProblema->getEvent() === FIND_PROBLEMA_OK) { ?>
                        <div class="table-responsive text-center">
                          <table class="table table-sm table-bordered">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Problemas</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Créditos (ECTS):</th>
                                <td><?php echo $contextProblema->getData()->getCreditos(); ?></td>

                              </tr>
                              <tr>
                                <th scope="row">Presencialidad:</th>
                                <td><?php echo $contextProblema->getData()->getPresencial(); ?>%</td>

                              </tr>
                              <tr>
                                <th scope="row">Horas totales:</th>
                                <td><?php echo ($contextProblema->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextProblema->getData()->getPresencial()) / 100; ?></td>
                              </tr>
                            </tbody>
                          </table>

                          <div class="text-right">

                            <a href="problema.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                              <button type="button" class="btn btn-warning" id="btn-form">
                                Modificar Información Problema
                              </button>
                            </a>
                            <a href="borrarProblema.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                              <button type="button" class="btn btn-danger" id="btn-form">
                                Eliminar Problema
                              </button>
                            </a>
                          </div>
                        </div>
                      <?php } else { ?>
                        <div class="text-right">

                          <a href="problema.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                            <button type="button" class="btn btn-success" id="btn-form">
                              Crear Problema
                            </button>
                          </a>

                        </div>

                      <?php }
                      ?>
                    </div>
                    <div class="tab-pane fade show active" id="nav-laboratorio" role="tabpanel" aria-labelledby="nav-laboratorio-tab">
                      <?php if ($contextLaboratorio->getEvent() === FIND_LABORATORIO_OK) { ?>
                        <div class="table-responsive text-center">
                          <table class="table table-sm table-bordered">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Laboratorios</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Créditos (ECTS):</th>
                                <td><?php echo $contextLaboratorio->getData()->getCreditos(); ?></td>

                              </tr>
                              <tr>
                                <th scope="row">Presencialidad:</th>
                                <td><?php echo $contextLaboratorio->getData()->getPresencial(); ?>%</td>

                              </tr>
                              <tr>
                                <th scope="row">Horas totales:</th>
                                <td><?php echo ($contextLaboratorio->getData()->getCreditos() * $contextGrado->getData()->getHorasEcts() * $contextLaboratorio->getData()->getPresencial()) / 100; ?></td>
                              </tr>
                            </tbody>
                          </table>

                          <div class="text-right">

                            <a href="laboratorio.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                              <button type="button" class="btn btn-warning" id="btn-form">
                                Modificar Información Laboratorio
                              </button>
                            </a>
                            <a href="borrarLaboratorio.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                              <button type="button" class="btn btn-danger" id="btn-form">
                                Eliminar Laboratorio
                              </button>
                            </a>
                          </div>
                        </div>
                      <?php } else { ?>
                        <div class="text-right">
                          <a href="laboratorio.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>&IdAsignatura=<?php echo $contextAsignatura->getData()->getIdAsignatura(); ?>">
                            <button type="button" class="btn btn-success" id="btn-form">
                              Crear Laboratorio
                            </button>
                          </a>
                        </div>
                      <?php }
                      ?>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
    </div>
<?php
          } //Asignatura
        } //Isset
      } //Login
?>
  </div>
  </div>
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