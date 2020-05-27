<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');
require_once('includes/Negocio/Evaluacion/ModEvaluacion.php');

class FormEvaluacion extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idEvaluacion = isset($datosIniciales['idEvaluacion']) ? $datosIniciales['idEvaluacion'] : null;
		$realizacionExamenes = isset($datosIniciales['realizacionExamenes']) ? $datosIniciales['realizacionExamenes'] : null;
		$realizacionExamenesI = isset($datosIniciales['realizacionExamenesI']) ? $datosIniciales['realizacionExamenesI'] : null;
		$pesoExamenes = isset($datosIniciales['pesoExamenes']) ? $datosIniciales['pesoExamenes'] : 0;
		$calificacionFinal = isset($datosIniciales['calificacionFinal']) ? $datosIniciales['calificacionFinal'] : null;
		$calificacionFinalI = isset($datosIniciales['calificacionFinalI']) ? $datosIniciales['calificacionFinalI'] : null;
		$realizacionActividades = isset($datosIniciales['realizacionActividades']) ? $datosIniciales['realizacionActividades'] : null;
		$realizacionActividadesI = isset($datosIniciales['realizacionActividadesI']) ? $datosIniciales['realizacionActividadesI'] : null;
		$pesoActividades = isset($datosIniciales['pesoActividades']) ? $datosIniciales['pesoActividades'] : 0;
		$realizacionLaboratorio = isset($datosIniciales['realizacionLaboratorio']) ? $datosIniciales['realizacionLaboratorio'] : null;
		$realizacionLaboratorioI = isset($datosIniciales['realizacionLaboratorioI']) ? $datosIniciales['realizacionLaboratorioI'] : null;
		$pesoLaboratorio = isset($datosIniciales['pesoLaboratorio']) ? $datosIniciales['pesoLaboratorio'] : 0;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;

		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $idAsignatura);
		$contextConfiguacion = $controller->action($context);
		$context = new Context(FIND_ASIGNATURA, $idAsignatura);
		$contextAsignatura = $controller->action($context);
		$contextVerifica = new Context(FIND_VERIFICA, $idAsignatura);
		$contextVerifica = $controller->action($contextVerifica);

		$html = '<input type="hidden" name="idEvaluacion" value="' . $idEvaluacion . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextVerifica->getEvent() === FIND_VERIFICA_OK) {

			if ($contextConfiguacion->getData()->getRealizacionExamenes() == 1) {
				$html .= '<div class="form-group">
				<label for="pesoExamenes">Peso Examenes</label>
				<input class="form-control" type="number" id="pesoExamenes" name="pesoExamenes" min="' . $contextVerifica->getData()->getMinimoExamenes() . '" max="' . $contextVerifica->getData()->getMaximoExamenes() . '" step="1" value="' . $pesoExamenes . '">
				</div>

				<div class="form-group">
				<label for="realizacionExamenes">Realización Exámenes</label>
				<textarea class="form-control" id="_realizacionExamenes" rows="10" name="realizacionExamenes" >' . $realizacionExamenes . '</textarea>
				</div>';

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$html .= '<div class="form-group">
					<label for="realizacionExamenesI">Realización Exámenes (Inglés)</label>
					<textarea class="form-control" id="_realizacionExamenesI" rows="10" name="realizacionExamenesI" >' . $realizacionExamenesI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getCalificacionFinal() == 1) {
				$html .= '<div class="form-group">
				<label for="calificacionFinal">Calificación Final</label>
				<textarea class="form-control" id="_calificacionFinal" rows="10" name="calificacionFinal" >' . $calificacionFinal . '</textarea>
				</div>';

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$html .= '<div class="form-group">
					<label for="calificacionFinalI">Calificación Final (Inglés)</label>
					<textarea class="form-control" id="_calificacionFinalI" rows="10" name="calificacionFinalI" >' . $calificacionFinalI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getRealizacionActividades() == 1) {
				$html .= '<div class="form-group">
				<label for="pesoActividades">Peso Actividades</label>
				<input class="form-control" type="number" id="pesoActividades" name="pesoActividades" min="' . $contextVerifica->getData()->getMinimoActividades() . '" max="' . $contextVerifica->getData()->getMaximoActividades() . '" step="1" value="' . $pesoActividades . '">
				</div>

				<div class="form-group">
				<label for="realizacionActividades">Realización Actividades</label>
				<textarea class="form-control" id="_realizacionActividades" rows="10" name="realizacionActividades" >' . $realizacionActividades . '</textarea>
				</div>';

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$html .= '<div class="form-group">
					<label for="realizacionActividadesI">Realización Actividades (Inglés)</label>
					<textarea class="form-control" id="_realizacionActividadesI" rows="10" name="realizacionActividadesI" >' . $realizacionActividadesI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getRealizacionLaboratorio() == 1) {
				$html .= '<div class="form-group">
				<label for="pesoLaboratorio">Peso Laboratorio</label>
				<input class="form-control" type="number" id="_pesoLaboratorio" name="pesoLaboratorio" min="' . $contextVerifica->getData()->getMinimoLaboratorio() . '" max="' . $contextVerifica->getData()->getMaximoLaboratorio() . '" step="1" value="' . $pesoLaboratorio . '">
				</div>

				<div class="form-group">
				<label for="realizacionLaboratorio">Realización Laboratorio</label>
				<textarea class="form-control" id="_realizacionLaboratorio" rows="10" name="realizacionLaboratorio" >' . $realizacionLaboratorio . '</textarea>
				</div>';

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$html .= '<div class="form-group">
					<label for="realizacionLaboratorioI">Realización Laboratorio (Inglés)</label>
					<textarea class="form-control" id="_realizacionLaboratorioI" rows="10" name="realizacionLaboratorioI" >' . $realizacionLaboratorioI . '</textarea>
					</div>';
				}
			}
		}

		$html .= '<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $idAsignatura . '#nav-evaluacion">
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
		$context = new Context(FIND_ASIGNATURA, $datos['idAsignatura']);
		$contextAsignatura = $controller->action($context);

		$realizacionExamenes = isset($datos['realizacionExamenes']) ? $datos['realizacionExamenes'] : '';
		$realizacionExamenesI = isset($datos['realizacionExamenesI']) ? $datos['realizacionExamenesI'] : '';
		$pesoExamenes = isset($datos['pesoExamenes']) ? $datos['pesoExamenes'] : 0;

		$calificacionFinal = isset($datos['calificacionFinal']) ? $datos['calificacionFinal'] : '';
		$calificacionFinalI = isset($datos['calificacionFinalI']) ? $datos['calificacionFinalI'] : '';

		$realizacionActividades = isset($datos['realizacionActividades']) ? $datos['realizacionActividades'] : '';
		$realizacionActividadesI = isset($datos['realizacionActividadesI']) ? $datos['realizacionActividadesI'] : '';
		$pesoActividades = isset($datos['pesoActividades']) ? $datos['pesoActividades'] : 0;

		$realizacionLaboratorio = isset($datos['realizacionLaboratorio']) ? $datos['realizacionLaboratorio'] : '';
		$realizacionLaboratorioI = isset($datos['realizacionLaboratorioI']) ? $datos['realizacionLaboratorioI'] : '';
		$pesoLaboratorio = isset($datos['pesoLaboratorio']) ? $datos['pesoLaboratorio'] : 0;

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK) {
			if ($contextConfiguacion->getData()->getRealizacionExamenes() == 1) {
				$realizacionExamenes = self::clean($realizacionExamenes);
				if (empty($realizacionExamenes)) {
					$erroresFormulario[] = "No has introducido la realización de exámenes.";
				}

				$pesoExamenes = self::clean($pesoExamenes);
				if (empty($pesoExamenes)) {
					$erroresFormulario[] = "No has introducido el peso exámenes.";
				}

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$realizacionExamenesI = self::clean($realizacionExamenesI);
					if (empty($realizacionExamenesI)) {
						$erroresFormulario[] = "No has introducido la realización de exámenes en inglés.";
					}
				}
			}


			if ($contextConfiguacion->getData()->getCalificacionFinal() == 1) {
				$calificacionFinal = self::clean($calificacionFinal);
				if (empty($calificacionFinal)) {
					$erroresFormulario[] = "No has introducido la calificación final.";
				}


				$calificacionFinalI = self::clean($calificacionFinalI);
				if (empty($calificacionFinalI)) {
					$erroresFormulario[] = "No has introducido la calificación final en inglés.";
				}
			}


			if ($contextConfiguacion->getData()->getRealizacionActividades() == 1) {
				$realizacionActividades = self::clean($realizacionActividades);
				if (empty($realizacionActividades)) {
					$erroresFormulario[] = "No has introducido la realización de actividades.";
				}

				$pesoActividades = self::clean($pesoActividades);
				if (empty($pesoActividades)) {
					$erroresFormulario[] = "No has introducido el peso actividades.";
				}

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$realizacionActividadesI = self::clean($realizacionActividadesI);
					if (empty($realizacionActividadesI)) {
						$erroresFormulario[] = "No has introducido la realización de actividades en inglés.";
					}
				}
			}


			if ($contextConfiguacion->getData()->getRealizacionLaboratorio() == 1) {
				$realizacionLaboratorio = self::clean($realizacionLaboratorio);
				if (empty($realizacionLaboratorio)) {
					$erroresFormulario[] = "No has introducido la realización de laboratorio.";
				}

				$pesoLaboratorio = self::clean($pesoLaboratorio);
				if (empty($pesoLaboratorio)) {
					$erroresFormulario[] = "No has introducido el peso laboratorio.";
				}

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$realizacionLaboratorioI = self::clean($realizacionLaboratorioI);
					if (empty($realizacionLaboratorioI)) {
						$erroresFormulario[] = "No has introducido la realizacioón de laboratorio en inglés.";
					}
				}
			}
		}


		if (count($erroresFormulario) === 0) {
			$context = new Context(FIND_MODEVALUACION, $datos['idAsignatura']);
			$contextEvaluacion = $controller->action($context);

			if ($contextEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {

				$evaluacion = new ModEvaluacion($contextEvaluacion->getData()->getIdEvaluacion(), $realizacionExamenes, $realizacionExamenesI, $pesoExamenes, $calificacionFinal, $calificacionFinalI, $realizacionActividades, $realizacionActividadesI, $pesoActividades, $realizacionLaboratorio, $realizacionLaboratorioI, $pesoLaboratorio, $datos['idAsignatura']);
				$context = new Context(UPDATE_MODEVALUACION, $evaluacion);
				$contextEvaluacion = $controller->action($context);

				if ($contextEvaluacion->getEvent() === UPDATE_MODEVALUACION_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-evaluacion";
				} elseif ($contextEvaluacion->getEvent() === UPDATE_MODEVALUACION_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar la evaluación.";
				}
			} elseif ($contextEvaluacion->getEvent() === FIND_MODEVALUACION_FAIL) {

				$evaluacion = new ModEvaluacion(null, $realizacionExamenes, $realizacionExamenesI, $pesoExamenes, $calificacionFinal, $calificacionFinalI, $realizacionActividades, $realizacionActividadesI, $pesoActividades, $realizacionLaboratorio, $realizacionLaboratorioI, $pesoLaboratorio, $datos['idAsignatura']);
				$context = new Context(CREATE_MODEVALUACION, $evaluacion);
				$contextEvaluacion = $controller->action($context);

				if ($contextEvaluacion->getEvent() === CREATE_MODEVALUACION_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-evaluacion";
				} elseif ($contextEvaluacion->getEvent() === CREATE_MODEVALUACION_FAIL) {
					$erroresFormulario[] = "No se ha podido crear la evaluación.";
				}
			}
		}
		return $erroresFormulario;
	}
}
