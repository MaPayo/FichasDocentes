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
			if (!$usuario) {						
				$erroresFormulario[] = "El usuario o la contraseña no coinciden";
			} else {
				if ($usuario->getPassword() === $password) {
					echo $usuario->getPassword();
					$_SESSION['login'] = true;
					$_SESSION['idUsuario'] = $usuario->getEmail();
					$_SESSION['permisos'] = 1;//corregir
					$erroresFormulario = "indexAcceso.php";
				} else {
					$erroresFormulario[] = "El usuario o el password no coinciden";
				}
			}
		}
		return $erroresFormulario;
	}
}
