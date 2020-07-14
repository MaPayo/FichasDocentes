<?php
namespace es\ucm;

interface DAOMateria{
    public static function findMateria($idMateria);

    public static function createMateria($Materia);

    public static function updateMateria($Materia);
    
    public static function deleteMateria($idMateria);

    public static function listMateria($idModulo);
}