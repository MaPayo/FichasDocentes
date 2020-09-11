<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/GrupoLaboratorio/ModGrupoLaboratorio.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormGrupoLaboratorioProfesor extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idGrupoLaboratorio = isset($datosIniciales['idGrupoLaboratorio']) ? $datosIniciales['idGrupoLaboratorio'] : null;
		$fechaInicio=isset($datosIniciales['fechaInicio']) ? $datosIniciales['fechaInicio'] : null;
		$fechaFin=isset($datosIniciales['fechaFin']) ? $datosIniciales['fechaFin'] : null;
		$emailProfesor = isset($datosIniciales['emailProfesor']) ? $datosIniciales['emailProfesor'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

		$html = '<input type="hidden" name="idGrupoLaboratorio" value="' . $idGrupoLaboratorio . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />';

		if(isset($emailProfesor)){
			$html.='<div class="form-group">
			<label for="emailProfesor">Profesor</label>
			<input class="form-control" type="text" id="emailProfesor" name="emailProfesor" value="' . $emailProfesor. '" readonly="readonly" />
			</div>';
		}else{
			$html.='<div class="form-group">
			<label for="emailProfesor">Profesor</label>
			<select class="form-control" id="emailProfesor" name="emailProfesor" required>';
			$controller = new ControllerImplements();
			$context = new Context(FIND_PERMISOS, $idAsignatura);
			$contextPermisos = $controller->action($context);
			if ($contextPermisos->getEvent() === FIND_PERMISOS_OK) {
				foreach ($contextPermisos->getData() as $permiso) {
					$context = new Context(FIND_PROFESOR, $permiso->getEmailProfesor());
					$contextProfesor = $controller->action($context);
					if ($contextProfesor->getData()->getEmail() == $emailProfesor) {
						$html .= '<option value="' . $contextProfesor->getData()->getEmail() . '" selected >' . $contextProfesor->getData()->getNombre() . '</option>';
					} else {
						$html .= '<option value="' . $contextProfesor->getData()->getEmail() . '">' . $contextProfesor->getData()->getNombre() . '</option>';
					}
				}
			}
			$html .= '</select>
			</div>';
		}
		$html.='

		<div class="form-row">

		<div class="form-group col-md-6">
		<label for="fecha">Fecha de inicio</label>
		<input class="form-control" type="date" id="fechaInicio" name="fechaInicio" value="' . $fechaInicio. '" required/>
		</div>

		<div class="form-group col-md-6">
		<label for="fecha">Fecha de finalización</label>
		<input class="form-control" type="date" id="fechaFin" name="fechaFin" value="' . $fechaFin. '" required/>
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

		$emailProfesor = isset($datos['emailProfesor']) ? $datos['emailProfesor'] : null;
		$emailProfesor = self::clean($emailProfesor);
		if (empty($emailProfesor)) {
			$erroresFormulario[] = "No has introducido el profesor";
		}

		$fechaInicio = isset($datos['fechaInicio']) ? $datos['fechaInicio'] : null;
		$fechaInicio = self::clean($fechaInicio);
		$fechaFin = isset($datos['fechaFin']) ? $datos['fechaFin'] : null;
		$fechaFin = self::clean($fechaFin);
		if (empty($fechaInicio) || empty($fechaFin)) {
			$erroresFormulario[] = "No has introducido alguna de las fechas";
		}
		else if($fechaFin <= $fechaInicio){
			$erroresFormulario[] = "La fecha de inicio es mayor o igual que la fecha fin";
		}

		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$arrayGrupoLaboratorioProfesor=array();
			$arrayGrupoLaboratorioProfesor['idGrupoLaboratorio']=$datos['idGrupoLaboratorio'];
			$arrayGrupoLaboratorioProfesor['emailProfesor']=$emailProfesor;
			$context = new Context(FIND_MODGRUPO_LABORATORIO_PROFESOR, $arrayGrupoLaboratorioProfesor);
			$contextGrupoLaboratorio = $controller->action($context);

			if ($contextGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_PROFESOR_OK) {
				if($fechaInicio === $contextGrupoLaboratorio->getData()->getFechaInicio() && $fechaFin === $contextGrupoLaboratorio->getData()->getFechaFin() && $emailProfesor === $contextGrupoLaboratorio->getData()->getEmailProfesor()){
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-laboratorio";
				}else{
					$grupoLaboratorioProfesor = new ModGrupoLaboratorioProfesor($datos['idGrupoLaboratorio'], $fechaInicio, $fechaFin,$emailProfesor);
					$context = new Context(UPDATE_MODGRUPO_LABORATORIO_PROFESOR, $grupoLaboratorioProfesor);
					$contextGrupoLaboratorio = $controller->action($context);
					if ($contextGrupoLaboratorio->getEvent() === UPDATE_MODGRUPO_LABORATORIO_PROFESOR_OK) {
						$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
						$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
						$contextModAsignatura = $controller->action($context);
						$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-laboratorio";
					} elseif ($contextGrupoLaboratorio->getEvent() === UPDATE_MODGRUPO_LABORATORIO_PROFESOR_FAIL) {
						$erroresFormulario[] = "No se ha podido modificar al profesor en el grupo";
					}
				}
			} elseif ($contextGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_PROFESOR_FAIL) {

				$grupoLaboratorioProfesor = new ModGrupoLaboratorioProfesor($datos['idGrupoLaboratorio'], $fechaInicio, $fechaFin,$emailProfesor);
				$context = new Context(CREATE_MODGRUPO_LABORATORIO_PROFESOR, $grupoLaboratorioProfesor);
				$contextGrupoLaboratorio = $controller->action($context);
				if ($contextGrupoLaboratorio->getEvent() === CREATE_MODGRUPO_LABORATORIO_PROFESOR_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-grupo-laboratorio";
				} elseif ($contextGrupoLaboratorio->getEvent() === CREATE_MODGRUPO_LABORATORIO_PROFESOR_FAIL) {
					$erroresFormulario[] = "No se ha podido registar al profesor en el grupo";
				}
			}
		}
		return $erroresFormulario;
	}
}
