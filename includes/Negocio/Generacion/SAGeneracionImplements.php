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
		$cursoAcademico = $datos[2];
		$estado = $n->getEstado();
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
		$NombreGrado = $n->getNombreGrado();
		$HorasECTS = $n->getHorasEcts();
		//Teorico Laboratorio y Problemas
		$sa = $factoriesSA->createSATeorico();
		$n = $sa->findTeorico($idAsignatura);
		if(isset($n)){
		$CreditosTeorico = $n->getCreditos();
		$PresencialTeorico = $n->getPresencial();
		$HorasTeorico = ($CreditosTeorico *$HorasECTS * $PresencialTeorico) / 100;
		}else{
		$CreditosTeorico = "";
		$PresencialTeorico = "";
		$HorasTeorico = "";
		}
		$sa = $factoriesSA->createSALaboratorio();
		$n = $sa->findLaboratorio($idAsignatura);
		if(isset($n)){
		$CreditosLaboratorio = $n->getCreditos();
		$PresencialLaboratorio = $n->getPresencial();
		$HorasLaboratorio = ($CreditosLaboratorio *$HorasECTS * $PresencialLaboratorio) / 100;
		}else{
		$CreditosLaboratorio = "";
		$PresencialLaboratorio = "";
		$HorasLaboratorio = "";
		}
		$sa = $factoriesSA->createSAProblema();
		$n = $sa->findProblema($idAsignatura);
		if(isset($n)){
		$CreditosProblema = $n->getCreditos();
		$PresencialProblema = $n->getPresencial();
		$HorasProblema = ($CreditosProblema *$HorasECTS * $PresencialProblema) / 100;
		}else{
			$CreditosProblema = "";
		$PresencialProblema = "";
		$HorasProblema = "";
		}
		//Coordinador
		$saP = $factoriesSA->createSAProfesor();
		$n = $saP->findProfesor($Email);
		if(isset($n)){
		$Coordinador = $n->getNombre();
		$Departamento = $n->getDepartamento();
		$Despacho = $n->getDespacho();
		}else{
		$Coordinador = "";
		$Departamento = "";
		$Despacho = "";
		}
		//Profesores de la asignatura
		$sa = $factoriesSA->createSAGrupoClase();
		$n = $sa->findGrupoClase($idAsignatura);
		$rowsGrupoClaseProfesor = $n;		
		//Comprobamos si existe mod
		$sa = $factoriesSA->createSAModGrupoClase();
		$n = $sa->findModGrupoClase($idAsignatura);
		if($n !== null){
			$rowsGrupoClaseProfesorMod = $n;
		}
		//Profesores del laboratorio
		$sa = $factoriesSA->createSAGrupoLaboratorio();
		$n = $sa->findGrupoLaboratorio($idAsignatura);
		$rowsGrupoLaboratorioProfesor = $n;
		//Comprobamos si existe mod
		$sa = $factoriesSA->createSAModGrupoLaboratorio();
		$n = $sa->findModGrupoLaboratorio($idAsignatura);
		if($n !== null){
			$rowsGrupoLaboratorioProfesorMod = $n;
		}
		//Empezamos con los textos tochos y los mods
		//Por ahora sin pandoc para poder probarlo
		//Competencia Asignatura
		$sa = $factoriesSA->createSACompetenciaAsignatura();
		$samod = $factoriesSA->createSAModCompetenciaAsignatura();
		$n = $sa->findCompetenciaAsignatura($idAsignatura);
		$nmod = $samod->findModCompetenciaAsignatura($idAsignatura);
		if($nmod !== null){
			$GeneralesHTML = $nmod->getGenerales();
			$EspecificasHTML = $nmod->getEspecificas();
			$BasicasYTransversalesHTML =$nmod->getBasicasYTransversales();
			$ResultadosAprendizajeHTML = $nmod->getResultadosAprendizaje();
		}else{
			$GeneralesHTML = $n->getGenerales();
			$EspecificasHTML = $n->getEspecificas();
			$BasicasYTransversalesHTML =$n->getBasicasYTransversales();
			$ResultadosAprendizajeHTML = $n->getResultadosAprendizaje();
		}
		//Programa Asignatura
		$sa = $factoriesSA->createSAProgramaAsignatura();
		$samod = $factoriesSA->createSAModProgramaAsignatura();
		$n = $sa->findProgramaAsignatura($idAsignatura);
		$nmod = $samod->findModProgramaAsignatura($idAsignatura);
		if($nmod !== null){
			$BreveDescripcionHTML = $nmod->getBreveDescripcion();
			$ConocimientosPreviosHTML = $nmod->getConocimientosPrevios();
			$ProgramaTeoricoHTML =$nmod->getProgramaTeorico();
			$ProgramaSeminarioHTML = $nmod->getProgramaSeminarios();
			$ProgramaLaboratorioHTML = $nmod->getProgramaLaboratorio();

		}else{
			$BreveDescripcionHTML = $n->getBreveDescripcion();
			$ConocimientosPreviosHTML = $n->getConocimientosPrevios();
			$ProgramaTeoricoHTML =$n->getProgramaTeorico();
			$ProgramaSeminarioHTML = $n->getProgramaSeminarios();
			$ProgramaLaboratorioHTML = $n->getProgramaLaboratorio();
		}
		//Bibliografia
		$sa = $factoriesSA->createSABibliografia();
		$samod = $factoriesSA->createSAModBibliografia();
		$n = $sa->findBibliografia($idAsignatura);
		$nmod = $samod->findModBibliografia($idAsignatura);
		if($nmod !== null){
			$CitasBibliograficasHTML = $nmod->getCitasBibliograficas();
			$RecursosInternetHTML = $nmod->getRecursosInternet();
		}else{
			$CitasBibliograficasHTML = $n->getCitasBibliograficas();
			$RecursosInternetHTML = $n->getRecursosInternet();
		}
		//Metodologia
		$sa = $factoriesSA->createSAMetodologia();
		$samod = $factoriesSA->createSAModMetodologia();
		$n = $sa->findMetodologia($idAsignatura);
		$nmod = $samod->findModMetodologia($idAsignatura);
		if($nmod !== null){
			$MetodologiaHTML = $nmod->getMetodologia();
		}else{
			$MetodologiaHTML = $n->getMetodologia();
		}
		//Evaluacion
		$sa = $factoriesSA->createSAEvaluacion();
		$samod = $factoriesSA->createSAModEvaluacion();
		$n = $sa->findEvaluacion($idAsignatura);
		$nmod = $samod->findModEvaluacion($idAsignatura);
		if($nmod !== null){
			$RealizacionExamenesHTML = $nmod->getRealizacionExamenes();
			$RealizacionActividadesHTML = $nmod->getRealizacionActividades();
			$RealizacionLaboratorioHTML = $nmod->getRealizacionLaboratorio();
			$CalificacionFinalHTML = $nmod->getCalificacionFinal();
			$PesoExamenesHTML = $nmod->getPesoExamenes();
			$PesoActividadesHTML = $nmod->getPesoActividades();
			$PesoLaboratorioHTML = $nmod->getPesoLaboratorio();
		}else{
			$RealizacionExamenesHTML = $n->getRealizacionExamenes();
			$RealizacionActividadesHTML = $n->getRealizacionActividades();
			$RealizacionLaboratorioHTML = $n->getRealizacionLaboratorio();
			$CalificacionFinalHTML = $n->getCalificacionFinal();
			$PesoExamenesHTML = $n->getPesoExamenes();
			$PesoActividadesHTML = $n->getPesoActividades();
			$PesoLaboratorioHTML = $n->getPesoLaboratorio();
		}


        ob_clean();
		ob_start();

		require('includes/Presentacion/Vistas/html/Plantillas/guiaDocenteTemplate.php');
		
		$content = ob_get_contents();
		ob_clean();
		file_put_contents($datos[1], $content);
		return is_file($datos[1]);

	}

	public static function generacionHTMLEnglish($datos){
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
		$cursoAcademico = $datos[2];
		$estado = $n->getEstado();
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
		$NombreGrado = $n->getNombreGrado();
		$HorasECTS = $n->getHorasEcts();
		//Teorico Laboratorio y Problemas
		$sa = $factoriesSA->createSATeorico();
		$n = $sa->findTeorico($idAsignatura);
		if(isset($n)){
		$CreditosTeorico = $n->getCreditos();
		$PresencialTeorico = $n->getPresencial();
		$HorasTeorico = ($CreditosTeorico *$HorasECTS * $PresencialTeorico) / 100;
		}else{
		$CreditosTeorico = "";
		$PresencialTeorico = "";
		$HorasTeorico = "";
		}
		$sa = $factoriesSA->createSALaboratorio();
		$n = $sa->findLaboratorio($idAsignatura);
		if(isset($n)){
		$CreditosLaboratorio = $n->getCreditos();
		$PresencialLaboratorio = $n->getPresencial();
		$HorasLaboratorio = ($CreditosLaboratorio *$HorasECTS * $PresencialLaboratorio) / 100;
		}else{
		$CreditosLaboratorio = "";
		$PresencialLaboratorio = "";
		$HorasLaboratorio = "";
		}
		$sa = $factoriesSA->createSAProblema();
		$n = $sa->findProblema($idAsignatura);
		if(isset($n)){
		$CreditosProblema = $n->getCreditos();
		$PresencialProblema = $n->getPresencial();
		$HorasProblema = ($CreditosProblema *$HorasECTS * $PresencialProblema) / 100;
		}else{
			$CreditosProblema = "";
		$PresencialProblema = "";
		$HorasProblema = "";
		}
		//Coordinador
		$saP = $factoriesSA->createSAProfesor();
		$n = $saP->findProfesor($Email);
		if(isset($n)){
		$Coordinador = $n->getNombre();
		$Departamento = $n->getDepartamento();
		$Despacho = $n->getDespacho();
		}else{
		$Coordinador = "";
		$Departamento = "";
		$Despacho = "";
		}
		//Profesores de la asignatura
		$sa = $factoriesSA->createSAGrupoClase();
		$n = $sa->findGrupoClase($idAsignatura);
		$rowsGrupoClaseProfesor = $n;
		//Comprobamos si existe mod
		$sa = $factoriesSA->createSAModGrupoClase();
		$n = $sa->findModGrupoClase($idAsignatura);
		if($n !== null){
			$rowsGrupoClaseProfesorMod = $n;
		}
		//Profesores del laboratorio
		$sa = $factoriesSA->createSAGrupoLaboratorio();
		$n = $sa->findGrupoLaboratorio($idAsignatura);
		$rowsGrupoLaboratorioProfesor = $n;
		//Comprobamos si existe mod
		$sa = $factoriesSA->createSAModGrupoLaboratorio();
		$n = $sa->findModGrupoLaboratorio($idAsignatura);
		if($n !== null){
			$rowsGrupoLaboratorioProfesorMod = $n;
		}
		//Empezamos con los textos tochos y los mods
		//Por ahora sin pandoc para poder probarlo
		//Competencia Asignatura
		$sa = $factoriesSA->createSACompetenciaAsignatura();
		$samod = $factoriesSA->createSAModCompetenciaAsignatura();
		$n = $sa->findCompetenciaAsignatura($idAsignatura);
		$nmod = $samod->findModCompetenciaAsignatura($idAsignatura);
		if($nmod !== null){
			$GeneralesHTML = $nmod->getGeneralesI();
			$EspecificasHTML = $nmod->getEspecificasI();
			$BasicasYTransversalesHTML =$nmod->getBasicasYTransversalesI();
			$ResultadosAprendizajeHTML = $nmod->getResultadosAprendizajeI();
		}else{
			$GeneralesHTML = $n->getGeneralesI();
			$EspecificasHTML = $n->getEspecificasI();
			$BasicasYTransversalesHTML =$n->getBasicasYTransversalesI();
			$ResultadosAprendizajeHTML = $n->getResultadosAprendizajeI();
		}
		//Programa Asignatura
		$sa = $factoriesSA->createSAProgramaAsignatura();
		$samod = $factoriesSA->createSAModProgramaAsignatura();
		$n = $sa->findProgramaAsignatura($idAsignatura);
		$nmod = $samod->findModProgramaAsignatura($idAsignatura);
		if($nmod !== null){
			$BreveDescripcionHTML = $nmod->getBreveDescripcionI();
			$ConocimientosPreviosHTML = $nmod->getConocimientosPreviosI();
			$ProgramaTeoricoHTML =$nmod->getProgramaTeoricoI();
			$ProgramaSeminarioHTML = $nmod->getProgramaSeminariosI();
			$ProgramaLaboratorioHTML = $nmod->getProgramaLaboratorioI();

		}else{
			$BreveDescripcionHTML = $n->getBreveDescripcionI();
			$ConocimientosPreviosHTML = $n->getConocimientosPreviosI();
			$ProgramaTeoricoHTML =$n->getProgramaTeoricoI();
			$ProgramaSeminarioHTML = $n->getProgramaSeminariosI();
			$ProgramaLaboratorioHTML = $n->getProgramaLaboratorioI();
		}
		//Bibliografia
		$sa = $factoriesSA->createSABibliografia();
		$samod = $factoriesSA->createSAModBibliografia();
		$n = $sa->findBibliografia($idAsignatura);
		$nmod = $samod->findModBibliografia($idAsignatura);
		if($nmod !== null){
			$CitasBibliograficasHTML = $nmod->getCitasBibliograficas();
			$RecursosInternetHTML = $nmod->getRecursosInternet();
		}else{
			$CitasBibliograficasHTML = $n->getCitasBibliograficas();
			$RecursosInternetHTML = $n->getRecursosInternet();
		}
		//Metodologia
		$sa = $factoriesSA->createSAMetodologia();
		$samod = $factoriesSA->createSAModMetodologia();
		$n = $sa->findMetodologia($idAsignatura);
		$nmod = $samod->findModMetodologia($idAsignatura);
		if($nmod !== null){
			$MetodologiaHTML = $nmod->getMetodologiaI();
		}else{
			$MetodologiaHTML = $n->getMetodologiaI();
		}
		//Evaluacion
		$sa = $factoriesSA->createSAEvaluacion();
		$samod = $factoriesSA->createSAModEvaluacion();
		$n = $sa->findEvaluacion($idAsignatura);
		$nmod = $samod->findModEvaluacion($idAsignatura);
		if($nmod !== null){
			$RealizacionExamenesHTML = $nmod->getRealizacionExamenesI();
			$RealizacionActividadesHTML = $nmod->getRealizacionActividadesI();
			$RealizacionLaboratorioHTML = $nmod->getRealizacionLaboratorioI();
			$CalificacionFinalHTML = $nmod->getCalificacionFinalI();
			$PesoExamenesHTML = $nmod->getPesoExamenes();
			$PesoActividadesHTML = $nmod->getPesoActividades();
			$PesoLaboratorioHTML = $nmod->getPesoLaboratorio();
		}else{
			$RealizacionExamenesHTML = $n->getRealizacionExamenesI();
			$RealizacionActividadesHTML = $n->getRealizacionActividadesI();
			$RealizacionLaboratorioHTML = $n->getRealizacionLaboratorioI();
			$CalificacionFinalHTML = $n->getCalificacionFinalI();
			$PesoExamenesHTML = $n->getPesoExamenes();
			$PesoActividadesHTML = $n->getPesoActividades();
			$PesoLaboratorioHTML = $n->getPesoLaboratorio();
		}


        ob_clean();
		ob_start();

		require('includes/Presentacion/Vistas/html/Plantillas/guiaDocenteTemplate.php');
		
		$content = ob_get_contents();
		ob_clean();
		file_put_contents($datos[1], $content);
		return is_file($datos[1]);

	}
	public static function generacionPDF($datos)
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