<?php

namespace es\ucm;

interface SAUsuario{

    public static function findUsuario($email);

    public static function createUsuario($usuario);

    public static function updateUsuario($usuario);
    
    public static function deleteUsuario($email);

}