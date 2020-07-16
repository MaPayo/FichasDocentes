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
<<<<<<< Updated upstream
=======
		$tipo=isset($datosIniciales['tipo']) ? $datosIniciales['tipo'] : null;
		$fechas=isset($datosIniciales['fechas']) ? $datosIniciales['fechas'] : null;
>>>>>>> Stashed changes
		$emailProfesor = isset($datosIniciales['emailProfesor']) ? $datosIniciales['emailProfesor'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;

		$html = '<input type="hidden" name="idGrupoClase" value="' . $idGrupoClase . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />

		<div class="form-group">
			<label for="emailProfesor">Profesor</label>
			<select class="form-control" id="emailProfesor" name="emailProfesor" >';
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
<<<<<<< Updated upstream
		$html .= '	</select>
=======
		$html.='
		<div class="form-group">
			<label for="tipo">Tipo</label>
			<input class="form-control" type="text" id="tipo" name="tipo" value="' . $tipo. '" />
		</div>

		<div class="form-group">
			<label for="tipo">Fechas</label>
			<input class="form-control" type="text" id="fechas" name="fechas" value="' . $fechas. '" />
>>>>>>> Stashed changes
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

		$emailProfesor = isset($datos['emailProfesor']) ? $datos['emailProfesor'] : null;
		$emailProfesor = self::clean($emailProfesor);
		if (empty($emailProfesor)) {
			$erroresFormulario[] = "No has introducido al profesor.";
		}

<<<<<<< Updated upstream
=======
		$tipo = isset($datos['tipo']) ? $datos['tipo'] : null;
		$tipo = self::clean($tipo);
		if (empty($tipo)) {
			$erroresFormulario[] = "No has introducido el tipo.";
		}

		$fechas = isset($datos['fechas']) ? $datos['fechas'] : null;
		$fechas = self::clean($fechas);
		if (empty($fechas)) {
			$erroresFormulario[] = "No has introducido las fechas.";
		}


>>>>>>> Stashed changes
		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$arrayGrupoClaseProfesor=array();
			$arrayGrupoClaseProfesor['idGrupoClase']=$datos['idGrupoClase'];
			$arrayGrupoClaseProfesor['emailProfesor']=$emailProfesor;
			$context = new Context(FIND_MODGRUPO_CLASE_PROFESOR, $arrayGrupoClaseProfesor);
			$contextGrupoClaseProfesor = $controller->action($context);
			if ($contextGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_OK) {
<<<<<<< Updated upstream
				$erroresFormulario[] = "El profesor ya se encuentra registrado en el grupo.";
			} elseif ($contextGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_FAIL) {
				$grupoClaseProfesor = new ModGrupoClaseProfesor($datos['idGrupoClase'], $emailProfesor);
=======

				$grupoClaseProfesor = new ModGrupoClaseProfesor($datos['idGrupoClase'], $tipo, $fechas, $emailProfesor);
				$context = new Context(UPDATE_MODGRUPO_CLASE_PROFESOR, $grupoClaseProfesor);
				$contextGrupoClaseProfesor = $controller->action($context);
				if ($contextGrupoClaseProfesor->getEvent() === UPDATE_MODGRUPO_CLASE_PROFESOR_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-clase";
				} elseif ($contextGrupoClaseProfesor->getEvent() === CREATE_MODGRUPO_CLASE_PROFESOR_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar al profesor en el grupo.";
				}

			} elseif ($contextGrupoClaseProfesor->getEvent() === FIND_MODGRUPO_CLASE_PROFESOR_FAIL) {
				$grupoClaseProfesor = new ModGrupoClaseProfesor($datos['idGrupoClase'], $tipo, $fechas, $emailProfesor);
>>>>>>> Stashed changes
				$context = new Context(CREATE_MODGRUPO_CLASE_PROFESOR, $grupoClaseProfesor);
				$contextGrupoClaseProfesor = $controller->action($context);
				if ($contextGrupoClaseProfesor->getEvent() === CREATE_MODGRUPO_CLASE_PROFESOR_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-grupo-clase";
				} elseif ($contextGrupoClaseProfesor->getEvent() === CREATE_MODGRUPO_CLASE_PROFESOR_FAIL) {
					$erroresFormulario[] = "No se ha podido registra al profesor en el grupo.";
				}
			}
		}
		return $erroresFormulario;
	}
}
