<?php

namespace es\ucm;

interface SAModProgramaAsignatura{

    public static function findModProgramaAsignatura($idAsignatura);

    public static function createModProgramaAsignatura($programaAsignatura);

    public static function updateModProgramaAsignatura($programaAsignatura);
    
    public static function deleteModProgramaAsignatura($idAsignatura);

}