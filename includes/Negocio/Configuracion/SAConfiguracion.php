<?php

namespace es\ucm;

interface SAConfiguracion
{

    public static function findConfiguracion($idAsignatura);

    public static function createConfiguracion($configuracion);

    public static function updateConfiguracion($configuracion);

    public static function deleteConfiguracion($idAsignatura);
}
