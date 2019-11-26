<?php

namespace es\ucm;

interface SATeorico{

    public static function findTeorico($idAsignatura);

    public static function createTeorico($creditos,$presencial,$idAsignatura);

    public static function updateTeorico($creditos,$presencial,$idAsignatura);
    
    public static function deleteTeorico($idAsignatura);

}