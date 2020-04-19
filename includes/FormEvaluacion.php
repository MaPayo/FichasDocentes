<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormEvaluacion extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idEvaluacion = isset($datosIniciales['idEvaluacion']) ? $datosIniciales['idEvaluacion'] : null;
		$realizacionExamenes = isset($datosIniciales['realizacionExamenes']) ? $datosIniciales['realizacionExamenes'] : null;
		$realizacionExamenesI = isset($datosIniciales['realizacionExamenesI']) ? $datosIniciales['realizacionExamenesI'] : null;
		$pesoExamenes = isset($datosIniciales['pesoExamenes']) ? $datosIniciales['pesoExamenes'] : null;
		$calificacionFinal = isset($datosIniciales['calificacionFinal']) ? $datosIniciales['calificacionFinal'] : null;
		$calificacionFinalI = isset($datosIniciales['calificacionFinalI']) ? $datosIniciales['calificacionFinalI'] : null;
		$realizacionActividades = isset($datosIniciales['realizacionActividades']) ? $datosIniciales['realizacionActividades'] : null;
		$realizacionActividadesI = isset($datosIniciales['realizacionActividadesI']) ? $datosIniciales['realizacionActividadesI'] : null;
		$pesoActividades = isset($datosIniciales['pesoActividades']) ? $datosIniciales['pesoActividades'] : null;
		$realizacionLaboratorio = isset($datosIniciales['realizacionLaboratorio']) ? $datosIniciales['realizacionLaboratorio'] : null;
		$realizacionLaboratorioI = isset($datosIniciales['realizacionLaboratorioI']) ? $datosIniciales['realizacionLaboratorioI'] : null;
		$pesoLaboratorio = isset($datosIniciales['pesoLaboratorio']) ? $datosIniciales['pesoLaboratorio'] : null;
		$maximoExamenes = isset($datosIniciales['maximoExamenes']) ? $datosIniciales['maximoExamenes'] : null;
		$minimoExamenes = isset($datosIniciales['minimoExamenes']) ? $datosIniciales['minimoExamenes'] : null;
		$maximoActividades = isset($datosIniciales['maximoActividades']) ? $datosIniciales['maximoActividades'] : null;
		$minimoActividades = isset($datosIniciales['minimoActividades']) ? $datosIniciales['minimoActividades'] : null;
		$maximoLaboratorio = isset($datosIniciales['maximoLaboratorio']) ? $datosIniciales['maximoLaboratorio'] : null;
		$minimoLaboratorio = isset($datosIniciales['minimoLaboratorio']) ? $datosIniciales['minimoLaboratorio'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;

		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $idAsignatura);
		$contextConfiguacion = $controller->action($context);

		$html = '<input type="hidden" name="idEvaluacion" value="' . $idEvaluacion . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getRealizacionExamenes() == 1) {
			$html .= '<div class="form-group">
			<label for="pesoExamenes">Peso Examenes</label>
			<input class="form-control" type="number" id="pesoExamenes" name="pesoExamenes" min="' . $minimoExamenes . '" max="' . $maximoExamenes . '" step="1" value="' . $pesoExamenes . '">
		</div>

		<div class="form-group">
		<label for="realizacionExamenes">Realización Exámenes</label>
		<textarea class="form-control" id="realizacionExamenes" rows="3" name="realizacionExamenes" >' . $realizacionExamenes . '</textarea>
		</div>

		<div class="form-group">
		<label for="realizacionExamenesI">Realización Exámenes (Inglés)</label>
		<textarea class="form-control" id="realizacionExamenesI" rows="3" name="realizacionExamenesI" >' . $realizacionExamenesI . '</textarea>
		</div>';
		}

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getCalificacionFinal() == 1) {
			$html .= '<div class="form-group">
		<label for="calificacionFinal">Calificación Final</label>
		<textarea class="form-control" id="calificacionFinal" rows="3" name="calificacionFinal" >' . $calificacionFinal . '</textarea>
		</div>

		<div class="form-group">
		<label for="calificacionFinalI">Calificación Final (Inglés)</label>
		<textarea class="form-control" id="calificacionFinalI" rows="3" name="calificacionFinalI" >' . $calificacionFinalI . '</textarea>
		</div>';
		}

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getRealizacionActividades() == 1) {
			$html .= '<div class="form-group">
			<label for="pesoActividades">Peso Actividades</label>
			<input class="form-control" type="number" id="pesoActividades" name="pesoActividades" min="' . $minimoActividades . '" max="' . $maximoActividades . '" step="1" value="' . $pesoActividades . '">
		</div>

		<div class="form-group">
		<label for="realizacionActividades">Realización Actividades</label>
		<textarea class="form-control" id="realizacionActividades" rows="3" name="realizacionActividades" >' . $realizacionActividades . '</textarea>
		</div>

		<div class="form-group">
		<label for="realizacionActividadesI">Realización Actividades (Inglés)</label>
		<textarea class="form-control" id="realizacionActividadesI" rows="3" name="realizacionActividadesI" >' . $realizacionActividadesI . '</textarea>
		</div>';
		}

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getRealizacionLaboratorio() == 1) {
			$html .= '<div class="form-group">
			<label for="pesoLaboratorio">Peso Laboratorio</label>
			<input class="form-control" type="number" id="pesoLaboratorio" name="pesoLaboratorio" min="' . $maximoLaboratorio . '" max="' . $minimoLaboratorio . '" step="1" value="' . $pesoLaboratorio . '">
		</div>

		<div class="form-group">
		<label for="realizacionLaboratorio">Realización Laboratorio</label>
		<textarea class="form-control" id="realizacionLaboratorio" rows="3" name="realizacionLaboratorio" >' . $realizacionLaboratorio . '</textarea>
		</div>

		<div class="form-group">
		<label for="realizacionLaboratorioI">Realización Laboratorio (Inglés)</label>
		<textarea class="form-control" id="realizacionLaboratorioI" rows="3" name="realizacionLaboratorioI" >' . $realizacionLaboratorioI . '</textarea>
		</div>';
		}

		$html .= '<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $idAsignatura . '">
            <button type="button" class="btn btn-secondary" id="btn-form">
                Cancelar
            </button>
        </a>

		<button type="submit" class="btn btn-success" id="btn-form name="registrar">Guardar</button>
		</div>';
		return $html;
	}

	protected function procesaFormulario($datos)
	{

		$erroresFormulario = array();
		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $datos['idAsignatura']);
		$contextConfiguacion = $controller->action($context);

		$realizacionExamenes = isset($datos['realizacionExamenes']) ? $datos['realizacionExamenes'] : null;
		$realizacionExamenesI = isset($datos['realizacionExamenesI']) ? $datos['realizacionExamenesI'] : null;
		$pesoExamenes = isset($datos['pesoExamenes']) ? $datos['pesoExamenes'] : null;
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getRealizacionExamenes() == 1) {
			$realizacionExamenes = self::clean($realizacionExamenes);
			if (empty($realizacionExamenes)) {
				$erroresFormulario[] = "No has introducido la realizacion de examenes.";
			}


			$realizacionExamenesI = self::clean($realizacionExamenesI);
			if (empty($realizacionExamenesI)) {
				$erroresFormulario[] = "No has introducido la realizacion de examenes en ingles.";
			}


			$pesoExamenes = self::clean($pesoExamenes);
			if (empty($pesoExamenes)) {
				$erroresFormulario[] = "No has introducido el peso examenes.";
			}
		}

		$calificacionFinal = isset($datos['calificacionFinal']) ? $datos['calificacionFinal'] : null;
		$calificacionFinalI = isset($datos['calificacionFinalI']) ? $datos['calificacionFinalI'] : null;
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getCalificacionFinal() == 1) {
			$calificacionFinal = self::clean($calificacionFinal);
			if (empty($calificacionFinal)) {
				$erroresFormulario[] = "No has introducido la calificacion final";
			}


			$calificacionFinalI = self::clean($calificacionFinalI);
			if (empty($calificacionFinalI)) {
				$erroresFormulario[] = "No has introducido la calificacion final en ingles";
			}
		}

		$realizacionActividades = isset($datos['realizacionActividades']) ? $datos['realizacionActividades'] : null;
		$realizacionActividadesI = isset($datos['realizacionActividadesI']) ? $datos['realizacionActividadesI'] : null;
		$pesoActividades = isset($datos['pesoActividades']) ? $datos['pesoActividades'] : null;
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getRealizacionActividades() == 1) {
			$realizacionActividades = self::clean($realizacionActividades);
			if (empty($realizacionActividades)) {
				$erroresFormulario[] = "No has introducido la realizacion de actividades";
			}


			$realizacionActividadesI = self::clean($realizacionActividadesI);
			if (empty($realizacionActividadesI)) {
				$erroresFormulario[] = "No has introducido la realizacion de actividades en ingles";
			}


			$pesoActividades = self::clean($pesoActividades);
			if (empty($pesoActividades)) {
				$erroresFormulario[] = "No has introducido el peso actividades";
			}
		}

		$realizacionLaboratorio = isset($datos['realizacionLaboratorio']) ? $datos['realizacionLaboratorio'] : "";
		$realizacionLaboratorioI = isset($datos['realizacionLaboratorioI']) ? $datos['realizacionLaboratorioI'] : "";
		$pesoLaboratorio = isset($datos['pesoLaboratorio']) ? $datos['pesoLaboratorio'] : 0;
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getRealizacionLaboratorio() == 1) {
			$realizacionLaboratorio = self::clean($realizacionLaboratorio);
			if (empty($realizacionLaboratorio)) {
				$erroresFormulario[] = "No has introducido la realizacion de laboratorio";
			}


			$realizacionLaboratorioI = self::clean($realizacionLaboratorioI);
			if (empty($realizacionLaboratorioI)) {
				$erroresFormulario[] = "No has introducido la realizacion de laboratorio en ingles";
			}


			$pesoLaboratorio = self::clean($pesoLaboratorio);
			if (empty($pesoLaboratorio)) {
				$erroresFormulario[] = "No has introducido el peso laboratorio";
			}
		}



		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$context = new Context(FIND_MODEVALUACION, $datos['idAsignatura']);
			$contextEvaluacion = $controller->action($context);

			if ($contextEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {

				$evaluacion = new Evaluacion($datos['idEvaluacion'], $realizacionExamenes, $realizacionExamenesI, $pesoExamenes, $calificacionFinal, $calificacionFinalI, $realizacionActividades, $realizacionActividadesI, $pesoActividades, $realizacionLaboratorio, $realizacionLaboratorioI, $pesoLaboratorio, $datos['idAsignatura']);
				$context = new Context(UPDATE_MODEVALUACION, $evaluacion);
				$contextEvaluacion = $controller->action($context);

				if ($contextEvaluacion->getEvent() === UPDATE_MODEVALUACION_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y";
				} elseif ($contextEvaluacion->getEvent() === UPDATE_MODEVALUACION_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar la evaluacion.";
				}
			} elseif ($contextEvaluacion->getEvent() === FIND_MODEVALUACION_FAIL) {

				$evaluacion = new Evaluacion(null, $realizacionExamenes, $realizacionExamenesI, $pesoExamenes, $calificacionFinal, $calificacionFinalI, $realizacionActividades, $realizacionActividadesI, $pesoActividades, $realizacionLaboratorio, $realizacionLaboratorioI, $pesoLaboratorio, $datos['idAsignatura']);
				$context = new Context(CREATE_MODEVALUACION, $evaluacion);
				$contextEvaluacion = $controller->action($context);

				if ($contextEvaluacion->getEvent() === CREATE_MODEVALUACION_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y";
				} elseif ($contextEvaluacion->getEvent() === CREATE_MODEVALUACION_FAIL) {
					$erroresFormulario[] = "No se ha podido crear la evaluacion.";
				}
			}
		}
		return $erroresFormulario;
	}
}
