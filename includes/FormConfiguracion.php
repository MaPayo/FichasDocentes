<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormConfiguracion extends Form
{

  protected function generaCamposFormulario($datosIniciales)
  {
    $IdConfiguracion = $datosIniciales['IdConfiguracion'];
    $IdAsignatura = $datosIniciales['IdAsignatura'];
    $IdGrado = $datosIniciales['IdGrado'];

    $controller = new ControllerImplements();
    $context = new Context(FIND_CONFIGURACION, $IdAsignatura);
    $contextConfiguracion = $controller->action($context);

    $html =
      '<input type="hidden" name="IdConfiguracion" id="IdConfiguracion" value="' . $IdConfiguracion . '" required />
    <input type="hidden" name="IdAsignatura" id="IdAsignatura" value="' . $IdAsignatura . '" required />
    <input type="hidden" name="IdGrado" id="IdGrado" value="' . $IdGrado . '" required />


    <table class="table table-hover">
    <tbody>

    <tr>
    <th scope="row" class="text-center text-primary" colspan="2">PROGRAMA</th>
    </tr>

    <tr>
    <th scope="row">Conocimientos previos</th>
    <td>  
    <input class="form-check-input" type="checkbox" name="ConocimientosPrevios" id="ConocimientosPrevios"';
    if ($contextConfiguracion->getData()->getConocimientosPrevios()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Breve descripción</th>
    <td> 
    <input class="form-check-input" type="checkbox" name="BreveDescripcion" id="BreveDescripcion"';
    if ($contextConfiguracion->getData()->getBreveDescripcion()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Programa teórico</th>
    <td>
    <input class="form-check-input" type="checkbox" name="ProgramaTeorico" id="ProgramaTeorico"';
    if ($contextConfiguracion->getData()->getProgramaTeorico()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Programa de seminarios</th>
    <td>
    <input class="form-check-input" type="checkbox" name="ProgramaSeminarios" id="ProgramaSeminarios"';
    if ($contextConfiguracion->getData()->getProgramaSeminarios()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Programa de laboratorio</th>
    <td>
    <input class="form-check-input" type="checkbox" name="ProgramaLaboratorio" id="ProgramaLaboratorio"';
    if ($contextConfiguracion->getData()->getProgramaLaboratorio()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row" class="text-center text-primary" colspan="2">COMPETENCIAS</th>
    </tr>

    <tr>
    <th scope="row">Generales</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="ComGenerales" id="ComGenerales"';
    if ($contextConfiguracion->getData()->getComGenerales()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Específicas</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="ComEspecificas" id="ComEspecificas"';
    if ($contextConfiguracion->getData()->getComEspecificas()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Básicas y transversales</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="ComBasicas" id="ComBasicas"';
    if ($contextConfiguracion->getData()->getComBasicas()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Resultados del aprendizaje</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="ResultadosAprendizaje" id="ResultadosAprendizaje"';
    if ($contextConfiguracion->getData()->getResultadosAprendizaje()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row" class="text-center text-primary" colspan="2">METODOLOGÍA</th>
    </tr>

    <tr>
    <th scope="row">Metodología</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="Metodologia" id="Metodologia"';
    if ($contextConfiguracion->getData()->getMetodologia()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row" class="text-center text-primary" colspan="2">BIBLIOGRAFÍA</th>
    </tr>

    <tr>
    <th scope="row">Citas bibliográficas</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="CitasBibliograficas" id="CitasBibliograficas"';
    if ($contextConfiguracion->getData()->getCitasBibliograficas()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Recursos en internet</th>
    <td>   
    <input class="form-check-input" type="checkbox" name="RecursosInternet" id="RecursosInternet"';
    if ($contextConfiguracion->getData()->getRecursosInternet()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row" class="text-center text-primary" colspan="2">GRUPO DE LABORATORIO</th>
    </tr>

    <tr>
    <th scope="row">Grupo de laboratorio</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="GrupoLaboratorio" id="GrupoLaboratorio"';
    if ($contextConfiguracion->getData()->getGrupoLaboratorio()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row" class="text-center text-primary" colspan="2">EVALUACIÓN</th>
    </tr>

    <tr>
    <th scope="row">Realización de los exámenes</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="RealizacionExamenes" id="RealizacionExamenes"';
    if ($contextConfiguracion->getData()->getRealizacionExamenes()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Realización de las actividades</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="RealizacionActividades" id="RealizacionActividades"';
    if ($contextConfiguracion->getData()->getRealizacionActividades()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Realización del laboratorio</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="RealizacionLaboratorio" id="RealizacionLaboratorio"';
    if ($contextConfiguracion->getData()->getRealizacionLaboratorio()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>

    <tr>
    <th scope="row">Calificación final</th>
    <td>    
    <input class="form-check-input" type="checkbox" name="CalificacionFinal" id="CalificacionFinal"';
    if ($contextConfiguracion->getData()->getCalificacionFinal()) $html .= 'checked';
    $html .= '>
    </td>
    </tr>
    </tbody>
    </table>


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
    $context = new Context(FIND_CONFIGURACION, $datos['IdAsignatura']);
    $contextConfiguracion = $controller->action($context);


    if ($contextConfiguracion->getEvent() === FIND_CONFIGURACION_OK) {
      $IdConfiguracion = $datos['IdConfiguracion'];
      $ConocimientosPrevios = isset($datos['ConocimientosPrevios']) ? 1 : 0;
      $BreveDescripcion = isset($datos['BreveDescripcion']) ? 1 : 0;
      $ProgramaTeorico = isset($datos['ProgramaTeorico']) ? 1 : 0;
      $ProgramaSeminarios = isset($datos['ProgramaSeminarios']) ? 1 : 0;
      $ProgramaLaboratorio = isset($datos['ProgramaLaboratorio']) ? 1 : 0;
      $ComGenerales = isset($datos['ComGenerales']) ? 1 : 0;
      $ComEspecificas = isset($datos['ComEspecificas']) ? 1 : 0;
      $ComBasicas = isset($datos['ComBasicas']) ? 1 : 0;
      $ResultadosAprendizaje = isset($datos['ResultadosAprendizaje']) ? 1 : 0;
      $Metodologia = isset($datos['Metodologia']) ? 1 : 0;
      $CitasBibliograficas = isset($datos['CitasBibliograficas']) ? 1 : 0;
      $RecursosInternet = isset($datos['RecursosInternet']) ? 1 : 0;
      $GrupoLaboratorio = isset($datos['GrupoLaboratorio']) ? 1 : 0;
      $RealizacionExamenes = isset($datos['RealizacionExamenes']) ? 1 : 0;
      $RealizacionActividades = isset($datos['RealizacionActividades']) ? 1 : 0;
      $RealizacionLaboratorio = isset($datos['RealizacionLaboratorio']) ? 1 : 0;
      $CalificacionFinal = isset($datos['CalificacionFinal']) ? 1 : 0;
      $IdAsignatura = $datos['IdAsignatura'];

      echo $datos['IdConfiguracion'];

      if ($ConocimientosPrevios == $contextConfiguracion->getData()->getConocimientosPrevios() && $BreveDescripcion == $contextConfiguracion->getData()->getBreveDescripcion() && $ProgramaTeorico == $contextConfiguracion->getData()->getProgramaTeorico() && $ProgramaSeminarios == $contextConfiguracion->getData()->getProgramaSeminarios() && $ProgramaLaboratorio == $contextConfiguracion->getData()->getProgramaLaboratorio() && $ComGenerales == $contextConfiguracion->getData()->getComGenerales() && $ComEspecificas == $contextConfiguracion->getData()->getComEspecificas() && $ComBasicas == $contextConfiguracion->getData()->getComBasicas() && $ResultadosAprendizaje == $contextConfiguracion->getData()->getResultadosAprendizaje() && $Metodologia == $contextConfiguracion->getData()->getMetodologia() && $CitasBibliograficas == $contextConfiguracion->getData()->getCitasBibliograficas() && $RecursosInternet == $contextConfiguracion->getData()->getRecursosInternet() && $GrupoLaboratorio == $contextConfiguracion->getData()->getGrupoLaboratorio() && $RealizacionExamenes == $contextConfiguracion->getData()->getRealizacionExamenes() && $RealizacionActividades == $contextConfiguracion->getData()->getRealizacionActividades() && $RealizacionLaboratorio == $contextConfiguracion->getData()->getRealizacionLaboratorio() && $CalificacionFinal == $contextConfiguracion->getData()->getCalificacionFinal()) {

        $erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['IdGrado'] . "&IdAsignatura=" . $datos['IdAsignatura'] . "&modificado=y#nav-configuracion";
      } else {
        $configuracion = new Configuracion(
          $IdConfiguracion,
          $ConocimientosPrevios,
          $BreveDescripcion,
          $ProgramaTeorico,
          $ProgramaSeminarios,
          $ProgramaLaboratorio,
          $ComGenerales,
          $ComEspecificas,
          $ComBasicas,
          $ResultadosAprendizaje,
          $Metodologia,
          $CitasBibliograficas,
          $RecursosInternet,
          $GrupoLaboratorio,
          $RealizacionExamenes,
          $RealizacionActividades,
          $RealizacionLaboratorio,
          $CalificacionFinal,
          $IdAsignatura
        );

        $context = new Context(UPDATE_CONFIGURACION, $configuracion);
        $contextConfiguracion = $controller->action($context);

        if ($contextConfiguracion->getEvent() === UPDATE_CONFIGURACION_OK) {
          $erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['IdGrado'] . "&IdAsignatura=" . $datos['IdAsignatura'] . "&modificado=y#nav-configuracion";
        } elseif ($contextConfiguracion->getEvent() === UPDATE_CONFIGURACION_FAIL) {
          $erroresFormulario[] = "No se ha podido modificar la configuración";
        }
      }
    } else {
      $erroresFormulario[] = "La configuración no existe";
    }
    return $erroresFormulario;
  }
}
