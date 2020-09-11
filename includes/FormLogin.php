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
		<input type="email" class="form-control form-control-lg" name="email" placeholder="Email" autofocus required />
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
			} 
			else if (password_verify($password, $usuario->getData()->getPassword())) {
				$_SESSION['login'] = true;
				$_SESSION['idUsuario'] = $usuario->getData()->getEmail();

				$contextAdmin = new Context(FIND_ADMINISTRADOR, $email);
				$admin = $controller->action($contextAdmin);
				$contextProfesor = new Context(FIND_PROFESOR, $email);
				$profesor = $controller->action($contextProfesor);
				if ($admin->getEvent() === FIND_ADMINISTRADOR_OK) {
					$_SESSION['admin'] = true;
					$erroresFormulario = 'indexAdmin.php';
				} else if ($profesor->getEvent() === FIND_PROFESOR_OK) {
					$_SESSION['admin'] = false;
					$idAsignatura = null;
					$idGrado = null;

					$contextCoordinacion = new Context(LIST_GRADO, null);
					$grados = $controller->action($contextCoordinacion);

					foreach ($grados->getData() as $grado) {
						if ($grado->getActivo()) {
							$contextModulo = new Context(LIST_MODULO, $grado->getCodigoGrado());
							$modulos = $controller->action($contextModulo);
							if ($modulos->getEvent() === LIST_MODULO_OK) {
								foreach ($modulos->getData() as $modulo) {
									if ($modulo->getActivo()) {
										$contextMateria = new Context(LIST_MATERIA, $modulo->getIdModulo());
										$materias = $controller->action($contextMateria);
										if ($materias->getEvent() === LIST_MATERIA_OK) {
											foreach ($materias->getData() as $materia) {
												if ($materia->getActivo()) {
													$contextAsignatura = new Context(LIST_ASIGNATURA, $materia->getIdMateria());
													$asignaturas = $controller->action($contextAsignatura);
													if ($asignaturas->getEvent() === LIST_ASIGNATURA_OK) {
														foreach ($asignaturas->getData() as $asignatura) {
															if ($asignatura->getActivo()) {
																$info['email'] = $email;
																$info['asignatura'] = $asignatura->getIdAsignatura();
																$contextPermisos = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA, $info);
																$permisos = $controller->action($contextPermisos);
																if ($permisos->getEvent() === FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_OK) {
																	if (is_null($idAsignatura)) {
																		$idGrado = $grado->getCodigoGrado();
																		$idAsignatura = $asignatura->getIdAsignatura();
																	}
																	$_SESSION['asignaturas'][$grado->getCodigoGrado()][$asignatura->getIdAsignatura()]['permisos'] = serialize($permisos->getData());
																	$_SESSION['asignaturas'][$grado->getCodigoGrado()][$asignatura->getIdAsignatura()]['coordinacion'] = false;
																}
																if ($grado->getCoordinadorGrado() === $email) {
																	if (is_null($idAsignatura)) {
																		$idGrado = $grado->getCodigoGrado();
																		$idAsignatura = $asignatura->getIdAsignatura();
																	}
																	$_SESSION['asignaturas'][$grado->getCodigoGrado()][$asignatura->getIdAsignatura()]['coordinacion'] = true;
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}

					if (!is_null($idAsignatura)) {
						$erroresFormulario = 'indexAcceso.php?IdGrado=' . $idGrado . '&IdAsignatura=' . $idAsignatura;
					} else $erroresFormulario[] = 'el usuario con rol profesor no tiene ninguna asignatura asociada';
				} else {
					$erroresFormulario[] = "No se ha encontrado rol para el usuario";
				}
			} else {
				$erroresFormulario[] = "El email o la contraseña no coinciden";
			}
		}
		return $erroresFormulario;
	}
}
