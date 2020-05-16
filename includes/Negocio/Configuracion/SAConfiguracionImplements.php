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
        if ($configuracion && count($configuracion) === 1) {
            $configuracion = new Configuracion(
                $configuracion[0]['IdConfiguracion'],
                $configuracion[0]['ConocimientosPrevios'],
                $configuracion[0]['BreveDescripcion'],
                $configuracion[0]['ProgramaDetallado'],
                $configuracion[0]['ComGenerales'],
                $configuracion[0]['ComEspecificas'],
                $configuracion[0]['ComBasicas'],
                $configuracion[0]['ResultadosAprendizaje'],
                $configuracion[0]['Metodologia'],
                $configuracion[0]['CitasBibliograficas'],
                $configuracion[0]['RecursosInternet'],
                $configuracion[0]['RealizacionExamenes'],
                $configuracion[0]['CalificacionFinal'],
                $configuracion[0]['RealizacionActividades'],
                $configuracion[0]['RealizacionLaboratorio'],
                $configuracion[0]['IdAsignatura']
            );
        }
        return $configuracion;
    }

    public static function createConfiguracion($configuracion){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOConfiguracion=$factoriesDAO->createDAOConfiguracion(); 
        $configuracion=$DAOConfiguracion->createConfiguracion($configuracion);
        return $configuracion;
    }

    public static function updateConfiguracion($configuracion){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOConfiguracion=$factoriesDAO->createDAOConfiguracion(); 
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