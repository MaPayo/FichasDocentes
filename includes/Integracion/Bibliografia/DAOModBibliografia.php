<?php
namespace es\ucm;

interface DAOModBibliografia{
    public static function findModBibliografia($idModAsignatura);

    public static function createModBibliografia($modBibliografia);

    public static function updateModBibliografia($modBibliografia);
    
    public static function deleteModBibliografia($idModAsignatura);
}