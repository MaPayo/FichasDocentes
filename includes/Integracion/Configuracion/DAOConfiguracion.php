<?php
namespace es\ucm;

interface DAOConfiguracion{
    public static function findConfiguracion($idAsignatura);

    public static function createConfiguracion($configuracion);

    public static function updateConfiguracion($configuracion);
    
    public static function deleteConfiguracion($idAsignatura);
}