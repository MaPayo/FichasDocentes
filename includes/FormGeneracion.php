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
        foreach ($_SESSION['asignaturas'] as $codGrado => $grado) {
            $context = new Context(FIND_GRADO, $codGrado);
            $grad = $controller->action($context);
            $html .='<h3>'.$grad->getData()->getNombreGrado().'</h3>';
            foreach ($_SESSION['asignaturas'][$codGrado] as $codAsig => $asignatura) {
                $context = new Context(FIND_ASIGNATURA, $codAsig);
                $as = $controller->action($context);
                if ($as->getData()->getActivo()) {
                    $html .= '<input type="checkbox" name="asignaturas[]" value="' . $as->getData()->getIdAsignatura() . '"> <label>' . $as->getData()->getNombreAsignatura() . '</label></br>';
                }
            }
        }

        $html .= '<div class="text-center">
        <a href="index.php">
                  <button type="button" class="btn btn-secondary" id="btn-form">
                      Volver al índice
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
        $folder = 'C:\wamp\www\temp/output/' . $datos['email']; //Ruta donde se almacenan los datos CAMBIAR
        if (!is_dir($folder)) {
            mkdir($folder);
        }
        if(!empty($_POST['asignaturas']))
        foreach ($_POST['asignaturas'] as $idAsignatura) {
            //Para cada una de las asignaturas marcadas recogemos su id y creamos el nombre de archivo
            $context = new Context(FIND_ASIGNATURA, $idAsignatura);
            $asignatura = $controller->action($context);
            $filehtml = "20$actual-20$siguiente-spanish-$idAsignatura.html";
            $filepdf = "20$actual-20$siguiente-spanish-$idAsignatura.pdf";
            $filehtmlI = "20$actual-20$siguiente-english-$idAsignatura.html";
            $filepdfI = "20$actual-20$siguiente-english-$idAsignatura.pdf";
            $rutehtml = "$folder/$filehtml";
            $rutepdf = "$folder/$filepdf";
            $rutehtmlI = "$folder/$filehtmlI";
            $rutepdfI = "$folder/$filepdfI";
            if (is_file($rutehtml)) {
                unlink($rutehtml);
                unlink($rutepdf);
            }
            $datoshtml = array(0 => $idAsignatura, 1 => $rutehtml, 2=> $curso);
            $datospdf = array(0 => $idAsignatura, 1 => $rutepdf, 2 => $rutehtml);
            //Generamos los documentos en español
            $context = new Context(GENERACION_HTML_SPANISH, $datoshtml);
            $contexthtml = $controller->action($context);
            if ($contexthtml->getEvent() === GENERACION_HTML_SPANISH_OK) {
                $context = new Context(GENERACION_PDF, $datospdf);
                $contextpdf = $controller->action($context);
            } else {
                $erroresFormulario[] = "No se ha podido generar los documentos";
            }
            if (count($erroresFormulario) === 0) {
                if ($asignatura->getData()->getNombreAsignaturaIngles() !== "" || $asignatura->getData()->getNombreAsignaturaIngles() !== null) {
                    $datoshtml = array(0 => $idAsignatura, 1 => $rutehtmlI, 2 => $curso);
                    $datospdf = array(0 => $idAsignatura, 1 => $rutepdfI, 2 => $rutehtmlI);

                    $context = new Context(GENERACION_HTML_ENGLISH, $datoshtml);
                    $contexthtml = $controller->action($context);
                    if ($contexthtml->getEvent() === GENERACION_HTML_ENGLISH_OK) {
                        $context = new Context(GENERACION_PDF, $datospdf);
                        $contextpdf = $controller->action($context);
                    } else {
                        $erroresFormulario[] = "No se ha podido generar los documentos";
                    }
                }
            }
        }
        else{
            $erroresFormulario[]="No has seleccionado asignaturas";
        }
        if(count($erroresFormulario)===0){
            $erroresFormulario="descargadocumentos.php";
        }
        return $erroresFormulario;
    }
}
