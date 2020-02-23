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
        <div class="row justify-content-center align-items-center">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                ?>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Listado de asignaturas por grado</h2>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                            <?php
                            //context oportunos, tener array de todos los grados, array de asignaturas del profesor

                            $card ='';

                            foreach($grados as $grado){
                                $i = 0;
                                foreach ($asignaturas as $asignatura) {
                                    if($asignatura->getCodigoGrado() == $grado->getCodigoGrado()){
                                       if($i==0){
                                        $card = $card .' <div class="card">
                                        <div class="card-header" id="heading'.$grado->getCodigoGrado().'">
                                         <h2 class="mb-0">
                                            <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapse'.$grado->getCodigoGrado().'" aria-expanded="false" aria-controls="collapse'.$grado->getCodigoGrado().'">'.$grado->getNombreGrado().'
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse'.$grado->getCodigoGrado().'" class="collapse" aria-labelledby="heading'.$grado->getCodigoGrado().'" data-parent="#accordionExample">
                                        <div class="card-body">
                                        <a href="indexAcceso.php&IdAsignatura='.$asignatura->getIdAsignatura().'">'.$asignatura->getNombreAsignatura().'</a>';
                                        }
                                        else{
                                       $card =$card .'<a href="indexAcceso.php&IdAsignatura='.$asignatura->getIdAsignatura().'">'.$asignatura->getNombreAsignatura().'</a>';
                                        }
                                    }
                                    
                                }
                                if($i!=0){
                                    $card =$card .'</div>
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


            <div class="col-md-8 col-12">
                <?php
                if (isset($_GET['IdAsignatura'])) {
                    $context = new es\ucm\Context(FIND_ASIGNATURA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $controller = new es\ucm\ControllerImplements();
                    $asignatura = $controller->action($context);
                    $context = new es\ucm\Context(FIND_TEORICO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $controller = new es\ucm\ControllerImplements();
                    $teorico = $controller->action($context);
                    $context = new es\ucm\Context(FIND_PROBLEMA, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $controller = new es\ucm\ControllerImplements();
                    $problema = $controller->action($context);
                    $context = new es\ucm\Context(FIND_LABORATORIO, htmlspecialchars(trim(strip_tags($_GET['IdAsignatura']))));
                    $controller = new es\ucm\ControllerImplements();
                    $laboratorio = $controller->action($context);
                }
                ?>
                <div class="card ">
                    <div class="card-header text-center">
                        <?php
                        echo '<h2>Informacion docente de la asignatura: ' . $asignatura->getNombreAsignatura() . '</h2>';
                        ?>
                    </div>
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-info-asignatura-tab" data-toggle="tab" href="#nav-info-asignatura" role="tab" aria-controls="nav-info-asignatura" aria-selected="true">Informacion asignatura</a>
                                <a class="nav-item nav-link" id="nav-prog-asignatura-tab" data-toggle="tab" href="#nav-prog-asignatura" role="tab" aria-controls="nav-prog-asignatura" aria-selected="false">Programa asignatura</a>
                                <a class="nav-item nav-link" id="nav-comp-asignatura-tab" data-toggle="tab" href="#nav-comp-asignatura" role="tab" aria-controls="nav-comp-asignatura" aria-selected="false">Competencias asignatura</a>
                                <a class="nav-item nav-link" id="nav-metodologia-tab" data-toggle="tab" href="#nav-metodologia" role="tab" aria-controls="nav-metodologia" aria-selected="false">Metodologia</a>
                                <a class="nav-item nav-link" id="nav-bibliografia-tab" data-toggle="tab" href="#nav-bibliografia" role="tab" aria-controls="nav-bibliografia" aria-selected="false">Bibliografia</a>
                                <a class="nav-item nav-link" id="nav-grupo-laboratorio-tab" data-toggle="tab" href="#nav-grupo-laboratorio" role="tab" aria-controls="nav-grupo-laboratorio" aria-selected="false">Grupo laboratorio</a>
                                <a class="nav-item nav-link" id="nav-grupo-clase-tab" data-toggle="tab" href="#nav-grupo-clase" role="tab" aria-controls="nav-grupo-clase" aria-selected="false">Grupo clase</a>
                                <a class="nav-item nav-link" id="nav-evaluacion-tab" data-toggle="tab" href="#nav-evaluacion" role="tab" aria-controls="nav-evaluacion" aria-selected="false">Evaluacion</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">

                            <!--Pestaña informacion asignatura-->
                            <div class="tab-pane fade show active" id="nav-info-asignatura" role="tabpanel" aria-labelledby="nav-info-asignatura-tab">
                                <?php
                                echo 'Nombre asignatura: ' . $asignatura->getNombreAsignatura() . '<br />
                                Nombre asignatura en ingles: ' . $asignatura->getNombreAsignaturaIngles() . '<br />
                                Materia: ' . $asignatura->getMateria() . '<br />
                                Modulo: ' . $asignatura->getModulo() . '<br />
                                Caracter: ' . $asignatura->getCaracter() . '<br />
                                Curso: ' . $asignatura->getCurso() . '<br />
                                Semestre: ' . $asignatura->getSemestre() . '<br />
                                Creditos materia: ' . $asignatura->getCreditosMateria() . '<br />
                                Coordinadores: ' . $asignatura->getCoordinadores() . '.<br />';
                                ?>
                                Reparto de creditos:
                                <div class="table-responsible">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Créditos</th>
                                                <th scope="col">Presencial</th>
                                                <th scope="col">Horas totales</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Teóricos</th>
                                                <?php
                                                    $horasTotales = $teorico->getCreditos() * 25 * $teorico->getPresencial(); //corregir
                                                    echo '<td>' . $teorico->getCreditos() . '</td>
                                                    <td>' . $teorico->getPresencial() . '%</td>
                                                    <td>' . $horasTotales . '</td>';
                                                    ?>

                                                </tr>
                                                <tr>
                                                    <th scope="row">Problemas</th>
                                                    <?php
                                                    $horasTotales = $problema->getCreditos() * 25 * $problema->getPresencial(); //corregir
                                                    echo '<td>' . $problema->getCreditos() . '</td>
                                                    <td>' . $problema->getPresencial() . '</td>
                                                    <td>' . $horasTotales . '</td>'
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Laboratorio</th>
                                                    <?php
                                                    $horasTotales = $laboratorio->getCreditos() * 25 * $laboratorio->getPresencial(); //corregir
                                                    echo '<td>' . $laboratorio->getCreditos() . '</td>
                                                    <td>' . $laboratorio->getPresencial() . '</td>
                                                    <td>' . $horasTotales . '</td>'
                                                    ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--Pestaña programa asignatura-->
                                <div class="tab-pane fade" id="nav-prog-asignatura" role="tabpanel" aria-labelledby="nav-prog-asignatura-tab">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Conocimientos previos</h5>
                                            <p class="card-text">Ejemplo de conocimientos previos</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Conocimientos previos (Inglés)</h5>
                                            <p class="card-text">Ejemplo de conocimientos previos en ingles</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Breve descripción</h5>
                                            <p class="card-text">Ejemplo de breve descripcion</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Breve descripción (Inglés)</h5>
                                            <p class="card-text">Ejemplo de breve descripcion en ingles</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Programa detallado</h5>
                                            <p class="card-text">Ejemplo de programa detallado</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Programa detallado (Inglés)</h5>
                                            <p class="card-text">Ejemplo de programa detallado en ingles</p>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary" id="btn-form" data-toggle="modal" data-target="#modal-programa-asignatura">
                                        Modificar
                                    </button>

                                    <div class="modal fade" id="modal-programa-asignatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Modificar programa asignatura</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $access = new es\ucm\FormProgramaAsignatura('idProgramaAsignatura');
                                                    $access->gestiona();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Pestaña competencia asignatura-->
                                <div class="tab-pane fade" id="nav-comp-asignatura" role="tabpanel" aria-labelledby="nav-comp-asignatura-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Generales</h5>
                                            <p class="card-text">Ejemplo de competencias generales</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Generales (Inglés)</h5>
                                            <p class="card-text">Ejemplo de competencias generales en ingles</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Especificas</h5>
                                            <p class="card-text">Ejemplo de competencias especificas</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Especificas (Inglés)</h5>
                                            <p class="card-text">Ejemplo de competencias especificas en ingles</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Basicas y transversales</h5>
                                            <p class="card-text">Ejemplo de competencias basicas y transversales</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Basicas y trasversales (Inglés)</h5>
                                            <p class="card-text">Ejemplo de competencias basicas y trasversales en ingles</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Resultados aprendizaje</h5>
                                            <p class="card-text">Ejemplo de resultados de aprendizaje</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Resultados aprendizaje (Inglés)</h5>
                                            <p class="card-text">Ejemplo de resultados de aprendizaje en ingles</p>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary" id="btn-form" data-toggle="modal" data-target="#modal-competencia-asignatura">
                                        Modificar
                                    </button>

                                    <div class="modal fade" id="modal-competencia-asignatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Modificar competencia asignatura</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $access = new es\ucm\FormCompetenciaAsignatura('idCompetenciaAsignatura');
                                                    $access->gestiona();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Pestaña metodologia-->
                                <div class="tab-pane fade" id="nav-metodologia" role="tabpanel" aria-labelledby="nav-metodologia-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Metodologia</h5>
                                            <p class="card-text">Ejemplo de metodologia</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Metodologia (Inglés)</h5>
                                            <p class="card-text">Ejemplo de metodologia en ingles</p>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary" id="btn-form" data-toggle="modal" data-target="#modal-metodologia">
                                        Modificar
                                    </button>

                                    <div class="modal fade" id="modal-metodologia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Modificar metodologia</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $access = new es\ucm\FormMetodologia('idMetodologia');
                                                    $access->gestiona();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Pestaña bibliografia-->
                                <div class="tab-pane fade" id="nav-bibliografia" role="tabpanel" aria-labelledby="nav-bibliografia-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Citas bibliograficas</h5>
                                            <p class="card-text">Ejemplo de citas bibliograficas</p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Recursos internet</h5>
                                            <p class="card-text">Ejemplo de recursos internet</p>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary" id="btn-form" data-toggle="modal" data-target="#modal-bibliografia">
                                        Modificar
                                    </button>

                                    <div class="modal fade" id="modal-bibliografia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Modificar bibliografia</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $access = new es\ucm\FormBibliografia('idBibliografia');
                                                    $access->gestiona();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Pestaña grupo laboratorio-->
                                <div class="tab-pane fade" id="nav-grupo-laboratorio" role="tabpanel" aria-labelledby="nav-grupo-laboratorio-tab">...</div>

                                <!--Pestaña grupo clase-->
                                <div class="tab-pane fade" id="nav-grupo-clase" role="tabpanel" aria-labelledby="nav-grupo-clase-tab">...</div>

                                <!--Pestaña evaluacion-->
                                <div class="tab-pane fade" id="nav-evaluacion" role="tabpanel" aria-labelledby="nav-evaluacion-tab">...</div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo '<div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="alert alert-danger" role="alert">
                <h5 class="card-title text-center">ACCESO DENEGADO</h5>
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