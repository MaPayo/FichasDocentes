<?php
namespace es\ucm;

interface DAOLeyenda{
    public static function findLeyenda($idLeyenda);

    public static function createLeyenda($Leyenda);

    public static function updateLeyenda($Leyenda);
    
    public static function deleteLeyenda($idLeyenda);
}