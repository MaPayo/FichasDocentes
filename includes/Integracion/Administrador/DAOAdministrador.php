<?php
namespace es\ucm;

interface DAOAdministrador{
    public static function findAdministrador($idAdministrador);

    public static function createAdministrador($Administrador);

    public static function updateAdministrador($Administrador);
    
    public static function deleteAdministrador($idAdministrador);
}