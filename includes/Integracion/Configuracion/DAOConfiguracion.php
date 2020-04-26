<?php
namespace es\ucm;

interface DAOConfiguracion{
    public static function findConfiguracion($idAsignatura);

    public static function createConfiguracion($Configuracion);

    public static function updateConfiguracion($Configuracion);
    
    public static function deleteConfiguracion($idAsignatura);
}