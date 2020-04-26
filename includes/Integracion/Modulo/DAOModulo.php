<?php
namespace es\ucm;

interface DAOModulo{
    public static function findModulo($idModulo);

    public static function createModulo($Modulo);

    public static function updateModulo($Modulo);
    
    public static function deleteModulo($idModulo);
}