<?php

namespace es\ucm;

interface SALaboratorio{

    public static function findLaboratorio($idAsignatura);

    public static function createLaboratorio($creditos,$presencial,$idAsignatura);

    public static function updateLaboratorio($creditos,$presencial,$idAsignatura);
    
    public static function deleteLaboratorio($idAsignatura);

}