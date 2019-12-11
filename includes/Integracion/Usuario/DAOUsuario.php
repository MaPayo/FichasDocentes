<?php
namespace es\ucm;

interface DAOUsuario{
    public static function findUsuario($idUsuario);

    public static function createUsuario($Usuario);

    public static function updateUsuario($Usuario);
    
    public static function deleteUsuario($idUsuario);
}