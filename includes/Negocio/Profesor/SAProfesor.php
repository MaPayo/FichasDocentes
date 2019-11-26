<?php

namespace es\ucm;

interface SAProfesor{

    public static function findProfesor($emailProfesor);

    public static function createProfesor($emailProfesor,$nombre,$departamento,$despacho,$tutoria,$facultad);

    public static function updateProfesor($emailProfesor,$nombre,$departamento,$despacho,$tutoria,$facultad);
    
    public static function deleteProfesor($emailProfesor);

}