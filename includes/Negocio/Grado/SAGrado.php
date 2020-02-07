<?php
namespace es\ucm;

interface SAGrado{

    public static function findGrado($codigoGrado);

    public static function createGrado($grado);

    public static function updateGrado($grado);
    
    public static function deleteGrado($codigoGrado);

}