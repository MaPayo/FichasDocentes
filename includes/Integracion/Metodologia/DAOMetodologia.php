<?php
namespace es\ucm;

interface DAOMetodologia{
    public static function findMetodologia($idAsignatura);

    public static function createMetodologia($Metodologia);

    public static function updateMetodologia($Metodologia);
    
    public static function deleteMetodologia($idAsignatura);
}