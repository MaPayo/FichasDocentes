<?php

namespace es\ucm;

require_once('includes/Integracion/Evaluacion/DAOEvaluacion.php');

class DAOEvaluacionImplements implements DAOEvaluacion
{
    public static function findEvaluacion($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM evaluacion WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createEvaluacion($evaluacion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO evaluacion (IdEvaluacion,RealizacionExamenes,RealizacionExamenesi,PesoExamenes,RealizacionActividades,RealizacionActividadesi,PesoActividades,RealizacionLaboratorio,RealizacionLaboratorioi,PesoLaboratorio,CalificacionFinal,CalificacionFinali,IdAsignatura) 
        VALUES (:idEvaluacion, :realizacionExamenes, :realizacionExamenesI, :pesoExamenes, :realizacionActividades, :realizacionActividadesI, :pesoActividades, :realizacionLaboratorio, :realizacionLaboratorioI, :pesoLaboratorio, :calificacionFinal, :calificacionFinalI, :idAsignatura)";
        $values = array(
            ':idEvaluacion' => $evaluacion->getIdEvaluacion(),
            ':realizacionExamenes' => $evaluacion->getRealizacionExamenes(),
            ':realizacionExamenesI' => $evaluacion->getRealizacionExamenesI(),
            ':pesoExamenes' => $evaluacion->getPesoExamenes(),
            ':realizacionActividades' => $evaluacion->getRealizacionActividades(),
            ':realizacionActividadesI' => $evaluacion->getRealizacionActividadesI(),
            ':pesoActividades' => $evaluacion->getPesoActividades(),
            ':realizacionLaboratorio' => $evaluacion->getRealizacionLaboratorio(),
            ':realizacionLaboratorio' => $evaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $evaluacion->getPesolaboratorio(),
            ':calificacionFinal' => $evaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $evaluacion->getCalificacionFinalI(),
            ':idAsignatura' => $evaluacion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateEvaluacion($evaluacion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE evaluacion SET IdEvaluacion = :idEvaluacion, RealizacionExamenes = :realizacionExamenes,RealizacionExamenesi = :realizacionExamenesI, PesoExamenes = :pesoExamenes,RealizacionActividades = :realizacionActividades,RealizacionActividadesi = :realizacionActividadesI,PesoActividades = :pesoActividades,RealizacionLaboratorio = :RealizacionLaboratorio,RealizacionLaboratorioi = :realizacionLaboratorioI,PesoLaboratorio = :pesoLaboratorio,CalificacionFinal = :calificacionFinal,CalificacionFinali = :calificacionFinali,IdAsignatura = :idAsignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(
            ':idEvaluacion' => $evaluacion->getIdEvaluacion(),
            ':realizacionExamenes' => $evaluacion->getRealizacionExamenes(),
            ':realizacionExamenesI' => $evaluacion->getRealizacionExamenesI(),
            ':pesoExamenes' => $evaluacion->getPesoExamenes(),
            ':realizacionActividades' => $evaluacion->getRealizacionActividades(),
            ':realizacionActividadesI' => $evaluacion->getRealizacionActividadesI(),
            ':pesoActividades' => $evaluacion->getPesoActividades(),
            ':realizacionLaboratorio' => $evaluacion->getRealizacionLaboratorio(),
            ':realizacionLaboratorio' => $evaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $evaluacion->getPesolaboratorio(),
            ':calificacionFinal' => $evaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $evaluacion->getCalificacionFinalI(),
            ':idAsignatura' => $evaluacion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteEvaluacion($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM evaluacion WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
