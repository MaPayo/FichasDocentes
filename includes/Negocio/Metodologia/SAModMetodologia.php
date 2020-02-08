<?php

namespace es\ucm;

interface SAModMetodologia{

    public static function findModMetodologia($idAsignatura);

    public static function createModMetodologia($metodologia);

    public static function updateModMetodologia($metodologia);
    
    public static function deleteModMetodologia($idAsignatura);

}