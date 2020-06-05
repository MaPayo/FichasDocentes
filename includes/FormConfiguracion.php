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
       
        
        
		$controller = new ControllerImplements();
		$context = new Context(FIND_CONFIGURACION, $IdAsignatura);
        $contextConfiguracion = $controller->action($context);
        

		$html = '<input type="hidden" name="IdConfiguracion" value="' . $IdConfiguracion . '" required />
        <input type="hidden" name="IdAsignatura" value="' . $IdAsignatura . '" required />';
        

        if($contextConfiguracion->getData()->getConocimientosPrevios()){
            $html .= '<p><input type="checkbox" checked name="ConocimientosPrevios">Conocimientos Previos</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="ConocimientosPrevios">Conocimientos Previos</p>';
        }
        
        if($contextConfiguracion->getData()->getBreveDescripcion()){
            $html .= '<p><input type="checkbox" checked name="BreveDescripcion">Breve Descripción</p>';
                
        }
         else{
            $html .= '<p><input type="checkbox" name="BreveDescripcion">Breve Descripción</p>';
        }

      
        if($contextConfiguracion->getData()->getProgramaDetallado()){
            $html .= '<p><input type="checkbox"checked name="ProgramaDetallado">Programa Detallado</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="ProgramaDetallado">Programa Detallado</p>';
        }
                

        if($contextConfiguracion->getData()->getComGenerales()){
            $html .= '<p><input type="checkbox" checked name="ComGenerales">Generales</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="ComGenerales">Generales</p>';
        }

        if($contextConfiguracion->getData()->getComEspecificas()){
            $html .= '<p><input type="checkbox" checked name="ComEspecificas">Específicas</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="Comspeficas">Específicas</p>';
        }

        if($contextConfiguracion->getData()->getComBasicas()){
            $html .= '<p><input type="checkbox" checked name="ComBasicas">Básicas y Transversales</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="ComBasicas"> Básicas y Transversales</p>';
        }

        if($contextConfiguracion->getData()->getResultadosAprendizaje()){
            $html .= '<p><input type="checkbox" checked name="ResultadosAprendizaje">Resultados Aprendizaje</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox name="ResultadosAprendizaje">Resultados aprendizaje</p>';
        }

        if($contextConfiguracion->getData()->getMetodologia()){
            $html .= '<p><input type="checkbox" checked name="Metodologia">Metodología</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="Metodologia">Metodología</p>';
        }
        if($contextConfiguracion->getData()->getCitasBibliograficas()){
            $html .= '<p><input type="checkbox" checked name="CitasBibliograficas">Citas Bibliográficas</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="CitasBibliograficas">Citas Bibliográficas</p>';
        }

        if($contextConfiguracion->getData()->getRecursosInternet()){
            $html .= '<p><input type="checkbox" checked name="RecursosInternet">Recursos en Internet</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="RecursosInternet">Recursos en Internet</p>';
        }

        if($contextConfiguracion->getData()->getRealizacionExamenes()){
            $html .= '<p><input type="checkbox" checked name="RealizacionExamenes">Realización de Exámenes</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="RealizacionExamenes">Realización de Exámenes</p>';
        }
        if($contextConfiguracion->getData()->getCalificacionFinal()){
            $html .= '<p><input type="checkbox" checked name="CalificacionFinal">Calificación Final</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="CalificacionFinal">Calificación Final</p>';
        }

        if($contextConfiguracion->getData()->getRealizacionActividades()){
            $html .= '<p><input type="checkbox" checked name="RealizacionActividades">Realización de Activiades</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="RealizacionActividades" >Realización de Actividades</p>';
        }

        if($contextConfiguracion->getData()->getRealizacionLaboratorio()){
            $html .= '<p><input type="checkbox" checked name="RealizacionLaboratorio">Realización de Laboratorio</p>';
                    
        }
        else{
            $html .= '<p><input type="checkbox" name="RealizacionLaboratorio">Realización de Laboratorio</p>';
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
				$erroresFormulario[] = "No se ha podido modificar la configuración.";
			}
		}
		return $erroresFormulario;
	}
}
