<?php

namespace es\ucm;

interface SAMetodologia{

    public static function findMetodologia($idAsignatura);

    public static function createMetodologia($metodologia,$metodologiaI,$idAsignatura);

    public static function updateMetodologia($metodologia,$metodologiaI,$idAsignatura);
    
    public static function deleteMetodologia($idAsignatura);

}