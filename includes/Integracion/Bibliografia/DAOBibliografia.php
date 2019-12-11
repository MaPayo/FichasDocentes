<?php
namespace es\ucm;

interface DAOBibliografia{
    public static function findBibliografia($idBibliografia);

    public static function createBibliografia($Bibliografia);

    public static function updateBibliografia($Bibliografia);
    
    public static function deleteBibliografia($idBibliografia);
}