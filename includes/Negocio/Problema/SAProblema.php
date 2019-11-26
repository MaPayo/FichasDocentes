<?php

namespace es\ucm;

interface SAProblema{

    public static function findProblema($idAsignatura);

    public static function createProblema($creditos,$presencial,$idAsignatura);

    public static function updateProblema($creditos,$presencial,$idAsignatura);
    
    public static function deleteProblema($idAsignatura);

}