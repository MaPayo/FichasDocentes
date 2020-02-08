<?php

namespace es\ucm;

class SAProfesorImplements implements SAProfesor{

    private static $DAOProfesor;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProfesor=$factoriesDAO->createDAOProfesor(); 
    }
    
    
    public static function findProfesor($emailProfesor){
        $profesor=$DAOProfesor->findProfesor($emailProfesor);
        return $profesor;
    }

    public static function createProfesor($profesor){
        $profesor=$DAOProfesor->createProfesor($profesor);
        return $profesor;
    }

    public static function updateProfesor($profesor){
        $profesor=$DAOProfesor->updateProfesor($profesor);
        return $profesor;
    }

    public static function deleteProfesor($emailProfesor){
        $profesor=$DAOProfesor->deleteProfesor($emailProfesor);
        return $profesor;
    }

}