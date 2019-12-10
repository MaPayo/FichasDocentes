<?php
namespace es\ucm;

interface DAOGrado{
    public static function findGrado($idGrado);

    public static function createGrado($Grado);

    public static function updateGrado($Grado);
    
    public static function deleteGrado($idGrado);
}