<?php

namespace es\ucm;

interface DAOTeorico
{
    public static function findTeorico($idAsignatura);

    public static function createTeorico($teorico);

    public static function updateTeorico($teorico);

    public static function deleteTeorico($idAsignatura);
}
