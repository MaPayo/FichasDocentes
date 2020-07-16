<?php
namespace es\ucm;
require_once('includes/Integracion/Evaluacion/DAOEvaluacion.php');

class DAOEvaluacionImplements implements DAOEvaluacion{


    public static function findEvaluacion($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM evaluacion WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

<<<<<<< Updated upstream
    public static function createEvaluacion($evaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO evaluacion (IdEvaluacion,RealizacionExamenes,RealizacionExamenesI,PesoExamenes,CalificacionFinal,CalificacionFinalI,RealizacionActividades,RealizacionActividadesI,PesoActividades,RealizacionLaboratorio,RealizacionLaboratorioI,PesoLaboratorio,IdAsignatura) 
        VALUES (:idEvaluacion, :realizacionExamenes, :realizacionExamenesI, :pesoExamenes, :calificacionFinal, :calificacionFinalI, :realizacionActividades, :realizacionActividadesI, :pesoActividades, :realizacionLaboratorio, :realizacionLaboratorioI, :pesoLaboratorio, :idAsignatura)";
        $values=array(':idEvaluacion' => $evaluacion->getIdEvaluacion(),
=======
    public static function createEvaluacion($evaluacion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO evaluacion (IdEvaluacion,RealizacionExamenes,RealizacionExamenesi,PesoExamenes,RealizacionActividades,RealizacionActividadesi,PesoActividades,RealizacionLaboratorio,RealizacionLaboratorioi,PesoLaboratorio,CalificacionFinal,CalificacionFinali,IdAsignatura) 
        VALUES (:idEvaluacion, :realizacionExamenes, :realizacionExamenesI, :pesoExamenes, :realizacionActividades, :realizacionActividadesI, :pesoActividades, :realizacionLaboratorio, :realizacionLaboratorioI, :pesoLaboratorio, :calificacionFinal, :calificacionFinalI, :idAsignatura)";
        $values = array(
            ':idEvaluacion' => $evaluacion->getIdEvaluacion(),
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            ':idAsignatura' => $evaluacion->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
=======
            ':calificacionFinal' => $evaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $evaluacion->getCalificacionFinalI(),
            ':idAsignatura' => $evaluacion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
>>>>>>> Stashed changes
        return $results;

    }

<<<<<<< Updated upstream
    public static function updateEvaluacion($evaluacion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE evaluacion SET IdEvaluacion = :idEvaluacion, RealizacionExamenes = :realizacionExamenes,RealizacionExamenesI = :realizacionExamenesI, PesoExamenes = :pesoExamenes,CalificacionFinal = :calificacionFinal,CalificacionFinalI = :calificacionFinalI,RealizacionActividades = :realizacionActividades,RealizacionActividadesI = :realizacionActividadesI,PesoActividades = :pesoActividades,RealizacionLaboratorio = :RealizacionLaboratorio,RealizacionLaboratorioI = :realizacionLaboratorioI,PesoLaboratorio = :pesoLaboratorio,IdAsignatura = :idAsignatura WHERE IdEvaluacion = :idEvaluacion";
        $values=array(':idEvaluacion' => $evaluacion->getIdEvaluacion(),
=======
    public static function updateEvaluacion($evaluacion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE evaluacion SET IdEvaluacion = :idEvaluacion, RealizacionExamenes = :realizacionExamenes,RealizacionExamenesi = :realizacionExamenesI, PesoExamenes = :pesoExamenes,RealizacionActividades = :realizacionActividades,RealizacionActividadesi = :realizacionActividadesI,PesoActividades = :pesoActividades,RealizacionLaboratorio = :RealizacionLaboratorio,RealizacionLaboratorioi = :realizacionLaboratorioI,PesoLaboratorio = :pesoLaboratorio,CalificacionFinal = :calificacionFinal,CalificacionFinali = :calificacionFinali,IdAsignatura = :idAsignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(
            ':idEvaluacion' => $evaluacion->getIdEvaluacion(),
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            ':idAsignatura' => $evaluacion->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
=======
            ':calificacionFinal' => $evaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $evaluacion->getCalificacionFinalI(),
            ':idAsignatura' => $evaluacion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
>>>>>>> Stashed changes
        return $results;
    }

    public static function deleteEvaluacion($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM evaluacion WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}