<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormMetodologia extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idMetodologia = isset($datosIniciales['idMetodologia']) ? $datosIniciales['idMetodologia'] : null;
		$metodologia = isset($datosIniciales['metodologia']) ? $datosIniciales['metodologia'] : null;
		$metodologiaI = isset($datosIniciales['metodologiaI']) ? $datosIniciales['metodologiaI'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;

		$html = '<input type="hidden" name="idMetodologia" value="' . $idMetodologia . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<div class="form-group">
		<label for="metodologia">Metodología</label>
		<textarea class="form-control" id="metodologia" rows="3" name="metodologia" >' . $metodologia . '</textarea>
		</div>

		<div class="form-group">
		<label for="metodologiaI">Metodología (Inglés)</label>
		<textarea class="form-control" id="metodologiaI" rows="3" name="metodologiaI" >' . $metodologiaI . '</textarea>
		</div>

		<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $idAsignatura . '">
            <button type="button" class="btn btn-secondary" id="btn-form">
                Cancelar
            </button>
        </a>';

		$html .= '<button type="submit" class="btn btn-success" id="btn-form name="registrar">Guardar</button>';
		$html .= '</div>';
		return $html;
	}

	protected function procesaFormulario($datos)
	{

		$erroresFormulario = array();

		$metodologia = isset($datos['metodologia']) ? $datos['metodologia'] : null;
		$metodologia = self::clean($metodologia);
		if (empty($metodologia)) {
			$erroresFormulario[] = "No has introducido la metodologia.";
		}

		$metodologiaI = isset($datos['metodologiaI']) ? $datos['metodologiaI'] : null;
		$metodologiaI = self::clean($metodologiaI);
		if (empty($metodologiaI)) {
			$erroresFormulario[] = "No has introducido la metodologia en ingles.";
		}


		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$context = new Context(FIND_MODMETODOLOGIA, $datos['idAsignatura']);
			$contextMetodologia = $controller->action($context);

			if($contextMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK){

				$metodologia = new Metodologia($datos['idMetodologia'], $metodologia, $metodologiaI, $datos['idAsignatura']);
				$context = new Context(UPDATE_MODMETODOLOGIA, $metodologia);
				$contextMetodologia = $controller->action($context);

				if ($contextMetodologia->getEvent() === UPDATE_MODMETODOLOGIA_OK) {

					$modAsignatura=new ModAsignatura($datos['idAsignatura'],date("Y-m-d H:i:s"),$_SESSION['idUsuario'],$datos['idAsignatura']);
					$context =new Context(UPDATE_MODASIGNATURA,$modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=".$datos['idAsignatura']."&modificado=y";

				} elseif ($contextMetodologia->getEvent() === UPDATE_MODMETODOLOGIA_FAIL){
					$erroresFormulario[] = "No se ha podido modificar la metodologia.";
				}
			}elseif($contextMetodologia->getEvent() === FIND_MODMETODOLOGIA_FAIL){

				$metodologia = new Metodologia(null, $metodologia, $metodologiaI, $datos['idAsignatura']);
				$context = new Context(CREATE_MODMETODOLOGIA, $metodologia);
				$contextMetodologia = $controller->action($context);
				if ($contextMetodologia->getEvent() === CREATE_MODMETODOLOGIA_OK) {

					$modAsignatura=new ModAsignatura($datos['idAsignatura'],date("Y-m-d H:i:s"),$_SESSION['idUsuario'],$datos['idAsignatura']);
					$context =new Context(UPDATE_MODASIGNATURA,$modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=".$datos['idAsignatura']."&anadido=y";
					
				} elseif ($contextMetodologia->getEvent() === CREATE_MODMETODOLOGIA_FAIL) {
					$erroresFormulario[] = "No se ha podido crear la evaluacion.";
				}
			}
		}
		return $erroresFormulario;
	}
}
