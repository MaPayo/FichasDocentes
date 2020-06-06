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
            if(sizeof($modAsignatura) !== 0){
            $n = $asignatura->getConocimientosPrevios();
            $modn = $modAsignatura->getConocimientosPrevios();

            //Lo convertimos en array
            $n = explode(" ", $n);
            $modn = explode(" ", $modn);

            //Comprobamos si son iguales
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["conocimientosPrevios"] = true;
            }
            $n = $asignatura->getConocimientosPreviosI();
            $modn = $modAsignatura->getConocimientosPreviosI();

            //Lo convertimos en array
            $n = explode(" ", $n);
            $modn = explode(" ", $modn);

            //Comprobamos si son iguales
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["conocimientosPreviosI"] = true;
            }}
        } 
        if($configuracion->getBreveDescripcion() === '1'){
            if(sizeof($modAsignatura) !== 0){
            $n =  $asignatura->getBreveDescripcion();
            $modn = $modAsignatura->getBreveDescripcion();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["BreveDescripcion"] = true;
            }
            $n =  $asignatura->getBreveDescripcionI();
            $modn = $modAsignatura->getBreveDescripcionI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["BreveDescripcionI"] = true;
            }
        }
        }
        if($configuracion->getProgramaDetallado() === '1'){
            if(sizeof($modAsignatura) !== 0){
            $n =  $asignatura->getProgramaDetallado();
            $modn = $modAsignatura->getProgramaDetallado();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ProgramaDetallado"] = true;
            }
            $n =  $asignatura->getProgramaDetalladoI();
            $modn = $modAsignatura->getProgramaDetalladoI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ProgramaDetalladoI"] = true;
            }
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
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ComGenerales"] = true;
            }
        }
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getGeneralesI();
            $modn = $modAsignatura->getGeneralesI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ComGeneralesI"] = true;
            }
        }
        }
        
        if($configuracion->getComEspecificas() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getEspecificas();
            $modn = $modAsignatura->getEspecificas();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ComEspecificas"] = true;
            }}
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getEspecificasI();
            $modn = $modAsignatura->getEspecificasI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ComEspecificasI"] = true;
            }
        }
        }
        if($configuracion->getComBasicas() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getBasicasYTransversales();
            $modn = $modAsignatura->getBasicasYTransversales();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["comBasicas"] = true;
            }
        } if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getBasicasYTransversalesI();
            $modn = $modAsignatura->getBasicasYTransversalesI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ComBasicasI"] = true;
            }
        }
        }
        if($configuracion->getResultadosAprendizaje() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getResultadosAprendizaje();
            $modn = $modAsignatura->getResultadosAprendizaje();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ResultadosAprendizaje"] = true;
            }}
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getResultadosAprendizajeI();
            $modn = $modAsignatura->getResultadosAprendizajeI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["ResultadosAprendizajeI"] = true;
            }}
        }
        $DAOP = $factoriesDAO->createSAMetodologia();
        $DAOPM = $factoriesDAO->createSAModMetodologia();
        $asignatura = $DAOP->findMetodologia($idAsignatura);
        $modAsignatura = $DAOPM->findModMetodologia($idAsignatura);

        if($configuracion->getMetodologia() === '1'){
            if(sizeof($modAsignatura) !== 0){
            $n =  $asignatura->getMetodologia();
            $modn = $modAsignatura->getMetodologia();
          
            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["Metodologia"] = true;
            }
            
           
            $n =  $asignatura->getMetodologiaI();
            $modn = $modAsignatura->getMetodologiaI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["MetodologiaI"] = true;
            }
        }
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
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["CitasBibliograficas"] = true;
            }}
        }
        if($configuracion->getRecursosInternet() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRecursosInternet();
            $modn = $modAsignatura->getRecursosInternet();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["RecursosInternet"] = true;
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
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["RealizacionExamenes"] = true;
            }} if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionExamenesI();
            $modn = $modAsignatura->getRealizacionExamenesI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["RealizacionExamenesI"] = true;
            }}
        }
        if($configuracion->getCalificacionFinal() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getCalificacionFinal();
            $modn = $modAsignatura->getCalificacionFinal();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["CalificacionFinal"] = true;
            }} if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getCalificacionFinalI();
            $modn = $modAsignatura->getCalificacionFinalI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["CalificacionFinalI"] = true;
            }}
        }
        if($configuracion->getRealizacionActividades() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionActividades();
            $modn = $modAsignatura->getRealizacionActividades();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["RealizacionActividades"] = true;
            }} if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionActividadesI();
            $modn = $modAsignatura->getRealizacionActividadesI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["RealizacionActividadesI"] = true;
            }}
        }
        if($configuracion->getRealizacionLaboratorio() === '1'){
            if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionLaboratorio();
            $modn = $modAsignatura->getRealizacionLaboratorio();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["RealizacionLaboratorio"] = true;
            }} if(sizeof($modAsignatura)!== 0){
            $n =  $asignatura->getRealizacionLaboratorioI();
            $modn = $modAsignatura->getRealizacionLaboratorioI();

            $n = explode(" ", $n);
            $modn = explode(" ", $modn);
            if(sizeof($n) !== sizeof($modn)){
                $comparacion["RealizacionLaboratorioI"] = true;
            }}
        }
        return $comparacion;
        
    }
}