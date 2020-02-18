<?php

namespace es\ucm;

require_once('includes/Negocio/Configuracion/SAConfiguracion.php');
require_once('includes/Negocio/Configuracion/Configuracion.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAConfiguracionImplements implements SAConfiguracion{
    
    public static function findConfiguracion($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOConfiguracion=$factoriesDAO->createDAOConfiguracion(); 
        $configuracion=$DAOConfiguracion->findConfiguracion($idAsignatura);
        return $configuracion;
    }

    public static function createConfiguracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$grupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOConfiguracion=$factoriesDAO->createDAOConfiguracion(); 
        $configuracion=new \es\ucm\Configuracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$grupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura);
        $configuracion=$DAOConfiguracion->createConfiguracion($configuracion);
        return $configuracion;
    }

    public static function updateConfiguracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$GrupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOConfiguracion=$factoriesDAO->createDAOConfiguracion(); 
        $configuracion=new \es\ucm\Configuracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$GrupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura);
        $configuracion=$DAOConfiguracion->updateConfiguracion($configuracion);
        return $configuracion;
    }

    public static function deleteConfiguracion($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOConfiguracion=$factoriesDAO->createDAOConfiguracion(); 
        $configuracion=$DAOConfiguracion->deleteConfiguracion($idAsignatura);
        return $configuracion;
    }

}