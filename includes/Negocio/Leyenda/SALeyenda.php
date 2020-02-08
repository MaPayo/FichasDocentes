<?php

namespace es\ucm;

interface SALeyenda{

    public static function findLeyenda($idLeyenda);

    public static function createLeyenda($leyenda);

    public static function updateLeyenda($leyenda);
    
    public static function deleteLeyenda($idLeyenda);

}