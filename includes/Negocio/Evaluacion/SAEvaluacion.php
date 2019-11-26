<?php
namespace es\ucm;

interface SAEvaluacion{

    public static function findEvaluacion($idAsignatura);

    public static function createEvaluacion($realizacionExamenes,$realizacionExamenesI,$pesoExamenes,$calificacionFinal,$calificacionFinalI,$realizacionActividades,$realizacionActividadesI,$pesoActividades,$realizacionLaboratorio,$realizacionLaboratorioI,$pesoLaboratorio,$idAsignatura);

    public static function updateEvaluacion($realizacionExamenes,$realizacionExamenesI,$pesoExamenes,$calificacionFinal,$calificacionFinalI,$realizacionActividades,$realizacionActividadesI,$pesoActividades,$realizacionLaboratorio,$realizacionLaboratorioI,$pesoLaboratorio,$idAsignatura);
    
    public static function deleteEvaluacion($idAsignatura);

}