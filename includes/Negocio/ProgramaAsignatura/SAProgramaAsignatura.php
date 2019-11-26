<?php

namespace es\ucm;

interface SAProgramaAsignatura{

    public static function findProgramaAsignatura($idAsignatura);

    public static function createProgramaAsignatura($conocimientosPrevios,$conocimientosPreviosI,$breveDescripcion,$breveDescripcionI,$programaDetallado,$programaDetalladoI,$idAsignatura);

    public static function updateProgramaAsignatura($conocimientosPrevios,$conocimientosPreviosI,$breveDescripcion,$breveDescripcionI,$programaDetallado,$programaDetalladoI,$idAsignatura);
    
    public static function deleteProgramaAsignatura($idAsignatura);

}