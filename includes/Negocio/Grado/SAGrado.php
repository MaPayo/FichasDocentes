<?php
namespace es\ucm;

interface SAGrado{

    public static function findGrado($codigoGrado);

    public static function createGrado($codigoGrado,$nombreGrado);

    public static function updateGrado($codigoGrado,$nombreGrado);
    
    public static function deleteGrado($codigoGrado);

}