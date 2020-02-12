<?php
namespace es\ucm;
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');
require_once('includes/Presentacion/FactoriaComandos/Usuario/CommandFindUsuario.php');


class FormLogin extends Form
{
	protected function generaCamposFormulario($datosIniciales)
    {
		$html='<div>
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
		$email=self::clean($email);
		if ( empty($email) ) {
			$erroresFormulario[] = "El email no puede estar vacío";
		}

		$password = isset($_POST['password']) ? $_POST['password'] : null;
		$password=self::clean($password);
		if ( empty($password) ) {
			$erroresFormulario[] = "El password no puede estar vacío.";
		}

		if (count($erroresFormulario) === 0) {
			$command=new CommandFindUsuario();
			$usuario=$command->execute($email);
			//Para corregir
			echo $usuario->getEvent();
			/*if (!$usuario) {
				$erroresFormulario[] = "El usuario o el password no coinciden";
			} else {
			    if ( $usuario->compruebaPassword($password) ) {
		    		$_SESSION['login'] = true;
		    		$_SESSION['idUsuario'] = $usuario->idUsuario();
		    		$_SESSION['rol'] = $usuario->rol();
		    		header('Location: indexAcceso.php');
		    		exit();
			    } else {
			        $erroresFormulario[] = "El usuario o el password no coinciden";
			    }
			}*/
			//$erroresFormulario="indexAcceso.php";
		}

        return $erroresFormulario;
    }
}