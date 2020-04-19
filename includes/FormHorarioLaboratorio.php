<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');

class FormHorarioLaboratorio extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idHorarioLaboratorio = isset($datosIniciales['idHorarioLaboratorio']) ? $datosIniciales['idHorarioLaboratorio'] : null;
		$laboratorio = isset($datosIniciales['laboratorio']) ? $datosIniciales['laboratorio'] : null;
		$dia = isset($datosIniciales['dia']) ? $datosIniciales['dia'] : null;
		$horaInicio = isset($datosIniciales['horaInicio']) ? $datosIniciales['horaInicio'] : null;
		$horaFin = isset($datosIniciales['horaFin']) ? $datosIniciales['horaFin'] : null;
		$idGrupoLaboratorio = isset($datosIniciales['idGrupoLaboratorio']) ? $datosIniciales['idGrupoLaboratorio'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$arrayDias = array("L", "M", "X", "J", "V", "S", "D");

		$html = '<input type="hidden" name="idHorarioLaboratorio" value="' . $idHorarioLaboratorio . '" required />
		<input type="hidden" name="idGrupoLaboratorio" value="' . $idGrupoLaboratorio . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<div class="form-group">
		<label for="laboratorio">Laboratorio</label>
		<input type="text" class="form-control" id="laboratorio"  name="laboratorio" value="' . $laboratorio . '" />
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

		$laboratorio = isset($datos['laboratorio']) ? $datos['laboratorio'] : null;
		$laboratorio = self::clean($laboratorio);
		if (empty($laboratorio)) {
			$erroresFormulario[] = "No has introducido el laboratorio.";
		}

		$dia = isset($datos['dia']) ? $datos['dia'] : null;
		$dia = self::clean($dia);
		if (empty($dia)) {
			$erroresFormulario[] = "No has introducido el dia.";
		}

		$horaInicio = isset($datos['horaInicio']) ? $datos['horaInicio'] : null;
		$horaInicio = self::clean($horaInicio);
		if (empty($horaInicio)) {
			$erroresFormulario[] = "No has introducido la hora de inicio.";
		}

		$horaFin = isset($datos['horaFin']) ? $datos['horaFin'] : null;
		$horaFin = self::clean($horaFin);
		if (empty($horaFin)) {
			$erroresFormulario[] = "No has introducido la hora de fin.";
		}


		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$context = new Context(FIND_MODHORARIO_LABORATORIO, $datos['idHorarioLaboratorio']);
			$contextHorarioLaboratorio = $controller->action($context);

			if ($contextHorarioLaboratorio->getEvent() === FIND_MODHORARIO_LABORATORIO_OK) {

				$horarioLaboratorio = new HorarioLaboratorio($datos['idHorarioLaboratorio'], $laboratorio, $dia, $horaInicio, $horaFin, $datos['idGrupoLaboratorio']);
				$context = new Context(UPDATE_MODHORARIO_LABORATORIO, $horarioLaboratorio);
				$contextHorarioLaboratorio = $controller->action($context);

				if ($contextHorarioLaboratorio->getEvent() === UPDATE_MODHORARIO_LABORATORIO_OK) {
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y";
				} elseif ($contextHorarioLaboratorio->getEvent() === UPDATE_MODHORARIO_LABORATORIO_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar el horario.";
				}
			} elseif ($contextHorarioLaboratorio->getEvent() === FIND_MODHORARIO_LABORATORIO_FAIL) {

				$horarioLaboratorio = new HorarioLaboratorio(null,  $laboratorio, $dia, $horaInicio, $horaFin, $datos['idGrupoLaboratorio']);
				$context = new Context(CREATE_MODHORARIO_LABORATORIO, $horarioLaboratorio);
				$contextHorarioLaboratorio = $controller->action($context);
				if ($contextHorarioLaboratorio->getEvent() === CREATE_MODHORARIO_LABORATORIO_OK) {
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y";
				} elseif ($contextHorarioLaboratorio->getEvent() === CREATE_MODHORARIO_LABORATORIO_FAIL) {
					$erroresFormulario[] = "No se ha podido crear el horario.";
				}
			}
		}
		return $erroresFormulario;
	}
}
