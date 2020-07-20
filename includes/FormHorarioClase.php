<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/HorarioClase/ModHorarioClase.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormHorarioClase extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idHorarioClase = isset($datosIniciales['idHorarioClase']) ? $datosIniciales['idHorarioClase'] : null;
		$aula = isset($datosIniciales['aula']) ? $datosIniciales['aula'] : null;
		$dia = isset($datosIniciales['dia']) ? $datosIniciales['dia'] : null;
		$horaInicio = isset($datosIniciales['horaInicio']) ? $datosIniciales['horaInicio'] : null;
		$horaFin = isset($datosIniciales['horaFin']) ? $datosIniciales['horaFin'] : null;
		$idGrupoClase = isset($datosIniciales['idGrupoClase']) ? $datosIniciales['idGrupoClase'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$arrayDias = array("L", "M", "X", "J", "V", "S", "D");

		$html = '<input type="hidden" name="idHorarioClase" value="' . $idHorarioClase . '" required />
		<input type="hidden" name="idGrupoClase" value="' . $idGrupoClase . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<div class="form-group">
		<label for="aula">Aula</label>
		<input type="text" class="form-control" id="aula"  name="aula" value="' . $aula . '" />
		</div>

		<div class="form-group">
			<label for="dia">Dia</label>
			<select class="form-control" id="dia" name="dia" >';
		foreach ($arrayDias as $valor) {
			if ($valor == $dia) {
				$html .= '<option value="' . $dia . '" selected >' . $valor . '</option>';
			} else {
				$html .= '<option value="' . $valor . '">' . $valor . '</option>';
			}
		}
		$html .= '	</select>
		</div>

		<div class="form-group">
		<label for="horaInicio">Hora Inicio</label>
		<input type="time" class="form-control" id="horaInicio"  name="horaInicio" value="' . $horaInicio . '" />
		</div>

		<div class="form-group">
		<label for="horaFin">Hora Fin</label>
		<input type="time" class="form-control" id="horaFin"  name="horaFin" value="' . $horaFin . '" />
		</div>

		<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $idAsignatura . '#nav-grupo-clase">
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

		$aula = isset($datos['aula']) ? $datos['aula'] : null;
		$aula = self::clean($aula);
		if (empty($aula)) {
			$erroresFormulario[] = "No has introducido el aula.";
		}

		$dia = isset($datos['dia']) ? $datos['dia'] : null;
		$dia = self::clean($dia);
		if (empty($dia)) {
			$erroresFormulario[] = "No has introducido el dia.";
		}

		$horaInicio = isset($datos['horaInicio']) ? $datos['horaInicio'] : null;
		$horaInicio = self::clean($horaInicio);
		$horaFin = isset($datos['horaFin']) ? $datos['horaFin'] : null;
		$horaFin = self::clean($horaFin);
		if (empty($horaInicio) || empty($horaFin)) {
			$erroresFormulario[] = "No has introducido alguna de las horas.";
		}
		else if ($horaFin <= $horaInicio) {
			$erroresFormulario[] = "La hora de inicio es mayor o igual que la hora fin.";
		}


		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$context = new Context(FIND_MODHORARIO_CLASE, $datos['idHorarioClase']);
			$contextHorarioClase = $controller->action($context);

			if ($contextHorarioClase->getEvent() === FIND_MODHORARIO_CLASE_OK) {

				$horarioClase = new ModHorarioClase($datos['idHorarioClase'], $aula, $dia, $horaInicio, $horaFin, $datos['idGrupoClase']);
				$context = new Context(UPDATE_MODHORARIO_CLASE, $horarioClase);
				$contextHorarioClase = $controller->action($context);

				if ($contextHorarioClase->getEvent() === UPDATE_MODHORARIO_CLASE_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-clase";
				} elseif ($contextHorarioClase->getEvent() === UPDATE_MODHORARIO_CLASE_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar el horario.";
				}
			} elseif ($contextHorarioClase->getEvent() === FIND_MODHORARIO_CLASE_FAIL) {

				$horarioClase = new ModHorarioClase(null,  $aula, $dia, $horaInicio, $horaFin, $datos['idGrupoClase']);
				$context = new Context(CREATE_MODHORARIO_CLASE, $horarioClase);
				$contextHorarioClase = $controller->action($context);
				if ($contextHorarioClase->getEvent() === CREATE_MODHORARIO_CLASE_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-grupo-clase";
				} elseif ($contextHorarioClase->getEvent() === CREATE_MODHORARIO_CLASE_FAIL) {
					$erroresFormulario[] = "No se ha podido crear el horario.";
				}
			}
		}
		return $erroresFormulario;
	}
}
