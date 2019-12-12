<?php
namespace es\ucm;

interface DAOMetodologia{
    public static function findMetodologia($idMetodologia);

    public static function createMetodologia($Metodologia);

    public static function updateMetodologia($Metodologia);
    
    public static function deleteMetodologia($idMetodologia);
}