<?php
namespace es\ucm;

interface SABibliografia{

    public static function findBibliografia($idAsignatura);

    public static function createBibliografia($citasBibliograficas,$recursosInternet,$idAsignatura);

    public static function updateBibliografia($citasBibliograficas,$recursosInternet,$idAsignatura);
    
    public static function deleteBibliografia($idAsignatura);

}