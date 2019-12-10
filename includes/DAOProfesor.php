<?php
namespace es\ucm;

interface DAOProfesor{
    public static function findProfesor($idProfesor);

    public static function createProfesor($Profesor);

    public static function updateProfesor($Profesor);
    
    public static function deleteProfesor($idProfesor);
}