<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');
require_once('includes/Negocio/Bibliografia/ModBibliografia.php');

class FormAsignatura extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
        $abreviatura = isset($datosIniciales['Abreviatura']) ? $datosIniciales['Abreviatura'] : null;
        $nombreAsignatura = isset($datosIniciales['NombreAsignatura']) ?  $datosIniciales['NombreAsignatura'] : null;
        $nombreAsignaturaI = isset($datosIniciales['NombreAsignaturaI']) ?  $datosIniciales['NombreAsignaturaI'] : null;
        $creditos = isset($datosIniciales['Creditos']) ?  $datosIniciales['Creditos'] : null;
        $curso = isset($datosIniciales['Curso']) ?  $datosIniciales['Curso'] : null;
        $semestre = isset($datosIniciales['Semestre']) ?  $datosIniciales['Semestre'] : null;
        $coordinador= isset($datosIniciales['Coordinador']) ? $datosIniciales['Coordinador']: null;

        $idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
        $idGrado = $datosIniciales['idGrado'];

        $controller = new ControllerImplements();
        $context = new Context(FIND_CONFIGURACION, $idAsignatura);
        $contextConfiguacion = $controller->action($context);

        $html = '
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />';

        $html .= '<div class="form-group">
				<label for="nombreAsignatura">Nombre Asignatura</label>
				<input class="form-control" id="nombreAsignatura" rows="10" name="nombreAsignatura" value="' . $nombreAsignatura . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="nombreAsignaturaI">Nombre Asignatura (Inglés)</label>
				<input class="form-control" id="nombreAsignaturaI" rows="10" name="nombreAsignaturaI" value="' . $nombreAsignaturaI . '">
                </div>';
        $html .= '<div class="form-group">
				<label for="abreviatura">Abreviatura</label>
				<input class="form-control" id="abreviatura" rows="10" name="abreviatura" value="' . $abreviatura . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="creditos">Creditos</label>
				<input class="form-control" id="creditos" rows="10" name="creditos" value="' . $creditos . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="curso">Curso</label>
				<input class="form-control" id="curso" rows="10" name="curso" value="' . $curso . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="semestre">Semestre</label>
				<input class="form-control" id="semestre" rows="10" name="semestre" value="' . $semestre . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="semestre">Email Coordinador</label>
				<input class="form-control" id="coordinador" rows="10" name="coordinador" value="' . $coordinador . '" required>
				</div>';

        $html .= '<div class="text-right">
		<a href="gestionAsignaturas.php?IdGrado=' . $idGrado . '&IdAsignatura=' . $idAsignatura . '#nav-info-asignatura">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Cancelar
		</button>
		</a>

		<button type="submit" class="btn btn-success" id="btn-form" name="registrar">Guardar</button>
		</div>';
        return $html;
    }

    protected function procesaFormulario($datos)
    {

        $erroresFormulario = array();
        $controller = new ControllerImplements();
        $context = new Context(FIND_CONFIGURACION, $datos['idAsignatura']);
        $contextConfiguacion = $controller->action($context);

        $abreviatura = isset($datos['abreviatura']) ? $datos['abreviatura'] : '';
        $nombreAsignatura = isset($datos['nombreAsignatura']) ?  $datos['nombreAsignatura'] : '';
        $nombreAsignaturaI = isset($datos['nombreAsignaturaI']) ?  $datos['nombreAsignaturaI'] : '';
        $creditos = isset($datos['creditos']) ?  $datos['creditos'] : '';
        $curso = isset($datos['curso']) ?  $datos['curso'] : '';
        $semestre = isset($datos['semestre']) ?  $datos['semestre'] : '';
        $coordinador= isset($datos['coordinador']) ? $datos['coordinador']: '';
                if (empty($nombreAsignatura)) {
                    $erroresFormulario[] = "No has introducido el nombre de la asignatura.";
                }
                if (empty($creditos)) {
                    $erroresFormulario[] = "No has introducido los créditos.";
                }
                if (empty($abreviatura)) {
                    $erroresFormulario[] = "No has introducido la abreviatura.";
                }
                if (empty($curso)) {
                    $erroresFormulario[] = "No has introducido el curso.";
                }
                 if (empty($semestre)) {
                    $erroresFormulario[] = "No has introducido el semestre.";
                }
                 if (empty($coordinador)) {
                    $erroresFormulario[] = "No has introducido el coordinador.";
                }

           

        if (count($erroresFormulario) === 0) {
            $context = new Context(FIND_ASIGNATURA, $datos['idAsignatura']);
            $contextAsignatura = $controller->action($context);
            if ($contextAsignatura->getEvent() === FIND_ASIGNATURA_OK) {
                $context = new Context(FIND_PROFESOR, $coordinador);
                $contextProfesor = $controller->action($context);
                if($contextProfesor->getEvent() === FIND_PROFESOR_OK){
                    $asignatura= new Asignatura($datos['idAsignatura'],$nombreAsignatura,$abreviatura, $curso, $semestre, $nombreAsignaturaI, $creditos, $coordinador, 'B',$contextAsignatura->getData()->getActivo(),$contextAsignatura->getData()->getIdMateria());
                    $context= new Context(UPDATE_ASIGNATURA, $asignatura);
                    $contextUA = $controller->action($context);
                    if($contextUA->getEvent() === UPDATE_ASIGNATURA_OK){
                        $erroresFormulario = "gestionAsignaturas.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-info-asignatura";
                    }else{
                        $erroresFormulario[] ="No se ha podido modificar la asignatura";
                    }
                }elseif($contextProfesor->getEvent() === FIND_PROFESOR_FAIL){
                    $erroresFormulario[] ="El email no se corresponde con un profesor";
                } 
            } elseif ($contextAsignatura->getEvent() === FIND_ASIGNATURA_FAIL) {

                $asignatura= new Asignatura($datos['idAsignatura'],$nombreAsignatura,$abreviatura, $curso, $semestre, $nombreAsignaturaI, $creditos, $coordinador, 'B',1,0);
                $context = new Context(CREATE_ASIGNATURA, $asignatura);
                $contextAsignatura = $controller->action($context);
                $modAsignatura = new ModAsignatura(null, null, null, $datos['idAsignatura']);
                $context = new Context(CREATE_MODASIGNATURA, $modAsignatura);
                $contextMA = $controller->action($context);
                if ($contextAsignatura->getEvent() === CREATE_ASIGNATURA_FAIL || $contextMA->getEvent()=== CREATE_MODASIGNATURA_FAIL) {
                    $erroresFormulario[] = "No se ha podido crear la Asignatura.";
                } elseif ($contextAsignatura->getEvent() === CREATE_ASIGNATURA_OK ) {
                    $erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-info-asignatura";
                   
                }
            }
        }
        return $erroresFormulario;
    }
}
