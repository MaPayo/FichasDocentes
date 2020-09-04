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
              <h3>Listado de Grados</h3>
            </div>
            <div class="card-body">
              <a href="grado.php">
                <button type="button" class="btn btn-primary" id="btn-form">
                  Añadir Grado
                </button>
              </a>
              <div class="accordion" id="accordionListaAsignaturasPorGrado">
                <?php
                $controller = new es\ucm\ControllerImplements();
                $context = new es\ucm\Context(LIST_GRADO, null);
                $grados = $controller->action($context);
                foreach ($grados->getData() as $grado) {
                  if ($grado->getActivo()) {
                    $card = '';
                    $card = $card . ' <div class="card">
                              <div class="card-header" id="heading' . $grado->getCodigoGrado() . '">
                      
                              <p><a href="gestionGrados.php?IdGrado=' . $grado->getCodigoGrado() . '">' . $grado->getNombreGrado() . '</a></p>
                          
                              </div>
                            </div>';

                    echo $card;
                  }
                }

                ?>
              </div>
            </div>
          </div>
        </div>
        <?php
        if (isset($_GET['IdGrado'])) {
          $context = new es\ucm\Context(FIND_GRADO, htmlspecialchars(trim(strip_tags($_GET['IdGrado']))));
          $contextGrado = $controller->action($context);
          if ($contextGrado->getEvent() === FIND_GRADO_OK) {
            $context = new es\ucm\Context(LIST_MODULO, $contextGrado->getData()->getCodigoGrado());
            $modulos = $controller->action($context);

        ?>
            <div class="col-md-9 col-12">
              <div class="card">
                <div class="card-header text-center">
                  <?php
                  echo '<h2>Información docente de <b>' . $contextGrado->getData()->getNombreGrado() . '</b></h2>';
                  ?>
                </div>
                <div class="card-body">
                  <nav id="nav-grado" class="nav nav-pills nav-fill">

                    <a class="nav-item nav-link active" id="nav-info-grado-tab" data-toggle="tab" href="#nav-info-grado" role="tab" aria-controls="nav-info-grado" aria-selected="true">Información Grado</a>

                    <a class="nav-item nav-link active" id="nav-modulos-tab" data-toggle="tab" href="#nav-modulos" role="tab" aria-controls="nav-modulos" aria-selected="false">Modulos</a>

                    <a class="nav-item nav-link active" id="nav-materias-tab" data-toggle="tab" href="#nav-materias" role="tab" aria-controls="nav-materias" aria-selected="false">Materias</a>

                    <a class="nav-item nav-link active" id="nav-asignaturas-tab" data-toggle="tab" href="#nav-asignaturas" role="tab" aria-controls="nav-asignaturas" aria-selected="false">Asignaturas</a>

                  </nav>
                  <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active text-center" id="nav-info-grado" role="tabpanel" aria-labelledby="nav-info-grado-tab">
                      <div class="table-responsive text-center">
                        <table class="table table-sm table-bordered">
                          <tbody>
                            <tr>
                              <th scope="col">Nombre:</th>
                              <td><?php echo $contextGrado->getData()->getNombreGrado() ?></td>
                              <th scope="col">Horas (ECTS):</th>
                              <td><?php echo $contextGrado->getData()->getHorasEcts() ?></td>
                              <th scope="col">Coordinador:</th>
                              <td><?php echo $contextGrado->getData()->getCoordinadorGrado() ?></td>

                            </tr>
                          </tbody>
                        </table>
                        <div class="text-right">

                          <a href="grado.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>">
                            <button type="button" class="btn btn-warning" id="btn-form">
                              Modificar Información Grado
                            </button>
                          </a>
                          <a href="borrarGrado.php?IdGrado=<?php echo $contextGrado->getData()->getCodigoGrado(); ?>">
                            <button type="button" class="btn btn-danger" id="btn-form">
                              Eliminar Grado
                            </button>
                          </a>
                        </div>
                      </div>
                      <div class="tab-pane fade show active" id="nav-modulos" role="tabpanel" aria-labelledby="nav-modulos-tab">
                        <?php echo '<div><h5>Modulos del grado' . $contextGrado->getData()->getNombreGrado() . '</h5>
                          <a href="modulo.php?idGrado=' .  $contextGrado->getData()->getCodigoGrado() . '">
                          <button type="button" class="btn btn-primary" id="btn-form">
                          Añadir Modulo
                          </button>
                          </a>
                          </div>';
                        if ($modulos->getEvent() === LIST_MODULO_OK) {

                          foreach ($modulos->getData() as $modulo) {
                            if ($modulo->getActivo()) {
                              echo '<p>' . $modulo->getNombreModulo() . '
                                <a href="borrarModulo.php?idGrado=' . $contextGrado->getData()->getCodigoGrado() . '&idModulo=' . $modulo->getIdModulo() . '">
                                <button type="button" class="btn btn-danger" id="btn-form">
                                Eliminar
                                </button>
                                </a>
                                <a href="modulo.php?idGrado=' . $contextGrado->getData()->getCodigoGrado() . '&idModulo=' . $modulo->getIdModulo() . '">
                                <button type="button" class="btn btn-warning" id="btn-form">
                                Modificar
                                </button>
                                </a></p>';
                            }
                          }
                        }
                        ?>

                      </div>
                      <div class="tab-pane fade show active" id="nav-materias" role="tabpanel" aria-labelledby="nav-materias-tab">
                        <?php
                        if ($modulos->getEvent() === LIST_MODULO_OK)
                          foreach ($modulos->getData() as $modulo) {
                            if ($modulo->getActivo()) {
                              echo '<div><h5>Materias del Módulo' . $modulo->getNombreModulo() . '</h5>
                <a href="materia.php?idGrado=' . $contextGrado->getData()->getCodigoGrado() . '&idModulo=' . $modulo->getIdModulo() . '">
                <button type="button" class="btn btn-primary" id="btn-form">
                Añadir Materia
                </button>
                </a>
                </div>';
                              $context = new es\ucm\Context(LIST_MATERIA, $modulo->getIdModulo());
                              $materias = $controller->action($context);
                              if ($materias->getEvent() === LIST_MATERIA_OK) {
                                foreach ($materias->getData() as $materia) {
                                  if ($materia->getActivo()) {
                                    echo '<p>' . $materia->getNombreMateria() . '
                      <a href="borrarMateria.php?idModulo=' . $modulo->getIdModulo() . '&idMateria=' . $materia->getIdMateria() . '">
                      <button type="button" class="btn btn-danger" id="btn-form">
                      Eliminar
                      </button>
                      </a>
                      <a href="modulo.php?idGrado=' . $contextGrado->getData()->getCodigoGrado() . '&idModulo=' . $modulo->getIdModulo() . '&idMateria=' . $materia->getIdMateria() . '">
                      <button type="button" class="btn btn-warning" id="btn-form">
                      Modificar
                      </button>
                      </a></p>';
                                  }
                                }
                              }
                            }
                          }

                        ?>
                      </div>
                      <div class="tab-pane fade show active" id="nav-asignaturas" role="tabpanel" aria-labelledby="nav-asignaturas-tab">
                        <?php if ($modulos->getEvent() === LIST_MODULO_OK)
                          foreach ($modulos->getData() as $modulo) {
                            if ($modulo->getActivo()) {
                              $context = new es\ucm\Context(LIST_MATERIA, $modulo->getIdModulo());
                              $materias = $controller->action($context);
                              if ($materias->getEvent() === LIST_MATERIA_OK) {
                                foreach ($materias->getData() as $materia) {
                                  if ($materia->getActivo()) {
                                    echo '<div><h5>Asignaturas de la materia' . $materia->getNombreMateria() . '</h5>
                                    <a href="asignatura.php?idGrado=' .  $contextGrado->getData()->getCodigoGrado() . '&idMateria=' .  $materia->getIdMateria() . '">
                                    <button type="button" class="btn btn-primary" id="btn-form">
                                    Añadir Asignatura
                                    </button>
                                    </a>
                                    </div>';
                                    $context = new es\ucm\Context(LIST_ASIGNATURA, $materia->getIdMateria());
                                    $asignaturas = $controller->action($context);
                                    if ($asignaturas->getEvent() === LIST_ASIGNATURA_OK) {
                                      foreach ($asignaturas->getData() as $asignatura) {
                                        if ($asignatura->getActivo()) {
                                          echo '<p>' . $asignatura->getNombreAsignatura() . '
                                          <a href="gestionAsignaturas.php?idGrado=' . $contextGrado->getData()->getCodigoGrado() . '&idAsignatura=' . $asignatura->getIdAsignatura() . '#nav-info-asignatura">
                                          <button type="button" class="btn btn-primary" id="btn-form">
                                          Gestionar
                                          </button>
                                          </a></p>';
                                        }
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          } ?>
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