<?php
namespace es\ucm;

interface DAOModMetodologia{
    public static function findModMetodologia($idModAsignatura);

    public static function createModMetodologia($modMetodologia);

    public static function updateModMetodologia($modMetodologia);
    
    public static function deleteModMetodologia($idModAsignatura);
}