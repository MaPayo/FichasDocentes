<?php
namespace es\ucm;

interface DAOLaboratorio{
    public static function findLaboratorio($idAsignatura);

    public static function createLaboratorio($laboratorio);

    public static function updateLaboratorio($laboratorio);
    
    public static function deleteLaboratorio($idAsignatura);
}