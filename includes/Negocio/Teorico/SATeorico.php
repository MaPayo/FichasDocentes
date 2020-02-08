<?php

namespace es\ucm;

interface SATeorico{

    public static function findTeorico($idAsignatura);

    public static function createTeorico($teorico);

    public static function updateTeorico($teorico);
    
    public static function deleteTeorico($idAsignatura);

}