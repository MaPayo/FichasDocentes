<?php
namespace es\ucm;

interface SACompetenciaAsignatura{

    public static function findCompetenciaAsignatura($idAsignatura);

    public static function createCompetenciaAsignatura($generales,$generalesI,$especificas,$especificasI,$basicasYTransversales,$basicasYTransversalesI,$resultadosAprendizaje,$resultadosAprendizajeI,$idAsignatura);

    public static function updateCompetenciaAsignatura($generales,$generalesI,$especificas,$especificasI,$basicasYTransversales,$basicasYTransversalesI,$resultadosAprendizaje,$resultadosAprendizajeI,$idAsignatura);
    
    public static function deleteCompetenciaAsignatura($idAsignatura);

}