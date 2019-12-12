<?php
namespace es\ucm;

interface DAOVerifica{
    public static function findVerifica($idVerifica);

    public static function createVerifica($Verifica);

    public static function updateVerifica($Verifica);
    
    public static function deleteVerifica($idVerifica);
}