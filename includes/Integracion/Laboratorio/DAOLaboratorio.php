<?php
namespace es\ucm;

interface DAOLaboratorio{
    public static function findLaboratorio($idLaboratorio);

    public static function createLaboratorio($Laboratorio);

    public static function updateLaboratorio($Laboratorio);
    
    public static function deleteLaboratorio($idLaboratorio);
}