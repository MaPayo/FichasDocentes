<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/GrupoClase/ModGrupoClase.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormGrupoClase extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idGrupoClase = isset($datosIniciales['idGrupoClase']) ? $datosIniciales['idGrupoClase'] : null;
		$letra = isset($datosIniciales['letra']) ? $datosIniciales['letra'] : null;
		$idioma = isset($datosIniciales['idioma']) ? $datosIniciales['idioma'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

		$html = '<input type="hidden" name="idGrupoClase" value="' . $idGrupoClase . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />

		<div class="form-row">

			<div class="form-group col-md-6">
				<label for="letra">Letra</label>
				<input type="text" class="form-control" id="letra"  name="letra" value="' . $letra . '" required/>
			</div>

			<div class="form-group col-md-6">
				<label for="idioma">Idioma</label>
				<select class="form-control" id="idioma" name="idioma" required>';
				if ($idioma === "español") {
					$html .= '<option value="español" selected>español</option>';
				} else {
					$html .= '<option value="español">español</option>';
				}
				if ($idioma === "inglés") {
					$html .= '<option value="inglés" selected>inglés</option>';
				} else {
					$html .= '<option value="inglés">inglés</option>';
				}
	$html .= '</select>
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

		$letra = isset($datos['letra']) ? $datos['letra'] : null;
		$letra = self::clean($letra);
		if (empty($letra)) {
			$erroresFormulario[] = "No has introducido la letra";
		}

		$idioma = isset($datos['idioma']) ? $datos['idioma'] : null;
		$idioma = self::clean($idioma);
		if (empty($idioma)) {
			$erroresFormulario[] = "No has introducido el idioma";
		}


		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$context = new Context(FIND_MODGRUPO_CLASE, $datos['idGrupoClase']);
			$contextGrupoClase = $controller->action($context);

			if ($contextGrupoClase->getEvent() === FIND_MODGRUPO_CLASE_OK) {
				if ($letra === $contextGrupoClase->getData()->getLetra() && $idioma === $contextGrupoClase->getData()->getIdioma()) {
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-clase";
				} else {
					$grupoClase = new ModGrupoClase($datos['idGrupoClase'], $letra, $idioma, $datos['idAsignatura']);
					$context = new Context(UPDATE_MODGRUPO_CLASE, $grupoClase);
					$contextGrupoClase = $controller->action($context);

					if ($contextGrupoClase->getEvent() === UPDATE_MODGRUPO_CLASE_OK) {
						$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
						$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
						$contextModAsignatura = $controller->action($context);
						$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-clase";
					} elseif ($contextGrupoClase->getEvent() === UPDATE_MODGRUPO_CLASE_FAIL) {
						$erroresFormulario[] = "No se ha podido modificar el grupo";
					}
				}
			} elseif ($contextGrupoClase->getEvent() === FIND_MODGRUPO_CLASE_FAIL) {

				$grupoClase = new ModGrupoClase(null, $letra, $idioma, $datos['idAsignatura']);
				$context = new Context(CREATE_MODGRUPO_CLASE, $grupoClase);
				$contextGrupoClase = $controller->action($context);
				if ($contextGrupoClase->getEvent() === CREATE_MODGRUPO_CLASE_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-grupo-clase";
				} elseif ($contextGrupoClase->getEvent() === CREATE_MODGRUPO_CLASE_FAIL) {
					$erroresFormulario[] = "No se ha podido crear el grupo";
				}
			}
		}
		return $erroresFormulario;
	}
}
