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

        $html= '<div class="text-right position-fixed w-50 p-2" >
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
