<?php
namespace es\ucm;

interface DAOConfiguracion{
    public static function findConfiguracion($idConfiguracion);

    public static function createConfiguracion($Configuracion);

    public static function updateConfiguracion($Configuracion);
    
    public static function deleteConfiguracion($idConfiguracion);
}