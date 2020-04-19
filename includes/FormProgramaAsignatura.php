<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormProgramaAsignatura extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idPrograma = isset($datosIniciales['idPrograma']) ? $datosIniciales['idPrograma'] : null;
		$conocimientosPrevios = isset($datosIniciales['conocimientosPrevios']) ? $datosIniciales['conocimientosPrevios'] : null;
		$conocimientosPreviosI = isset($datosIniciales['conocimientosPreviosI']) ? $datosIniciales['conocimientosPreviosI'] : null;
		$breveDescripcion = isset($datosIniciales['breveDescripcion']) ? $datosIniciales['breveDescripcion'] : null;
		$breveDescripcionI = isset($datosIniciales['breveDescripcionI']) ? $datosIniciales['breveDescripcionI'] : null;
		$programaDetallado = isset($datosIniciales['programaDetallado']) ? $datosIniciales['programaDetallado'] : null;
		$programaDetalladoI = isset($datosIniciales['programaDetalladoI']) ? $datosIniciales['programaDetalladoI'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;

		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $idAsignatura);
		$contextConfiguacion = $controller->action($context);


		$html = '<input type="hidden" name="idPrograma" value="' . $idPrograma . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />';
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getConocimientosPrevios() == 1) {
			$html .= '<div class="form-group">
		<label for="conocimientosPrevios">Conocimientos previos</label>
		<textarea class="form-control" id="conocimientosPrevios" rows="3" name="conocimientosPrevios" >' . $conocimientosPrevios . '</textarea>
		</div>

		<div class="form-group">
		<label for="conocimientosPreviosI">Conocimientos previos (Ingles)</label>
		<textarea class="form-control" id="conocimientosPreviosI" rows="3" name="conocimientosPreviosI" >' . $conocimientosPreviosI . '</textarea>
		</div>';
		}

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getBreveDescripcion() == 1) {
			$html .= '<div class="form-group">
		<label for="breveDescripcion">Breve descripción</label>
		<textarea class="form-control" id="breveDescripcion" rows="3" name="breveDescripcion" >' . $breveDescripcion . '</textarea>
		</div>

		<div class="form-group">
		<label for="breveDescripcionI">Breve descripcion (Ingles)</label>
		<textarea class="form-control" id="breveDescripcionI" rows="3" name="breveDescripcionI" >' . $breveDescripcionI . '</textarea>
		</div>';
		}

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getProgramaDetallado() == 1) {
			$html .= '<div class="form-group">
		<label for="programaDetallado">Programa detallado</label>
		<textarea class="form-control" id="programaDetallado" rows="3" name="programaDetallado" >' . $programaDetallado . '</textarea>
		</div>

		<div class="form-group">
		<label for="programaDetalladoI">Programa detallado (Ingles)</label>
		<textarea class="form-control" id="programaDetalladoI" rows="3" name="programaDetalladoI" >' . $programaDetalladoI . '</textarea>
		</div>';
		}

		$html .= '<div class="text-right">
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
		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $datos['idAsignatura']);
		$contextConfiguacion = $controller->action($context);

		$conocimientosPrevios = isset($datos['conocimientosPrevios']) ? $datos['conocimientosPrevios'] : null;
		$conocimientosPreviosI = isset($datos['conocimientosPreviosI']) ? $datos['conocimientosPreviosI'] : null;
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getConocimientosPrevios() == 1) {
			$conocimientosPrevios = self::clean($conocimientosPrevios);
			if (empty($conocimientosPrevios)) {
				$erroresFormulario[] = "No has introducido los conocimientos previos.";
			}
			$conocimientosPreviosI = self::clean($conocimientosPreviosI);
			if (empty($conocimientosPreviosI)) {
				$erroresFormulario[] = "No has introducido los conocimientos previos en ingles.";
			}
		}

		$breveDescripcion = isset($datos['breveDescripcion']) ? $datos['breveDescripcion'] : null;
		$breveDescripcionI = isset($datos['breveDescripcionI']) ? $datos['breveDescripcionI'] : null;
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getBreveDescripcion() == 1) {
			$breveDescripcion = self::clean($breveDescripcion);
			if (empty($breveDescripcion)) {
				$erroresFormulario[] = "No has introducido la breve descripcion";
			}

			$breveDescripcionI = self::clean($breveDescripcionI);
			if (empty($breveDescripcionI)) {
				$erroresFormulario[] = "No has introducido la breve descripcion en ingles";
			}
		}

		$programaDetallado = isset($datos['programaDetallado']) ? $datos['programaDetallado'] : null;
		$programaDetalladoI = isset($datos['programaDetalladoI']) ? $datos['programaDetalladoI'] : null;
		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && $contextConfiguacion->getData()->getProgramaDetallado() == 1) {
			$programaDetallado = self::clean($programaDetallado);
			if (empty($programaDetallado)) {
				$erroresFormulario[] = "No has introducido el programa detallado";
			}

			$programaDetalladoI = self::clean($programaDetalladoI);
			if (empty($programaDetalladoI)) {
				$erroresFormulario[] = "No has introducido el programa detallado en ingles";
			}
		}

		if (count($erroresFormulario) === 0) {

			$controller = new ControllerImplements();
			$context = new Context(FIND_MODPROGRAMA_ASIGNATURA, $datos['idAsignatura']);
			$contextPrograma = $controller->action($context);

			if ($contextPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {

				$programa = new ProgramaAsignatura($datos['idPrograma'], $conocimientosPrevios, $conocimientosPreviosI, $breveDescripcion, $breveDescripcionI, $programaDetallado, $programaDetalladoI, $datos['idAsignatura']);
				$context = new Context(UPDATE_MODPROGRAMA_ASIGNATURA, $programa);
				$contextPrograma = $controller->action($context);

				if ($contextPrograma->getEvent() === UPDATE_MODPROGRAMA_ASIGNATURA_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y";
				} elseif ($contextPrograma->getEvent() === UPDATE_MODPROGRAMA_ASIGNATURA_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar el programa asignatura.";
				}
			} elseif ($contextPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_FAIL) {

				$programa = new ProgramaAsignatura(null, $conocimientosPrevios, $conocimientosPreviosI, $breveDescripcion, $breveDescripcionI, $programaDetallado, $programaDetalladoI, $datos['idAsignatura']);
				$context = new Context(CREATE_MODPROGRAMA_ASIGNATURA, $programa);
				$contextPrograma = $controller->action($context);

				if ($contextPrograma->getEvent() === CREATE_MODPROGRAMA_ASIGNATURA_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y";
				} elseif ($contextPrograma->getEvent() === CREATE_MODPROGRAMA_ASIGNATURA_FAIL) {
					$erroresFormulario[] = "No se ha podido crear el programa asignatura.";
				}
			}
		}
		return $erroresFormulario;
	}
}
