<?php
namespace es\ucm;

interface DAOTeorico{
    public static function findTeorico($idAsignatura);

    public static function createTeorico($Teorico);

    public static function updateTeorico($Teorico);
    
    public static function deleteTeorico($idAsignatura);
}