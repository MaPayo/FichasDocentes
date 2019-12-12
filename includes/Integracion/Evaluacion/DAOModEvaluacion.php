<?php
namespace es\ucm;

interface DAOModEvaluacion{
    public static function findModEvaluacion($idModEvaluacion);

    public static function createModEvaluacion($ModEvaluacion);

    public static function updateModEvaluacion($ModEvaluacion);
    
    public static function deleteModEvaluacion($idModEvaluacion);
}