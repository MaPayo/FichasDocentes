<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/GrupoClaseProfesor/ModGrupoClaseProfesor.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormGrupoClaseProfesor extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idGrupoClase = isset($datosIniciales['idGrupoClase']) ? $datosIniciales['idGrupoClase'] : null;
		$tipo = isset($datosIniciales['tipo']) ? $datosIniciales['tipo'] : null;
		$fechaInicio = isset($datosIniciales['fechaInicio']) ? $datosIniciales['fechaInicio'] : null;
		$fechaFin = isset($datosIniciales['fechaFin']) ? $datosIniciales['fechaFin'] : null;
		$emailProfesor = isset($datosIniciales['emailProfesor']) ? $datosIniciales['emailProfesor'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

		$html = '<input type="hidden" name="idGrupoClase" value="' . $idGrupoClase . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />

		<div class="form-row">';

		if (isset($emailProfesor)) {
			$html .= '<div class="form-group col-md-9">
			<label for="emailProfesor">Profesor</label>
			<input class="form-control" type="text" id="emailProfesor" name="emailProfesor" value="' . $emailProfesor . '" readonly="readonly" />
			</div>';
		} else {
			$html .= '<div class="form-group col-md-9">
			<label for="emailProfesor">Profesor</label>
			<select class="form-control" id="emailProfesor" name="emailProfesor" required>';
			$controller = new ControllerImplements();
			$context = new Context(FIND_PERMISOS, $idAsignatura);
			$contextPermisos = $controller->action($context);
			if ($contextPermisos->getEvent() === FIND_PERMISOS_OK) {
				foreach ($contextPermisos->getData() as $permiso) {
					$arrayGrupoClaseProfesor = array();
					$arrayGrupoClaseProfesor['idGrupoClase'] = $idGrupoClase;
					$arrayGrupoClaseProfesor['emailProfesor'] = $permiso->getEmailProfesor();
					$context = new Context(FIND_MODGRUPO_CLASE_PROFESOR, $arrayGrupoClaseProfesor);
					$contextGrupoClaseProfesor = $controller->action($context);
					if ($contextGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_FAIL) {
						$context = new Context(FIND_PROFESOR, $permiso->getEmailProfesor());
						$contextProfesor = $controller->action($context);
						if ($contextProfesor->getData()->getEmail() == $emailProfesor) {
							$html .= '<option value="' . $contextProfesor->getData()->getEmail() . '" selected >' . $contextProfesor->getData()->getNombre() . '</option>';
						} else {
							$html .= '<option value="' . $contextProfesor->getData()->getEmail() . '">' . $contextProfesor->getData()->getNombre() . '</option>';
						}
					}
				}
			}
			$html .= '</select>
			</div>';
		}
		$html .= '
		<div class="form-group col-md-3">
		<label for="tipo">Tipo</label>
		<input class="form-control" type="text" id="tipo" name="tipo" value="' . $tipo . '" required/>
		</div>

		</div>

		<div class="form-row">

		<div class="form-group col-md-6">
		<label for="fecha">Fecha de inicio</label>
		<input class="form-control" type="date" id="fechaInicio" name="fechaInicio" value="' . $fechaInicio . '" required/>
		</div>

		<div class="form-group col-md-6">
		<label for="fecha">Fecha de finalización</label>
		<input class="form-control" type="date" id="fechaFin" name="fechaFin" value="' . $fechaFin . '" required/>
		</div>

		</div>


		<div class="text-center">
		<a href="indexAcceso.php?IdGrado=' . $idGrado . '&IdAsignatura=' . $idAsignatura . '#nav-grupo-clase">
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
			$erroresFormulario[] = "No has introducido al profesor.";
		}

		$tipo = isset($datos['tipo']) ? $datos['tipo'] : null;
		$tipo = self::clean($tipo);
		if (empty($tipo)) {
			$erroresFormulario[] = "No has introducido el tipo";
		}

		$fechaInicio = isset($datos['fechaInicio']) ? $datos['fechaInicio'] : null;
		$fechaInicio = self::clean($fechaInicio);
		$fechaFin = isset($datos['fechaFin']) ? $datos['fechaFin'] : null;
		$fechaFin = self::clean($fechaFin);
		if (empty($fechaInicio) || empty($fechaFin)) {
			$erroresFormulario[] = "No has introducido alguna de las fechas";
		} else if ($fechaFin <= $fechaInicio) {
			$erroresFormulario[] = "La fecha de inicio es mayor o igual que la fecha de finalización";
		}


		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$arrayGrupoClaseProfesor = array();
			$arrayGrupoClaseProfesor['idGrupoClase'] = $datos['idGrupoClase'];
			$arrayGrupoClaseProfesor['emailProfesor'] = $emailProfesor;
			$context = new Context(FIND_MODGRUPO_CLASE_PROFESOR, $arrayGrupoClaseProfesor);
			$contextGrupoClaseProfesor = $controller->action($context);
			if ($contextGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_OK) {
				if ($tipo === $contextGrupoClaseProfesor->getData()->getTipo() && $fechaInicio === $contextGrupoClaseProfesor->getData()->getFechaInicio() && $fechaFin === $contextGrupoClaseProfesor->getData()->getFechaFin() && $emailProfesor === $contextGrupoClaseProfesor->getData()->getEmailProfesor()) {
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-clase";
				} else {
					$grupoClaseProfesor = new ModGrupoClaseProfesor($datos['idGrupoClase'], $tipo, $fechaInicio, $fechaFin, $emailProfesor);
					$context = new Context(UPDATE_MODGRUPO_CLASE_PROFESOR, $grupoClaseProfesor);
					$contextGrupoClaseProfesor = $controller->action($context);
					if ($contextGrupoClaseProfesor->getEvent() === UPDATE_MODGRUPO_CLASE_PROFESOR_OK) {
						$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
						$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
						$contextModAsignatura = $controller->action($context);
						$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-clase";
					} elseif ($contextGrupoClaseProfesor->getEvent() === CREATE_MODGRUPO_CLASE_PROFESOR_FAIL) {
						$erroresFormulario[] = "No se ha podido modificar al profesor en el grupo";
					}
				}
			} elseif ($contextGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_FAIL) {
				$grupoClaseProfesor = new ModGrupoClaseProfesor($datos['idGrupoClase'], $tipo, $fechaInicio, $fechaFin, $emailProfesor);
				$context = new Context(CREATE_MODGRUPO_CLASE_PROFESOR, $grupoClaseProfesor);
				$contextGrupoClaseProfesor = $controller->action($context);
				if ($contextGrupoClaseProfesor->getEvent() === CREATE_MODGRUPO_CLASE_PROFESOR_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-grupo-clase";
				} elseif ($contextGrupoClaseProfesor->getEvent() === CREATE_MODGRUPO_CLASE_PROFESOR_FAIL) {
					$erroresFormulario[] = "No se ha podido registra al profesor en el grupo";
				}
			}
		}
		return $erroresFormulario;
	}
}
