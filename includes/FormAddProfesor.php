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
        $IdGrado = $datosIniciales['IdGrado'];

        $html = 
        '<input type="hidden" name="IdAsignatura" value="' . $IdAsignatura . '" required />
        <input type="hidden" name="IdGrado" value="' . $IdGrado . '" required />

        <div class="form-group">
        <label for="email">Correo electrónico completo</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="ejemplo@ucm.es">
        </div>

        <div class="text-center">
        <a href="indexAcceso.php?IdGrado='.$IdGrado.'&IdAsignatura=' . $IdAsignatura . '#nav-configuracion">
        <button type="button" class="btn btn-secondary" id="btn-form">
        Cancelar
        </button>
        </a>

        <button type="submit" class="btn btn-success" id="btn-form" name="registrar">Añadir</button>
        </div>';
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $erroresFormulario = array();
        $controller = new ControllerImplements();


        $context = new Context(FIND_PROFESOR, $datos['email']);
        $contextProfesor = $controller->action($context);

        if ($contextProfesor->getEvent() === FIND_PROFESOR_OK) {

         $info['email'] = $datos['email'];
         $info['asignatura'] = $datos['IdAsignatura'];
         $context = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA, $info);
         $contextPYA = $controller->action($context);

         if ($contextPYA->getEvent() === FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_FAIL) {
            $permisos = new Permisos(null, 0, 0, 0, 0, 0, 0, 0,  $datos['IdAsignatura'], $datos['email']);
            $context = new Context(CREATE_PERMISOS, $permisos);
            $contextPermisos = $controller->action($context);

            if($contextPermisos->getEvent() === CREATE_PERMISOS_OK) {
               $erroresFormulario = 'indexAcceso.php?IdGrado='.$datos['IdGrado'].'&IdAsignatura=' . $datos['IdAsignatura'] . '&anadido=y#nav-configuracion'; 
           }
           else{
            $erroresFormulario[] = "No se puede añadir ese profesor, revisa el correo introducido";
        } 

    } 
    else{
        $erroresFormulario[] = "El profesor introducido ya existe en la asignatura";
    }

}
else{
 $erroresFormulario[] = "No existe el profesor introducido";
}

return $erroresFormulario;
}
}
