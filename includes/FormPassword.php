<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Usuario/Usuario.php');

class FormPassword extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$Email = isset($datosIniciales['Email']) ? $datosIniciales['Email'] : null;
		$Password = isset($datosIniciales['Password']) ? $datosIniciales['Password'] : null;


		$html = 
		'<input type="hidden" name="Email" value="' . $Email . '" required />

		<div class="form-group">
		<label for="Password">Contraseña actual</label>
		<input type="password" class="form-control" id="Password"  name="Password" required />
		</div>

		<div class="form-group">
		<label for="NewPassword">Nueva contraseña</label>
		<input type="password"  minlength="8" class="form-control" id="NewPassword"  name="NewPassword" required />
		</div>

		<div class="form-group">
		<label for="ConfirmNewPassword">Confirmar nueva contraseña</label>
		<input type="password"  minlength="8" class="form-control" id="ConfirmNewPassword"  name="ConfirmNewPassword" required />
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
		$context = new Context(FIND_USUARIO, $Email);
		$contextUsuario = $controller->action($context);

		if($contextUsuario->getEvent() === FIND_USUARIO_OK){
			
			$Password = isset($datos['Password']) ? $datos['Password'] : '';
			$NewPassword = isset($datos['NewPassword']) ? $datos['NewPassword'] : '';
			$ConfirmNewPassword = isset($datos['ConfirmNewPassword']) ? $datos['ConfirmNewPassword'] : '';

			$Password = self::clean($Password);
			if (empty($Password)) {
				$erroresFormulario[] = "No has introducido la contraseña";
			}

			$NewPassword = self::clean($NewPassword);
			if (empty($NewPassword)) {
				$erroresFormulario[] = "No has introducido la nueva contraseña";
			}
			

			$ConfirmNewPassword = self::clean($ConfirmNewPassword);
			if (empty($ConfirmNewPassword)) {
				$erroresFormulario[] = "No has confirmado la nueva contraseña";
			}

			if($NewPassword != $ConfirmNewPassword){
				$erroresFormulario[] = "La nueva contraseña no es igual a la de confirmación";
			}

			if (count($erroresFormulario) === 0) {
				if (password_verify($Password, $contextUsuario->getData()->getPassword()) && $Password === $NewPassword) {
					$erroresFormulario = "perfil.php?modificado=y";
				}
				else if(password_verify($Password, $contextUsuario->getData()->getPassword()) && $Password != $NewPassword){
					$NewPassword = password_hash($NewPassword, PASSWORD_BCRYPT);
					$usuario = new Usuario(
						$Email,
						$NewPassword
					);

					$context = new Context(UPDATE_USUARIO, $usuario);
					$correct = $controller->action($context);
					if ($correct->getEvent() === UPDATE_USUARIO_OK) {
						$erroresFormulario = "perfil.php?modificado=y";
					}
					else{
						$erroresFormulario[] = "No se ha podido cambiar la contraseña";
					}
				}else{
					$erroresFormulario[] = "La contraseña actual no es correcta";
				}
			}
		}
		else{
			$erroresFormulario[] = "No existe el usuario";
		}

		return $erroresFormulario;
	}
}
