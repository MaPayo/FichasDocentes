<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/GrupoLaboratorio/ModGrupoLaboratorio.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormGrupoLaboratorio extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idGrupoLaboratorio = isset($datosIniciales['idGrupoLaboratorio']) ? $datosIniciales['idGrupoLaboratorio'] : null;
		$letra = isset($datosIniciales['letra']) ? $datosIniciales['letra'] : null;
		$idioma = isset($datosIniciales['idioma']) ? $datosIniciales['idioma'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

		$html = '<input type="hidden" name="idGrupoLaboratorio" value="' . $idGrupoLaboratorio . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />

		<div class="form-row">

		<div class="form-group col-md-6">
		<label for="letra">Letra</label>
		<input type="text" class="form-control" id="letra"  name="letra" value="' . $letra . '" required/>
		</div>

		<div class="form-group col-md-6">
		<label for="idioma">Idioma</label>
		<input type="text" class="form-control" id="idioma"  name="idioma" value="' . $idioma . '" required/>
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
			$context = new Context(FIND_MODGRUPO_LABORATORIO, $datos['idGrupoLaboratorio']);
			$contextGrupoLaboratorio = $controller->action($context);

			if ($contextGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_OK) {
				if($letra === $contextGrupoLaboratorio->getData()->getLetra() && $idioma === $contextGrupoLaboratorio->getData()->getIdioma()){
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-laboratorio";
				}else{
					$grupoLaboratorio = new ModGrupoLaboratorio($datos['idGrupoLaboratorio'], $letra, $idioma, $datos['idAsignatura']);
					$context = new Context(UPDATE_MODGRUPO_LABORATORIO, $grupoLaboratorio);
					$contextGrupoLaboratorio = $controller->action($context);
	
					if ($contextGrupoLaboratorio->getEvent() === UPDATE_MODGRUPO_LABORATORIO_OK) {
						$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
						$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
						$contextModAsignatura = $controller->action($context);
						$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-grupo-laboratorio";
					} elseif ($contextGrupoLaboratorio->getEvent() === UPDATE_MODGRUPO_LABORATORIO_FAIL) {
						$erroresFormulario[] = "No se ha podido modificar el grupo";
					}
				}
				
			} elseif ($contextGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_FAIL) {

				$grupoLaboratorio = new ModGrupoLaboratorio(null, $letra, $idioma, $datos['idAsignatura']);
				$context = new Context(CREATE_MODGRUPO_LABORATORIO, $grupoLaboratorio);
				$contextGrupoLaboratorio = $controller->action($context);
				if ($contextGrupoLaboratorio->getEvent() === CREATE_MODGRUPO_LABORATORIO_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['idGrado'] . "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-grupo-laboratorio";
				} elseif ($contextGrupoLaboratorio->getEvent() === CREATE_MODGRUPO_LABORATORIO_FAIL) {
					$erroresFormulario[] = "No se ha podido crear el grupo";
				}
			}
		}
		return $erroresFormulario;
	}
}
