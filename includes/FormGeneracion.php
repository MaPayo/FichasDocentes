<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormGeneracion extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
        $idAsignatura = isset($datosIniciales['IdAsignatura']) ? $datosIniciales['IdAsignatura'] : null;
        $email = $datosIniciales['email'];
        $controller = new ControllerImplements();

        $html = '<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />
		<input type="hidden" name="email" value="' . $email . '" required />';
        $html .= 'Introduce el curso actual: 20<input name="actual">/<input name="siguiente"><br>';
        $context = new Context(FIND_PERMISOS_POR_PROFESOR, $email);
        $contextPP = $controller->action($context);
        if ($contextPP->getEvent() === FIND_PERMISOS_POR_PROFESOR_OK) {
            foreach ($contextPP->getData() as $permisos) {
                $context = new Context(FIND_ASIGNATURA, $permisos->getIdAsignatura());
                $contextA = $controller->action($context);
                if ($contextA->getData()->getActivo()) {
                    $html .= '<input type="checkbox" name="asignaturas[]" value="' . $contextA->getData()->getIdAsignatura() . '"> <label>' . $contextA->getData()->getNombreAsignatura() . '</label></br>';
                }
            }
        }
        $html .= '<div class="text-right position-fixed w-50 p-2" >
		<a href="generarTodas.php">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Generar todas
		</button>
        </a>

        <button type="submit" class="btn btn-secondary" id="btn-form" name="GenerarSelecionadas">Generar seleccionadas</button>
        </div>';
        return $html;
    }
    protected function procesaFormulario($datos)
    { //generamos las seleccionadas
        $erroresFormulario = array();
        $controller = new ControllerImplements();
        $actual = $datos['actual'];
        $siguiente = $datos['siguiente'];
        $curso = "20$actual/$siguiente";
        //$folder = /tmp/storage/output
        $folder = 'C:\wamp\www\temp/output'; //Ruta donde se almacenan los datos
        foreach ($_POST['asignaturas'] as $idAsignatura) {
            //Para cada una de las asignaturas marcadas recogemos su id y creamos el nombre de archivo
            $context = new Context(FIND_ASIGNATURA, $idAsignatura);
            $asignatura = $controller->action($context);
            $filehtml = "20$actual-20$siguiente-español-$idAsignatura.html";
            $filepdf = "20$actual-20$siguiente-español-$idAsignatura.pdf";
            $rutehtml = "$folder/$filehtml";
            $rutepdf = "$folder/$filepdf";
            if(is_file($rutehtml)){
                unlink($rutehtml);
               // unlink($rutepdf);
            }
            $datoshtml = array(0 => $idAsignatura, 1 => $rutehtml);
            $datospdf = array(0 => $idAsignatura, 1 => $rutepdf, 2=>$rutehtml);
            //Generamos los documentos en español
            $context = new Context(GENERACION_HTML_SPANISH, $datoshtml);
            $contexthtml = $controller->action($context);
            if ($contexthtml->getEvent() === GENERACION_HTML_SPANISH_OK) {
                $context = new Context(GENERACION_PDF_SPANISH, $datospdf);
                $contextpdf = $controller->action($context);
            } else {
                $erroresFormulario[] = "No se ha podido generar los documentos";
            }
            /*if(count($erroresFormulario===0)){
            if ($asignatura->getData()->getNombreAsignaturaI() !== "" || $asignatura->getData()->getNombreAsignaturaI() !== null) {
                $filehtmlI = "20$actual-20$siguiente-english-$idAsignatura.html";
                $filepdfI = "20$actual-20$siguiente-english-$idAsignatura.pdf";
            }

        }*/
            
        }
        return $erroresFormulario;
    }
}
