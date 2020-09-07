<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormUsuarios extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {      
        $controller = new ControllerImplements();
        $context = new Context(FIND_USUARIOS, null);
        $contextUsuarios = $controller->action($context);

        $html= '<div class="text-center">
		<a href="addUsuario.php">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Añadir usuario
		</button>
        </a>

        <button type="submit" class="btn btn-danger" id="btn-form" name="Eliminar">Eliminar</button>
        </div>';
        foreach($contextUsuarios->getdata() as $usuario){
            $context = new Context(FIND_ADMINISTRADOR, $usuario->getEmail());
            $contextAdmin = $controller->action($context);
            if($contextAdmin->getEvent()===FIND_ADMINISTRADOR_FAIL){
            $html .='<input type="checkbox" name="usuarios[]" value="'.$usuario->getEmail().'"> <label>'.$usuario->getEmail().'</label></br>';
            }
        }
       
        return $html;
    }

    protected function procesaFormulario($datos)
    {

        $erroresFormulario = array();
        $controller = new ControllerImplements();
       foreach ($_POST['usuarios'] as $usuario){
        $context = new Context(DELETE_USUARIO, $usuario);
        $contextu = $controller->action($context);
        if($contextu->getEvent() === DELETE_USUARIO_OK){
            $erroresFormulario = "gestionUsuarios.php";
        }
        else{
            $erroresFormulario[] = "No se ha podido borrar los usuarios";
        }
       }
        return $erroresFormulario;
    }
}
