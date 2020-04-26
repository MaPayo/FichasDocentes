<?php
namespace es\ucm;

interface DAOBibliografia{
    public static function findBibliografia($idAsignatura);

    public static function createBibliografia($Bibliografia);

    public static function updateBibliografia($Bibliografia);
    
    public static function deleteBibliografia($idAsignatura);
}