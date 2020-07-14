<?php

namespace es\ucm;

interface SAVerifica
{

    public static function findVerifica($idAsignatura);

    public static function createVerifica($verifica);

    public static function updateVerifica($verifica);

    public static function deleteVerifica($idAsignatura);
}
