<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');

class FormPermisos extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{

		var_dump($datosIniciales);
        
		$IdPermiso = $datosIniciales['IdPermiso'];
    
        $email=$datosIniciales['EmailProfesor'];
        $IdAsignatura = $datosIniciales['IdAsignatura'];
        
        
		$controller = new ControllerImplements();
		$context = new Context(FIND_PERMISOS, $IdAsignatura);
        $contextPermisos = $controller->action($context);

		$html = '<input type="hidden" name="IdPermiso" value="' . $IdPermiso . '" required />
		<input type="hidden" name="IdAsignatura" value="' . $IdAsignatura . '" required />';
        //Buscamos los permisos del profesor en concreto

        foreach($contextPermisos->getData() as $permiso){
            if($permiso->getEmailProfesor() === $email){
                echo "Hola, voy a ser el formulario";
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
		return $html;
	}

	protected function procesaFormulario( $datos)
	{
 
		$erroresFormulario = array();
		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $datos['IdAsignatura']);
		$contextConfiguracion = $controller->action($context);


		$IdConfiguracion = $datos['IdConfiguracion'] ;
		$ConocimientosPrevios = isset($datos['ConocimientosPrevios'])? 1:0;
		$BreveDescripcion = isset($datos['BreveDescripcion'])? 1:0;
		$ProgramaDetallado = isset($datos['ProgramaDetallado'])? 1:0;
		$ComGenerales = isset($datos['ComGenerales'])? 1:0;
		$ComEspecificas = isset($datos['ComEspecificas'])? 1:0;
		$ComBasicas = isset($datos['ComBasicas'])? 1:0;
		$ResultadosAprendizaje = isset($datos['ResultadosAprendizaje'])? 1:0;
		$Metodologia = isset($datos['Metodologia'])? 1:0;
		$CitasBibliograficas = isset($datos['CitasBibliograficas'])? 1:0;
		$RecursosInternet = isset($datos['RecursosInternet'])? 1:0;
		$RealizacionExamenes = isset($datos['RealizacionExamenes'])? 1:0;
		$CalificacionFinal =isset($datos['CalificacionFinal'])? 1:0;
		$RealizacionActividades = isset($datos['RealizacionActividades'])? 1:0;
		$RealizacionLaboratorio = isset($datos['RealizacionLaboratorio'])? 1:0;
		
	


		$context = new Context(FIND_CONFIGURACION, $datos['IdAsignatura']);
		$contextConfiguracion = $controller->action($context);
		
		if($contextConfiguracion->getEvent() === FIND_CONFIGURACION_OK){

			$configuracion = new Configuracion($IdConfiguracion, 
			$ConocimientosPrevios, 
			$BreveDescripcion, 
			$ProgramaDetallado, 
			$ComGenerales, 
			$ComEspecificas, 
			$ComBasicas, 
			$ResultadosAprendizaje, 
			$Metodologia, 
			$CitasBibliograficas, 
			$RecursosInternet, 
			$RealizacionExamenes, 
			$CalificacionFinal,
			$RealizacionActividades,
			$RealizacionLaboratorio,
			$datos['IdAsignatura']);

			$context = new Context(UPDATE_CONFIGURACION, $configuracion);
			$contextConfiguracion = $controller->action($context);

			if($contextConfiguracion->getEvent() === UPDATE_CONFIGURACION_OK){
				$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['IdAsignatura'] . "&modificado=y#nav-configuracion";
			}elseif ($contextConfiguracion->getEvent() === UPDATE_CONFIGURACION_FAIL) {
				$erroresFormulario[] = "No se ha podido modificar la evaluación.";
			}
		}
		return $erroresFormulario;
	}
}
