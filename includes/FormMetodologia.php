<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');
require_once('includes/Negocio/Metodologia/ModMetodologia.php');

class FormMetodologia extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idMetodologia = isset($datosIniciales['idMetodologia']) ? $datosIniciales['idMetodologia'] : null;
		$metodologia = isset($datosIniciales['metodologia']) ? $datosIniciales['metodologia'] : null;
		$metodologiaI = isset($datosIniciales['metodologiaI']) ? $datosIniciales['metodologiaI'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

		$controller = new ControllerImplements();
		$context = new Context(FIND_ASIGNATURA, $idAsignatura);
		$contextAsignatura = $controller->action($context);

		$html = '<input type="hidden" name="idMetodologia" value="' . $idMetodologia . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />
		<div class="form-group">
		<label for="metodologia">Metodología</label>
		<textarea class="form-control" id="metodologia" rows="10" name="metodologia" required>' . $metodologia . '</textarea>
		</div>';

		if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
			$html .= '<div class="form-group">
			<label for="metodologiaI">Metodología (Inglés)</label>
			<textarea class="form-control" id="metodologiaI" rows="10" name="metodologiaI" >' . $metodologiaI . '</textarea>
			</div>';
		}

		$html .= '<div class="text-center">
		<a href="indexAcceso.php?IdGrado=' .$idGrado. '&IdAsignatura=' . $idAsignatura . '#nav-metodologia">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Cancelar
		</button>
		</a>';

		$html .= '<button type="submit" class="btn btn-success" id="btn-form" name="registrar">Guardar</button>';
		$html .= '</div>';
		return $html;
	}

	protected function procesaFormulario($datos)
	{
		$erroresFormulario = array();
		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $datos['idAsignatura']);
		$contextConfiguacion = $controller->action($context);
		$context = new Context(FIND_ASIGNATURA, $datos['idAsignatura']);
		$contextAsignatura = $controller->action($context);

		$erroresFormulario = array();

		$metodologia = isset($datos['metodologia']) ? $datos['metodologia'] : '';
		$metodologiaI = isset($datos['metodologiaI']) ? $datos['metodologiaI'] : '';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK) {

			if ($contextConfiguacion->getData()->getMetodologia() == 1) {
				$metodologia = self::clean($metodologia);
				if (empty($metodologia)) {
					$erroresFormulario[] = "No has introducido la metodología";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$metodologiaI = self::clean($metodologiaI);
					/*if (empty($metodologiaI)) {
						$erroresFormulario[] = "No has introducido la metodología en inglés";
					}*/
				}
			}

			if (count($erroresFormulario) === 0) {
				$context = new Context(FIND_MODMETODOLOGIA, $datos['idAsignatura']);
				$contextMetodologia = $controller->action($context);

				if($contextMetodologia->getEvent() === FIND_MODMETODOLOGIA_OK){
					if($metodologia === $contextMetodologia->getData()->getMetodologia() && $metodologiaI === $contextMetodologia->getData()->getMetodologiaI() ){
						$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=".$datos['idAsignatura']."&modificado=y#nav-metodologia";
					}else{
						$metodologia = new ModMetodologia($contextMetodologia->getData()->getIdMetodologia(), $metodologia, $metodologiaI, $datos['idAsignatura']);
						$context = new Context(UPDATE_MODMETODOLOGIA, $metodologia);
						$contextMetodologia = $controller->action($context);

						if ($contextMetodologia->getEvent() === UPDATE_MODMETODOLOGIA_OK) {

							$modAsignatura=new ModAsignatura($datos['idAsignatura'],date("Y-m-d H:i:s"),$_SESSION['idUsuario'],$datos['idAsignatura']);
							$context =new Context(UPDATE_MODASIGNATURA,$modAsignatura);
							$contextModAsignatura = $controller->action($context);
							$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=".$datos['idAsignatura']."&modificado=y#nav-metodologia";

						} elseif ($contextMetodologia->getEvent() === UPDATE_MODMETODOLOGIA_FAIL){
							$erroresFormulario[] = "No se ha podido modificar la metodología";
						}
					}

				}elseif($contextMetodologia->getEvent() === FIND_MODMETODOLOGIA_FAIL){

					$metodologia = new ModMetodologia(null, $metodologia, $metodologiaI, $datos['idAsignatura']);
					$context = new Context(CREATE_MODMETODOLOGIA, $metodologia);
					$contextMetodologia = $controller->action($context);
					if ($contextMetodologia->getEvent() === CREATE_MODMETODOLOGIA_OK) {

						$modAsignatura=new ModAsignatura($datos['idAsignatura'],date("Y-m-d H:i:s"),$_SESSION['idUsuario'],$datos['idAsignatura']);
						$context =new Context(UPDATE_MODASIGNATURA,$modAsignatura);
						$contextModAsignatura = $controller->action($context);
						$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=".$datos['idAsignatura']."&anadido=y#nav-metodologia";

					} elseif ($contextMetodologia->getEvent() === CREATE_MODMETODOLOGIA_FAIL) {
						$erroresFormulario[] = "No se ha podido crear la metodología";
					}
				}
			}
		}
		else{
			$erroresFormulario[] = "No existe la configuración de la asignatura";
		}

		return $erroresFormulario;
	}
}
