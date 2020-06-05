<?php

namespace es\ucm;


require_once('includes/Negocio/Comparacion/SAComparacion.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAComparacionImplements implements SAComparacion
{

    public static function comparacion($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactorySAImplements();
        $DAO = $factoriesDAO->createSAConfiguracion();
        $configuracion = $DAO->findConfiguracion($idAsignatura);
        $comparacion = array('conocimientosPrevios' => false, 
        'conocimientosPreviosI'=>false,
        "BreveDescripcion"=> false,
        "BreveDescripcionI"=> false,
        "ProgramaDetallado" => false,
        "ProgramaDetalladoI" => false,
        "ComGenerales" => false,
        "ComGeneralesI" => false,
        "ComEspecificas" => false,
        "ComEspecificasI" => false,
        "ComBasicas" => false,
        "ComBasicasI" => false,
        "ResultadosAprendizaje" => false,
        "ResultadosAprendizajeI" => false,
        "Metodologia" => false,
        "MetodologiaI" => false,
        "CitasBibliograficas" => false,
        "RecursosInternet" => false,
        "RealizacionExamenes" => false,
        "RealizacionExamenesI" => false,
        "CalificacionFinal" => false,
        "CalificacionFinalI" => false,
        "RealizacionActividades" => false,
        "RealizacionActividadesI" => false,
        "RealizacionLaboratorio" => false,
        "RealizacionLaboratorioI" => false );

        $DAOP = $factoriesDAO->createSAProgramaAsignatura();
        $DAOPM = $factoriesDAO->createSAModProgramaAsignatura();
        $asignatura = $DAOP->findProgramaAsignatura($idAsignatura);
        $modAsignatura = $DAOPM->findModProgramaAsignatura($idAsignatura);


        if ($configuracion->getConocimientosPrevios() === '1') {
            
            $conocimientos = $asignatura->getConocimientosPrevios();
            $modConocimientos = $modAsignatura->getConocimientosPrevios();

            //Lo convertimos en array
            $conocimientos = explode(" ", $conocimientos);
            $modConocimientos = explode(" ", $modConocimientos);

            //Comprobamos si son iguales
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($conocimientos) && $i < sizeof($modConocimientos) && !$diferencia) {
                if ($conocimientos[$i] != $modConocimientos[$i]) {
                    $diferencia = true;
                    $comparacion["conocimientosPrevios"] = $diferencia;
                }
                $i++;
            }
            $conocimientos = $asignatura->getConocimientosPreviosI();
            $modConocimientos = $modAsignatura->getConocimientosPreviosI();

            //Lo convertimos en array
            $conocimientos = explode(" ", $conocimientos);
            $modConocimientos = explode(" ", $modConocimientos);

            //Comprobamos si son iguales
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($conocimientos) && $i < sizeof($modConocimientos) && !$diferencia) {
                if ($conocimientos[$i] != $modConocimientos[$i]) {
                    $diferencia = true;
                    $comparacion["conocimientosPreviosI"] = $diferencia;
                }
                $i++;
            }
        } 
        if($configuracion->getBreveDescripcion() === '1'){
            $descripcion =  $asignatura->getBreveDescripcion();
            $modDescripcion = $modAsignatura->getBreveDescripcion();

            $descripcion = explode(" ", $descripcion);
            $modDescripcion = explode(" ", $modDescripcion);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($descripcion) && $i < sizeof($modDescripcion) && !$diferencia) {
                if ($descripcion[$i] != $modDescripcion[$i]) {
                    $diferencia = true;
                    $comparacion["BreveDescripcion"] = $diferencia;
                }
                $i++;
            }
            $descripcion =  $asignatura->getBreveDescripcionI();
            $modDescripcion = $modAsignatura->getBreveDescripcionI();

            $descripcion = explode(" ", $descripcion);
            $modDescripcion = explode(" ", $modDescripcion);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($descripcion) && $i < sizeof($modDescripcion) && !$diferencia) {
                if ($descripcion[$i] != $modDescripcion[$i]) {
                    $diferencia = true;
                    $comparacion["BreveDescripcionI"] = $diferencia;
                }
                $i++;
            }
        }
        if($configuracion->getProgramaDetallado() === '1'){
            $n =  $asignatura->getProgramaDetallado();
            $modn = $modAsignatura->getProgramaDetallado();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ProgramaDetallado"] = $diferencia;
                }
                $i++;
            }
            $n =  $asignatura->getProgramaDetalladoI();
            $modn = $modAsignatura->getProgramaDetalladoI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ProgramaDetalladoI"] = $diferencia;
                }
                $i++;
            }
        }
        $DAOP = $factoriesDAO->createSACompetenciaAsignatura();
        $DAOPM = $factoriesDAO->createSAModCompetenciaAsignatura();
        $asignatura = $DAOP->findCompetenciaAsignatura($idAsignatura);
        $modAsignatura = $DAOPM->findModCompetenciaAsignatura($idAsignatura);

   
        if($configuracion->getComGenerales() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getGenerales();
            $modn = $modAsignatura->getGenerales();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ComGenerales"] = $diferencia;
                }
                $i++;
            } 
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getGeneralesI();
            $modn = $modAsignatura->getGeneralesI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ComGeneralesI"] = $diferencia;
                }
                $i++;
            }
        }
        }
        }
        if($configuracion->getComEspecificas() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getEspecificas();
            $modn = $modAsignatura->getEspecificas();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ComEspecificas"] = $diferencia;
                }
                $i++;
            }}
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getEspecificasI();
            $modn = $modAsignatura->getEspecificasI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ComEspecificasI"] = $diferencia;
                }
                $i++;
            }
        }
        }
        if($configuracion->getComBasicas() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getBasicasYTransversales();
            $modn = $modAsignatura->getBasicasYTransversales();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ComBasicas"] = $diferencia;
                }
                $i++;
            }
        } if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getBasicasYTransversalesI();
            $modn = $modAsignatura->getBasicasYTransversalesI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ComBasicasI"] = $diferencia;
                }
                $i++;
            }
        }
        }
        if($configuracion->getResultadosAprendizaje() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getResultadosAprendizaje();
            $modn = $modAsignatura->getResultadosAprendizaje();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ResultadosAprendizaje"] = $diferencia;
                }
                $i++;
            }}
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getResultadosAprendizajeI();
            $modn = $modAsignatura->getResultadosAprendizajeI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["ResultadosAprendizajeI"] = $diferencia;
                }
                $i++;
            }}
        }
        $DAOP = $factoriesDAO->createSAMetodologia();
        $DAOPM = $factoriesDAO->createSAModMetodologia();
        $asignatura = $DAOP->findMetodologia($idAsignatura);
        $modAsignatura = $DAOPM->findModMetodologia($idAsignatura);

        if($configuracion->getMetodologia() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getMetodologia();
            $modn = $modAsignatura->getMetodologia();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["Metodologia"] = $diferencia;
                }
                $i++;
            }}
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getMetodologiaI();
            $modn = $modAsignatura->getMetodologiaI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["MetodologiaI"] = $diferencia;
                }
                $i++;
            }}
        }
        $DAOP = $factoriesDAO->createSABibliografia();
        $DAOPM = $factoriesDAO->createSAModBibliografia();
        $asignatura = $DAOP->findBibliografia($idAsignatura);
        $modAsignatura = $DAOPM->findModBibliografia($idAsignatura);

        if($configuracion->getCitasBibliograficas() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getCitasBibliograficas();
            $modn = $modAsignatura->getCitasBibliograficas();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["CitasBibliograficas"] = $diferencia;
                }
                $i++;
            }}
        }
        if($configuracion->getRecursosInternet() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRecursosInternet();
            $modn = $modAsignatura->getRecursosInternet();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;

            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["RecursosInternet"] = $diferencia;
                }
                $i++;
            }}
        }
        $DAOP = $factoriesDAO->createSAEvaluacion();
        $DAOPM = $factoriesDAO->createSAModEvaluacion();
        $asignatura = $DAOP->findEvaluacion($idAsignatura);
        $modAsignatura = $DAOPM->findModEvaluacion($idAsignatura);

        if($configuracion->getRealizacionExamenes() === '1'){ if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionExamenes();
            $modn = $modAsignatura->getRealizacionExamenes();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["RealizacionExamenes"] = $diferencia;
                }
                $i++;
            }} if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionExamenesI();
            $modn = $modAsignatura->getRealizacionExamenesI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["RealizacionExamenesI"] = $diferencia;
                }
                $i++;
            }}
        }
        if($configuracion->getCalificacionFinal() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getCalificacionFinal();
            $modn = $modAsignatura->getCalificacionFinal();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["CalificacionFinal"] = $diferencia;
                }
                $i++;
            }} if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getCalificacionFinalI();
            $modn = $modAsignatura->getCalificacionFinalI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["CalificacionFinalI"] = $diferencia;
                }
                $i++;
            }}
        }
        if($configuracion->getRealizacionActividades() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionActividades();
            $modn = $modAsignatura->getRealizacionActividades();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["RealizacionActividades"] = $diferencia;
                }
                $i++;
            }} if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionActividadesI();
            $modn = $modAsignatura->getRealizacionActividadesI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["RealizacionActividadesI"] = $diferencia;
                }
                $i++;
            }}
        }
        if($configuracion->getRealizacionLaboratorio() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionLaboratorio();
            $modn = $modAsignatura->getRealizacionLaboratorio();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["RealizacionLaboratorio"] = $diferencia;
                }
                $i++;
            }} if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionLaboratorioI();
            $modn = $modAsignatura->getRealizacionLaboratorioI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            $i = 0;
            $diferencia = false;
            while ($i < sizeof($n) && $i < sizeof($modn) && !$diferencia) {
                if ($n[$i] != $modn[$i]) {
                    $diferencia = true;
                    $comparacion["RealizacionLaboratorioI"] = $diferencia;
                }
                $i++;
            }}
        }
        return $comparacion;
        
    }
}