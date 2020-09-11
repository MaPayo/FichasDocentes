<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormPermisos extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
        $IdPermiso = isset($datosIniciales['IdPermiso']) ? $datosIniciales['IdPermiso'] : null;
        $email = isset($datosIniciales['EmailProfesor']) ? $datosIniciales['EmailProfesor'] : null;
        $IdAsignatura = isset($datosIniciales['IdAsignatura']) ? $datosIniciales['IdAsignatura'] : null;
        $IdGrado = isset($datosIniciales['IdGrado']) ? $datosIniciales['IdGrado'] : null;
        $PermisoPrograma =  isset($datosIniciales['PermisoPrograma']) ? $datosIniciales['PermisoPrograma'] : null;
        $PermisoCompetencias = isset($datosIniciales['PermisoCompetencias']) ? $datosIniciales['PermisoCompetencias'] : null;
        $PermisoMetodologia = isset($datosIniciales['PermisoMetodologia']) ? $datosIniciales['PermisoMetodologia'] : null;
        $PermisoBibliografia = isset($datosIniciales['PermisoBibliografia']) ? $datosIniciales['PermisoBibliografia'] : null;
        $PermisoGrupoLaboratorio = isset($datosIniciales['PermisoGrupoLaboratorio']) ? $datosIniciales['PermisoGrupoLaboratorio'] : null;
        $PermisoGrupoClase = isset($datosIniciales['PermisoGrupoClase']) ? $datosIniciales['PermisoGrupoClase'] : null;
        $PermisoEvaluacion = isset($datosIniciales['PermisoEvaluacion']) ? $datosIniciales['PermisoEvaluacion'] : null;

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
        <input class="form-check-input" type="radio" name="programa" id="programaR" value=0 ';
        if (!$PermisoPrograma) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="programaR">📄</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="programa" id="programaW" value=1 ';
        if ($PermisoPrograma) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="programaW">✏</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="competencias" id="competenciasR" value=0 ';
        if (!$PermisoCompetencias) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="competenciasR">📄</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="competencias" id="competenciasW" value=1 ';
        if ($PermisoCompetencias) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="competenciasW">✏</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="metodologia" id="metodologiaR" value=0 ';
        if (!$PermisoMetodologia) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="metodologiaR">📄</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="metodologia" id="metodologiaW" value=1 ';
        if ($PermisoMetodologia) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="metodologiaW">✏</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="bibliografia" id="bibliografiaR" value=0 ';
        if (!$PermisoBibliografia) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="bibliografiaR">📄</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="bibliografia" id="bibliografiaW" value=1 ';
        if ($PermisoBibliografia) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="bibliografiaW">✏</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="laboratorio" id="laboratorioR" value=0 ';
        if (!$PermisoGrupoLaboratorio) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="laboratorioR">📄</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="laboratorio" id="laboratorioW" value=1 ';
        if ($PermisoGrupoLaboratorio) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="laboratorioW">✏</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="clase" id="claseR" value=0 ';
        if (!$PermisoGrupoClase) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="claseR">📄</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="clase" id="claseW" value=1 ';
        if ($PermisoGrupoClase) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="claseW">✏</label>
        </div>
        </td>

        <td>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="evaluacion" id="evaluacionR" value=0 ';
        if (!$PermisoEvaluacion) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="evaluacionR">📄</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="evaluacion" id="evaluacionW" value=1 ';
        if ($PermisoEvaluacion) $html .= 'checked';
        $html .= '>
        <label class="form-check-label" for="evaluacionW">✏</label>
        </div>
        </td>

        </tr>
        </tbody>
        </table>
        </div>

        <div class="text-center">
        <a href="indexAcceso.php?IdGrado=' . $IdGrado . '&IdAsignatura=' . $IdAsignatura . '#nav-configuracion">
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
        $info['email'] =  $datos['EmailProfesor'];
        $info['asignatura'] =  $datos['IdAsignatura'];

        $context = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA, $info);
        $contextPermisos = $controller->action($context);

        if ($contextPermisos->getEvent() === FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_OK) {
            if ($datos['programa'] == $contextPermisos->getData()->getPermisoPrograma() && $datos['competencias'] == $contextPermisos->getData()->getPermisoCompetencias() && $datos['metodologia'] == $contextPermisos->getData()->getPermisoMetodologia() && $datos['bibliografia'] == $contextPermisos->getData()->getPermisoBibliografia() && $datos['laboratorio'] == $contextPermisos->getData()->getPermisoGrupoLaboratorio() && $datos['clase'] == $contextPermisos->getData()->getPermisoGrupoClase() && $datos['evaluacion'] == $contextPermisos->getData()->getPermisoEvaluacion() && $datos['IdAsignatura'] == $contextPermisos->getData()->getIdAsignatura() && $datos['EmailProfesor'] == $contextPermisos->getData()->getEmailProfesor()) {

                $erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['IdGrado'] . "&IdAsignatura=" . $datos['IdAsignatura'] . "&modificado=y#nav-configuracion";
            } else {
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
                    $erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['IdGrado'] . "&IdAsignatura=" . $datos['IdAsignatura'] . "&modificado=y#nav-configuracion";
                } elseif ($contextConfiguracion->getEvent() === UPDATE_PERMISOS_FAIL) {
                    $erroresFormulario[] = "No se ha podido modificar los permisos";
                }
            }
        } else {
            $erroresFormulario[] = "No existen los permisos";
        }

        return $erroresFormulario;
    }
}
