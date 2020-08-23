<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');


class FormProblema extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
        $Creditos = isset($datosIniciales['Creditos']) ? $datosIniciales['Creditos'] : null;
        $Presencial = isset($datosIniciales['Presencial']) ?  $datosIniciales['Presencial'] : null;
        
        $idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
        $idGrado = $datosIniciales['idGrado'];

        $controller = new ControllerImplements();
       

        $html = '
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />';

        $html .= '<div class="form-group">
				<label for="creditos">Créditos</label>
				<input class="form-control" id="creditos" rows="10" name="creditos" value="' . $Creditos . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="presencial">Presencial (%)</label>
				<input class="form-control" id="presencial" rows="10" name="presencial" value="' . $Presencial . '">
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
       

        $creditos = isset($datos['creditos']) ? $datos['creditos'] : '';
        $presencial = isset($datos['presencial']) ?  $datos['presencial'] : '';
                if (empty($creditos)) {
                    $erroresFormulario[] = "No has introducido el número de créditos.";
                }
                if (empty($presencial)) {
                    $erroresFormulario[] = "No has introducido el porcentaje de presenciales.";
                }
                
           

        if (count($erroresFormulario) === 0) {
            $context = new Context(FIND_PROBLEMA, $datos['idAsignatura']);
            $contextProblema = $controller->action($context);
            if ($contextProblema->getEvent() === FIND_PROBLEMA_OK) {
                echo "Estoy actualizando Problema";
                    $teorico= new Problema($contextProblema->getData()->getIdProblema(),$creditos,$presencial, $datos['idAsignatura']);
                    $context= new Context(UPDATE_PROBLEMA, $teorico);
                    $contextUA = $controller->action($context);
                    if($contextUA->getEvent() === UPDATE_PROBLEMA_OK){
                        $erroresFormulario = "gestionAsignaturas.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-info-asignatura";
                    }else{
                        $erroresFormulario[] ="No se ha podido modificar la parte teorica";
                    }
                
            } elseif ($contextProblema->getEvent() === FIND_PROBLEMA_FAIL) {

                $teorico= new Problema(null,$creditos,$presencial, $datos['idAsignatura']);
                $context = new Context(CREATE_PROBLEMA, $teorico);
                $contextProblema = $controller->action($context);

                if ($contextProblema->getEvent() === CREATE_PROBLEMA_OK) {
                    $erroresFormulario = "gestionAsignaturas.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-info-teorico";
                } elseif ($contextProblema->getEvent() === CREATE_PROBLEMA_FAIL) {
                    $erroresFormulario[] = "No se ha podido crear la parte teorica.";
                }
            }
        }
        return $erroresFormulario;
    }
}
