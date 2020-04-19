<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');

class FormGrupoLaboratorio extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idGrupoLaboratorio = isset($datosIniciales['idGrupoLaboratorio']) ? $datosIniciales['idGrupoLaboratorio'] : null;
		$letra = isset($datosIniciales['letra']) ? $datosIniciales['letra'] : null;
		$idioma = isset($datosIniciales['idioma']) ? $datosIniciales['idioma'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$emailProfesor = isset($datosIniciales['emailProfesor']) ? $datosIniciales['emailProfesor'] : null;

		$html = '<input type="hidden" name="idGrupoLaboratorio" value="' . $idGrupoLaboratorio . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<div class="form-group">
		<label for="letra">Letra</label>
		<input type="text" class="form-control" id="letra"  name="letra" value="' . $letra . '" />
		</div>

		<div class="form-group">
		<label for="idioma">Idioma</label>
		<input type="text" class="form-control" id="idioma"  name="idioma" value="' . $idioma . '" />
		</div>

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
		$html .= '	</select>
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

		$letra = isset($datos['letra']) ? $datos['letra'] : null;
		$letra = self::clean($letra);
		if (empty($letra)) {
			$erroresFormulario[] = "No has introducido la letra.";
		}

		$idioma = isset($datos['idioma']) ? $datos['idioma'] : null;
		$idioma = self::clean($idioma);
		if (empty($idioma)) {
			$erroresFormulario[] = "No has introducido el idioma.";
		}

		$emailProfesor = isset($datos['emailProfesor']) ? $datos['emailProfesor'] : null;
		$emailProfesor = self::clean($emailProfesor);
		if (empty($emailProfesor)) {
			$erroresFormulario[] = "No has seleccionado el profesor.";
		}


		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$context = new Context(FIND_MODGRUPO_LABORATORIO, $datos['idGrupoLaboratorio']);
			$contextGrupoLaboratorio = $controller->action($context);

			if ($contextGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_OK) {

				$grupoLaboratorio = new GrupoLaboratorio($datos['idGrupoLaboratorio'], $letra, $idioma, $datos['idAsignatura'], $emailProfesor);
				$context = new Context(UPDATE_MODGRUPO_LABORATORIO, $grupoLaboratorio);
				$contextGrupoLaboratorio = $controller->action($context);

				if ($contextGrupoLaboratorio->getEvent() === UPDATE_MODGRUPO_LABORATORIO_OK) {
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y";
				} elseif ($contextGrupoLaboratorio->getEvent() === UPDATE_MODGRUPO_LABORATORIO_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar el grupo.";
				}
			} elseif ($contextGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_FAIL) {

				$grupoLaboratorio = new GrupoLaboratorio(null, $letra, $idioma, $datos['idAsignatura'], $emailProfesor);
				$context = new Context(CREATE_MODGRUPO_LABORATORIO, $grupoLaboratorio);
				$contextGrupoLaboratorio = $controller->action($context);
				if ($contextGrupoLaboratorio->getEvent() === CREATE_MODGRUPO_LABORATORIO_OK) {
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y";
				} elseif ($contextGrupoLaboratorio->getEvent() === CREATE_MODGRUPO_LABORATORIO_FAIL) {
					$erroresFormulario[] = "No se ha podido crear el grupo.";
				}
			}
		}
		return $erroresFormulario;
	}
}
