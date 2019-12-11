<?php
namespace es\ucm;

interface DAOModAsignatura{
    public static function findModAsignatura($idModAsignatura);

    public static function createModAsignatura($ModAsignatura);

    public static function updateModAsignatura($ModAsignatura);
    
    public static function deleteModAsignatura($idModAsignatura);
}