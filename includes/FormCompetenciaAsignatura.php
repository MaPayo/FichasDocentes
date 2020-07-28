<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');
require_once('includes/Negocio/CompetenciasAsignatura/ModCompetenciaAsignatura.php');

class FormCompetenciaAsignatura extends Form
{

	protected function generaCamposFormulario($datosIniciales){

		$idCompetencia = isset($datosIniciales['idCompetencia']) ? $datosIniciales['idCompetencia'] : null;
		$generales = isset($datosIniciales['generales']) ? $datosIniciales['generales'] : null;
		$generalesI = isset($datosIniciales['generalesI']) ? $datosIniciales['generalesI'] : null;
		$especificas = isset($datosIniciales['especificas']) ? $datosIniciales['especificas'] : null;
		$especificasI = isset($datosIniciales['especificasI']) ? $datosIniciales['especificasI'] : null;
		$basicasYTransversales = isset($datosIniciales['basicasYTransversales']) ? $datosIniciales['basicasYTransversales'] : null;
		$basicasYTransversalesI = isset($datosIniciales['basicasYTransversalesI']) ? $datosIniciales['basicasYTransversalesI'] : null;
		$resultadosAprendizaje = isset($datosIniciales['resultadosAprendizaje']) ? $datosIniciales['resultadosAprendizaje'] : null;
		$resultadosAprendizajeI = isset($datosIniciales['resultadosAprendizajeI']) ? $datosIniciales['resultadosAprendizajeI'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $idAsignatura);
		$contextConfiguacion = $controller->action($context);
		$context = new Context(FIND_ASIGNATURA, $idAsignatura);
		$contextAsignatura = $controller->action($context);

		$html = '<input type="hidden" name="idCompetencia" value="' . $idCompetencia . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK){

			if ($contextConfiguacion->getData()->getComGenerales() == 1) {
				$html .= '<div class="form-group">
				<label for="generales">Generales</label>
				<textarea class="form-control" id="generales" rows="3" name="generales" >' . $generales . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="generalesI">Generales (Ingles)</label>
					<textarea class="form-control" id="generalesI" rows="3" name="generalesI" >' . $generalesI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getComEspecificas() == 1) {
				$html .= '<div class="form-group">
				<label for="especificas">Especificas</label>
				<textarea class="form-control" id="especificas" rows="3" name="especificas" >' . $especificas . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="especificasI">Especificas (Ingles)</label>
					<textarea class="form-control" id="especificasI" rows="3" name="especificasI" >' . $especificasI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getComBasicas() == 1) {
				$html .= '<div class="form-group">
				<label for="basicasYTransversales">Basicas Y Transversales</label>
				<textarea class="form-control" id="basicasYTransversales" rows="3" name="basicasYTransversales" >' . $basicasYTransversales . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="basicasYTransversalesI">Basicas Y Transversales (Ingles)</label>
					<textarea class="form-control" id="basicasYTransversalesI" rows="3" name="basicasYTransversalesI" >' . $basicasYTransversalesI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getResultadosAprendizaje() == 1) {
				$html .= '<div class="form-group">
				<label for="resultadosAprendizaje">Resultados Aprendizaje</label>
				<textarea class="form-control" id="resultadosAprendizaje" rows="3" name="resultadosAprendizaje" >' . $resultadosAprendizaje . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="resultadosAprendizajeI">Resultados Aprendizaje (Ingles)</label>
					<textarea class="form-control" id="resultadosAprendizajeI" rows="3" name="resultadosAprendizajeI" >' . $resultadosAprendizajeI . '</textarea>
					</div>';
				}
			}
		}

		$html .= '<div class="text-right">
		<a href="indexAcceso.php?IdGrado=' .$idGrado. '&IdAsignatura=' . $idAsignatura . '#nav-comp-asignatura">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Cancelar
		</button>
		</a>

		<button type="submit" class="btn btn-success" id="btn-form" name="registrar">Guardar</button>
		</div>';
		return $html;
	}

	protected function procesaFormulario($datos){

		$erroresFormulario = array();
		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $datos['idAsignatura']);
		$contextConfiguacion = $controller->action($context);
		$context = new Context(FIND_ASIGNATURA, $datos['idAsignatura']);
		$contextAsignatura = $controller->action($context);

		$generales = isset($datos['generales']) ? $datos['generales'] : '';
		$generalesI = isset($datos['generalesI']) ? $datos['generalesI'] : '';
		$especificas = isset($datos['especificas']) ? $datos['especificas'] : '';
		$especificasI = isset($datos['especificasI']) ? $datos['especificasI'] : '';
		$basicasYTransversales = isset($datos['basicasYTransversales']) ? $datos['basicasYTransversales'] : '';
		$basicasYTransversalesI = isset($datos['basicasYTransversalesI']) ? $datos['basicasYTransversalesI'] : '';
		$resultadosAprendizaje = isset($datos['resultadosAprendizaje']) ? $datos['resultadosAprendizaje'] : '';
		$resultadosAprendizajeI = isset($datos['resultadosAprendizajeI']) ? $datos['resultadosAprendizajeI'] : '';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK) {

			if ($contextConfiguacion->getData()->getComGenerales() == 1) {
				$generales = self::clean($generales);
				if (empty($generales)) {
					$erroresFormulario[] = "No has introducido las competencias generales.";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$generalesI = self::clean($generalesI);
					if (empty($generalesI)) {
						$erroresFormulario[] = "No has introducido las competencias generales en inglés.";
					}
				}
			}

			if ($contextConfiguacion->getData()->getComEspecificas() == 1) {
				$especificas = self::clean($especificas);
				if (empty($especificas)) {
					$erroresFormulario[] = "No has introducido las competencias específicas.";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$especificasI = self::clean($especificasI);
					if (empty($especificasI)) {
						$erroresFormulario[] = "No has introducido las competencias especificas en inglés.";
					}
				}
			}

			if ($contextConfiguacion->getData()->getComBasicas() == 1) {
				$basicasYTransversales = self::clean($basicasYTransversales);
				if (empty($basicasYTransversales)) {
					$erroresFormulario[] = "No has introducido las competencias basicas y transversales.";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$basicasYTransversalesI = self::clean($basicasYTransversalesI);
					if (empty($basicasYTransversalesI)) {
						$erroresFormulario[] = "No has introducido las competencias basicas y trasnversales en inglés.";
					}
				}
			}

			if ($contextConfiguacion->getData()->getResultadosAprendizaje() == 1) {
				$resultadosAprendizaje = self::clean($resultadosAprendizaje);
				if (empty($resultadosAprendizaje)) {
					$erroresFormulario[] = "No has introducido los resultados de aprendizaje.";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$resultadosAprendizajeI = self::clean($resultadosAprendizajeI);
					if (empty($resultadosAprendizajeI)) {
						$erroresFormulario[] = "No has introducido los resultados de aprendizaje en inglés.";
					}
				}
			}
		}
		
		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$context = new Context(FIND_MODCOMPETENCIAS_ASIGNATURA, $datos['idAsignatura']);
			$contextCompetencia = $controller->action($context);

			if ($contextCompetencia->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_OK) {

				$competencia = new ModCompetenciaAsignatura($contextCompetencia->getData()->getIdCompetencia(), $generales, $generalesI, $especificas, $especificasI, $basicasYTransversales, $basicasYTransversalesI, $resultadosAprendizaje, $resultadosAprendizajeI, $datos['idAsignatura']);
				$context = new Context(UPDATE_MODCOMPETENCIAS_ASIGNATURA, $competencia);
				$contextCompetencia = $controller->action($context);

				if ($contextCompetencia->getEvent() === UPDATE_MODCOMPETENCIAS_ASIGNATURA_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-comp-asignatura";
				} elseif ($contextCompetencia->getEvent() === UPDATE_MODCOMPETENCIAS_ASIGNATURA_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar las competencias de asignatura.";
				}
			} elseif ($contextCompetencia->getEvent() === FIND_MODCOMPETENCIAS_ASIGNATURA_FAIL) {

				$competencia = new ModCompetenciaAsignatura(null, $generales, $generalesI, $especificas, $especificasI, $basicasYTransversales, $basicasYTransversalesI, $resultadosAprendizaje, $resultadosAprendizajeI, $datos['idAsignatura']);
				$context = new Context(CREATE_MODCOMPETENCIAS_ASIGNATURA, $competencia);
				$contextCompetencia = $controller->action($context);

				if ($contextCompetencia->getEvent() === CREATE_MODCOMPETENCIAS_ASIGNATURA_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-comp-asignatura";
				} elseif ($contextCompetencia->getEvent() === CREATE_MODCOMPETENCIAS_ASIGNATURA_FAIL) {
					$erroresFormulario[] = "No se ha podido crear las competencias de asignatura.";
				}
			}
		}
		return $erroresFormulario;
	}
}
