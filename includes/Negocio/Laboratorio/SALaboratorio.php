<?php

namespace es\ucm;

interface SALaboratorio
{

    public static function findLaboratorio($idAsignatura);

    public static function createLaboratorio($laboratorio);

    public static function updateLaboratorio($laboratorio);

    public static function deleteLaboratorio($idAsignatura);
}
