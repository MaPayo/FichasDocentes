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
  <title>Gestión Docente: Descarga de Archivos</title>
</head>

<body>
  <div class="container-fluid">
    <?php
    require_once('includes/Presentacion/Vistas/html/cabecera.php');
    ?>
    <div class="row justify-content-center align-items-center">
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['admin']) && $_SESSION['admin'] == false) {

        $controller = new es\ucm\ControllerImplements();

        ?>
        <div class="col-xl-6 col-lg-8 col-12">
          <div class="card">
            <div class="card-header text-center">
              <h2>Descargar archivos generados</h2>
            </div>
            <div class="card-body text-center">
              <?php
                $folder = STORAGE.'/'.$_SESSION['idUsuario']; //CAMBIAR
                  if(is_dir($folder)){//Si se ha creado algun archivo
                    $ficheros = array_diff(scandir($folder), array('..', '.'));
                    for ($i=2; $i < count($ficheros)+2; $i++) { 
                      //Si i es par, es html
                      if($i%2===0){
                        $datostitulo = explode('-', $ficheros[$i]);
                        $context = new es\ucm\Context(FIND_ASIGNATURA, $datostitulo[3]);
                        $asignatura = $controller->action($context);
                        echo "<p><a href='download.php?file=$ficheros[$i]'>".$datostitulo[0]."- ".$datostitulo[1]." ".$asignatura->getData()->getNombreAsignatura()."(".$datostitulo[2].") HTML</a></p>";
                      } else{
                        $datostitulo = explode('-',$ficheros[$i]);
                        $context = new es\ucm\Context(FIND_ASIGNATURA, $datostitulo[3]);
                        $asignatura = $controller->action($context);
                        echo "<p><a href='download.php?file=$ficheros[$i]'>".$datostitulo[0]."- ".$datostitulo[1]." ".$asignatura->getData()->getNombreAsignatura()."(".$datostitulo[2].") PDF</a></p>";
                      }
                    }
                  }
                  echo '<div><a href="index.php">
                  <button type="button" class="btn btn-secondary" id="btn-form">
                  Volver a Inicio
                  </button>
                  </a>
                  <a href="downloadzip.php">
                  <button type="button" class="btn btn-secondary" id="btn-form">
                  Descargar zip con todas las fichas generadas.
                  </button>
                  </a>
                  </div>';
                  ?>
                </div>
              </div>
            </div>
            <?php
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