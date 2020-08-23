<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');


class FormLaboratorio extends Form
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
            $context = new Context(FIND_LABORATORIO, $datos['idAsignatura']);
            $contextLaboratorio = $controller->action($context);
            if ($contextLaboratorio->getEvent() === FIND_LABORATORIO_OK) {
                echo "Estoy actualizando Laboratorio";
                    $teorico= new Laboratorio($contextLaboratorio->getData()->getIdLaboratorio(),$creditos,$presencial, $datos['idAsignatura']);
                    $context= new Context(UPDATE_LABORATORIO, $teorico);
                    $contextUA = $controller->action($context);
                    if($contextUA->getEvent() === UPDATE_LABORATORIO_OK){
                        $erroresFormulario = "gestionAsignaturas.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-info-asignatura";
                    }else{
                        $erroresFormulario[] ="No se ha podido modificar la parte laboratorio";
                    }
                
            } elseif ($contextLaboratorio->getEvent() === FIND_LABORATORIO_FAIL) {

                $teorico= new Laboratorio(null,$creditos,$presencial, $datos['idAsignatura']);
                $context = new Context(CREATE_LABORATORIO, $teorico);
                $contextLaboratorio = $controller->action($context);

                if ($contextLaboratorio->getEvent() === CREATE_LABORATORIO_OK) {
                    $erroresFormulario = "gestionAsignaturas.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-info-teorico";
                } elseif ($contextLaboratorio->getEvent() === CREATE_LABORATORIO_FAIL) {
                    $erroresFormulario[] = "No se ha podido crear la parte laboratorio.";
                }
            }
        }
        return $erroresFormulario;
    }
}
