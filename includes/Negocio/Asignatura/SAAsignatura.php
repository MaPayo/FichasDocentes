<?php
namespace es\ucm;
interface SAAsignatura{

    public static function findAsignatura($idAsignatura);

    public static function createAsignatura($DAOAsignatura);

    public static function updateAsignatura($DAOAsignatura);
    
    public static function deleteAsignatura($idAsignatura);

}