<?php

namespace es\ucm;

class SAConfiguracionImplements implements SAConfiguracion{

    private static $DAOConfiguracion;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOConfiguracion=$factoriesDAO->createDAOConfiguracion(); 
    }
    
    
    public static function findConfiguracion($idAsignatura){
        $configuracion=$DAOConfiguracion->findConfiguracion($idAsignatura);
        return $configuracion;
    }

    public static function createConfiguracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$GrupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura){
        $configuracion=new \es\ucm\Configuracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$GrupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura);
        $configuracion=$DAOConfiguracion->createConfiguracion($configuracion);
        return $configuracion;
    }

    public static function updateConfiguracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$GrupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura){
        $configuracion=new \es\ucm\Configuracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$GrupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura);
        $configuracion=$DAOConfiguracion->updateConfiguracion($configuracion);
        return $configuracion;
    }

    public static function deleteConfiguracion($idAsignatura){
        $configuracion=$DAOConfiguracion->deleteConfiguracion($idAsignatura);
        return $configuracion;
    }

}