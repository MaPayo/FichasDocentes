<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormAddUsuario extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
    
        
        $html = ' <p>Introduce el email del usuario que quieres añadir <input name="emailUsuario"></p>';
       // $html .= '<input type="text" name="EmailProfesor value="'.$email.'" hidden>';

        $html .= '<div class="text-center">
		<a href="gestionUsuarios.php>
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
        $EmailUsuario = $datos['emailUsuario'];

        
        $context = new Context(FIND_USUARIO, $EmailUsuario);
        $contextFU = $controller->action($context);

        if ($contextFU->getEvent() === FIND_USUARIO_FAIL) {
            $pass = explode("@", $EmailUsuario)[0];
            $pass_hash = password_hash(trim($pass), PASSWORD_BCRYPT);
            $usuario = new Usuario($EmailUsuario, $pass_hash);

            $context = new Context(CREATE_USUARIO, $usuario);
            $contextCU = $controller->action($context);
            if($contextCU->getEvent()===CREATE_USUARIO_OK){
            //Creamos un profesor asociado
            $profesor = new Profesor($EmailUsuario,"","","","","");
            $context = new Context(FIND_PROFESOR, $EmailUsuario);
            $contextFP = $controller->action($context);
            if($contextFP->getEvent()===FIND_PROFESOR_OK){
                $context = new Context(UPDATE_PROFESOR, $profesor);
                $contextP = $controller->action($context);
            }else{
                $context = new Context(CREATE_PROFESOR, $profesor);
                $contextP = $controller->action($context);
            }
            $erroresFormulario = "gestionUsuarios.php";
        }else
            $erroresFormulario[] = "El usuario no ha podido ser añadido";
            
        } else{
            $erroresFormulario[] = "Este usuario ya esta registrado";
        }
        return $erroresFormulario;
    }
}
