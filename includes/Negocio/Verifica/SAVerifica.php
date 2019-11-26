<?php

namespace es\ucm;

interface SAVerifica{

    public static function findVerifica($idAsignatura);

    public static function createVerifica($maximoExamenes,$minimoExamenes,$maximoActividades,$minimoActividades,$maximoLaboratorio,$minimoLaboratorio,$idAsignatura);

    public static function updateVerifica($maximoExamenes,$minimoExamenes,$maximoActividades,$minimoActividades,$maximoLaboratorio,$minimoLaboratorio,$idAsignatura);
    
    public static function deleteVerifica($idAsignatura);

}