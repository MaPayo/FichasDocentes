<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');
require_once('includes/Negocio/Bibliografia/ModBibliografia.php');

class FormBibliografia extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idBibliografia = isset($datosIniciales['idBibliografia']) ? $datosIniciales['idBibliografia'] : null;
		$citasBibliograficas = isset($datosIniciales['citasBibliograficas']) ? $datosIniciales['citasBibliograficas'] : null;
		$recursosInternet = isset($datosIniciales['recursosInternet']) ? $datosIniciales['recursosInternet'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $idAsignatura);
		$contextConfiguacion = $controller->action($context);

		$html = '<input type="hidden" name="idBibliografia" value="' . $idBibliografia . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />';
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK){
			
			if ($contextConfiguacion->getData()->getCitasBibliograficas() == 1) {
				$html .= '<div class="form-group">
				<label for="citasBibliograficas">Citas Bibliográficas</label>
				<textarea class="form-control" id="citasBibliograficas" rows="10" name="citasBibliograficas" required>' . $citasBibliograficas . '</textarea>
				</div>';
			}
			if ($contextConfiguacion->getData()->getRecursosInternet() == 1) {
				$html .= '<div class="form-group">
				<label for="recursosInternet">Recursos de Internet</label>
				<textarea class="form-control" id="recursosInternet" rows="10" name="recursosInternet" required>' . $recursosInternet . '</textarea>
				</div>';
			}
		}
		
		$html .= '<div class="text-right">
		<a href="indexAcceso.php?IdGrado=' .$idGrado. '&IdAsignatura=' . $idAsignatura . '#nav-bibliografia">
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

		$citasBibliograficas = isset($datos['citasBibliograficas']) ? $datos['citasBibliograficas'] : '';
		$recursosInternet = isset($datos['recursosInternet']) ? $datos['recursosInternet'] : '';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK) {

			if($contextConfiguacion->getData()->getCitasBibliograficas() == 1){
				$citasBibliograficas = self::clean($citasBibliograficas);
				if (empty($citasBibliograficas)) {
					$erroresFormulario[] = "No has introducido las citas bibliográficas.";
				}
			}

			if ($contextConfiguacion->getData()->getRecursosInternet() == 1) {
				$recursosInternet = self::clean($recursosInternet);
				if (empty($recursosInternet)) {
					$erroresFormulario[] = "No has introducido los recursos en internet.";
				}
			}
		}
		
		if (count($erroresFormulario) === 0) {
			$context = new Context(FIND_MODBIBLIOGRAFIA, $datos['idAsignatura']);
			$contextBibliografia = $controller->action($context);

			if ($contextBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_OK) {

				$bibliografia = new ModBibliografia($contextBibliografia->getData()->getIdBibliografia(), $citasBibliograficas, $recursosInternet, $datos['idAsignatura']);
				$context = new Context(UPDATE_MODBIBLIOGRAFIA, $bibliografia);
				$contextBibliografia = $controller->action($context);

				if ($contextBibliografia->getEvent() === UPDATE_MODBIBLIOGRAFIA_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-bibliografia";
				} elseif ($contextBibliografia->getEvent() === UPDATE_MODBIBLIOGRAFIA_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar la bibliografía.";
				}
			} elseif ($contextBibliografia->getEvent() === FIND_MODBIBLIOGRAFIA_FAIL) {

				$bibliografia = new ModBibliografia(null, $citasBibliograficas, $recursosInternet, $datos['idAsignatura']);
				$context = new Context(CREATE_MODBIBLIOGRAFIA, $bibliografia);
				$contextBibliografia = $controller->action($context);

				if ($contextBibliografia->getEvent() === CREATE_MODBIBLIOGRAFIA_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-bibliografia";
				} elseif ($contextBibliografia->getEvent() === CREATE_MODBIBLIOGRAFIA_FAIL) {
					$erroresFormulario[] = "No se ha podido crear la bibliografia.";
				}
			}
		}
		return $erroresFormulario;
	}
}
