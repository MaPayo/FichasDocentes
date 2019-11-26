<?php
namespace es\ucm;

interface SAAdministrador{

    public static function findAdministrador($email);

    public static function createAdministrador($email,$nombre);

    public static function updateAdministrador($email,$nombre);
    
    public static function deleteAdministrador($email);

}