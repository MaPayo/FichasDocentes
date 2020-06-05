<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormAddProfesor extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {


        $IdAsignatura = $datosIniciales['IdAsignatura'];


        

        $html = ' <input type="hidden" name="IdAsignatura" value="' . $IdAsignatura . '" required />';
        //Buscamos los permisos del profesor en concreto
        $html .= ' <p>Introduce el email del profesor que quieres añadir <input name="emailProfe"></p>';
       // $html .= '<input type="text" name="EmailProfesor value="'.$email.'" hidden>';

        $html .= '<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $IdAsignatura . '#nav-configuracion">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Cancelar
		</button>
		</a>

		<button type="submit" class="btn btn-success" id="btn-form" name="registrar">Crear Permisos</button>
		</div>';
        return $html;
    }

    protected function procesaFormulario($datos)
    {
      
        $erroresFormulario = array();
        $controller = new ControllerImplements();
        $context = new Context(FIND_PERMISOS, $datos['IdAsignatura']);
        $contextPermisos = $controller->action($context);

        $IdAsignatura = $datos['IdAsignatura'];
        $EmailProfesor = $datos['emailProfe'];

        $context = new Context(FIND_PROFESOR, $EmailProfesor);
        $contextPermisos = $controller->action($context);
        $context = new Context(FIND_USUARIO, $EmailProfesor);
        $contextUsuario = $controller->action($context);
        $comparacion = array('email' =>$EmailProfesor, 
        'asignatura'=>$IdAsignatura);
        $context = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA, $comparacion);
        $contextPA = $controller->action($context);

        if ($contextPermisos->getEvent() === FIND_PROFESOR_OK && $contextUsuario->getEvent() === FIND_USUARIO_OK && $contextPA->getEvent()=== FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_FAIL) {
            
            $erroresFormulario = "permisos.php?emailProfesor=".$EmailProfesor."&idAsignatura=".$IdAsignatura;
            
        } else{
            $erroresFormulario[] = "No puedes añadir a este profesor";
        }
        return $erroresFormulario;
    }
}
