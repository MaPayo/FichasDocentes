<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormVerificafcion extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {

        
        $IdAsignatura = $datosIniciales['IdAsignatura'];


        $controller = new ControllerImplements();
        $context = new Context(FIND_ASIGNATURA, $IdAsignatura);
        $asignatura = $controller->action($context);
        if($asignatura->getEvent() === FIND_ASIGNATURA_OK){
           
        $html = '<input type="hidden" name="IdAsignatura" value="' . $IdAsignatura . '" required />';
        $context = new Context(FIND_MODASIGNATURA, $IdAsignatura);
        $contextModAsignatura= $controller->action($context);
        $context = new Context(FIND_MATERIA, $asignatura->getData()->getIdMateria());
        $materia = $controller->action($context);
        $context = new Context(FIND_MODULO, $materia->getData()[0]['IdModulo']);
        $modulo = $controller->action($context);
        $context = new Context(FIND_GRADO, $modulo->getData()[0]['CodigoGrado']);
        $grado = $controller->action($context);
        $html .='<div class="container">

        <!-- Tabla de cabecera -->
        <div >
            <table class="table table-bordered headingTbl">
                <thead>
                    <tr class="min-h-100 text-left">
                        <th class="w-25"><img class="img-fluid" src="' . RUTA_IMGS . 'ucmtext.png" alt="escudo ucm" height="100" width="85"/></th>
                        <th class="w-50" >'.$grado->getData()[0]['NombreGrado'].'</th>
                        <th class="w-25"><span class="p-1">Curso <?php echo $cursoAcademico;  ?> </span></th>
                    </tr>
                </thead>
            </table>
        </div>
        ';
        
                //Se crea con todas las modificaciones que exista
               
               /* $context = new Context(FIND_MODPROGRAMA_ASIGNATURA, $IdAsignatura);
                $mod= $controller->action($context);
                var_dump($mod); */
                $context = new Context(CONVERSION_HTML, $asignatura->getData()->getNombreAsignatura());
                $NombreAsignaturaHTML = $controller->action($context);
                echo $NombreAsignaturaHTML;
                $html .= '<div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="bg-info"><span class="p-1" >Ficha de la <br/> Asignatura: </span></td>
                            <td colspan="4">'.$NombreAsignaturaHTML.'</td>
                            <td class="bg-info"><span class="p-1">   Código: </span> </td>
                            <td colspan="2">'.$IdAsignatura.'</td>
                        </tr>
                    </thead>';
                    $context = new Context(CONVERSION_HTML, $materia->getData()->getNombreMateria());
                    $NombreMateriaHTML = $controller->action($context);
                    $context = new Context(CONVERSION_HTML, $modulo->getData()->getNombreModulo());
                    $NombreModuloHTML = $controller->action($context);

                $html .= ' <tbody>
                <tr>
                    <td class="bg-info"><span class="p-1">Materia: </span></td>
                    <td colspan="3">'. $NombreMateriaHTML.'></td>
                    <td class="bg-info"><span class="p-1"> Módulo: </span> </td>
                    <td colspan="3">'.$NombreModuloHTML.'</td>
                </tr>';
                $context = new Context(CONVERSION_HTML, $modulo->getData()->getCaracter());
                $CaracterHTML = $controller->action($context);
                $context = new Context(CONVERSION_HTML, $asignatura->getData()->getCurso());
                $CursoHTML = $controller->action($context);
                $context = new Context(CONVERSION_HTML, $asignatura->getData()->getSemestre());
                $SemestreHTML = $controller->action($context);
                $html .= ' <tr>
                <td class="bg-info"><span class="p-1">Carácter:  </span></td>
                <td colspan="3">'. $CaracterHTML .'</td>
                <td class="bg-info"> <span class="p-1"> Curso: </span></td>
                <td>'.$CursoHTML.'</td>
                <td class="bg-info"> <span class="p-1">  Semestre: </span> </td>
                <td>'.$SemestreHTML.'</td>
            </tr>';
                $context = new Context(FIND_TEORICO, $IdAsignatura);
                $teoria = $controller->action($context);
                $context = new Context(FIND_PROBLEMA, $IdAsignatura);
                $problema = $controller->action($context);
                $context = new Context(FIND_LABORATORIO, $IdAsignatura);
                $laboratorio = $controller->action($context);


                $html .= ' <tr>
                <td class="bg-info"><span class="p-1"> Créditos (ECTS)   </span></td>
                <td>'.$asignatura->getData()->getCreditos().'</td>
                <td rowspan="3" class="align-middle bg-info">
                    <span class="p-1"> Teóricos </span> </td>
                <td>'.$teoria->getData()->getCreditos().'</td>
                <td rowspan="3" class="align-middle bg-info">
                    <span class="p-1"> Problemas </span> </td>
                <td>'. $problema->getData()->getCreditos().'</td>
                <td rowspan="3" class="align-middle bg-info">
                    <span class="p-1"> Laboratorio  </span> </td>

                <td>'.$laboratorio->getData()->getCreditos().'</td>
            </tr>';

            $html .= '  <tr>
            <td class="bg-info"><span class="p-1"> Presencial   </span></td>
            <td> <!-- 2 Blank --> </td>
            <!-- 3 Remove -->
            <td>'.$teoria->getData()->getPresencial().'</td>
            <!-- 5 No Field Remove -->
            <td>'.$problema->getData()->getPresencial().'</td>
            <!-- 7 No Field Remove -->
            <td>'.$laboratorio->getData()->getPresencial().'</td>
        </tr>';
        $horasTotalest = ($teoria->getData()->getCreditos() * 25 * $teoria->getData()->getPresencial()) / 100;
        $horasTotalesp = ($problema->getData()->getCreditos() * 25 * $problema->getData()->getPresencial()) / 100;
        $horasTotalesl = ($laboratorio->getData()->getCreditos() * 25 * $laboratorio->getData()->getPresencial()) / 100; 

                $html .= '<tr>
                <td class="bg-info"><span class="p-1"> Horas Totales   </span></td>
                <td>   </td>
                <!-- 3 Remove -->
                <td>'. $horasTotalest .' <!-- 4 Blank --></td>
                <!-- 5 No Field Remove -->
                <td>'.$horasTotalesp.'</td>
                <!-- 7 No Field Remove -->
                <td>'.$horasTotalesl.'</td>
            </tr>
        </tbody>
    </table>
</div>';

$context = new Context(FIND_PROFESOR, $asignatura->getData()->getCoordinador());
$profesor = $controller->action($context);

$html .= '<div class="thirdFormBox" >
	
<table class="table table-bordered page-break">
  <tr>
      <td rowspan="2" class="w-25 bg-info"> 
          <span class="p-1"> Profesor(a) <br/> Coordinador(a): </span> 
    </td>
      <td colspan="2" class="w-50">'.$asignatura->getData()->getCoordinador().'</td>
      <td class="bg-info"> <span class="p-1">  Dpto:  </span> </td>
      <td>'.$profesor->getData()->getDepartamento().'</td>
  </tr>

  <tr>
      <td class="bg-info"> <span class="p-1"> Despacho: </span> </td>
      <td>'. $profesor->getData()->getDespacho().'</td>
      <td class="bg-info"> <span class="p-1"> email: </span> </td>
      <td>'.$profesor->getData()->getEmail().'</td>
  </tr>
</table>
</div>';
//Profesores
$context = new Context(FIND_GRUPO_CLASE, $IdAsignatura);
$grupos = $controller->action($context);

 $html .='  <!-- Four Form Box  Start -->
    <div class="fourFormBox">
        
        <table class="table">
          <tr><td colspan="4" class="bg-secondary text-center">Profesores de la asignatura</td></tr>
          <tr>
              <td class="bg-info"> <span class="p-1"> Grupo </span> </td>
              <td class="bg-info"> <span class="p-1"> Profesor </span> </td>
              <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
              <td class="bg-info"> <span class="p-1"> email </span> </td>
          </tr>
  ';
  foreach($grupos->getData() as $grupo){}
    $context = new Context(FIND_GRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
    $profesores = $controller->action($context);
    $html .= '<tr>
    <td>'.$grupo->getLetra().'</td>';
    foreach($profesores->getData() as $profesor){
           $html .= '<td>'.$profesor->getNombre().'</td>
                <td>'.$profesor->getDepartamento().'</td>
              <td>'.$profesor->getEmail().'</td>
            </tr>';
  }
}
       $html .='   
        </table>
  
    </div>
    <!-- Four Form Box End -->

';



         
      
        
     
        return $html;
    }

    protected function procesaFormulario($datos)
    {

        $erroresFormulario = array();
        $controller = new ControllerImplements();
        $context = new Context(FIND_CONFIGURACION, $datos['IdAsignatura']);
        $contextConfiguracion = $controller->action($context);

        $IdPermiso = isset($datos['IdPermiso'])? $datos['IdPermiso']: null;
        $PermisoProgramaE = isset($datos['PermisoProgramaE']) ? 1 : 0;
        $PermisoProgramaM = isset($datos['PermisoProgramaM']) ? 2 : 0;;
        $PermisoProgramaA = isset($datos['PermisoProgramaA']) ? 4 : 0;;
        $PermisoPrograma = $PermisoProgramaE + $PermisoProgramaM + $PermisoProgramaA;
        $PermisoCompetenciasE = isset($datos['PermisoCompetenciasE']) ? 1 : 0;
        $PermisoCompetenciasM = isset($datos['PermisoCompetenciasM']) ? 2 : 0;;
        $PermisoCompetenciasA = isset($datos['PermisoCompetenciasA']) ? 4 : 0;;
        $PermisoCompetencias = $PermisoCompetenciasE + $PermisoCompetenciasM + $PermisoCompetenciasA;
        $PermisoMetodologiaE = isset($datos['PermisoMetodologiaE']) ? 1 : 0;
        $PermisoMetodologiaM = isset($datos['PermisoMetodologiaM']) ? 2 : 0;;
        $PermisoMetodologiaA = isset($datos['PermisoMetodologiaA']) ? 4 : 0;;
        $PermisoMetodologia = $PermisoMetodologiaE + $PermisoMetodologiaM + $PermisoMetodologiaA;
        $PermisoBibliografiaE = isset($datos['PermisoBibliografiaE']) ? 1 : 0;
        $PermisoBibliografiaM = isset($datos['PermisoBibliografiaM']) ? 2 : 0;;
        $PermisoBibliografiaA = isset($datos['PermisoBibliografiaA']) ? 4 : 0;;
        $PermisoBibliografia = $PermisoBibliografiaE + $PermisoBibliografiaM + $PermisoBibliografiaA;
        $PermisoGrupoLaboratorioE = isset($datos['PermisoGrupoLaboratorioE']) ? 1 : 0;
        $PermisoGrupoLaboratorioM = isset($datos['PermisoGrupoLaboratorioM']) ? 2 : 0;;
        $PermisoGrupoLaboratorioA = isset($datos['PermisoGrupoLaboratorioA']) ? 4 : 0;;
        $PermisoGrupoLaboratorio = $PermisoGrupoLaboratorioE + $PermisoGrupoLaboratorioM + $PermisoGrupoLaboratorioA;
        $PermisoGrupoClaseE = isset($datos['PermisoGrupoClaseE']) ? 1 : 0;
        $PermisoGrupoClaseM = isset($datos['PermisoGrupoClaseM']) ? 2 : 0;;
        $PermisoGrupoClaseA = isset($datos['PermisoGrupoClaseA']) ? 4 : 0;;
        $PermisoGrupoClase = $PermisoGrupoClaseE + $PermisoGrupoClaseM + $PermisoGrupoClaseA;
        $PermisoEvaluacionE = isset($datos['PermisoEvaluacionE']) ? 1 : 0;
        $PermisoEvaluacionM = isset($datos['PermisoEvaluacionM']) ? 2 : 0;;
        $PermisoEvaluacionA = isset($datos['PermisoEvaluacionA']) ? 4 : 0;;
        $PermisoEvaluacion = $PermisoEvaluacionE + $PermisoEvaluacionM + $PermisoEvaluacionA;
        $IdAsignatura = $datos['IdAsignatura'];
        $EmailProfesor = $datos['EmailProfesor'];

        $context = new Context(FIND_PERMISOS_POR_PROFESOR, $datos['IdAsignatura']);
        $contextConfiguracion = $controller->action($context);

        if ($contextConfiguracion->getEvent() === FIND_PERMISOS_POR_PROFESOR_OK) {

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
