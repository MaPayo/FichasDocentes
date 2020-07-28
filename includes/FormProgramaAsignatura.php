<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');
require_once('includes/Negocio/ProgramaAsignatura/ModProgramaAsignatura.php');


class FormProgramaAsignatura extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idPrograma = isset($datosIniciales['idPrograma']) ? $datosIniciales['idPrograma'] : null;
		$conocimientosPrevios = isset($datosIniciales['conocimientosPrevios']) ? $datosIniciales['conocimientosPrevios'] : null;
		$conocimientosPreviosI = isset($datosIniciales['conocimientosPreviosI']) ? $datosIniciales['conocimientosPreviosI'] : null;
		$breveDescripcion = isset($datosIniciales['breveDescripcion']) ? $datosIniciales['breveDescripcion'] : null;
		$breveDescripcionI = isset($datosIniciales['breveDescripcionI']) ? $datosIniciales['breveDescripcionI'] : null;
		$programaTeorico = isset($datosIniciales['programaTeorico']) ? $datosIniciales['programaTeorico'] : null;
		$programaTeoricoI = isset($datosIniciales['programaTeoricoI']) ? $datosIniciales['programaTeoricoI'] : null;
		$programaSeminarios = isset($datosIniciales['programaSeminarios']) ? $datosIniciales['programaSeminarios'] : null;
		$programaSeminariosI = isset($datosIniciales['programaSeminariosI']) ? $datosIniciales['programaSeminariosI'] : null;
		$programaLaboratorio = isset($datosIniciales['programaLaboratorio']) ? $datosIniciales['programaLaboratorio'] : null;
		$programaLaboratorioI = isset($datosIniciales['programaLaboratorioI']) ? $datosIniciales['programaLaboratorioI'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;
		$idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;
		
		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $idAsignatura);
		$contextConfiguacion = $controller->action($context);
		$context = new Context(FIND_ASIGNATURA, $idAsignatura);
		$contextAsignatura = $controller->action($context);

		$html = '<input type="hidden" name="idPrograma" value="' . $idPrograma . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK) {

			if ($contextConfiguacion->getData()->getConocimientosPrevios() == 1) {
				$html .= '<div class="form-group">
				<label for="conocimientosPrevios">Conocimientos previos</label>
				<textarea class="form-control" id="conocimientosPrevios" rows="3" name="conocimientosPrevios" required>' . $conocimientosPrevios . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="conocimientosPreviosI">Conocimientos previos (Ingles)</label>
					<textarea class="form-control" id="conocimientosPreviosI" rows="3" name="conocimientosPreviosI" required>' . $conocimientosPreviosI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getBreveDescripcion() == 1) {
				$html .= '<div class="form-group">
				<label for="breveDescripcion">Breve descripción</label>
				<textarea class="form-control" id="breveDescripcion" rows="3" name="breveDescripcion" required>' . $breveDescripcion . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="breveDescripcionI">Breve descripcion (Ingles)</label>
					<textarea class="form-control" id="breveDescripcionI" rows="3" name="breveDescripcionI" required>' . $breveDescripcionI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getProgramaTeorico() == 1) {
				$html .= '<div class="form-group">
				<label for="programaTeorico">Programa teorico</label>
				<textarea class="form-control" id="programaTeorico" rows="3" name="programaTeorico" required>' . $programaTeorico . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="programaTeoricoI">Programa teorico (Ingles)</label>
					<textarea class="form-control" id="programaTeoricoI" rows="3" name="programaTeoricoI" required>' . $programaTeoricoI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getProgramaSeminarios() == 1) {
				$html .= '<div class="form-group">
				<label for="programaSeminarios">Programa seminarios</label>
				<textarea class="form-control" id="programaTeorico" rows="3" name="programaSeminarios" required>' . $programaSeminarios . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="programaSeminariosI">Programa seminarios (Ingles)</label>
					<textarea class="form-control" id="programaSeminariosI" rows="3" name="programaSeminariosI" required>' . $programaSeminariosI . '</textarea>
					</div>';
				}
			}

			if ($contextConfiguacion->getData()->getProgramaLaboratorio() == 1) {
				$html .= '<div class="form-group">
				<label for="programaLaboratorio">Programa laboratorio</label>
				<textarea class="form-control" id="programaLaboratorio" rows="3" name="programaLaboratorio" required>' . $programaLaboratorio . '</textarea>
				</div>';

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$html .= '<div class="form-group">
					<label for="programaLaboratorioI">Programa laboratorio (Ingles)</label>
					<textarea class="form-control" id="programaLaboratorioI" rows="3" name="programaLaboratorioI" required>' . $programaLaboratorioI . '</textarea>
					</div>';
				}
			}
			
		}

		$html .= '<div class="text-right">
		<a href="indexAcceso.php?IdGrado=' .$idGrado. '&IdAsignatura=' . $idAsignatura . '#nav-prog-asignatura">
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
		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $datos['idAsignatura']);
		$contextConfiguacion = $controller->action($context);
		$context = new Context(FIND_ASIGNATURA, $datos['idAsignatura']);
		$contextAsignatura = $controller->action($context);

		$conocimientosPrevios = isset($datos['conocimientosPrevios']) ? $datos['conocimientosPrevios'] : '';
		$conocimientosPreviosI = isset($datos['conocimientosPreviosI']) ? $datos['conocimientosPreviosI'] : '';
		$breveDescripcion = isset($datos['breveDescripcion']) ? $datos['breveDescripcion'] : '';
		$breveDescripcionI = isset($datos['breveDescripcionI']) ? $datos['breveDescripcionI'] : '';
		$programaTeorico = isset($datos['programaTeorico']) ? $datos['programaTeorico'] : '';
		$programaTeoricoI = isset($datos['programaTeoricoI']) ? $datos['programaTeoricoI'] : '';
		$programaSeminarios = isset($datos['programaSeminarios']) ? $datos['programaSeminarios'] : '';
		$programaSeminariosI = isset($datos['programaSeminariosI']) ? $datos['programaSeminariosI'] : '';
		$programaLaboratorio = isset($datos['programaLaboratorio']) ? $datos['programaLaboratorio'] : '';
		$programaLaboratorioI = isset($datos['programaLaboratorioI']) ? $datos['programaLaboratorioI'] : '';

		if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK){

			if ($contextConfiguacion->getData()->getConocimientosPrevios() == 1) {
				$conocimientosPrevios = self::clean($conocimientosPrevios);
				if (empty($conocimientosPrevios)) {
					$erroresFormulario[] = "No has introducido los conocimientos previos.";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$conocimientosPreviosI = self::clean($conocimientosPreviosI);
					if (empty($conocimientosPreviosI)) {
						$erroresFormulario[] = "No has introducido los conocimientos previos en ingles.";
					}
				}
			}

			if ($contextConfiguacion->getData()->getBreveDescripcion() == 1) {
				$breveDescripcion = self::clean($breveDescripcion);
				if (empty($breveDescripcion)) {
					$erroresFormulario[] = "No has introducido la breve descripcion";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$breveDescripcionI = self::clean($breveDescripcionI);
					if (empty($breveDescripcionI)) {
						$erroresFormulario[] = "No has introducido la breve descripcion en ingles";
					}
				}
			}

			if ($contextConfiguacion->getData()->getProgramaTeorico() == 1) {
				$programaTeorico = self::clean($programaTeorico);
				if (empty($programaTeorico)) {
					$erroresFormulario[] = "No has introducido el programa teorico";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$programaTeoricoI = self::clean($programaTeoricoI);
					if (empty($programaTeoricoI)) {
						$erroresFormulario[] = "No has introducido el programa teorico en ingles";
					}
				}
			}

			if ($contextConfiguacion->getData()->getProgramaSeminarios() == 1) {
				$programaSeminarios = self::clean($programaSeminarios);
				if (empty($programaSeminarios)) {
					$erroresFormulario[] = "No has introducido el programa seminarios";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$programaSeminariosI = self::clean($programaSeminariosI);
					if (empty($programaSeminariosI)) {
						$erroresFormulario[] = "No has introducido el programa seminarios en ingles";
					}
				}
			}

			if ($contextConfiguacion->getData()->getProgramaLaboratorio() == 1) {
				$programaLaboratorio = self::clean($programaLaboratorio);
				if (empty($programaLaboratorio)) {
					$erroresFormulario[] = "No has introducido el programa laboratorio";
				}

				if(!is_null($contextAsignatura->getData()->getNombreAsignaturaIngles())){
					$programaLaboratorioI = self::clean($programaLaboratorioI);
					if (empty($programaLaboratorioI)) {
						$erroresFormulario[] = "No has introducido el programa laboratorio en ingles";
					}
				}
			}
		}
		

		if (count($erroresFormulario) === 0) {

			$context = new Context(FIND_MODPROGRAMA_ASIGNATURA, $datos['idAsignatura']);
			$contextPrograma = $controller->action($context);

			if ($contextPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_OK) {

				$programa = new ModProgramaAsignatura($contextPrograma->getData()->getIdPrograma(), $conocimientosPrevios, $conocimientosPreviosI, $breveDescripcion, $breveDescripcionI, $programaTeorico, $programaTeoricoI, $programaSeminarios, $programaSeminariosI, $programaLaboratorio, $programaLaboratorioI, $datos['idAsignatura']);
				$context = new Context(UPDATE_MODPROGRAMA_ASIGNATURA, $programa);
				$contextPrograma = $controller->action($context);

				if ($contextPrograma->getEvent() === UPDATE_MODPROGRAMA_ASIGNATURA_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=" . $datos['idAsignatura'] . "&modificado=y#nav-prog-asignatura";
				} elseif ($contextPrograma->getEvent() === UPDATE_MODPROGRAMA_ASIGNATURA_FAIL) {
					$erroresFormulario[] = "No se ha podido modificar el programa asignatura.";
				}
			} elseif ($contextPrograma->getEvent() === FIND_MODPROGRAMA_ASIGNATURA_FAIL) {

				$programa = new ModProgramaAsignatura(null, $conocimientosPrevios, $conocimientosPreviosI, $breveDescripcion, $breveDescripcionI, $programaTeorico, $programaTeoricoI, $programaSeminarios, $programaSeminariosI, $programaLaboratorio, $programaLaboratorioI, $datos['idAsignatura']);
				$context = new Context(CREATE_MODPROGRAMA_ASIGNATURA, $programa);
				$contextPrograma = $controller->action($context);

				if ($contextPrograma->getEvent() === CREATE_MODPROGRAMA_ASIGNATURA_OK) {

					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdGrado=" .$datos['idGrado']. "&IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-prog-asignatura";
				} elseif ($contextPrograma->getEvent() === CREATE_MODPROGRAMA_ASIGNATURA_FAIL) {
					$erroresFormulario[] = "No se ha podido crear el programa asignatura.";
				}
			}
		}
		return $erroresFormulario;
	}
}
