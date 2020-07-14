<?php
namespace es\ucm;

interface DAOMetodologia{
    public static function findMetodologia($idAsignatura);

    public static function createMetodologia($metodologia);

    public static function updateMetodologia($metodologia);
    
    public static function deleteMetodologia($idAsignatura);
}