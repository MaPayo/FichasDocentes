<?php

namespace es\ucm;

interface SAModAsignatura{

    public static function findModAsignatura($idAsignatura);

    public static function createModAsignatura($idModAsignatura,$fechaMod,$emailMod,$idAsignatura);

    public static function updateModAsignatura($idModAsignatura,$fechaMod,$emailMod,$idAsignatura);
    
    public static function deleteModAsignatura($idAsignatura);

}