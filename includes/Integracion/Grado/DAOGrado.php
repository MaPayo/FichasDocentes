<?php
namespace es\ucm;

interface DAOGrado{
    public static function findGrado($codigoGrado);

    public static function createGrado($grado);

    public static function updateGrado($grado);
    
    public static function deleteGrado($codigoGrado);
    
    public static function listGrado();
}