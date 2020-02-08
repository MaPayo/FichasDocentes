<?php

namespace es\ucm;

interface SAProfesor{

    public static function findProfesor($emailProfesor);

    public static function createProfesor($profesor);

    public static function updateProfesor($profesor);
    
    public static function deleteProfesor($emailProfesor);

}