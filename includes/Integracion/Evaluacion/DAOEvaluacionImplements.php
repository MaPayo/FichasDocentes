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
        $sql = "INSERT INTO evaluacion (IdEvaluacion,RealizacionExamenes,RealizacionExamenesi,PesoExamenes,RealizacionActividades,RealizacionActividadesi,PesoActividades,RealizacionLaboratorio,RealizacionLaboratorioi,PesoLaboratorio,CalificacionFinalO,CalificacionFinalOi,CalificacionFinalE,CalificacionFinalEi,IdAsignatura) 
        VALUES (:idEvaluacion, :realizacionExamenes, :realizacionExamenesI, :pesoExamenes, :realizacionActividades, :realizacionActividadesI, :pesoActividades, :realizacionLaboratorio, :realizacionLaboratorioI, :pesoLaboratorio, :calificacionFinalO, :calificacionFinalOI, :calificacionFinalE, :calificacionFinalEI, :idAsignatura)";
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
            ':calificacionFinalO' => $evaluacion->getCalificacionFinalO(),
            ':calificacionFinalOI' => $evaluacion->getCalificacionFinalOI(),
            ':calificacionFinalE' => $evaluacion->getCalificacionFinalE(),
            ':calificacionFinalEI' => $evaluacion->getCalificacionFinalEI(),
            ':idAsignatura' => $evaluacion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateEvaluacion($evaluacion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE evaluacion SET IdEvaluacion = :idEvaluacion, RealizacionExamenes = :realizacionExamenes,RealizacionExamenesi = :realizacionExamenesI, PesoExamenes = :pesoExamenes,RealizacionActividades = :realizacionActividades,RealizacionActividadesi = :realizacionActividadesI,PesoActividades = :pesoActividades,RealizacionLaboratorio = :RealizacionLaboratorio,RealizacionLaboratorioi = :realizacionLaboratorioI,PesoLaboratorio = :pesoLaboratorio,CalificacionFinalO = :calificacionFinalO,CalificacionFinalOi = :calificacionFinalOi,CalificacionFinalE = :calificacionFinalE,CalificacionFinalEI = :calificacionFinalEI,IdAsignatura = :idAsignatura WHERE IdAsignatura = :idAsignatura";
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
            ':calificacionFinalO' => $evaluacion->getCalificacionFinalO(),
            ':calificacionFinalOI' => $evaluacion->getCalificacionFinalOI(),
            ':calificacionFinalE' => $evaluacion->getCalificacionFinalE(),
            ':calificacionFinalEI' => $evaluacion->getCalificacionFinalEI(),
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
