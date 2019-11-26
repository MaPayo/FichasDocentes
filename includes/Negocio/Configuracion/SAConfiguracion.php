<?php
namespace es\ucm;

interface SAConfiguracion{

    public static function findConfiguracion($idAsignatura);

    public static function createConfiguracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$GrupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura);

    public static function updateConfiguracion($conocimientosPrevios,$breveDescripcion,$programaDetallado,$generales,$especificas,$basicasYTransversales,$resultadosAprendizaje,$metodologia,$citasBibliograficas,$recursosInternet,$GrupoLaboratorio,$realizacionExamenes,$calificacionFinal,$realizacionActividades,$realizacionLaboratorio,$idAsignatura);
    
    public static function deleteConfiguracion($idAsignatura);

}