<?php
namespace es\ucm;

interface DAOTeorico{
    public static function findTeorico($idTeorico);

    public static function createTeorico($Teorico);

    public static function updateTeorico($Teorico);
    
    public static function deleteTeorico($idTeorico);
}