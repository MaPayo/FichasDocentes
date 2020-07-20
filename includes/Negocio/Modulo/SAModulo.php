<?php

namespace es\ucm;

interface SAModulo
{

    public static function findModulo($idModulo);

    public static function createModulo($modulo);

    public static function updateModulo($modulo);

    public static function deleteModulo($idModulo);
}
