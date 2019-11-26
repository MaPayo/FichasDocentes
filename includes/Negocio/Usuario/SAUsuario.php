<?php

namespace es\ucm;

interface SAUsuario{

    public static function findUsuario($email);

    public static function createUsuario($email,$password);

    public static function updateUsuario($email,$password);
    
    public static function deleteUsuario($email);

}