<?php
namespace es\ucm;

class DAOModEvaluacionImplements implements DAOModEvaluacion{


    public static function findModEvaluacion($idEvaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modEvaluacion WHERE IdEvaluacion = :idEvaluacion";
        $values=array(':idEvaluacion' => $idEvaluacion);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModEvaluacion($modEvaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modEvaluacion (IdEvaluacion,RealizacionExamenes,RealizacionExamenesI,PesoExamenes,CalificacionFinal,CalificacionFinalI,RealizacionActividades,RealizacionActividadesI,PesoActividades,RealizacionLaboratorio,RealizacionLaboratorioI,PesoLaboratorio,IdModAsignatura) 
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
            ':realizacionLaboratorio' => $modEvaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $modEvaluacion->getPesolaboratorio(),
            ':idModAsignatura' => $modEvaluacion->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModEvaluacion($modEvaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modEvaluacion SET IdEvaluacion = :idEvaluacion, RealizacionExamenes = :realizacionExamenes,RealizacionExamenesI = :realizacionExamenesI, PesoExamenes = :pesoExamenes,CalificacionFinal = :calificacionFinal,CalificacionFinalI = :calificacionFinalI,RealizacionActividades = :realizacionActividades,RealizacionActividadesI = :realizacionActividadesI,PesoActividades = :pesoActividades,RealizacionLaboratorio = :RealizacionLaboratorio,RealizacionLaboratorioI = :realizacionLaboratorioI,PesoLaboratorio = :pesoLaboratorio,IdModAsignatura = :idModAsignatura WHERE IdEvaluacion = :idEvaluacion";
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
            ':realizacionLaboratorio' => $modEvaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $modEvaluacion->getPesolaboratorio(),
            ':idModAsignatura' => $modEvaluacion->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModEvaluacion($idEvaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modEvaluacion WHERE IdEvaluacion = :idEvaluacion";
        $values=array(':idEvaluacion' => $idEvaluacion);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}