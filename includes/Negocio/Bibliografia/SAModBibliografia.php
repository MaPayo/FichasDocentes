<?php
namespace es\ucm;

interface SAModBibliografia{

    public static function findModBibliografia($idAsignatura);

    public static function createModBibliografia($bibliografia);

    public static function updateModBibliografia($bibliografia);
    
    public static function deleteModBibliografia($idAsignatura);

}