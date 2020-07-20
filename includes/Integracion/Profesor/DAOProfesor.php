<?php

namespace es\ucm;

interface DAOProfesor
{
    public static function findProfesor($email);

    public static function createProfesor($profesor);

    public static function updateProfesor($profesor);

    public static function deleteProfesor($email);
}
