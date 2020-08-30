<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');


class FormModulo extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
        $Nombre = isset($datosIniciales['Nombre']) ? $datosIniciales['Nombre'] : null;
        $Horas = isset($datosIniciales['Horas']) ?  $datosIniciales['Horas'] : null;
        $idGrado = $datosIniciales['Grado'];
        $idModulo = isset($datosIniciales['idModulo']) ? $datosIniciales['idModulo'] : null;

        $controller = new ControllerImplements();

        $html = '
        <input type="hidden" name="idGrado" value="' . $idGrado . '" required />
        <input type="hidden" name="idModulo" value="' . $idModulo . '" required />';
        $html .= '<div class="form-group">
        <label for="IdModulo">Código Modulo</label>
        <input class="form-control" id="IdModulo" rows="10" name="IdModulo" value="' . $idModulo . '" required>
        </div>';
        $html .= '<div class="form-group">
				<label for="nombre">Nombre Modulo</label>
				<input class="form-control" id="nombre" rows="10" name="nombre" value="' . $Nombre . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="horas">Creditos Ects</label>
				<input class="form-control" id="horas" rows="10" name="horas" value="' . $Horas . '">
                </div>';

        $html .= '<div class="text-right">
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
        $horas = isset($datos['horas']) ?  $datos['horas'] : '';
        $codigo = isset($datos['IdModulo']) ?  $datos['IdModulo'] : -1;
        if (empty($nombre)) {
            $erroresFormulario[] = "No has introducido el nombre del modulo.";
        }
        if (empty($horas)) {
            $erroresFormulario[] = "No has introducido el número de creditos.";
        }
        if (empty($codigo)) {
            $erroresFormulario[] = "No has introducido el código del modulo.";
        }



        if (count($erroresFormulario) === 0) {

            $context = new Context(FIND_MODULO, $codigo);
            $contextModulo = $controller->action($context);
            if ($contextModulo->getEvent() === FIND_MODULO_OK) {
                $grado = new Modulo($contextModulo->getData()->getIdModulo(), $nombre, $horas, $contextModulo->getData()->getActivo(), $datos['idGrado']);
                $context = new Context(UPDATE_MODULO, $grado);
                $contextUA = $controller->action($context);
                if ($contextUA->getEvent() === UPDATE_MODULO_OK) {
                    $erroresFormulario = "gestionGrados.php?IdGrado=" . $datos['idGrado'] . "&modificado=y#nav-info-grado";
                } else {
                    $erroresFormulario[] = "No se ha podido modificar el grado";
                }
            } elseif ($contextModulo->getEvent() === FIND_MODULO_FAIL) {

                $grado = new Modulo($codigo, $nombre, $horas, 1,  $datos['idGrado']);
                $context = new Context(CREATE_MODULO, $grado);
                $contextModulo = $controller->action($context);

                if ($contextModulo->getEvent() === CREATE_MODULO_OK) {
                    $erroresFormulario = "gestionGrados.php?IdGrado=" . $datos['idGrado']. "&anadido=y#nav-info-grado";
                } elseif ($contextModulo->getEvent() === CREATE_MODULO_FAIL) {
                    $erroresFormulario[] = "No se ha podido crear el grado.";
                }
            }
        }
        return $erroresFormulario;
    }
}
