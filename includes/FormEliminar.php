<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormEliminar extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {

        $IdPermiso = $datosIniciales['IdPermiso'];

        $email = $datosIniciales['EmailProfesor'];
        $IdAsignatura = $datosIniciales['IdAsignatura'];


        $controller = new ControllerImplements();
        $context = new Context(FIND_PERMISOS, $IdAsignatura);
        $contextPermisos = $controller->action($context);
        

        $html = '<input type="hidden" name="IdPermiso" value="' . $IdPermiso . '" required /> 
        <input type="hidden" name="IdAsignatura" value="' . $IdAsignatura . '" required />
        <input type="hidden" name="EmailProfesor" value="' . $email . '" required />';
        //Buscamos los permisos del profesor en concreto
        $html .= ' <p>¿Deseas eliminar a este profesor de la asignatura?</p>';
       // $html .= '<input type="text" name="EmailProfesor value="'.$email.'" hidden>';

        $html .= '<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $IdAsignatura . '#nav-configuracion">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Cancelar
		</button>
		</a>

		<button type="submit" class="btn btn-success" id="btn-form" name="registrar">Aceptar</button>
		</div>';
        return $html;
    }

    protected function procesaFormulario($datos)
    {
       
        $erroresFormulario = array();
        $controller = new ControllerImplements();
        $context = new Context(FIND_PERMISOS, $datos['IdAsignatura']);
        $contextPermisos = $controller->action($context);

        $IdPermiso = $datos['IdPermiso'];
        $IdAsignatura = $datos['IdAsignatura'];
        $EmailProfesor = $datos['EmailProfesor'];
        $comparacion = array('email' =>$EmailProfesor, 
        'asignatura'=>$IdAsignatura);
        $context = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA, $comparacion);
        $contextPermisos = $controller->action($context);
        $context = new Context(FIND_ASIGNATURA,$IdAsignatura);
        $asignatura = $controller->action($context);

        if ($contextPermisos->getEvent() === FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_OK && strpos($asignatura->getData()->getCoordinadores(), $EmailProfesor)===false  ) {

            $context = new Context(DELETE_PERMISOS, $IdPermiso);
            $contextPermisos = $controller->action($context);

            if ($contextPermisos->getEvent() === DELETE_PERMISOS_OK) {
                $erroresFormulario = "indexAcceso.php?IdAsignatura=" . $IdAsignatura . "&modificado=y#nav-configuracion";
            } elseif ($contextPermisos->getEvent() === DELETE_PERMISOS_FAIL) {
                $erroresFormulario[] = "No se ha podido borrar al profesor.";
            }
        } else{
            $erroresFormulario[] = "No puedes borrar al coordinador de la asignatura";
        }
        return $erroresFormulario;
    }
}
