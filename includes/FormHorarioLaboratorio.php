<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/HorarioLaboratorio/ModHorarioLaboratorio.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

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
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;
		$arrayDias = array("L", "M", "X", "J", "V", "S", "D");

		$html = '<input type="hidden" name="idHorarioLaboratorio" value="' . $idHorarioLaboratorio . '" required />
		<input type="hidden" name="idGrupoLaboratorio" value="' . $idGrupoLaboratorio . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />

		<div class="form-row">


		<div class="form-group col-md-6">
		<label for="laboratorio">Laboratorio</label>
		<input type="text" class="form-control" id="laboratorio"  name="laboratorio" value="' . $laboratorio . '" required/>
		</div>

		<div class="form-group col-md-6">
		<label for="dia">Día</label>
		<select class="form-control" id="dia" name="dia" required>';
		foreach ($arrayDias as $valor) {
			if ($valor == $dia) {
				$html .= '<option value="' . $dia . '" selected >' . $valor . '</option>';
			} else {
				$html .= '<option value="' . $valor . '">' . $valor . '</option>';
			}
		}
		$html .= '	</select>
		</div>

		</div>

		<div class="form-row">

		<div class="form-group col-md-6">
		<label for="horaInicio">Hora de inicio</label>
		<input type="time" class="form-control" id="horaInicio"  name="horaInicio" value="' . $horaInicio . '" required/>
		</div>

		<div class="form-group col-md-6">
		<label for="horaFin">Hora fin</label>
		<input type="time" class="form-control" id="horaFin"  name="horaFin" value="' . $horaFin . '" required/>
		</div>

		</div>

		<div class="text-center">
		<a href="indexAcceso.php?IdGrado='.$idGrado.'&IdAsignatura=' . $idAsignatura . '#nav-grupo-laboratorio">
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

		$laboratorio = isset($datos['laboratorio']) ? $datos['laboratorio'] : null;
		$laboratorio = self::clean($laboratorio);
		if (empty($laboratorio)) {
			$erroresFormulario[] = "No has introducido el laboratorio";
		}

		$dia = isset($datos['dia']) ? $datos['dia'] : null;
		$dia = self::clean($dia);
		if (empty($dia)) {
			$erroresFormulario[] = "No has introducido el día";
		}

		$horaInicio = isset($datos['horaInicio']) ? $datos['horaInicio'] : null;
		$horaInicio = self::clean($horaInicio);
		$horaFin = isset($datos['horaFin']) ? $datos['horaFin'] : null;
		$horaFin = self::clean($horaFin);
		if (empty($horaInicio) || empty($horaFin)) {
			$erroresFormulario[] = "No has introducido alguna de las horas";
		}
		else if ($horaFin <= $horaInicio) {
			$erroresFormulario[] = "La hora de inicio es mayor o igual que la hora fin";
		}


		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$context = new Context(FIND_MODHORARIO_LABORATORIO, $datos['idHorarioLaboratorio']);
			$contextHorarioLaboratorio = $controller->action($context);

			if ($contextHorarioLaboratorio->getEvent() === FIND_MODHORARIO_LABORATORIO_OK) {
				if($laboratorio === $contextHorarioLaboratorio->getData()->getLaboratorio() && $dia === $contextHorarioLaboratorio->getData()->getDia() && $horaInicio === $contextHorarioLaboratorio->getData()->getHoraInicio() && $horaFin === $contextHorarioLaboratorio->getData()->getHoraFin() ){
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-laboratorio";
				}else{
					$horarioLaboratorio = new ModHorarioLaboratorio($datos['idHorarioLaboratorio'], $laboratorio, $dia, $horaInicio, $horaFin, $datos['idGrupoLaboratorio']);
					$context = new Context(UPDATE_MODHORARIO_LABORATORIO, $horarioLaboratorio);
					$contextHorarioLaboratorio = $controller->action($context);
	
					if ($contextHorarioLaboratorio->getEvent() === UPDATE_MODHORARIO_LABORATORIO_OK) {
						$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
						$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
						$contextModAsignatura = $controller->action($context);
						$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-laboratorio";
					} elseif ($contextHorarioLaboratorio->getEvent() === UPDATE_MODHORARIO_LABORATORIO_FAIL) {
						$erroresFormulario[] = "No se ha podido modificar el horario";
					}
				}
				
			} elseif ($contextHorarioLaboratorio->getEvent() === FIND_MODHORARIO_LABORATORIO_FAIL) {

				$horarioLaboratorio = new ModHorarioLaboratorio(null,  $laboratorio, $dia, $horaInicio, $horaFin, $datos['idGrupoLaboratorio']);
				$context = new Context(CREATE_MODHORARIO_LABORATORIO, $horarioLaboratorio);
				$contextHorarioLaboratorio = $controller->action($context);
				if ($contextHorarioLaboratorio->getEvent() === CREATE_MODHORARIO_LABORATORIO_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-grupo-laboratorio";
				} elseif ($contextHorarioLaboratorio->getEvent() === CREATE_MODHORARIO_LABORATORIO_FAIL) {
					$erroresFormulario[] = "No se ha podido crear el horario";
				}
			}
		}
		return $erroresFormulario;
	}
}
