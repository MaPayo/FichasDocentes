<?php
namespace es\ucm;
require_once('includes/Negocio/Generacion/SAGeneracion.php');
include('vendor/autoload.php');

class SAGeneracionImplements implements SAGeneracion{
    public static function generacionHTMLSpanish($datos){
		//obtencion de los datos
		$factoriesSA = new \es\ucm\FactorySAImplements();
		//Iniciamos el pandoc
		$pandoc = new \Pandoc\Pandoc();
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
		$n = $sa->listGrupoClase($idAsignatura);
		$rowsGrupoClaseProfesor = $n;		
		//Comprobamos si existe mod
		$sa = $factoriesSA->createSAModGrupoClase();
		$nmod = $sa->listModGrupoClase($idAsignatura);
		if($nmod !== null){
			$rowsGrupoClaseProfesorMod = $nmod;
		}
		//Profesores del laboratorio
		$sa = $factoriesSA->createSAGrupoLaboratorio();
		$n = $sa->listGrupoLaboratorio($idAsignatura);
		$rowsGrupoLaboratorioProfesor = $n;
		//Comprobamos si existe mod
		$sa = $factoriesSA->createSAModGrupoLaboratorio();
		$nmod = $sa->listModGrupoLaboratorio($idAsignatura);
		if($nmod !== null){
			$rowsGrupoLaboratorioProfesorMod = $nmod;
		}
		//Empezamos con los textos tochos y los mods
		//Por ahora sin pandoc para poder probarlo
		//Competencia Asignatura
		$sa = $factoriesSA->createSACompetenciaAsignatura();
		$samod = $factoriesSA->createSAModCompetenciaAsignatura();
		$n = $sa->findCompetenciaAsignatura($idAsignatura);
		$nmod = $samod->findModCompetenciaAsignatura($idAsignatura);
		if($nmod !== null){
			$GeneralesHTML = $pandoc->convert($nmod->getGenerales(), "markdown_github", "html");
			$EspecificasHTML = $pandoc->convert($nmod->getEspecificas(), "markdown_github", "html");
			$BasicasYTransversalesHTML =$pandoc->convert($nmod->getBasicasYTransversales(), "markdown_github", "html");
			$ResultadosAprendizajeHTML =$pandoc->convert($nmod->getResultadosAprendizaje(), "markdown_github", "html");
		}else{
			$GeneralesHTML = $pandoc->convert($n->getGenerales(), "markdown_github", "html");
			$EspecificasHTML = $pandoc->convert($n->getEspecificas(), "markdown_github", "html");
			$BasicasYTransversalesHTML =$pandoc->convert($n->getBasicasYTransversales(), "markdown_github", "html");
			$ResultadosAprendizajeHTML =$pandoc->convert($n->getResultadosAprendizaje(), "markdown_github", "html");
		
		}
		//Programa Asignatura
		$sa = $factoriesSA->createSAProgramaAsignatura();
		$samod = $factoriesSA->createSAModProgramaAsignatura();
		$n = $sa->findProgramaAsignatura($idAsignatura);
		$nmod = $samod->findModProgramaAsignatura($idAsignatura);
		if($nmod !== null){
			$BreveDescripcionHTML = $pandoc->convert($nmod->getBreveDescripcion(), "markdown_github", "html");
			$ConocimientosPreviosHTML = $pandoc->convert($nmod->getConocimientosPrevios(), "markdown_github", "html");
			$ProgramaTeoricoHTML =$pandoc->convert($nmod->getProgramaTeorico(), "markdown_github", "html");
			$ProgramaSeminarioHTML = $pandoc->convert($nmod->getProgramaSeminarios(), "markdown_github", "html");
			$ProgramaLaboratorioHTML = $pandoc->convert($nmod->getProgramaLaboratorio(), "markdown_github", "html");

		}else{
			
			$BreveDescripcionHTML = $pandoc->convert($n->getBreveDescripcion(), "markdown_github", "html");
			$ConocimientosPreviosHTML = $pandoc->convert($n->getConocimientosPrevios(), "markdown_github", "html");
			$ProgramaTeoricoHTML =$pandoc->convert($n->getProgramaTeorico(), "markdown_github", "html");
			$ProgramaSeminarioHTML = $pandoc->convert($n->getProgramaSeminarios(), "markdown_github", "html");
			$ProgramaLaboratorioHTML = $pandoc->convert($n->getProgramaLaboratorio(), "markdown_github", "html");
		}
		//Bibliografia
		$sa = $factoriesSA->createSABibliografia();
		$samod = $factoriesSA->createSAModBibliografia();
		$n = $sa->findBibliografia($idAsignatura);
		$nmod = $samod->findModBibliografia($idAsignatura);
		if($nmod !== null){
			$CitasBibliograficasHTML = $pandoc->convert($nmod->getCitasBibliograficas(), "markdown_github", "html");
			$RecursosInternetHTML = $pandoc->convert($nmod->getRecursosInternet(), "markdown_github", "html");
		}else{
			
			$CitasBibliograficasHTML = $pandoc->convert($n->getCitasBibliograficas(), "markdown_github", "html");
			$RecursosInternetHTML = $pandoc->convert($n->getRecursosInternet(), "markdown_github", "html");
		}
		//Metodologia
		$sa = $factoriesSA->createSAMetodologia();
		$samod = $factoriesSA->createSAModMetodologia();
		$n = $sa->findMetodologia($idAsignatura);
		$nmod = $samod->findModMetodologia($idAsignatura);
		if($nmod !== null){
			$MetodologiaHTML = $pandoc->convert($nmod->getMetodologia(),"markdown_github","html");
		}else{
			$MetodologiaHTML = $pandoc->convert($n->getMetodologia(),"markdown_github","html");
		}
		//Evaluacion
		$sa = $factoriesSA->createSAEvaluacion();
		$samod = $factoriesSA->createSAModEvaluacion();
		$n = $sa->findEvaluacion($idAsignatura);
		$nmod = $samod->findModEvaluacion($idAsignatura);
		if($nmod !== null){
			$RealizacionExamenesHTML = $pandoc->convert($nmod->getRealizacionExamenes(),"markdown_github","html");
			$RealizacionActividadesHTML = $pandoc->convert($nmod->getRealizacionActividades(),"markdown_github","html");
			$RealizacionLaboratorioHTML = $pandoc->convert($nmod->getRealizacionLaboratorio(),"markdown_github","html");
			$CalificacionFinalHTML = $pandoc->convert($nmod->getCalificacionFinal(),"markdown_github","html");
			$PesoExamenesHTML = $pandoc->convert($nmod->getPesoExamenes(),"markdown_github","html");
			$PesoActividadesHTML = $pandoc->convert($nmod->getPesoActividades(),"markdown_github","html");
			$PesoLaboratorioHTML = $pandoc->convert($nmod->getPesoLaboratorio(),"markdown_github","html");
		}else{
	
			$RealizacionExamenesHTML = $pandoc->convert($n->getRealizacionExamenes(),"markdown_github","html");
			$RealizacionActividadesHTML = $pandoc->convert($n->getRealizacionActividades(),"markdown_github","html");
			$RealizacionLaboratorioHTML = $pandoc->convert($n->getRealizacionLaboratorio(),"markdown_github","html");
			$CalificacionFinalHTML = $pandoc->convert($n->getCalificacionFinal(),"markdown_github","html");
			$PesoExamenesHTML = $pandoc->convert($n->getPesoExamenes(),"markdown_github","html");
			$PesoActividadesHTML = $pandoc->convert($n->getPesoActividades(),"markdown_github","html");
			$PesoLaboratorioHTML = $pandoc->convert($n->getPesoLaboratorio(),"markdown_github","html");
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
		$pandoc = new \Pandoc\Pandoc();
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
		$n = $sa->listGrupoClase($idAsignatura);
		$rowsGrupoClaseProfesor = $n;
		//Comprobamos si existe mod
		$sa = $factoriesSA->createSAModGrupoClase();
		$nmod = $sa->listModGrupoClase($idAsignatura);
		if($nmod !== null){
			$rowsGrupoClaseProfesorMod = $nmod;
		}
		//Profesores del laboratorio
		$sa = $factoriesSA->createSAGrupoLaboratorio();
		$n = $sa->listGrupoLaboratorio($idAsignatura);
		$rowsGrupoLaboratorioProfesor = $n;
		//Comprobamos si existe mod
		$sa = $factoriesSA->createSAModGrupoLaboratorio();
		$nmod = $sa->listModGrupoLaboratorio($idAsignatura);
		if($nmod !== null){
			$rowsGrupoLaboratorioProfesorMod = $nmod;
		}
		//Empezamos con los textos tochos y los mods
		//Por ahora sin pandoc para poder probarlo
		//Competencia Asignatura
		$sa = $factoriesSA->createSACompetenciaAsignatura();
		$samod = $factoriesSA->createSAModCompetenciaAsignatura();
		$n = $sa->findCompetenciaAsignatura($idAsignatura);
		$nmod = $samod->findModCompetenciaAsignatura($idAsignatura);
		if($nmod !== null){
			$GeneralesHTML = $pandoc->convert($nmod->getGeneralesI(), "markdown_github", "html");
			$EspecificasHTML = $pandoc->convert($nmod->getEspecificasI(), "markdown_github", "html");
			$BasicasYTransversalesHTML =$pandoc->convert($nmod->getBasicasYTransversalesI(), "markdown_github", "html");
			$ResultadosAprendizajeHTML =$pandoc->convert($nmod->getResultadosAprendizajeI(), "markdown_github", "html");
		}else{
			$GeneralesHTML = $pandoc->convert($n->getGeneralesI(), "markdown_github", "html");
			$EspecificasHTML = $pandoc->convert($n->getEspecificasI(), "markdown_github", "html");
			$BasicasYTransversalesHTML =$pandoc->convert($n->getBasicasYTransversalesI(), "markdown_github", "html");
			$ResultadosAprendizajeHTML =$pandoc->convert($n->getResultadosAprendizajeI(), "markdown_github", "html");
		
		}
		//Programa Asignatura
		$sa = $factoriesSA->createSAProgramaAsignatura();
		$samod = $factoriesSA->createSAModProgramaAsignatura();
		$n = $sa->findProgramaAsignatura($idAsignatura);
		$nmod = $samod->findModProgramaAsignatura($idAsignatura);
		if($nmod !== null){
			$BreveDescripcionHTML = $pandoc->convert($nmod->getBreveDescripcionI(), "markdown_github", "html");
			$ConocimientosPreviosHTML = $pandoc->convert($nmod->getConocimientosPreviosI(), "markdown_github", "html");
			$ProgramaTeoricoHTML =$pandoc->convert($nmod->getProgramaTeoricoI(), "markdown_github", "html");
			$ProgramaSeminarioHTML = $pandoc->convert($nmod->getProgramaSeminariosI(), "markdown_github", "html");
			$ProgramaLaboratorioHTML = $pandoc->convert($nmod->getProgramaLaboratorioI(), "markdown_github", "html");

		}else{
			
			$BreveDescripcionHTML = $pandoc->convert($n->getBreveDescripcionI(), "markdown_github", "html");
			$ConocimientosPreviosHTML = $pandoc->convert($n->getConocimientosPreviosI(), "markdown_github", "html");
			$ProgramaTeoricoHTML =$pandoc->convert($n->getProgramaTeoricoI(), "markdown_github", "html");
			$ProgramaSeminarioHTML = $pandoc->convert($n->getProgramaSeminariosI(), "markdown_github", "html");
			$ProgramaLaboratorioHTML = $pandoc->convert($n->getProgramaLaboratorioI(), "markdown_github", "html");
		}
		//Bibliografia
		$sa = $factoriesSA->createSABibliografia();
		$samod = $factoriesSA->createSAModBibliografia();
		$n = $sa->findBibliografia($idAsignatura);
		$nmod = $samod->findModBibliografia($idAsignatura);
		if($nmod !== null){
			$CitasBibliograficasHTML = $pandoc->convert($nmod->getCitasBibliograficas(), "markdown_github", "html");
			$RecursosInternetHTML = $pandoc->convert($nmod->getRecursosInternet(), "markdown_github", "html");
		}else{
			
			$CitasBibliograficasHTML = $pandoc->convert($n->getCitasBibliograficas(), "markdown_github", "html");
			$RecursosInternetHTML = $pandoc->convert($n->getRecursosInternet(), "markdown_github", "html");
		}
		//Metodologia
		$sa = $factoriesSA->createSAMetodologia();
		$samod = $factoriesSA->createSAModMetodologia();
		$n = $sa->findMetodologia($idAsignatura);
		$nmod = $samod->findModMetodologia($idAsignatura);
		if($nmod !== null){
			$MetodologiaHTML = $pandoc->convert($nmod->getMetodologiaI(),"markdown_github","html");
		}else{
			$MetodologiaHTML = $pandoc->convert($n->getMetodologiaI(),"markdown_github","html");
		}
		//Evaluacion
		$sa = $factoriesSA->createSAEvaluacion();
		$samod = $factoriesSA->createSAModEvaluacion();
		$n = $sa->findEvaluacion($idAsignatura);
		$nmod = $samod->findModEvaluacion($idAsignatura);
		if($nmod !== null){
			$RealizacionExamenesHTML = $pandoc->convert($nmod->getRealizacionExamenesI(),"markdown_github","html");
			$RealizacionActividadesHTML = $pandoc->convert($nmod->getRealizacionActividadesI(),"markdown_github","html");
			$RealizacionLaboratorioHTML = $pandoc->convert($nmod->getRealizacionLaboratorioI(),"markdown_github","html");
			$CalificacionFinalHTML = $pandoc->convert($nmod->getCalificacionFinalI(),"markdown_github","html");
			$PesoExamenesHTML = $pandoc->convert($nmod->getPesoExamenes(),"markdown_github","html");
			$PesoActividadesHTML = $pandoc->convert($nmod->getPesoActividades(),"markdown_github","html");
			$PesoLaboratorioHTML = $pandoc->convert($nmod->getPesoLaboratorio(),"markdown_github","html");
		}else{
	
			$RealizacionExamenesHTML = $pandoc->convert($n->getRealizacionExamenesI(),"markdown_github","html");
			$RealizacionActividadesHTML = $pandoc->convert($n->getRealizacionActividadesI(),"markdown_github","html");
			$RealizacionLaboratorioHTML = $pandoc->convert($n->getRealizacionLaboratorioI(),"markdown_github","html");
			$CalificacionFinalHTML = $pandoc->convert($n->getCalificacionFinalI(),"markdown_github","html");
			$PesoExamenesHTML = $pandoc->convert($n->getPesoExamenes(),"markdown_github","html");
			$PesoActividadesHTML = $pandoc->convert($n->getPesoActividades(),"markdown_github","html");
			$PesoLaboratorioHTML = $pandoc->convert($n->getPesoLaboratorio(),"markdown_github","html");
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