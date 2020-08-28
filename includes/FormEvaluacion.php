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
		$realizacionActividades = isset($datosIniciales['realizacionActividades']) ? $datosIniciales['realizacionActividades'] : null;
		$realizacionActividadesI = isset($datosIniciales['realizacionActividadesI']) ? $datosIniciales['realizacionActividadesI'] : null;
		$pesoActividades = isset($datosIniciales['pesoActividades']) ? $datosIniciales['pesoActividades'] : 0;
		$realizacionLaboratorio = isset($datosIniciales['realizacionLaboratorio']) ? $datosIniciales['realizacionLaboratorio'] : null;
		$realizacionLaboratorioI = isset($datosIniciales['realizacionLaboratorioI']) ? $datosIniciales['realizacionLaboratorioI'] : null;
		$pesoLaboratorio = isset($datosIniciales['pesoLaboratorio']) ? $datosIniciales['pesoLaboratorio'] : 0;
		$calificacionFinal = isset($datosIniciales['calificacionFinal']) ? $datosIniciales['calificacionFinal'] : null;
		$calificacionFinalI = isset($datosIniciales['calificacionFinalI']) ? $datosIniciales['calificacionFinalI'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $idAsignatura);
		$contextConfiguacion = $controller->action($context);
		$context = new Context(FIND_ASIGNATURA, $idAsignatura);
		$contextAsignatura = $controller->action($context);
		$contextVerifica = new Context(FIND_VERIFICA, $idAsignatura);
		$contextVerifica = $controller->action($contextVerifica);

		$html = '<input type="hidden" name="idEvaluacion" value="' . $idEvaluacion . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextVerifica->getEvent() === FIND_VERIFICA_OK) {

			if ($contextConfiguacion->getData()->getRealizacionExamenes() == 1) {
				$html .= '<div class="form-group">
				<label for="pesoExamenes">Peso de los exámenes (porcentaje)</label>
				<input class="form-control" type="number" id="pesoExamenes" name="pesoExamenes" min="' . $contextVerifica->getData()->getMinimoExamenes() . '" max="' . $contextVerifica->getData()->getMaximoExamenes() . '" step="1" value="' . $pesoExamenes . '" required />
				</div>

				<div class="form-group">
				<label for="realizacionExamenes">Realización de los exámenes</label>
				<textarea class="form-control" id="realizacionExamenes" rows="10" name="realizacionExamenes" required>' . $realizacionExamenes . '</textarea>
				</div>';

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$html .= '<div class="form-group">
					<label for="realizacionExamenesI">Realización de los exámenes (Inglés)</label>
					<textarea class="form-control" id="realizacionExamenesI" rows="10" name="realizacionExamenesI" required>' . $realizacionExamenesI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getRealizacionActividades() == 1) {
				$html .= '<div class="form-group">
				<label for="pesoActividades">Peso de las actividades (porcentaje)</label>
				<input class="form-control" type="number" id="pesoActividades" name="pesoActividades" min="' . $contextVerifica->getData()->getMinimoActividades() . '" max="' . $contextVerifica->getData()->getMaximoActividades() . '" step="1" value="' . $pesoActividades . '" required />
				</div>

				<div class="form-group">
				<label for="realizacionActividades">Realización de las actividades</label>
				<textarea class="form-control" id="realizacionActividades" rows="10" name="realizacionActividades" required>' . $realizacionActividades . '</textarea>
				</div>';

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$html .= '<div class="form-group">
					<label for="realizacionActividadesI">Realización de las actividades (Inglés)</label>
					<textarea class="form-control" id="realizacionActividadesI" rows="10" name="realizacionActividadesI" required>' . $realizacionActividadesI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getRealizacionLaboratorio() == 1) {
				$html .= '<div class="form-group">
				<label for="pesoLaboratorio">Peso del laboratorio (porcentaje)</label>
				<input class="form-control" type="number" id="pesoLaboratorio" name="pesoLaboratorio" min="' . $contextVerifica->getData()->getMinimoLaboratorio() . '" max="' . $contextVerifica->getData()->getMaximoLaboratorio() . '" step="1" value="' . $pesoLaboratorio . '" required />
				</div>

				<div class="form-group">
				<label for="realizacionLaboratorio">Realización del laboratorio</label>
				<textarea class="form-control" id="realizacionLaboratorio" rows="10" name="realizacionLaboratorio" required>' . $realizacionLaboratorio . '</textarea>
				</div>';

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$html .= '<div class="form-group">
					<label for="realizacionLaboratorioI">Realización del laboratorio (Inglés)</label>
					<textarea class="form-control" id="realizacionLaboratorioI" rows="10" name="realizacionLaboratorioI" required>' . $realizacionLaboratorioI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getCalificacionFinal() == 1) {
				$html .= '<div class="form-group">
				<label for="calificacionFinal">Calificación final</label>
				<textarea class="form-control" id="calificacionFinal" rows=10 name="calificacionFinal" required>' . $calificacionFinal . '</textarea>
				</div>';

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$html .= '<div class="form-group">
					<label for="calificacionFinalI">Calificación final (Inglés)</label>
					<textarea class="form-control" id="calificacionFinalI" rows="10" name="calificacionFinalI" required>' . $calificacionFinalI . '</textarea>
					</div>';
				}
			}
		}

		$html .= '<div class="text-right">
		<a href="indexAcceso.php?IdGrado=' .$idGrado. '&IdAsignatura=' . $idAsignatura . '#nav-evaluacion">
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

		$realizacionActividades = isset($datos['realizacionActividades']) ? $datos['realizacionActividades'] : '';
		$realizacionActividadesI = isset($datos['realizacionActividadesI']) ? $datos['realizacionActividadesI'] : '';
		$pesoActividades = isset($datos['pesoActividades']) ? $datos['pesoActividades'] : 0;

		$realizacionLaboratorio = isset($datos['realizacionLaboratorio']) ? $datos['realizacionLaboratorio'] : '';
		$realizacionLaboratorioI = isset($datos['realizacionLaboratorioI']) ? $datos['realizacionLaboratorioI'] : '';
		$pesoLaboratorio = isset($datos['pesoLaboratorio']) ? $datos['pesoLaboratorio'] : 0;

		$calificacionFinal = isset($datos['calificacionFinal']) ? $datos['calificacionFinal'] : '';
		$calificacionFinalI = isset($datos['calificacionFinalI']) ? $datos['calificacionFinalI'] : '';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK) {
			if ($contextConfiguacion->getData()->getRealizacionExamenes() == 1) {
				$realizacionExamenes = self::clean($realizacionExamenes);
				if (empty($realizacionExamenes)) {
					$erroresFormulario[] = "No has introducido la realización de los exámenes";
				}

				$pesoExamenes = self::clean($pesoExamenes);
				if (empty($pesoExamenes)) {
					$erroresFormulario[] = "No has introducido el peso de los exámenes";
				}

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$realizacionExamenesI = self::clean($realizacionExamenesI);
					if (empty($realizacionExamenesI)) {
						$erroresFormulario[] = "No has introducido la realización de los exámenes en inglés";
					}
				}
			}


			if ($contextConfiguacion->getData()->getRealizacionActividades() == 1) {
				$realizacionActividades = self::clean($realizacionActividades);
				if (empty($realizacionActividades)) {
					$erroresFormulario[] = "No has introducido la realización de las actividades";
				}

				$pesoActividades = self::clean($pesoActividades);
				if (empty($pesoActividades)) {
					$erroresFormulario[] = "No has introducido el peso de las actividades";
				}

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$realizacionActividadesI = self::clean($realizacionActividadesI);
					if (empty($realizacionActividadesI)) {
						$erroresFormulario[] = "No has introducido la realización de las actividades en inglés";
					}
				}
			}


			if ($contextConfiguacion->getData()->getRealizacionLaboratorio() == 1) {
				$realizacionLaboratorio = self::clean($realizacionLaboratorio);
				if (empty($realizacionLaboratorio)) {
					$erroresFormulario[] = "No has introducido la realización del laboratorio";
				}

				$pesoLaboratorio = self::clean($pesoLaboratorio);
				if (empty($pesoLaboratorio)) {
					$erroresFormulario[] = "No has introducido el peso del laboratorio";
				}

				if (!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())) {
					$realizacionLaboratorioI = self::clean($realizacionLaboratorioI);
					if (empty($realizacionLaboratorioI)) {
						$erroresFormulario[] = "No has introducido la realizacioón del laboratorio en inglés";
					}
				}
			}

			if ($contextConfiguacion->getData()->getCalificacionFinal() == 1) {
				$calificacionFinal = self::clean($calificacionFinal);
				if (empty($calificacionFinal)) {
					$erroresFormulario[] = "No has introducido la calificación final";
				}


				$calificacionFinalI = self::clean($calificacionFinalI);
				if (empty($calificacionFinalI)) {
					$erroresFormulario[] = "No has introducido la calificación final en inglés";
				}
			}

		}


		if (count($erroresFormulario) === 0) {
			$context = new Context(FIND_MODEVALUACION, $datos['idAsignatura']);
			$contextEvaluacion = $controller->action($context);

			if ($contextEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {

				$evaluacion = new ModEvaluacion($contextEvaluacion->getData()->getIdEvaluacion(), $realizacionExamenes, $realizacionExamenesI, $pesoExamenes, $realizacionActividades, $realizacionActividadesI, $pesoActividades, $realizacionLaboratorio, $realizacionLaboratorioI, $pesoLaboratorio, $calificacionFinal, $calificacionFinalI, $datos['idAsignatura']);
				$context = new Context(UPDATE_MODEVALUACION, $evaluacion);
				$contextEvaluacion = $controller->action($context);

				if ($contextEvaluacion->getEvent() === UPDATE_MODEVALUACION_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-evaluacion";
				} elseif ($contextEvaluacion->getEvent() === UPDATE_MODEVALUACION_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar la evaluación";
				}
			} elseif ($contextEvaluacion->getEvent() === FIND_MODEVALUACION_FAIL) {

				$evaluacion = new ModEvaluacion(null, $realizacionExamenes, $realizacionExamenesI, $pesoExamenes, $realizacionActividades, $realizacionActividadesI, $pesoActividades, $realizacionLaboratorio, $realizacionLaboratorioI, $pesoLaboratorio, $calificacionFinal, $calificacionFinalI, $datos['idAsignatura']);
				$context = new Context(CREATE_MODEVALUACION, $evaluacion);
				$contextEvaluacion = $controller->action($context);

				if ($contextEvaluacion->getEvent() === CREATE_MODEVALUACION_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-evaluacion";
				} elseif ($contextEvaluacion->getEvent() === CREATE_MODEVALUACION_FAIL) {
					$erroresFormulario[] = "No se ha podido crear la evaluación";
				}
			}
		}
		return $erroresFormulario;
	}
}
