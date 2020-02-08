<?php
namespace es\ucm;
interface SAAsignatura{

    public static function findAsignatura($idAsignatura);

    public static function createAsignatura($asignatura);

    public static function updateAsignatura($asignatura);
    
    public static function deleteAsignatura($idAsignatura);

}