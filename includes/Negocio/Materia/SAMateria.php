<?php

namespace es\ucm;

interface SAMateria
{

    public static function findMateria($idMateria);

    public static function createMateria($materia);

    public static function updateMateria($materia);

    public static function deleteMateria($idMateria);

    public static function listMateria($idModulo);
}
