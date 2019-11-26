<?php

namespace es\ucm;

interface SALeyenda{

    public static function findLeyenda($idLeyenda);

    public static function createLeyenda($idLeyenda,$lectura,$escritura,$check,$editPerm);

    public static function updateLeyenda($idLeyenda,$lectura,$escritura,$check,$editPerm);
    
    public static function deleteLeyenda($idLeyenda);

}