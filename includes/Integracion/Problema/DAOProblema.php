<?php
namespace es\ucm;

interface DAOProblema{
    public static function findProblema($idAsignatura);

    public static function createProblema($Problema);

    public static function updateProblema($Problema);
    
    public static function deleteProblema($idAsignatura);
}