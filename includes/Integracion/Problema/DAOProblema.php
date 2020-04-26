<?php
namespace es\ucm;

interface DAOProblema{
    public static function findProblema($idAsignatura);

    public static function createProblema($problema);

    public static function updateProblema($problema);
    
    public static function deleteProblema($idAsignatura);
}