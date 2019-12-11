<?php
namespace es\ucm;

class DAOEvaluacionImplements implements DAOEvaluacion{


    public static function findEvaluacion($idEvaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM evaluacion WHERE IdEvaluacion = :idEvaluacion";
        $values=array(':idEvaluacion' => $idEvaluacion);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createEvaluacion($evaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO evaluacion (IdEvaluacion,RealizacionExamenes,RealizacionExamenesI,PesoExamenes,CalificacionFinal,CalificacionFinalI,RealizacionActividades,RealizacionActividadesI,PesoActividades,RealizacionLaboratorio,RealizacionLaboratorioI,PesoLaboratorio,IdAsignatura) 
        VALUES (:idEvaluacion, :realizacionExamenes, :realizacionExamenesI, :pesoExamenes, :calificacionFinal, :calificacionFinalI, :realizacionActividades, :realizacionActividadesI, :pesoActividades, :realizacionLaboratorio, :realizacionLaboratorioI, :pesoLaboratorio, :idAsignatura)";
        $values=array(':idEvaluacion' => $evaluacion->getIdEvaluacion(),
            ':realizacionExamenes' => $evaluacion->getRealizacionExamenes(),
            ':realizacionExamenesI' => $evaluacion->getRealizacionExamenesI(),
            ':pesoExamenes' => $evaluacion->getPesoExamenes(),
            ':calificacionFinal' => $evaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $evaluacion->getCalificacionFinalI(),
            ':realizacionActividades' => $evaluacion->getRealizacionActividades(),
            ':realizacionActividadesI' => $evaluacion->getRealizacionActividadesI(),
            ':pesoActividades' => $evaluacion->getPesoActividades(),
            ':realizacionLaboratorio' => $evaluacion->getRealizacionLaboratorio(),
            ':realizacionLaboratorio' => $evaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $evaluacion->getPesolaboratorio(),
            ':idAsignatura' => $evaluacion->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateEvaluacion($evaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE evaluacion SET IdEvaluacion = :idEvaluacion, RealizacionExamenes = :realizacionExamenes,RealizacionExamenesI = :realizacionExamenesI, PesoExamenes = :pesoExamenes,CalificacionFinal = :calificacionFinal,CalificacionFinalI = :calificacionFinalI,RealizacionActividades = :realizacionActividades,RealizacionActividadesI = :realizacionActividadesI,PesoActividades = :pesoActividades,RealizacionLaboratorio = :RealizacionLaboratorio,RealizacionLaboratorioI = :realizacionLaboratorioI,PesoLaboratorio = :pesoLaboratorio,IdAsignatura = :idAsignatura WHERE IdEvaluacion = :idEvaluacion";
        $values=array(':idEvaluacion' => $evaluacion->getIdEvaluacion(),
            ':realizacionExamenes' => $evaluacion->getRealizacionExamenes(),
            ':realizacionExamenesI' => $evaluacion->getRealizacionExamenesI(),
            ':pesoExamenes' => $evaluacion->getPesoExamenes(),
            ':calificacionFinal' => $evaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $evaluacion->getCalificacionFinalI(),
            ':realizacionActividades' => $evaluacion->getRealizacionActividades(),
            ':realizacionActividadesI' => $evaluacion->getRealizacionActividadesI(),
            ':pesoActividades' => $evaluacion->getPesoActividades(),
            ':realizacionLaboratorio' => $evaluacion->getRealizacionLaboratorio(),
            ':realizacionLaboratorio' => $evaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $evaluacion->getPesolaboratorio(),
            ':idAsignatura' => $evaluacion->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteEvaluacion($idEvaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM evaluacion WHERE IdEvaluacion = :idEvaluacion";
        $values=array(':idEvaluacion' => $idEvaluacion);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}