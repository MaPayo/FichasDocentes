<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Profesor/Profesor.php');

class FormInfo extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$Email = isset($datosIniciales['Email']) ? $datosIniciales['Email'] : null;
		$Nombre = isset($datosIniciales['Nombre']) ? $datosIniciales['Nombre'] : null;
		$Departamento = isset($datosIniciales['Departamento']) ? $datosIniciales['Departamento'] : null;
		$Despacho = isset($datosIniciales['Despacho']) ? $datosIniciales['Despacho'] : null;
		$Tutoria = isset($datosIniciales['Tutoria']) ? $datosIniciales['Tutoria'] : null;
		$Facultad = isset($datosIniciales['Facultad']) ? $datosIniciales['Facultad'] : null;


		$html = 
		'<input type="hidden" name="Email" value="' . $Email . '" required />

		<div class="form-group">
		<label for="Nombre">Nombre</label>
		<input type="text" class="form-control" id="Nombre"  name="Nombre" value="' . $Nombre . '" required/>
		</div>

		<div class="form-row">

		<div class="form-group col-md-6">
		<label for="Departamento">Departamento</label>
		<input type="text" class="form-control" id="Departamento"  name="Departamento" value="' . $Departamento . '" required/>
		</div>

		<div class="form-group col-md-2">
		<label for="Despacho">Despacho</label>
		<input type="text" class="form-control" id="Despacho"  name="Despacho" value="' . $Despacho . '" required/>
		</div>

		<div class="form-group col-md-4">
		<label for="Facultad">Facultad</label>
		<input type="text" class="form-control" id="Facultad"  name="Facultad" value="' . $Facultad . '" required/>
		</div>

		</div>

		<div class="form-group">
		<label for="Tutoria">Tutorías</label>
		<textarea class="form-control" id="Tutoria" rows="3" name="Tutoria" required>' . $Tutoria . '</textarea>
		</div>

		<div class="text-center">
		<a href="perfil.php">
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
		$Email = isset($datos['Email']) ? $datos['Email'] : '';
		$context = new Context(FIND_PROFESOR, $Email);
		$contextProfesor = $controller->action($context);

		if($contextProfesor->getEvent() === FIND_PROFESOR_OK){
			
			$Nombre = isset($datos['Nombre']) ? $datos['Nombre'] : '';
			$Departamento = isset($datos['Departamento']) ? $datos['Departamento'] : '';
			$Despacho = isset($datos['Despacho']) ? $datos['Despacho'] : '';
			$Tutoria = isset($datos['Tutoria']) ? $datos['Tutoria'] : '';
			$Facultad = isset($datos['Facultad']) ? $datos['Facultad'] : '';

			$Nombre = self::clean($Nombre);
			if (empty($Nombre)) {
				$erroresFormulario[] = "No has introducido el nombre";
			}

			$Departamento = self::clean($Departamento);
			if (empty($Departamento)) {
				$erroresFormulario[] = "No has introducido el departamento";
			}

			$Despacho = self::clean($Despacho);
			if (empty($Despacho)) {
				$erroresFormulario[] = "No has introducido el despacho";
			}

			$Tutoria = self::clean($Tutoria);
			if (empty($Tutoria)) {
				$erroresFormulario[] = "No has introducido las tutorías";
			}

			$Facultad = self::clean($Facultad);
			if (empty($Facultad)) {
				$erroresFormulario[] = "No has introducido la facultad";
			}
			if (count($erroresFormulario) === 0) {
				if ($Nombre == $contextProfesor->getData()->getNombre() && $Departamento == $contextProfesor->getData()->getDepartamento() && $Despacho == $contextProfesor->getData()->getDespacho() && $Tutoria == $contextProfesor->getData()->getTutoria() && $Facultad == $contextProfesor->getData()->getFacultad()) {
					$erroresFormulario = "perfil.php?modificado=y";
				}
				else{
					$profesor = new Profesor(
						$Email,
						$Nombre,
						$Departamento,
						$Despacho,
						$Tutoria,
						$Facultad
					);

					$context = new Context(UPDATE_PROFESOR, $profesor);
					$correct = $controller->action($context);
					if ($correct->getEvent() === UPDATE_PROFESOR_OK) {
						$erroresFormulario = "perfil.php?modificado=y";
					}
					else{
						$erroresFormulario[] = "No se ha podido actualizar la información";
					}
				}
			}
		}
		else{
			$erroresFormulario[] = "No existe el profesor";
		}

		return $erroresFormulario;
	}
}
