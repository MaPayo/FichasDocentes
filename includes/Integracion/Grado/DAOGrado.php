<?php
namespace es\ucm;

interface DAOGrado{
    public static function findGrado($codigoGrado);

    public static function createGrado($Grado);

    public static function updateGrado($Grado);
    
    public static function deleteGrado($codigoGrado);
    
    public static function listGrado();
}