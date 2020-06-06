<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormPermisos extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {

        if($datosIniciales['IdPermiso'] !== null){
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
        if ($contextPermisos->getEvent() === FIND_PERMISOS_OK)
            foreach ($contextPermisos->getData() as $permiso) {
                if ($permiso->getEmailProfesor() === $email) {
                    $html .= '<div class="table-responsive text-center">
                <table class="table table-sm table-hover table-borderless">
                    <thead>
                        <tr> 
                            <th scope="col"> </th>
                            <th scope="col">Escritura</th>
                            <th scope="col">Modificación</th>
                            <th scope="col">Administración</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Permisos Programa</th>';
                    if ($permiso->getPermisoPrograma() === '7') {
                        $html .= '<td><input type="checkbox" checked name="PermisoProgramaE"></td>
                            <td><input type="checkbox" checked name="PermisoProgramaM"></td>
                            <td><input type="checkbox" checked name="PermisoProgramaA"></td>';
                    } elseif ($permiso->getPermisoPrograma() === '6') {
                        $html .= '<td><input type="checkbox" checked name="PermisoProgramaE"></td>
                            <td><input type="checkbox" checked name="PermisoProgramaM"></td>
                            <td><input type="checkbox" name="PermisoProgramaA"></td>';
                    } elseif ($permiso->getPermisoPrograma() === '5') {
                        $html .= '<td><input type="checkbox" checked name="PermisoProgramaE"></td>
                            <td><input type="checkbox"  name="PermisoProgramaM"></td>
                            <td><input type="checkbox" checked name="PermisoProgramaA"></td>';
                    } elseif ($permiso->getPermisoPrograma() === '4') {
                        $html .= '<td><input type="checkbox" checked name="PermisoProgramaE"></td>
                            <td><input type="checkbox"  name="PermisoProgramaM"></td>
                            <td><input type="checkbox"  name="PermisoProgramaA"></td>';
                    } elseif ($permiso->getPermisoPrograma() === '3') {
                        $html .= '<td><input type="checkbox"  name="PermisoProgramaE"></td>
                            <td><input type="checkbox" checked name="PermisoProgramaM"></td>
                            <td><input type="checkbox"  checked name="PermisoProgramaA"></td>';
                    } elseif ($permiso->getPermisoPrograma() === '2') {
                        $html .= '<td><input type="checkbox"  name="PermisoProgramaE"></td>
                            <td><input type="checkbox" checked name="PermisoProgramaM"></td>
                            <td><input type="checkbox"  name="PermisoProgramaA"></td>';
                    } elseif ($permiso->getPermisoPrograma() === '1') {
                        $html .= '<td><input type="checkbox"  name="PermisoProgramaE"></td>
                            <td><input type="checkbox"  name="PermisoProgramaM"></td>
                            <td><input type="checkbox" checked name="PermisoProgramaA"></td>';
                    } elseif ($permiso->getPermisoPrograma() === '0') {
                        $html .= '<td><input type="checkbox"  name="PermisoProgramaE"></td>
                            <td><input type="checkbox"  name="PermisoProgramaM"></td>
                            <td><input type="checkbox"  name="PermisoProgramaA"></td>';
                    }
                    $html .= '</tr> <tr>
                      <th scope="row">Permisos Competencias</th>';
                    if ($permiso->getPermisoCompetencias() === '7') {
                        $html .= '<td><input type="checkbox" checked name="PermisoCompetenciasE"></td>
                        <td><input type="checkbox" checked name="PermisoCompetenciasM"></td>
                        <td><input type="checkbox" checked name="PermisoCompetenciasA"></td>';
                    } elseif ($permiso->getPermisoCompetencias() === '6') {
                        $html .= '<td><input type="checkbox" checked name="PermisoCompetenciasE"></td>
                        <td><input type="checkbox" checked name="PermisoCompetenciasM"></td>
                        <td><input type="checkbox" name="PermisoCompetenciasA"></td>';
                    } elseif ($permiso->getPermisoCompetencias() === '5') {
                        $html .= '<td><input type="checkbox" checked name="PermisoCompetenciasE"></td>
                        <td><input type="checkbox"  name="PermisCompetenciasaM"></td>
                        <td><input type="checkbox" checked name="PermisoCompetenciasA"></td>';
                    } elseif ($permiso->getPermisoCompetencias() === '4') {
                        $html .= '<td><input type="checkbox" checked name="PermisoCompetenciasE"></td>
                        <td><input type="checkbox"  name="PermisoCompetenciasM"></td>
                        <td><input type="checkbox"  name="PermisoCompetenciasA"></td>';
                    } elseif ($permiso->getPermisoCompetencias() === '3') {
                        $html .= '<td><input type="checkbox"  name="PermisoCompetenciasE"></td>
                        <td><input type="checkbox" checked name="PermisoCompetenciasM"></td>
                        <td><input type="checkbox"  checked name="PermisoCompetenciasA"></td>';
                    } elseif ($permiso->getPermisoCompetencias() === '2') {
                        $html .= '<td><input type="checkbox"  name="PermisoCompetenciasE"></td>
                        <td><input type="checkbox" checked name="PermisoCompetenciasM"></td>
                        <td><input type="checkbox"  name="PermisoCompetenciasA"></td>';
                    } elseif ($permiso->getPermisoCompetencias() === '1') {
                        $html .= '<td><input type="checkbox"  name="PermisoCompetenciasE"></td>
                        <td><input type="checkbox"  name="PermisoCompetenciasM"></td>
                        <td><input type="checkbox" checked name="PermisoCompetenciasA"></td>';
                    } elseif ($permiso->getPermisoCompetencias() === '0') {
                        $html .= '<td><input type="checkbox"  name="PermisoCompetenciasE"></td>
                        <td><input type="checkbox"  name="PermisoCompetenciasM"></td>
                        <td><input type="checkbox"  name="PermisoCompetenciasA"></td>';
                    }
                    $html .= '</tr> <tr>
                  <th scope="row">Permisos Metodología</th>';
                    if ($permiso->getPermisoMetodologia() === '7') {
                        $html .= '<td><input type="checkbox" checked name="PermisoMetodologiaE"></td>
                    <td><input type="checkbox" checked name="PermisoMetodologiaM"></td>
                    <td><input type="checkbox" checked name="PermisoMetodologiaA"></td>';
                    } elseif ($permiso->getPermisoMetodologia() === '6') {
                        $html .= '<td><input type="checkbox" checked name="PermisoMetodologiaE"></td>
                    <td><input type="checkbox" checked name="PermisoMetodologiaM"></td>
                    <td><input type="checkbox" name="PermisoMetodologiaA"></td>';
                    } elseif ($permiso->getPermisoMetodologia() === '5') {
                        $html .= '<td><input type="checkbox" checked name="PermisoMetodologiaE"></td>
                    <td><input type="checkbox"  name="PermisoMetodologiaM"></td>
                    <td><input type="checkbox" checked name="PermisoMetodologiaA"></td>';
                    } elseif ($permiso->getPermisoMetodologia() === '4') {
                        $html .= '<td><input type="checkbox" checked name="PermisoMetodologiaE"></td>
                    <td><input type="checkbox"  name="PermisoMetodologiaM"></td>
                    <td><input type="checkbox"  name="PermisoMetodologiaA"></td>';
                    } elseif ($permiso->getPermisoMetodologia() === '3') {
                        $html .= '<td><input type="checkbox"  name="PermisoMetodologiaE"></td>
                    <td><input type="checkbox" checked name="PermisoMetodologiaM"></td>
                    <td><input type="checkbox"  checked name="PermisoMetodologiaA"></td>';
                    } elseif ($permiso->getPermisoMetodologia() === '2') {
                        $html .= '<td><input type="checkbox"  name="PermisoMetodologiaE"></td>
                    <td><input type="checkbox" checked name="PermisoMetodologiaM"></td>
                    <td><input type="checkbox"  name="PermisoMetodologiaA"></td>';
                    } elseif ($permiso->getPermisoMetodologia() === '1') {
                        $html .= '<td><input type="checkbox"  name="PermisoMetodologiaE"></td>
                    <td><input type="checkbox"  name="PermisoMetodologiaM"></td>
                    <td><input type="checkbox" checked name="PermisoMetodologiaA"></td>';
                    } elseif ($permiso->getPermisoMetodologia() === '0') {
                        $html .= '<td><input type="checkbox"  name="PermisoMetodologiaE"></td>
                    <td><input type="checkbox"  name="PermisoMetodologiaM"></td>
                    <td><input type="checkbox"  name="PermisoMetodologiaA"></td>';
                    }
                    $html .= '</tr> <tr>
              <th scope="row">Permisos Bibliografía</th>';
                    if ($permiso->getPermisoBibliografia() === '7') {
                        $html .= '<td><input type="checkbox" checked name="PermisoBibliografiaE"></td>
                <td><input type="checkbox" checked name="PermisoBibliografiaM"></td>
                <td><input type="checkbox" checked name="PermisoBibliografiaA"></td>';
                    } elseif ($permiso->getPermisoBibliografia() === '6') {
                        $html .= '<td><input type="checkbox" checked name="PermisoBibliografiaE"></td>
                <td><input type="checkbox" checked name="PermisoBibliografiaM"></td>
                <td><input type="checkbox" name="PermisoBibliografiaA"></td>';
                    } elseif ($permiso->getPermisoBibliografia() === '5') {
                        $html .= '<td><input type="checkbox" checked name="PermisoBibliografiaE"></td>
                <td><input type="checkbox"  name="PermisoBibliografiaM"></td>
                <td><input type="checkbox" checked name="PermisoBibliografiaA"></td>';
                    } elseif ($permiso->getPermisoBibliografia() === '4') {
                        $html .= '<td><input type="checkbox" checked name="PermisoBibliografiaE"></td>
                <td><input type="checkbox"  name="PermisoBibliografiaM"></td>
                <td><input type="checkbox"  name="PermisoBibliografiaA"></td>';
                    } elseif ($permiso->getPermisoBibliografia() === '3') {
                        $html .= '<td><input type="checkbox"  name="PermisoBibliografiaE"></td>
                <td><input type="checkbox" checked name="PermisoBibliografiaM"></td>
                <td><input type="checkbox"  checked name="PermisoBibliografiaA"></td>';
                    } elseif ($permiso->getPermisoBibliografia() === '2') {
                        $html .= '<td><input type="checkbox"  name="PermisoBibliografiaE"></td>
                <td><input type="checkbox" checked name="PermisoBibliografiaM"></td>
                <td><input type="checkbox"  name="PermisoBibliografiaA"></td>';
                    } elseif ($permiso->getPermisoBibliografia() === '1') {
                        $html .= '<td><input type="checkbox"  name="PermisoBibliografiaE"></td>
                <td><input type="checkbox"  name="PermisoBibliografiaM"></td>
                <td><input type="checkbox" checked name="PermisoBibliografiaA"></td>';
                    } elseif ($permiso->getPermisoBibliografia() === '0') {
                        $html .= '<td><input type="checkbox"  name="PermisoBibliografiaE"></td>
                <td><input type="checkbox"  name="PermisoBibliografiaM"></td>
                <td><input type="checkbox"  name="PermisoBibliografiaA"></td>';
                    }
                    $html .= '</tr> <tr>
          <th scope="row">Permisos Grupo Laboratorio</th>';
                    if ($permiso->getPermisoGrupoLaboratorio() === '7') {
                        $html .= '<td><input type="checkbox" checked name="PermisoGrupoLaboratorioE"></td>
            <td><input type="checkbox" checked name="PermisoGrupoLaboratorioM"></td>
            <td><input type="checkbox" checked name="PermisoGrupoLaboratorioA"></td>';
                    } elseif ($permiso->getPermisoGrupoLaboratorio() === '6') {
                        $html .= '<td><input type="checkbox" checked name="PermisoGrupoLaboratorioE"></td>
            <td><input type="checkbox" checked name="PermisGrupoLaboratorioaM"></td>
            <td><input type="checkbox" name="PermisoGrupoLaboratorioA"></td>';
                    } elseif ($permiso->getPermisoGrupoLaboratorio() === '5') {
                        $html .= '<td><input type="checkbox" checked name="PermisoGrupoLaboratorioE"></td>
            <td><input type="checkbox"  name="PermisoGrupoLaboratorioM"></td>
            <td><input type="checkbox" checked name="PermisoGrupoLaboratorioA"></td>';
                    } elseif ($permiso->getPermisoGrupoLaboratorio() === '4') {
                        $html .= '<td><input type="checkbox" checked name="PermisoGrupoLaboratorioE"></td>
            <td><input type="checkbox"  name="PermisoGrupoLaboratorioM"></td>
            <td><input type="checkbox"  name="PermisoGrupoLaboratorioA"></td>';
                    } elseif ($permiso->getPermisoGrupoLaboratorio() === '3') {
                        $html .= '<td><input type="checkbox"  name="PermisoGrupoLaboratorioE"></td>
            <td><input type="checkbox" checked name="PermisoGrupoLaboratorioM"></td>
            <td><input type="checkbox"  checked name="PermisoGrupoLaboratorioA"></td>';
                    } elseif ($permiso->getPermisoGrupoLaboratorio() === '2') {
                        $html .= '<td><input type="checkbox"  name="PermisoGrupoLaboratorioE"></td>
            <td><input type="checkbox" checked name="PermisoGrupoLaboratorioM"></td>
            <td><input type="checkbox"  name="PermisoGrupoLaboratorioA"></td>';
                    } elseif ($permiso->getPermisoGrupoLaboratorio() === '1') {
                        $html .= '<td><input type="checkbox"  name="PermisoGrupoLaboratorioE"></td>
            <td><input type="checkbox"  name="PermisoGrupoLaboratorioM"></td>
            <td><input type="checkbox" checked name="PermisoGrupoLaboratorioA"></td>';
                    } elseif ($permiso->getPermisoGrupoLaboratorio() === '0') {
                        $html .= '<td><input type="checkbox"  name="PermisoGrupoLaboratorioE"></td>
            <td><input type="checkbox"  name="PermisoGrupoLaboratorioM"></td>
            <td><input type="checkbox"  name="PermisoGrupoLaboratorioA"></td>';
                    }
                    $html .= '</tr> <tr>
      <th scope="row">Permisos Grupo Clase</th>';
                    if ($permiso->getPermisoGrupoClase() === '7') {
                        $html .= '<td><input type="checkbox" checked name="PermisoGrupoClaseE"></td>
        <td><input type="checkbox" checked name="PermisoGrupoClaseM"></td>
        <td><input type="checkbox" checked name="PermisoGrupoClaseA"></td>';
                    } elseif ($permiso->getPermisoGrupoClase() === '6') {
                        $html .= '<td><input type="checkbox" checked name="PermisoGrupoClaseE"></td>
        <td><input type="checkbox" checked name="PermisoGrupoClaseM"></td>
        <td><input type="checkbox" name="PermisoGrupoClaseA"></td>';
                    } elseif ($permiso->getPermisoGrupoClase() === '5') {
                        $html .= '<td><input type="checkbox" checked name="PermisoGrupoClaseE"></td>
        <td><input type="checkbox"  name="PermisoGrupoClaseM"></td>
        <td><input type="checkbox" checked name="PermisoGrupoClaseA"></td>';
                    } elseif ($permiso->getPermisoGrupoClase() === '4') {
                        $html .= '<td><input type="checkbox" checked name="PermisoGrupoClaseE"></td>
        <td><input type="checkbox"  name="PermisoGrupoClaseM"></td>
        <td><input type="checkbox"  name="PermisoGrupoClaseA"></td>';
                    } elseif ($permiso->getPermisoGrupoClase() === '3') {
                        $html .= '<td><input type="checkbox"  name="PermisoGrupoClaseE"></td>
        <td><input type="checkbox" checked name="PermisoGrupoClaseM"></td>
        <td><input type="checkbox"  checked name="PermisoGrupoClaseA"></td>';
                    } elseif ($permiso->getPermisoGrupoClase() === '2') {
                        $html .= '<td><input type="checkbox"  name="PermisoGrupoClaseE"></td>
        <td><input type="checkbox" checked name="PermisoGrupoClaseM"></td>
        <td><input type="checkbox"  name="PermisoGrupoClaseA"></td>';
                    } elseif ($permiso->getPermisoGrupoClase() === '1') {
                        $html .= '<td><input type="checkbox"  name="PermisoGrupoClaseE"></td>
        <td><input type="checkbox"  name="PermisoGrupoClaseM"></td>
        <td><input type="checkbox" checked name="PermisoGrupoClaseA"></td>';
                    } elseif ($permiso->getPermisoGrupoClase() === '0') {
                        $html .= '<td><input type="checkbox"  name="PermisoGrupoClaseE"></td>
        <td><input type="checkbox"  name="PermisoGrupoClaseM"></td>
        <td><input type="checkbox"  name="PermisoGrupoClaseA"></td>';
                    }
                    $html .= '</tr> <tr>
  <th scope="row">Permisos Evaluación</th>';
                    if ($permiso->getPermisoEvaluacion() === '7') {
                        $html .= '<td><input type="checkbox" checked name="PermisoEvaluacionE"></td>
    <td><input type="checkbox" checked name="PermisoEvaluacionM"></td>
    <td><input type="checkbox" checked name="PermisoEvaluacionA"></td>';
                    } elseif ($permiso->getPermisoEvaluacion() === '6') {
                        $html .= '<td><input type="checkbox" checked name="PermisoEvaluacionE"></td>
    <td><input type="checkbox" checked name="PermisoEvaluacionM"></td>
    <td><input type="checkbox" name="PermisoEvaluacionA"></td>';
                    } elseif ($permiso->getPermisoEvaluacion() === '5') {
                        $html .= '<td><input type="checkbox" checked name="PermisoEvaluacionE"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionM"></td>
    <td><input type="checkbox" checked name="PermisoEvaluacionA"></td>';
                    } elseif ($permiso->getPermisoEvaluacion() === '4') {
                        $html .= '<td><input type="checkbox" checked name="PermisoEvaluacionE"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionM"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionA"></td>';
                    } elseif ($permiso->getPermisoEvaluacion() === '3') {
                        $html .= '<td><input type="checkbox"  name="PermisoEvaluacionE"></td>
    <td><input type="checkbox" checked name="PermisoEvaluacionM"></td>
    <td><input type="checkbox"  checked name="PermisoEvaluacionA"></td>';
                    } elseif ($permiso->getPermisoEvaluacion() === '2') {
                        $html .= '<td><input type="checkbox"  name="PermisoEvaluacionE"></td>
    <td><input type="checkbox" checked name="PermisoEvaluacionM"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionA"></td>';
                    } elseif ($permiso->getPermisoEvaluacion() === '1') {
                        $html .= '<td><input type="checkbox"  name="PermisoEvaluacionE"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionM"></td>
    <td><input type="checkbox" checked name="PermisoEvaluacionA"></td>';
                    } elseif ($permiso->getPermisoEvaluacion() === '0') {
                        $html .= '<td><input type="checkbox"  name="PermisoEvaluacionE"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionM"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionA"></td>';
                    }
                    $html .= '</tr>';
                }
            }
        
        $html .= '<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $IdAsignatura . '#nav-configuracion">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Cancelar
		</button>
		</a>

		<button type="submit" class="btn btn-success" id="btn-form" name="registrar">Guardar</button>
        </div>';
    }else{
        $email = $datosIniciales['EmailProfesor'];
        $IdAsignatura = $datosIniciales['IdAsignatura'];


        $html = '<input type="hidden" name="IdAsignatura" value="' . $IdAsignatura . '" required />
        
        <input type="hidden" name="EmailProfesor" value="' . $email . '" required />';
        $html .= '<div class="table-responsive text-center">
        <table class="table table-sm table-hover table-borderless">
            <thead>
                <tr> 
                    <th scope="col"> </th>
                    <th scope="col">Escritura</th>
                    <th scope="col">Modificación</th>
                    <th scope="col">Administración</th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <th scope="row">Permisos Programa</th>
    <td><input type="checkbox"  name="PermisoProgramaE"></td>
    <td><input type="checkbox"  name="PermisoProgramaM"></td>
    <td><input type="checkbox"  name="PermisoProgramaA"></td>';

    $html .= '</tr> <tr>
<th scope="row">Permisos Competencias</th>';
$html .= '<td><input type="checkbox"  name="PermisoCompetenciasE"></td>
    <td><input type="checkbox"  name="PermisoCompetenciasM"></td>
    <td><input type="checkbox"  name="PermisoCompetenciasA"></td>';

$html .= '</tr> <tr>
<th scope="row">Permisos Metodología</th>';
$html .= '<td><input type="checkbox"  name="PermisoMetodologiaE"></td>
        <td><input type="checkbox"  name="PermisoMetodologiaM"></td>
        <td><input type="checkbox"  name="PermisoMetodologiaA"></td>';

$html .= '</tr> <tr>
  <th scope="row">Permisos Bibliografía</th>';
$html .= '<td><input type="checkbox"  name="PermisoBibliografiaE"></td>
    <td><input type="checkbox"  name="PermisoBibliografiaM"></td>
    <td><input type="checkbox"  name="PermisoBibliografiaA"></td>';

$html .= '</tr> <tr>
<th scope="row">Permisos Grupo Laboratorio</th>';
$html .= '<td><input type="checkbox"  name="PermisoGrupoLaboratorioE"></td>
<td><input type="checkbox"  name="PermisoGrupoLaboratorioM"></td>
<td><input type="checkbox"  name="PermisoGrupoLaboratorioA"></td>';

$html .= '</tr> <tr>
<th scope="row">Permisos Grupo Clase</th>';
$html .= '<td><input type="checkbox"  name="PermisoGrupoClaseE"></td>
    <td><input type="checkbox"  name="PermisoGrupoClaseM"></td>
    <td><input type="checkbox"  name="PermisoGrupoClaseA"></td>';

$html .= '</tr> <tr>
<th scope="row">Permisos Evaluación</th>';
$html .= '<td><input type="checkbox"  name="PermisoEvaluacionE"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionM"></td>
    <td><input type="checkbox"  name="PermisoEvaluacionA"></td>';
$html .= '</tr>';
$html .= '<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $IdAsignatura . '#nav-configuracion">
		<button type="button" class="btn btn-secondary" id="btn-form">
		Cancelar
		</button>
		</a>

		<button type="submit" class="btn btn-success" id="btn-form" name="registrar">Guardar</button>
        </div>';

    }
        return $html;
    }

    protected function procesaFormulario($datos)
    {

        $erroresFormulario = array();
        $controller = new ControllerImplements();
        $context = new Context(FIND_CONFIGURACION, $datos['IdAsignatura']);
        $contextConfiguracion = $controller->action($context);

        $IdPermiso = isset($datos['IdPermiso'])? $datos['IdPermiso']: null;
        $PermisoProgramaE = isset($datos['PermisoProgramaE']) ? 4 : 0;
        $PermisoProgramaM = isset($datos['PermisoProgramaM']) ? 2 : 0;;
        $PermisoProgramaA = isset($datos['PermisoProgramaA']) ? 1 : 0;;
        $PermisoPrograma = $PermisoProgramaE + $PermisoProgramaM + $PermisoProgramaA;
        $PermisoCompetenciasE = isset($datos['PermisoCompetenciasE']) ? 4 : 0;
        $PermisoCompetenciasM = isset($datos['PermisoCompetenciasM']) ? 2 : 0;;
        $PermisoCompetenciasA = isset($datos['PermisoCompetenciasA']) ? 1 : 0;;
        $PermisoCompetencias = $PermisoCompetenciasE + $PermisoCompetenciasM + $PermisoCompetenciasA;
        $PermisoMetodologiaE = isset($datos['PermisoMetodologiaE']) ? 4 : 0;
        $PermisoMetodologiaM = isset($datos['PermisoMetodologiaM']) ? 2 : 0;;
        $PermisoMetodologiaA = isset($datos['PermisoMetodologiaA']) ? 1 : 0;;
        $PermisoMetodologia = $PermisoMetodologiaE + $PermisoMetodologiaM + $PermisoMetodologiaA;
        $PermisoBibliografiaE = isset($datos['PermisoBibliografiaE']) ? 4 : 0;
        $PermisoBibliografiaM = isset($datos['PermisoBibliografiaM']) ? 2 : 0;;
        $PermisoBibliografiaA = isset($datos['PermisoBibliografiaA']) ? 1 : 0;;
        $PermisoBibliografia = $PermisoBibliografiaE + $PermisoBibliografiaM + $PermisoBibliografiaA;
        $PermisoGrupoLaboratorioE = isset($datos['PermisoGrupoLaboratorioE']) ? 4 : 0;
        $PermisoGrupoLaboratorioM = isset($datos['PermisoGrupoLaboratorioM']) ? 2 : 0;;
        $PermisoGrupoLaboratorioA = isset($datos['PermisoGrupoLaboratorioA']) ? 1 : 0;;
        $PermisoGrupoLaboratorio = $PermisoGrupoLaboratorioE + $PermisoGrupoLaboratorioM + $PermisoGrupoLaboratorioA;
        $PermisoGrupoClaseE = isset($datos['PermisoGrupoClaseE']) ? 4 : 0;
        $PermisoGrupoClaseM = isset($datos['PermisoGrupoClaseM']) ? 2 : 0;;
        $PermisoGrupoClaseA = isset($datos['PermisoGrupoClaseA']) ? 1 : 0;;
        $PermisoGrupoClase = $PermisoGrupoClaseE + $PermisoGrupoClaseM + $PermisoGrupoClaseA;
        $PermisoEvaluacionE = isset($datos['PermisoEvaluacionE']) ? 4 : 0;
        $PermisoEvaluacionM = isset($datos['PermisoEvaluacionM']) ? 2 : 0;;
        $PermisoEvaluacionA = isset($datos['PermisoEvaluacionA']) ? 1 : 0;;
        $PermisoEvaluacion = $PermisoEvaluacionE + $PermisoEvaluacionM + $PermisoEvaluacionA;
        $IdAsignatura = $datos['IdAsignatura'];
        $EmailProfesor = $datos['EmailProfesor'];

        $comparacion = array('email' =>$EmailProfesor, 
        'asignatura'=>$IdAsignatura);
        $context = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA, $comparacion);
        $contextConfiguracion = $controller->action($context);

        if ($contextConfiguracion->getEvent() === FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_OK) {

            $permisos = new Permisos(
                $IdPermiso,
                $PermisoPrograma,
                $PermisoCompetencias,
                $PermisoMetodologia,
                $PermisoBibliografia,
                $PermisoGrupoLaboratorio,
                $PermisoGrupoClase,
                $PermisoEvaluacion,
                $IdAsignatura,
                $EmailProfesor
            );

            $context = new Context(UPDATE_PERMISOS, $permisos);
            $contextConfiguracion = $controller->action($context);

            if ($contextConfiguracion->getEvent() === UPDATE_PERMISOS_OK) {
                $erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['IdAsignatura'] . "&modificado=y#nav-configuracion";
            } elseif ($contextConfiguracion->getEvent() === UPDATE_PERMISOS_FAIL) {
                $erroresFormulario[] = "No se ha podido modificar los permisos.";
            }
        } else {
            $permisos = new Permisos(
                $IdPermiso,
                $PermisoPrograma,
                $PermisoCompetencias,
                $PermisoMetodologia,
                $PermisoBibliografia,
                $PermisoGrupoLaboratorio,
                $PermisoGrupoClase,
                $PermisoEvaluacion,
                $IdAsignatura,
                $EmailProfesor
            );
            $context = new Context(CREATE_PERMISOS, $permisos);
            $contextConfiguracion = $controller->action($context);

            if ($contextConfiguracion->getEvent() === CREATE_PERMISOS_OK) {
                $erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['IdAsignatura'] . "&creado=y#nav-configuracion";
            } elseif ($contextConfiguracion->getEvent() === CREATE_PERMISOS_FAIL) {
                $erroresFormulario[] = "No se han podido crear los permisos.";
            }
        }
        return $erroresFormulario;
    }
}
