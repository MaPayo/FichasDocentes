<?php
namespace es\ucm;

interface DAOModMetodologia{
    public static function findModMetodologia($idModMetodologia);

    public static function createModMetodologia($ModMetodologia);

    public static function updateModMetodologia($ModMetodologia);
    
    public static function deleteModMetodologia($idModMetodologia);
}