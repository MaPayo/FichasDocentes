<?php

namespace es\ucm;

interface DAOBibliografia
{
    public static function findBibliografia($idAsignatura);

    public static function createBibliografia($bibliografia);

    public static function updateBibliografia($bibliografia);

    public static function deleteBibliografia($idAsignatura);
}
