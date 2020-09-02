<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');


class FormGrado extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
        $Nombre = isset($datosIniciales['Nombre']) ? $datosIniciales['Nombre'] : null;
        $Horas = isset($datosIniciales['Horas']) ?  $datosIniciales['Horas'] : null;
        $Coordinador = isset($datosIniciales['Coordinador']) ? $datosIniciales['Coordinador'] : null;
        $idGrado = isset($datosIniciales['idGrado']) ? $datosIniciales['idGrado'] : null;

        $controller = new ControllerImplements();


        $html = '
		<input type="hidden" name="idGrado" value="' . $idGrado . '" required />';
        $html .= '<div class="form-group">
        <label for="IdGrado">Código Grado</label>
        <input class="form-control" id="IdGrado" rows="10" name="IdGrado" value="' . $idGrado . '" required>
        </div>';
        $html .= '<div class="form-group">
				<label for="nombre">Nombre Grado</label>
				<input class="form-control" id="nombre" rows="10" name="nombre" value="' . $Nombre . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="horas">Horas Ects</label>
				<input class="form-control" id="horas" rows="10" name="horas" value="' . $Horas . '">
                </div>';
        $html .= '<div class="form-group">
				<label for="coordinador">Coordinador(email)</label>
				<input class="form-control" id="coordinador" rows="10" name="coordinador" value="' . $Coordinador . '">
                </div>';

        $html .= '<div class="text-center">
		<a href="gestionGrados.php?IdGrado=' . $idGrado . '#nav-info-grado">
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


        $nombre = isset($datos['nombre']) ? $datos['nombre'] : '';
        $coordinador = isset($datos['coordinador']) ?  $datos['coordinador'] : '';
        $horas = isset($datos['horas']) ?  $datos['horas'] : '';
        $codigo = isset($datos['IdGrado']) ?  $datos['IdGrado'] : -1;
        if (empty($nombre)) {
            $erroresFormulario[] = "No has introducido el número de créditos.";
        }
        if (empty($horas)) {
            $erroresFormulario[] = "No has introducido el número de horas.";
        }
        if (empty($coordinador)) {
            $erroresFormulario[] = "No has introducido el email del coordinador.";
        }



        if (count($erroresFormulario) === 0) {
            $context = new Context(FIND_GRADO, $codigo);
            $contextGrado = $controller->action($context);
            if ($contextGrado->getEvent() === FIND_GRADO_OK) {
                $grado = new Grado($contextGrado->getData()->getIdGrado(), $nombre, $coordinador, $contextGrado->getData()->getActivo(), $horas);
                $context = new Context(UPDATE_GRADO, $grado);
                $contextUA = $controller->action($context);
                if ($contextUA->getEvent() === UPDATE_GRADO_OK) {
                    $erroresFormulario = "gestionGrados.php?IdGrado=" . $datos['idGrado'] . "&modificado=y#nav-info-grado";
                } else {
                    $erroresFormulario[] = "No se ha podido modificar el grado";
                }
            } elseif ($contextGrado->getEvent() === FIND_GRADO_FAIL) {

                $grado = new Grado($codigo, $nombre, $coordinador, 1, $horas);
                $context = new Context(CREATE_GRADO, $grado);
                $contextGrado = $controller->action($context);

                if ($contextGrado->getEvent() === CREATE_GRADO_OK) {
                    $erroresFormulario = "gestionGrados.php?IdGrado=" . $codigo. "&anadido=y#nav-info-grado";
                } elseif ($contextGrado->getEvent() === CREATE_GRADO_FAIL) {
                    $erroresFormulario[] = "No se ha podido crear el grado.";
                }
            }
        }
        return $erroresFormulario;
    }
}
