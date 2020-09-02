<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');


class FormMateria extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
        $Nombre = isset($datosIniciales['Nombre']) ? $datosIniciales['Nombre'] : null;
        $Horas = isset($datosIniciales['Horas']) ?  $datosIniciales['Horas'] : null;
        $Caracter = isset($datosIniciales['Caracter']) ?  $datosIniciales['Caracter'] : null;
        $idModulo = $datosIniciales['Modulo'];
        $idGrado = $datosIniciales['Grado'];
        $idMateria = isset($datosIniciales['idMateria']) ? $datosIniciales['idMateria'] : null;

        $controller = new ControllerImplements();

        $html = '
        <input type="hidden" name="idMateria" value="' . $idMateria . '" required />
        <input type="hidden" name="idModulo" value="' . $idModulo . '" required />
        <input type="hidden" name="idGrado" value="' . $idGrado . '" required />';
        $html .= '<div class="form-group">
        <label for="IdMateria">Código Materia</label>
        <input class="form-control" id="IdMateria" rows="10" name="IdMateria" value="' . $idMateria . '" required>
        </div>';
        $html .= '<div class="form-group">
				<label for="nombre">Nombre Materia</label>
				<input class="form-control" id="nombre" rows="10" name="nombre" value="' . $Nombre . '" required>
                </div>';
        $html .= '<div class="form-group">
				<label for="horas">Creditos Ects</label>
				<input class="form-control" id="horas" rows="10" name="horas" value="' . $Horas . '">
                </div>';
        $html .= '<div class="form-group">
				<label for="caracter">Caracter</label>
				<input class="form-control" id="caracter" rows="10" name="caracter" value="' . $Caracter . '">
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
        $horas = isset($datos['horas']) ?  $datos['horas'] : '';
        $caracter = isset($datos['caracter']) ?  $datos['caracter'] : '';
        $codigo = isset($datos['IdMateria']) ?  $datos['IdMateria'] : -1;
        if (empty($nombre)) {
            $erroresFormulario[] = "No has introducido el nombre de la materia.";
        }
        if (empty($horas)) {
            $erroresFormulario[] = "No has introducido el número de creditos.";
        }
        if (empty($codigo)) {
            $erroresFormulario[] = "No has introducido el código de la materia.";
        }
        if (empty($caracter)) {
            $erroresFormulario[] = "No has introducido el caracter de la materia.";
        }



        if (count($erroresFormulario) === 0) {

            $context = new Context(FIND_MATERIA, $codigo);
            $contextMateria = $controller->action($context);
            if ($contextMateria->getEvent() === FIND_MATERIA_OK) {
                $grado = new Materia($contextMateria->getData()->getIdMateria(), $nombre, $caracter,$horas, $contextMateria->getData()->getActivo(), $datos['idModulo']);
                $context = new Context(UPDATE_MATERIA, $grado);
                $contextUA = $controller->action($context);
                if ($contextUA->getEvent() === UPDATE_MATERIA_OK) {
                    $erroresFormulario = "gestionGrados.php?IdGrado=" . $datos['idModulo'] . "&modificado=y#nav-info-grado";
                } else {
                    $erroresFormulario[] = "No se ha podido modificar el grado";
                }
            } elseif ($contextMateria->getEvent() === FIND_MATERIA_FAIL) {

                $grado = new Materia($codigo, $nombre,$caracter, $horas, 1,  $datos['idModulo']);
                $context = new Context(CREATE_MATERIA, $grado);
                $contextMateria = $controller->action($context);

                if ($contextMateria->getEvent() === CREATE_MATERIA_OK) {
                    $erroresFormulario = "gestionGrados.php?IdGrado=" . $datos['idGrado']. "&anadido=y#nav-info-grado";
                } elseif ($contextMateria->getEvent() === CREATE_MATERIA_FAIL) {
                    $erroresFormulario[] = "No se ha podido crear el grado.";
                }
            }
        }
        return $erroresFormulario;
    }
}
