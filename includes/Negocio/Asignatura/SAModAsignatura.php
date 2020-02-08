<?php

namespace es\ucm;

interface SAModAsignatura{

    public static function findModAsignatura($idAsignatura);

    public static function createModAsignatura($asignatura);

    public static function updateModAsignatura($asignatura);
    
    public static function deleteModAsignatura($idAsignatura);

}