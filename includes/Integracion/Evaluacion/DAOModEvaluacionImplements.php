<?php
namespace es\ucm;
require_once('includes/Integracion/Evaluacion/DAOModEvaluacion.php');

class DAOModEvaluacionImplements implements DAOModEvaluacion{


    public static function findModEvaluacion($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modEvaluacion WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModEvaluacion($modEvaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modEvaluacion (IdEvaluacion, RealizacionExamenes, RealizacionExamenesI, PesoExamenes, CalificacionFinal, CalificacionFinalI, RealizacionActividades, RealizacionActividadesI, PesoActividades, RealizacionLaboratorio, RealizacionLaboratorioI, PesoLaboratorio, IdModAsignatura) 
        VALUES (:idEvaluacion, :realizacionExamenes, :realizacionExamenesI, :pesoExamenes, :calificacionFinal, :calificacionFinalI, :realizacionActividades, :realizacionActividadesI, :pesoActividades, :realizacionLaboratorio, :realizacionLaboratorioI, :pesoLaboratorio, :idModAsignatura)";
        $values=array(':idEvaluacion' => $modEvaluacion->getIdEvaluacion(),
            ':realizacionExamenes' => $modEvaluacion->getRealizacionExamenes(),
            ':realizacionExamenesI' => $modEvaluacion->getRealizacionExamenesI(),
            ':pesoExamenes' => $modEvaluacion->getPesoExamenes(),
            ':calificacionFinal' => $modEvaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $modEvaluacion->getCalificacionFinalI(),
            ':realizacionActividades' => $modEvaluacion->getRealizacionActividades(),
            ':realizacionActividadesI' => $modEvaluacion->getRealizacionActividadesI(),
            ':pesoActividades' => $modEvaluacion->getPesoActividades(),
            ':realizacionLaboratorio' => $modEvaluacion->getRealizacionLaboratorio(),
            ':realizacionLaboratorioI' => $modEvaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $modEvaluacion->getPesolaboratorio(),
            ':idModAsignatura' => $modEvaluacion->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateModEvaluacion($modEvaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modEvaluacion SET IdEvaluacion = :idEvaluacion, RealizacionExamenes = :realizacionExamenes, RealizacionExamenesI = :realizacionExamenesI, PesoExamenes = :pesoExamenes, CalificacionFinal = :calificacionFinal, CalificacionFinalI = :calificacionFinalI, RealizacionActividades = :realizacionActividades, RealizacionActividadesI = :realizacionActividadesI, PesoActividades = :pesoActividades, RealizacionLaboratorio = :realizacionLaboratorio, RealizacionLaboratorioI = :realizacionLaboratorioI, PesoLaboratorio = :pesoLaboratorio, IdModAsignatura = :idModAsignatura WHERE IdEvaluacion = :idEvaluacion";
        $values=array(':idEvaluacion' => $modEvaluacion->getIdEvaluacion(),
            ':realizacionExamenes' => $modEvaluacion->getRealizacionExamenes(),
            ':realizacionExamenesI' => $modEvaluacion->getRealizacionExamenesI(),
            ':pesoExamenes' => $modEvaluacion->getPesoExamenes(),
            ':calificacionFinal' => $modEvaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $modEvaluacion->getCalificacionFinalI(),
            ':realizacionActividades' => $modEvaluacion->getRealizacionActividades(),
            ':realizacionActividadesI' => $modEvaluacion->getRealizacionActividadesI(),
            ':pesoActividades' => $modEvaluacion->getPesoActividades(),
            ':realizacionLaboratorio' => $modEvaluacion->getRealizacionLaboratorio(),
            ':realizacionLaboratorioI' => $modEvaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $modEvaluacion->getPesolaboratorio(),
            ':idModAsignatura' => $modEvaluacion->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteModEvaluacion($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modEvaluacion WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}