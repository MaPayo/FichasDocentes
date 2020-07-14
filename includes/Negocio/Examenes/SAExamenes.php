<?php

namespace es\ucm;

interface SAExamenes
{

    public static function findExamenes($idAsignatura);

    public static function createExamenes($examenes);

    public static function updateExamenes($examenes);

    public static function deleteExamenes($idAsignatura);
}
