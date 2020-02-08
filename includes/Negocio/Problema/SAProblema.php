<?php

namespace es\ucm;

interface SAProblema{

    public static function findProblema($idAsignatura);

    public static function createProblema($problema);

    public static function updateProblema($problema);
    
    public static function deleteProblema($idAsignatura);

}