<?php
namespace es\ucm;

interface DAOModBibliografia{
    public static function findModBibliografia($idModBibliografia);

    public static function createModBibliografia($ModBibliografia);

    public static function updateModBibliografia($ModBibliografia);
    
    public static function deleteModBibliografia($idModBibliografia);
}