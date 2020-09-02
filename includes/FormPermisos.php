<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormPermisos extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {

        $IdPermiso = $datosIniciales['IdPermiso'];
        $email = $datosIniciales['EmailProfesor'];
        $IdAsignatura = $datosIniciales['IdAsignatura'];
        $IdGrado = $datosIniciales['IdGrado'];

        $html = '<input type="hidden" name="IdPermiso" value="' . $IdPermiso . '" required />
        <input type="hidden" name="IdAsignatura" value="' . $IdAsignatura . '" required />
        <input type="hidden" name="IdGrado" value="' . $IdGrado . '" required />
        <input type="hidden" name="EmailProfesor" value="' .  $email . '" required />


        <div class="table-responsive text-center">
        <table class="table">
        <thead class="text-primary">
        <tr>
        <th scope="col">PROGRAMA</th>
        <th scope="col">COMPETENCIAS</th>
        <th scope="col">METODOLOGÍA</th>
        <th scope="col">BIBLIOGRAFÍA</th>
        <th scope="col">LABORATORIO</th>
        <th scope="col">CLASE</th>
        <th scope="col">EVALUACIÓN</th>
        </tr>
        </thead>
        <tbody>
        <tr>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="programa" id="programaR" value=0 '; if(!$datosIniciales['PermisoPrograma']) $html.='checked'; $html.='>
        <label class="form-check-label" for="programaR">✏</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="programa" id="programaW" value=1 '; if($datosIniciales['PermisoPrograma']) $html.='checked'; $html.='>
        <label class="form-check-label" for="programaW">📄</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="competencias" id="competenciasR" value=0 '; if(!$datosIniciales['PermisoCompetencias']) $html.='checked'; $html.='>
        <label class="form-check-label" for="competenciasR">✏</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="competencias" id="competenciasW" value=1 '; if($datosIniciales['PermisoCompetencias']) $html.='checked'; $html.='>
        <label class="form-check-label" for="competenciasW">📄</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="metodologia" id="metodologiaR" value=0 '; if(!$datosIniciales['PermisoMetodologia']) $html.='checked'; $html.='>
        <label class="form-check-label" for="metodologiaR">✏</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="metodologia" id="metodologiaW" value=1 '; if($datosIniciales['PermisoMetodologia']) $html.='checked'; $html.='>
        <label class="form-check-label" for="metodologiaW">📄</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="bibliografia" id="bibliografiaR" value=0 '; if(!$datosIniciales['PermisoBibliografia']) $html.='checked'; $html.='>
        <label class="form-check-label" for="bibliografiaR">✏</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="bibliografia" id="bibliografiaW" value=1 '; if($datosIniciales['PermisoBibliografia']) $html.='checked'; $html.='>
        <label class="form-check-label" for="bibliografiaW">📄</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="laboratorio" id="laboratorioR" value=0 '; if(!$datosIniciales['PermisoGrupoLaboratorio']) $html.='checked'; $html.='>
        <label class="form-check-label" for="laboratorioR">✏</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="laboratorio" id="laboratorioW" value=1 '; if($datosIniciales['PermisoGrupoLaboratorio']) $html.='checked'; $html.='>
        <label class="form-check-label" for="laboratorioW">📄</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="clase" id="claseR" value=0 '; if(!$datosIniciales['PermisoGrupoClase']) $html.='checked'; $html.='>
        <label class="form-check-label" for="claseR">✏</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="clase" id="claseW" value=1 '; if($datosIniciales['PermisoGrupoClase']) $html.='checked'; $html.='>
        <label class="form-check-label" for="claseW">📄</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="evaluacion" id="evaluacionR" value=0 '; if(!$datosIniciales['PermisoEvaluacion']) $html.='checked'; $html.='>
        <label class="form-check-label" for="evaluacionR">✏</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="evaluacion" id="evaluacionW" value=1 '; if($datosIniciales['PermisoEvaluacion']) $html.='checked'; $html.='>
        <label class="form-check-label" for="evaluacionW">📄</label>
        </div>
        </td>

        </tr>
        </tbody>
        </table>
        </div>

        <div class="text-center">
        <a href="indexAcceso.php?IdGrado=' .$IdGrado. '&IdAsignatura=' . $IdAsignatura . '#nav-configuracion">
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
        $permisos = new Permisos(
            $datos['IdPermiso'],
            $datos['programa'],
            $datos['competencias'],
            $datos['metodologia'],
            $datos['bibliografia'],
            $datos['laboratorio'],
            $datos['clase'],
            $datos['evaluacion'],
            $datos['IdAsignatura'],
            $datos['EmailProfesor']
        );

        $context = new Context(UPDATE_PERMISOS, $permisos);
        $contextConfiguracion = $controller->action($context);

        if ($contextConfiguracion->getEvent() === UPDATE_PERMISOS_OK) {
           $erroresFormulario = "indexAcceso.php?IdGrado=".$datos['IdGrado']."&IdAsignatura=".$datos['IdAsignatura']."&modificado=y#nav-configuracion";
       } elseif ($contextConfiguracion->getEvent() === UPDATE_PERMISOS_FAIL) {
        $erroresFormulario[] = "No se ha podido modificar los permisos";
    }

    return $erroresFormulario;
}
}
