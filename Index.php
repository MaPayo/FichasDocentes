<?php
require_once('includes/config.php');
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['admin'] == false){
            foreach ($_SESSION['asignaturas'] as $grado => $asig) {
                foreach ($asig as $asignatura => $dummy) {
                   header('Location:indexAcceso.php?IdGrado=' . $grado . '&IdAsignatura=' . $asignatura);
                   break;
                }
            }
        }
        else if (isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['admin'] == true) {
            header("Location:indexAdmin.php");
        }
        else{
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php
    echo '<link rel="stylesheet" href="' . RUTA_CSS . 'bootstrap.css" />
    <link rel="stylesheet" href="' . RUTA_CSS . 'fichasdocentes.css" />
    <link rel="shortcut icon" type="image/x-icon" href="' . RUTA_IMGS . 'LogoUniversidad.png" />
    <script src="' . RUTA_JS . 'codigo.js"></script>';
    ?>
    <title>Gestion Docente: Inicio</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-6 col-lg-8 col-12">
                <div class="card ">
                    <div class="card-header text-center">
                        <h2>Acceso a la aplicación</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        $access = new es\ucm\FormLogin('idLogin');
                        $access->gestiona();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('includes/Presentacion/Vistas/html/piePagina.php');
           }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>