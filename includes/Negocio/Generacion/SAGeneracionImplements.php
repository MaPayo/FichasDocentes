<?php
namespace es\ucm;
require_once('includes/Negocio/Generacion/SAGeneracion.php');
include('vendor/autoload.php');

class SAGeneracionImplements implements SAGeneracion{
    public static function generacionHTMLSpanish($datos){
		//obtencion de los datos
		$factoriesSA = new \es\ucm\FactorySAImplements();
		//Asignatura
		$sa = $factoriesSA->createSAAsignatura();
		$n = $sa->findAsignatura($datos[0]);
		//Datos que necesitamos en asignatura
		$NombreAsignatura = $n->getNombreAsignatura();
		$idAsignatura = $datos[0];
		$Curso = $n->getCurso();
		$Semestre = $n->getSemestre();
		$Creditos = $n->getCreditos();
		$Email = $n->getCoordinadorAsignatura();
		//Materia
		$sa = $factoriesSA->createSAMateria();
		$n = $sa->findMateria($n->getIdMateria());
		$NombreMateria = $n->getNombreMateria();
		$Caracter = $n->getCaracter();
		//Modulo
		$sa = $factoriesSA->createSAModulo();
		$n = $sa->findModulo($n->getIdModulo());
		$NombreModulo = $n->getNombreModulo();
		//Grado
		$sa = $factoriesSA->createSAGrado();
		$n = $sa->findGrado($n->getCodigoGrado());
		$NombreModulo = $n->getNombreGrado();
		$HorasECTS = $n->getHorasEcts();
		//Teorico Laboratorio y Problemas
		$sa = $factoriesSA->createSATeorico();
		$n = $sa->findTeorico($idAsignatura);
		$CreditosTeorico = $n->getCreditos();
		$PresencialTeorico = $n->getPresencial();
		$HorasTeorico = ($CreditosTeorico *$HorasECTS * $PresencialTeorico) / 100;
		$sa = $factoriesSA->createSALaboratorio();
		$n = $sa->findLaboratorio($idAsignatura);
		$CreditosLaboratorio = $n->getCreditos();
		$PresencialLaboratorio = $n->getPresencial();
		$HorasLaboratorio = ($CreditosLaboratorio *$HorasECTS * $PresencialLaboratorio) / 100;
		$sa = $factoriesSA->createSAProblema();
		$n = $sa->findProblema($idAsignatura);
		$CreditosProblema = $n->getCreditos();
		$PresencialProblema = $n->getPresencial();
		$HorasProblema = ($CreditosProblema *$HorasECTS * $PresencialProblema) / 100;
		//Coordinador
		$saP = $factoriesSA->createSAProfesor();
		$n = $saP->findProfesor($Email);
		$Coordinador = $n->getNombre();
		$Departamento = $n->getDepartamento();
		$Despacho = $n->getDespacho();
		//Profesores de la asignatura
		$sa = $factoriesSA->createSAGrupoClase();
		$n = $sa->findGrupoClase($idAsignatura);
		$rowsGrupoClaseProfesor = $n;
		

        ob_clean();
		ob_start();

		require('includes/Presentacion/Vistas/html/Plantillas/guiaDocenteTemplate.php');
		
		$content = ob_get_contents();
		ob_clean();
		file_put_contents($datos[1], $content);
		return is_file($datos[1]);

	}
	public static function generacionPDFSpanish($datos)
	{
		$dompdf= new \Dompdf\Dompdf();
		$content = file_get_contents($datos[2]);
		var_dump($content);
		// instantiate and use the dompdf class
		$dompdf->loadHtml($content);

		$dompdf->setPaper('A4', 'portrait');
		//$dompdf->setPaper(array(0,0,821.86,756.00),'executive'); //x inicio, y inicio, ancho final, alto final
		//$dompdf->set_option('defaultFont', 'Courier');
		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		//$dompdf->stream($filename);
		$output = $dompdf->output();
		file_put_contents($datos[1], $output);
		return is_file($datos[1]);
	}
}