<?php

namespace es\ucm;

require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');
require_once('includes/Presentacion/FactoriaComandos/Usuario/CommandFindUsuario.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');


class FormLogin extends Form
{
	protected function generaCamposFormulario($datosIniciales)
	{
		$html = '<div>
		<div class="form-group">
		<input type="text" class="form-control form-control-lg" name="email" placeholder="Email" required />
		</div>

		<div class="form-group">
		<input type="password" class="form-control form-control-lg" name="password" placeholder="Contraseña" required />
		</div>
		<button type="submit" class="btn btn-success btn-lg btn-block" name="login">Acceder</button>
		</div>';

		return $html;
	}

	protected function procesaFormulario($datos)
	{
		$erroresFormulario = array();

		$email = isset($_POST['email']) ? $_POST['email'] : null;
		$email = self::clean($email);
		if (empty($email)) {
			$erroresFormulario[] = "El email no puede estar vacío";
		}

		$password = isset($_POST['password']) ? $_POST['password'] : null;
		$password = self::clean($password);
		if (empty($password)) {
			$erroresFormulario[] = "La contraseña no puede estar vacía";
		}

		if (count($erroresFormulario) === 0) {
			$context = new Context(FIND_USUARIO, $email);
			$controller = new ControllerImplements();
			$usuario = $controller->action($context);
			if ($usuario->getEvent() === FIND_USUARIO_FAIL) {						
				$erroresFormulario[] = "El email o la contraseña no coinciden";
			} else {
				if ($usuario->getData()->getPassword() === $password) {
					$_SESSION['login'] = true;
					$_SESSION['idUsuario'] = $usuario->getData()->getEmail();
					$context = new Context(FIND_PERMISOS_POR_PROFESOR, $email);
					$controller = new ControllerImplements();
					$permisos = $controller->action($context);
					if($permisos->getEvent() === FIND_PERMISOS_POR_PROFESOR_FAIL){
						$erroresFormulario[] = "El profesor no tiene ningún permiso";
					}
					else{
						foreach ($permisos->getData() as $permiso) {
							$_SESSION['permisos'][$permiso->getIdAsignatura()] = serialize($permiso);
						}
						$erroresFormulario = 'indexAcceso.php?IdAsignatura='.$permisos->getData()[0]->getIdAsignatura();
					}
				} else {
					$erroresFormulario[] = "El email o la contraseña no coinciden";
				}
			}
		}
		return $erroresFormulario;
	}
}
